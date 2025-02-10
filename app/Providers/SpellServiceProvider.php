<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class SpellServiceProvider extends ServiceProvider
{
    protected static array $spells = array();

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    { }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $codex = json_decode(Storage::disk('public')->get("spells.json"), true);

        foreach ($codex['spell'] as $item)
        {
            $item['id']  = strtolower($item['expansion']) . "_";
            $item['id'] .= str_replace(" ", "-", strtolower($item['code']));

            self::$spells[] = $item;
        }
    }

    public static function getSpell(string $id): array
    {
        foreach (self::$locations as $item) {
            if ($item['id'] == $id) {
                return self::getCurrentLanguage($item);
            }
        }

        return array();
    }

    public static function getSpells(): array
    {
        $items = array();

        foreach (self::$spells as $item) {
            $items[] = self::getCurrentLanguage($item);
        }

        return $items;
    }

    private static function getCurrentLanguage(array $item): array
    {
        $item['name'] = $item['name'][App::currentLocale()];
        $item['text'] = key_exists('text', $item) ? self::translateText($item['text'][App::currentLocale()]) : null;

        return $item;
    }

    private static function translateText(string $text): string
    {
        $text = preg_replace_callback(
            '/\{(.*?)}/mi',
            function ($m) {
                return "{" . $m[1] . "|" . __("keywords." . $m[1]) . "}";
            },
            $text
        );

        return $text;
    }
}
