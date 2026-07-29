<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function index(): View
    {
        $settings = Setting::pluck('value', 'key')->toArray();

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'company_name' => ['nullable', 'string', 'max:255'],
            'tagline' => ['nullable', 'string', 'max:500'],
            'description' => ['nullable', 'string', 'max:1000'],
            'address' => ['nullable', 'string', 'max:500'],
            'phone' => ['nullable', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:255'],
            'whatsapp' => ['nullable', 'string', 'max:20'],
            'google_maps' => ['nullable', 'string'],
            'facebook_url' => ['nullable', 'string', 'max:500'],
            'instagram_url' => ['nullable', 'string', 'max:500'],
            'twitter_url' => ['nullable', 'string', 'max:500'],
            'youtube_url' => ['nullable', 'string', 'max:500'],
            'tiktok_url' => ['nullable', 'string', 'max:500'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'meta_keywords' => ['nullable', 'string', 'max:500'],
            'google_analytics_id' => ['nullable', 'string', 'max:50'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:2048'],
            'favicon' => ['nullable', 'image', 'mimes:jpeg,png,jpg,ico,svg', 'max:1024'],
        ]);

        $settings = $request->except(['_token', '_method']);

        if ($request->hasFile('logo')) {
            $oldLogo = Setting::where('key', 'logo')->first();
            if ($oldLogo && $oldLogo->value) {
                Storage::disk('public')->delete($oldLogo->value);
            }
            $settings['logo'] = $request->file('logo')->store('settings', 'public');
        }

        if ($request->hasFile('favicon')) {
            $oldFavicon = Setting::where('key', 'favicon')->first();
            if ($oldFavicon && $oldFavicon->value) {
                Storage::disk('public')->delete($oldFavicon->value);
            }
            $settings['favicon'] = $request->file('favicon')->store('settings', 'public');
        }

        foreach ($settings as $key => $value) {
            if (in_array($key, ['logo', 'favicon']) && !$value) {
                continue;
            }

            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value, 'type' => 'text']
            );
        }

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan berhasil disimpan.');
    }
}
