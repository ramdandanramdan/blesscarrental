<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageSection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomepageController extends Controller
{
    public function index(): View
    {
        $sections = HomepageSection::getAllGrouped();

        return view('admin.homepage.index', compact('sections'));
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            // Hero
            'hero_badge'             => ['nullable', 'string', 'max:255'],
            'hero_title_1'           => ['nullable', 'string', 'max:255'],
            'hero_title_2'           => ['nullable', 'string', 'max:255'],
            'hero_title_3'           => ['nullable', 'string', 'max:255'],
            'hero_description'       => ['nullable', 'string', 'max:1000'],
            'hero_cta1_text'         => ['nullable', 'string', 'max:100'],
            'hero_cta1_link'         => ['nullable', 'string', 'max:500'],
            'hero_cta2_text'         => ['nullable', 'string', 'max:100'],
            'hero_cta2_link'         => ['nullable', 'string', 'max:500'],
            'hero_stat1_value'       => ['nullable', 'string', 'max:50'],
            'hero_stat1_label'       => ['nullable', 'string', 'max:100'],
            'hero_stat2_value'       => ['nullable', 'string', 'max:50'],
            'hero_stat2_label'       => ['nullable', 'string', 'max:100'],
            'hero_stat3_value'       => ['nullable', 'string', 'max:50'],
            'hero_stat3_label'       => ['nullable', 'string', 'max:100'],
            'hero_garansi_title'     => ['nullable', 'string', 'max:255'],
            'hero_garansi_subtitle'  => ['nullable', 'string', 'max:255'],
            'hero_rating_title'      => ['nullable', 'string', 'max:255'],
            'hero_rating_subtitle'   => ['nullable', 'string', 'max:255'],
            // Stats
            'stats_stat1_icon'       => ['nullable', 'string', 'max:50'],
            'stats_stat1_value'      => ['nullable', 'string', 'max:50'],
            'stats_stat1_label'      => ['nullable', 'string', 'max:100'],
            'stats_stat1_suffix'     => ['nullable', 'string', 'max:10'],
            'stats_stat2_icon'       => ['nullable', 'string', 'max:50'],
            'stats_stat2_value'      => ['nullable', 'string', 'max:50'],
            'stats_stat2_label'      => ['nullable', 'string', 'max:100'],
            'stats_stat2_suffix'     => ['nullable', 'string', 'max:10'],
            'stats_stat3_icon'       => ['nullable', 'string', 'max:50'],
            'stats_stat3_value'      => ['nullable', 'string', 'max:50'],
            'stats_stat3_label'      => ['nullable', 'string', 'max:100'],
            'stats_stat3_suffix'     => ['nullable', 'string', 'max:10'],
            'stats_stat4_icon'       => ['nullable', 'string', 'max:50'],
            'stats_stat4_value'      => ['nullable', 'string', 'max:50'],
            'stats_stat4_label'      => ['nullable', 'string', 'max:100'],
            'stats_stat4_suffix'     => ['nullable', 'string', 'max:10'],
            // Services Intro
            'services_subtitle'      => ['nullable', 'string', 'max:255'],
            'services_title'         => ['nullable', 'string', 'max:255'],
            'services_description'   => ['nullable', 'string', 'max:1000'],
            // CTA
            'cta_heading'            => ['nullable', 'string', 'max:255'],
            'cta_description'        => ['nullable', 'string', 'max:1000'],
            'cta_button1_text'       => ['nullable', 'string', 'max:100'],
            'cta_button1_link'       => ['nullable', 'string', 'max:500'],
            'cta_button2_text'       => ['nullable', 'string', 'max:100'],
            'cta_button2_link'       => ['nullable', 'string', 'max:500'],
            // Locations
            'locations_label'        => ['nullable', 'string', 'max:255'],
            'locations_list'         => ['nullable', 'string'],
        ]);

        // Hero
        HomepageSection::set('hero', 'badge', $request->input('hero_badge'));
        HomepageSection::set('hero', 'title_1', $request->input('hero_title_1'));
        HomepageSection::set('hero', 'title_2', $request->input('hero_title_2'));
        HomepageSection::set('hero', 'title_3', $request->input('hero_title_3'));
        HomepageSection::set('hero', 'description', $request->input('hero_description'), 'textarea');
        HomepageSection::set('hero', 'cta1_text', $request->input('hero_cta1_text'));
        HomepageSection::set('hero', 'cta1_link', $request->input('hero_cta1_link'));
        HomepageSection::set('hero', 'cta2_text', $request->input('hero_cta2_text'));
        HomepageSection::set('hero', 'cta2_link', $request->input('hero_cta2_link'));
        HomepageSection::set('hero', 'stat1_value', $request->input('hero_stat1_value'));
        HomepageSection::set('hero', 'stat1_label', $request->input('hero_stat1_label'));
        HomepageSection::set('hero', 'stat2_value', $request->input('hero_stat2_value'));
        HomepageSection::set('hero', 'stat2_label', $request->input('hero_stat2_label'));
        HomepageSection::set('hero', 'stat3_value', $request->input('hero_stat3_value'));
        HomepageSection::set('hero', 'stat3_label', $request->input('hero_stat3_label'));
        HomepageSection::set('hero', 'garansi_title', $request->input('hero_garansi_title'));
        HomepageSection::set('hero', 'garansi_subtitle', $request->input('hero_garansi_subtitle'));
        HomepageSection::set('hero', 'rating_title', $request->input('hero_rating_title'));
        HomepageSection::set('hero', 'rating_subtitle', $request->input('hero_rating_subtitle'));

        // Stats
        HomepageSection::set('stats', 'stat1_icon', $request->input('stats_stat1_icon'));
        HomepageSection::set('stats', 'stat1_value', $request->input('stats_stat1_value'));
        HomepageSection::set('stats', 'stat1_label', $request->input('stats_stat1_label'));
        HomepageSection::set('stats', 'stat1_suffix', $request->input('stats_stat1_suffix'));
        HomepageSection::set('stats', 'stat2_icon', $request->input('stats_stat2_icon'));
        HomepageSection::set('stats', 'stat2_value', $request->input('stats_stat2_value'));
        HomepageSection::set('stats', 'stat2_label', $request->input('stats_stat2_label'));
        HomepageSection::set('stats', 'stat2_suffix', $request->input('stats_stat2_suffix'));
        HomepageSection::set('stats', 'stat3_icon', $request->input('stats_stat3_icon'));
        HomepageSection::set('stats', 'stat3_value', $request->input('stats_stat3_value'));
        HomepageSection::set('stats', 'stat3_label', $request->input('stats_stat3_label'));
        HomepageSection::set('stats', 'stat3_suffix', $request->input('stats_stat3_suffix'));
        HomepageSection::set('stats', 'stat4_icon', $request->input('stats_stat4_icon'));
        HomepageSection::set('stats', 'stat4_value', $request->input('stats_stat4_value'));
        HomepageSection::set('stats', 'stat4_label', $request->input('stats_stat4_label'));
        HomepageSection::set('stats', 'stat4_suffix', $request->input('stats_stat4_suffix'));

        // Services Intro
        HomepageSection::set('services_intro', 'subtitle', $request->input('services_subtitle'));
        HomepageSection::set('services_intro', 'title', $request->input('services_title'));
        HomepageSection::set('services_intro', 'description', $request->input('services_description'), 'textarea');

        // CTA
        HomepageSection::set('cta', 'heading', $request->input('cta_heading'));
        HomepageSection::set('cta', 'description', $request->input('cta_description'), 'textarea');
        HomepageSection::set('cta', 'button1_text', $request->input('cta_button1_text'));
        HomepageSection::set('cta', 'button1_link', $request->input('cta_button1_link'));
        HomepageSection::set('cta', 'button2_text', $request->input('cta_button2_text'));
        HomepageSection::set('cta', 'button2_link', $request->input('cta_button2_link'));

        // Locations
        HomepageSection::set('locations', 'label', $request->input('locations_label'));
        $locationsRaw = $request->input('locations_list', '');
        $locationsArray = array_map('trim', explode("\n", $locationsRaw));
        $locationsArray = array_filter($locationsArray);
        HomepageSection::set('locations', 'locations', json_encode(array_values($locationsArray)), 'json');

        return redirect()->route('admin.homepage.index')->with('success', 'Konten homepage berhasil disimpan.');
    }
}
