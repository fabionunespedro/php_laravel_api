<?php

namespace App\Models;

class Game
{
    public string $name;
    public string $category;
    public int $year;

    public function __construct(string $name, string $category, int $year)
    {
        $this->name = $name;
        $this->category = $category;
        $this->year = $year;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'category' => $this->category,
            'year' => $this->year,
        ];
    }

    public static function all(): array
    {
        $path = storage_path('app/games.json');
        if (!file_exists($path)) {
            return [];
        }

        $data = json_decode(file_get_contents($path), true);
        return $data ?? [];
    }

    public static function saveAll(array $games): void
    {
        file_put_contents(storage_path('app/games.json'), json_encode($games, JSON_PRETTY_PRINT));
    }
}

