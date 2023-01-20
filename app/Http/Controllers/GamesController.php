<?php

namespace App\Http\Controllers;
use App\Models\Game;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function index(Request $request)
    {
        $data['games'] = Game::orderBy('id','desc')->paginate(15);
        return view('games.index', $data);
    }

    public function userIndex()
    {
        $data['games'] = Book::orderBy('id','desc')->paginate(15);
        return view('games.userIndex', $data);
    }

    public function create()
    {
        return view('games.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'developer' => 'required',
            'title' => 'required',
            'pegi' => 'required',
            'price' => 'required',
        ]);
        $game = new Game;
        $game->developer = $request->developer;
        $game->title = $request->title;
        $game->pegi = $request->pegi;
        $game->price = $request->price;
        $game->save();
        return redirect()->route('games.index')
        ->with('success','Game has been stored successfully.');
    }
    public function show(Game $game)
    {
        return view('games.show',compact('game'));
    }
    public function edit(Game $game)
    {
        return view('games.edit',compact('game'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'developer' => 'required',
            'title' => 'required',
            'pegi' => 'required',
            'price' => 'required',
        ]);
        $game = Game::find($id);
        $game->developer = $request->developer;
        $game->title = $request->title;
        $game->pegi = $request->pegi;
        $game->price = $request->price;
        $game->save();
        return redirect()->route('games.index')
        ->with('success','Game  has been updated successfully');
    }
    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('games.index')
        ->with('success','Game has been deleted successfully');
    }
}
