<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(Request $request): View
    {
        $query = Contact::query();

        if ($request->filled('is_read')) {
            $query->where('is_read', $request->boolean('is_read'));
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('subject', 'like', "%{$search}%")
                    ->orWhere('message', 'like', "%{$search}%");
            });
        }

        $contacts = $query->latest()->paginate(10);

        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact): View
    {
        if (!$contact->is_read) {
            $contact->update(['is_read' => true]);
        }

        return view('admin.contacts.show', compact('contact'));
    }

    public function markAsRead(Contact $contact): RedirectResponse
    {
        $contact->update(['is_read' => true]);

        return back()->with('success', 'Pesan ditandai sebagai sudah dibaca.');
    }

    public function markAsUnread(Contact $contact): RedirectResponse
    {
        $contact->update(['is_read' => false]);

        return back()->with('success', 'Pesan ditandai sebagai belum dibaca.');
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')->with('success', 'Pesan berhasil dihapus.');
    }
}
