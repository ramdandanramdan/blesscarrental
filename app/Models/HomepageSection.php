<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class HomepageSection extends Model
{
    protected $fillable = [
        'section',
        'key',
        'value',
        'type',
    ];

    public static function getSection(string $section): Collection
    {
        return static::where('section', $section)->get();
    }

    public static function get(string $section, string $key, ?string $default = null): ?string
    {
        $item = static::where('section', $section)->where('key', $key)->first();

        return $item?->value ?? $default;
    }

    public static function set(string $section, string $key, ?string $value, string $type = 'text'): static
    {
        return static::updateOrCreate(
            ['section' => $section, 'key' => $key],
            ['value' => $value, 'type' => $type]
        );
    }

    public static function getAsArray(string $section): array
    {
        return static::where('section', $section)
            ->pluck('value', 'key')
            ->toArray();
    }

    public static function getAllGrouped(): array
    {
        $sections = ['hero', 'stats', 'services_intro', 'cta', 'locations'];
        $grouped = [];

        foreach ($sections as $section) {
            $grouped[$section] = static::getAsArray($section);
        }

        return $grouped;
    }
}
