<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:games,name',
            'category' => 'required|string',
            'year' => 'required|integer',
        ]);

        $game = Game::create($validated);

        return response()->json(['message' => 'Game criado com sucesso!', 'game' => $game], 201);
    }

    public function listAll()
    {
        return response()->json(Game::all());
    }

    public function getByName(string $name)
    {
        $game = Game::whereRaw('LOWER(name) = ?', [strtolower($name)])->first();

        if (!$game) {
            return response()->json(['error' => 'Game não encontrado'], 404);
        }

        return response()->json($game);
    }

    public function update(Request $request, string $name)
    {
        $game = Game::where('name', $name)->first();

        if (!$game) {
            return response()->json(['error' => 'Game não encontrado'], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'year' => 'required|integer',
        ]);

        $game->update($validated);

        return response()->json(['message' => 'Game atualizado com sucesso', 'game' => $game]);
    }

    public function delete(string $name)
    {
        $game = Game::where('name', $name)->first();

        if (!$game) {
            return response()->json(['error' => 'Game não encontrado'], 404);
        }

        $game->delete();

        return response()->json(['message' => 'Game removido com sucesso']);
    }
}
