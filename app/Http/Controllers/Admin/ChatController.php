<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Services\ChatAIService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;

class ChatController extends Controller
{
    public function index(): View
    {
        $sessions = $this->getSessionsData('human');
        $chatMode = ChatAIService::getChatMode();

        return view('admin.chat.index', compact('sessions', 'chatMode'));
    }

    public function show(string $sessionId): View
    {
        $messages = ChatMessage::where('session_id', $sessionId)
            ->orderBy('created_at')
            ->get();

        ChatMessage::where('session_id', $sessionId)
            ->where('is_from_admin', false)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        $sessions = $this->getSessionsData('human');
        $chatMode = ChatAIService::getChatMode();

        return view('admin.chat.index', compact('messages', 'sessions', 'chatMode'));
    }

    public function sendMessage(Request $request, string $sessionId): JsonResponse
    {
        $request->validate([
            'message' => ['required', 'string', 'max:2000'],
        ]);

        ChatMessage::create([
            'session_id' => $sessionId,
            'chat_type' => 'human',
            'user_id' => auth()->id(),
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'message' => $request->message,
            'is_from_admin' => true,
            'is_read' => false,
        ]);

        return response()->json(['success' => true]);
    }

    public function getMessages(string $sessionId): JsonResponse
    {
        $messages = ChatMessage::where('session_id', $sessionId)
            ->orderBy('created_at')
            ->get();

        ChatMessage::where('session_id', $sessionId)
            ->where('is_from_admin', false)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return response()->json($messages);
    }

    public function getSessions(): JsonResponse
    {
        $sessions = $this->getSessionsData('human');

        return response()->json($sessions);
    }

    public function getUnreadCount(): JsonResponse
    {
        $totalUnread = ChatMessage::where('is_from_admin', false)
            ->where('is_read', false)
            ->where('chat_type', 'human')
            ->count();

        return response()->json(['count' => $totalUnread]);
    }

    public function getChatMode(): JsonResponse
    {
        return response()->json(['mode' => ChatAIService::getChatMode()]);
    }

    public function toggleMode(): JsonResponse
    {
        $current = ChatAIService::getChatMode();
        $newMode = $current === 'ai' ? 'admin' : 'ai';
        ChatAIService::setChatMode($newMode);

        return response()->json([
            'mode' => $newMode,
            'message' => $newMode === 'ai' ? 'Mode AI diaktifkan.' : 'Mode Admin diaktifkan.',
        ]);
    }

    private function getSessionsData(string $chatType = 'human'): array
    {
        $sessions = ChatMessage::selectRaw('
                session_id,
                chat_type,
                MIN(name) as name,
                MIN(email) as email,
                MAX(created_at) as last_message_at,
                (SELECT message FROM chat_messages cm WHERE cm.session_id = chat_messages.session_id ORDER BY cm.created_at DESC LIMIT 1) as last_message,
                (SELECT is_from_admin FROM chat_messages cm2 WHERE cm2.session_id = chat_messages.session_id ORDER BY cm2.created_at DESC LIMIT 1) as last_message_from_admin
            ')
            ->where('chat_type', $chatType)
            ->groupBy('session_id', 'chat_type')
            ->orderByDesc('last_message_at')
            ->get();

        $result = [];
        foreach ($sessions as $session) {
            $unread = ChatMessage::where('session_id', $session->session_id)
                ->where('is_from_admin', false)
                ->where('is_read', false)
                ->count();

            $lastMessageAt = $session->last_message_at;
            if (is_string($lastMessageAt)) {
                $lastMessageAt = Carbon::parse($lastMessageAt);
            }

            $result[] = [
                'id' => $session->session_id,
                'session_id' => $session->session_id,
                'chat_type' => $session->chat_type,
                'visitor_name' => $session->name ?? 'Visitor',
                'name' => $session->name ?? 'Visitor',
                'email' => $session->email ?? '',
                'last_message_at' => $lastMessageAt,
                'last_message' => $session->last_message ?? '',
                'last_message_from_admin' => (bool) $session->last_message_from_admin,
                'unread_count' => $unread,
                'is_online' => false,
            ];
        }

        return $result;
    }
}
