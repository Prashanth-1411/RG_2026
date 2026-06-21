<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $fillable = ['key', 'value', 'group'];

    public static function getValue(string $key, mixed $default = null): mixed
    {
        $config = static::where('key', $key)->first();
        return $config ? $config->value : $default;
    }

    public static function setValue(string $key, mixed $value, string $group = 'general'): void
    {
        static::updateOrCreate(
            ['key' => $key],
            ['value' => is_array($value) ? json_encode($value) : $value, 'group' => $group]
        );
    }

    public static function getGroup(string $group): array
    {
        return static::where('group', $group)->get()->mapWithKeys(function ($config) {
            $value = $config->value;
            $decoded = json_decode($value, true);
            return [$config->key => json_last_error() === JSON_ERROR_NONE && is_array($decoded) ? $decoded : $value];
        })->toArray();
    }
}
