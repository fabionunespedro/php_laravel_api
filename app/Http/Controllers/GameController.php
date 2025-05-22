<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function create(Request $request)
    {
        $games = Game::all();

        $newGame = new Game(
            $request->input('name'),
            $request->input('category'),
            (int) $request->input('year')
        );

        $games[] = $newGame->toArray();
        Game::saveAll($games);

        return response()->json(['message' => 'Game criado com sucesso!', 'game' => $newGame->toArray()], 201);
    }

    public function listAll()
    {
        return response()->json(Game::all());
    }

    public function getByName(string $name)
    {
        $games = Game::all();

        foreach ($games as $game) {
            if (strtolower($game['name']) === strtolower($name)) {
                return response()->json($game);
            }
        }

        return response()->json(['error' => 'Game não encontrado'], 404);
    }

    public function update(Request $request, string $name)
    {
        $games = Game::all();
        $found = false;

        foreach ($games as &$game) {
            if ($game['name'] === $name) {
                $game['name'] = $request->input('name');
                $game['category'] = $request->input('category');
                $game['year'] = (int) $request->input('year');
                $found = true;
                break;
            }
        }

        if ($found) {
            Game::saveAll($games);
            return response()->json(['message' => 'Game atualizado com sucesso', 'games' => $games]);
        }

        return response()->json(['error' => 'Game não encontrado'], 404);
    }

    public function delete(string $name)
    {
        $games = Game::all();
        $newGames = array_filter($games, fn($game) => $game['name'] !== $name);

        if (count($games) === count($newGames)) {
            return response()->json(['error' => 'Game não encontrado'], 404);
        }

        Game::saveAll(array_values($newGames));
        return response()->json(['message' => 'Game removido com sucesso']);
    }
}
