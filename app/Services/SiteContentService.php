<?php

namespace App\Services;

use App\Models\Configuration;

class SiteContentService
{
    public static function all(): array
    {
        return cache()->remember('site_content', 3600, function () {
            return Configuration::getGroup('content');
        });
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        $content = static::all();
        return $content[$key] ?? $default;
    }

    public static function page(string $pageName, string $field, mixed $default = null): mixed
    {
        $page = \App\Models\Page::where('page_name', $pageName)->where('status', true)->first();
        if ($page && $page->{$field}) {
            return $page->{$field};
        }
        return static::get("{$pageName}_{$field}", $default);
    }
}
