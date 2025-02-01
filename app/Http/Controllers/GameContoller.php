<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Http\Resources\GameResource;
use Illuminate\Support\Facades\Validator;

class GameContoller extends Controller
{
    public function index()
    {
        $games= Game::get();
        if ($games->count() > 0) {
        
            return GameResource::collection($games);

        }else{

            return response()->json(['message'=>'NO Record Available'],200);

        }




    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validator =Validator::make($request->all(),[
            'Gname'=>'required|string|max:255|unique:Games',
            'Gdescription'=>'required|string|min:10|max:1000',
            'game_chars_id'=>'required|integer|exists:Game_Chars,id',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'error'=>$validator->messages(),
            ],422);
        }
        

        $data = Game::create([
            'Gname'=>$request->Gname,
            'Gdescription'=>$request->Gdescription,
            'game_chars_id'=>$request->game_chars_id,

        ]);

        return response()->json([
            'message'=>'Game created successfully',
            'DATA' => new GameResource($data) ,
        ],200);


    }

    /**
     * Display the specified resource.
     */
    public function show(Game $Game)
    {
        return  new GameResource($Game) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $Game)
    {
        $validator =Validator::make($request->all(),[
            'Gname'=>'required|string|max:255|unique:Games',
            'Gdescription'=>'required|string|min:10|max:1000',
            'game_chars_id'=>'required|integer|exists:Game_Chars,id',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'error'=>$validator->messages(),
            ],422);
        } 
        

        $Game->update([
            'Gname'=>$request->Gname,
            'Gdescription'=>$request->Gdescription,
            'game_chars_id'=>$request->game_chars_id,
        ]);

        return response()->json([
            'message'=>'Game updated successfully',
            'DATA' => new GameResource($Game) ,
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $Game)
    {
        $Game->delete();
        return response()->json([
            'message'=>'Game deleted successfully',
        ],200);
    }
}
