<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();
        return view('Game.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Game.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|min:4',
            'precio' => 'required'
        ]);

        $game = new Game();
        $game->titulo = $request->titulo;
        $game->precio = $request->precio;
        $game->save();

        return redirect()->route('Game.create')->with('success', 'Juego agregado!!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game = Game::find($id);
        return view('Game.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'titulo' => 'required|min:4',
            'precio' => 'required|max:10'
        ]);


        $game = Game::find($id);
        $game->titulo = $request->titulo;
        $game->precio = $request->precio;
        $game->update();

        return Redirect()->route('Game.index')->with('success', 'Juego actualizado con exito!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $game = Game::find($id);
        $game->delete();

        return Redirect()->route('Game.index')->with('success', 'Juego eliminaod con exito!!');
    }
}
