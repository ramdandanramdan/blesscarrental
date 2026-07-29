<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PageController extends Controller
{
    public function index(): View
    {
        $pages = Page::latest()->paginate(10);

        return view('admin.pages.index', compact('pages'));
    }

    public function create(): RedirectResponse
    {
        return redirect()->route('admin.pages.index');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'is_published' => ['boolean'],
        ]);

        $validated['slug'] = Str::slug($request->title);
        $validated['is_published'] = $request->boolean('is_published');

        Page::create($validated);

        return redirect()->route('admin.pages.index')->with('success', 'Halaman berhasil ditambahkan.');
    }

    public function edit(Page $page): JsonResponse
    {
        if (request()->ajax()) {
            return response()->json($page);
        }

        return redirect()->route('admin.pages.index');
    }

    public function update(Request $request, Page $page): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'is_published' => ['boolean'],
        ]);

        $validated['slug'] = Str::slug($request->title);
        $validated['is_published'] = $request->boolean('is_published');

        $page->update($validated);

        return redirect()->route('admin.pages.index')->with('success', 'Halaman berhasil diperbarui.');
    }

    public function destroy(Page $page): RedirectResponse
    {
        $page->delete();

        return redirect()->route('admin.pages.index')->with('success', 'Halaman berhasil dihapus.');
    }
}
