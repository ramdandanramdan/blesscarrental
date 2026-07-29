<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaqController extends Controller
{
    public function index(): View
    {
        $faqs = Faq::orderBy('sort_order')->paginate(10);

        return view('admin.faqs.index', compact('faqs'));
    }

    public function create(): RedirectResponse
    {
        return redirect()->route('admin.faqs.index');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'question' => ['required', 'string', 'max:500'],
            'answer' => ['required', 'string'],
            'category' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        Faq::create($validated);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ berhasil ditambahkan.');
    }

    public function edit(Faq $faq): JsonResponse
    {
        if (request()->ajax()) {
            return response()->json($faq);
        }

        return redirect()->route('admin.faqs.index');
    }

    public function update(Request $request, Faq $faq): RedirectResponse
    {
        $validated = $request->validate([
            'question' => ['required', 'string', 'max:500'],
            'answer' => ['required', 'string'],
            'category' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $faq->update($validated);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ berhasil diperbarui.');
    }

    public function destroy(Faq $faq): RedirectResponse
    {
        $faq->delete();

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ berhasil dihapus.');
    }
}
