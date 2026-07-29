<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Services\ChatAIService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    private ChatAIService $chatAI;

    public function __construct(ChatAIService $chatAI)
    {
        $this->chatAI = $chatAI;
    }

    private function getSessionId(Request $request, string $chatType): string
    {
        if (!$request->session()->has('chat_base_id')) {
            $request->session()->put('chat_base_id', Str::uuid()->toString());
        }

        $baseId = $request->session()->get('chat_base_id');

        return $baseId . '-' . $chatType;
    }

    public function sendMessage(Request $request): JsonResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'max:2000'],
            'chat_type' => ['nullable', 'string', 'in:ai,human'],
        ]);

        $chatType = $request->input('chat_type', 'ai');
        $sessionId = $this->getSessionId($request, $chatType);

        $request->session()->put('chat_type', $chatType);

        ChatMessage::create([
            'session_id' => $sessionId,
            'chat_type' => $chatType,
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'is_from_admin' => false,
            'is_read' => false,
        ]);

        if ($chatType === 'ai') {
            $aiReply = $this->chatAI->getReply($request->message);

            ChatMessage::create([
                'session_id' => $sessionId,
                'chat_type' => 'ai',
                'name' => 'Bless AI',
                'email' => 'ai@blesstransmandiri.com',
                'message' => $aiReply,
                'is_from_admin' => true,
                'is_read' => false,
            ]);
        }

        return response()->json([
            'success' => true,
            'chat_type' => $chatType,
        ]);
    }

    public function getMessages(Request $request): JsonResponse
    {
        $chatType = $request->session()->get('chat_type', 'ai');
        $sessionId = $this->getSessionId($request, $chatType);

        $messages = ChatMessage::where('session_id', $sessionId)
            ->orderBy('created_at')
            ->get();

        return response()->json($messages);
    }

    public function checkNewMessages(Request $request): JsonResponse
    {
        $chatType = $request->session()->get('chat_type', 'human');
        $sessionId = $this->getSessionId($request, $chatType);

        if ($chatType !== 'human') {
            return response()->json(['count' => 0, 'messages' => []]);
        }

        $lastId = $request->input('last_id', 0);

        $messages = ChatMessage::where('session_id', $sessionId)
            ->where('id', '>', $lastId)
            ->where('is_from_admin', true)
            ->orderBy('created_at')
            ->get();

        return response()->json([
            'count' => $messages->count(),
            'messages' => $messages,
        ]);
    }

    public function setChatType(Request $request): JsonResponse
    {
        $request->validate([
            'chat_type' => ['required', 'string', 'in:ai,human'],
        ]);

        $request->session()->put('chat_type', $request->chat_type);

        return response()->json(['success' => true, 'chat_type' => $request->chat_type]);
    }
}
