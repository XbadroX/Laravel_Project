<?php

namespace App\Http\Controllers;

use App\Models\GameChar;
use Illuminate\Http\Request;
use App\Http\Resources\GameCharResource;
use Illuminate\Support\Facades\Validator;

class GameCharController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gamechars= GameChar::get();
        if ($gamechars->count() > 0) {
        
            return GameCharResource::collection($gamechars);

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
            'Cname'=>'required|string|max:255|unique:Game_Chars',
            'Cdescription'=>'required|string|min:10|max:1000',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'error'=>$validator->messages(),
            ],422);
        }
        

        $data = GameChar::create([
            'Cname'=>$request->Cname,
            'Cdescription'=>$request->Cdescription,
        ]);

        return response()->json([
            'message'=>'Game-char created successfully',
            'DATA' => new GameCharResource($data) ,
        ],200);


    }

    /**
     * Display the specified resource.
     */
    public function show(GameChar $GameChar)
    {
        return  new GameCharResource($GameChar) ;
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
    public function update(Request $request, GameChar $GameChar)
    {
        $validator =Validator::make($request->all(),[
            'Cname'=>'required|string|max:255|unique:Game_Chars',
            'Cdescription'=>'required|string|min:10|max:1000',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'error'=>$validator->messages(),
            ],422);
        } 
        

        $GameChar->update([
            'Cname'=>$request->Cname,
            'Cdescription'=>$request->Cdescription,
        ]);

        return response()->json([
            'message'=>'Game-char updated successfully',
            'DATA' => new GameCharResource($GameChar) ,
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GameChar $GameChar)
    {
        $GameChar->delete();
        return response()->json([
            'message'=>'Game-char deleted successfully',
        ],200);
    }
}
