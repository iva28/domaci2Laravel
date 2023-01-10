<?php

namespace App\Http\Controllers;


use App\Models\Domaci;
use App\Http\Resources\DomaciResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DomaciController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $domaci = Domaci::all();
       if(is_null($domaci))
       return response()->json('Data not found');
       return DomaciResource::collection($domaci);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $validator = Validator::make($request->all(),[
        'opis'=>'required|string',
        'datum'=>'required',
        'predmet_id'=>'required',
        'student_id'=>'required',
    ]);

    if($validator->fails()){
        return response()->json([$validator->errors()]);
    }

    $domaci = Domaci::create([
        'opis'=> $request->opis,
        'datum'=> $request->datum,
        'predmet_id'=> $request->predmet_id,
        'student_id'=> $request->student_id,
    ]);

    return response()->json(['Domaci je sacuvan', new DomaciResource($domaci)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Domaci  $domaci
     * @return \Illuminate\Http\Response
     */
    public function show(Domaci $domaci)
    {
        return new DomaciResource($domaci);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Domaci  $domaci
     * @return \Illuminate\Http\Response
     */
    public function edit(Domaci $domaci)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Domaci  $domaci
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Domaci $domaci)
    {
        $validator = Validator::make($request->all(),[
            'opis'=>'required|string',
            'datum'=>'required',
            'predmet_id'=>'required',
            'student_id'=>'required',
        ]);
    
        if($validator->fails()){
            return response()->json([$validator->errors()]);
        }
       $domaci->opis = $request->opis;
       $domaci->datum = $request->datum;
       $domaci->predmet_id = $request->predmet_id;
       $domaci->student_id = $request->student_id;
       
       $domaci->save();

       return response()->json(['Domaci je update-ovan!',new DomaciResource($domaci)]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Domaci  $domaci
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domaci $domaci)
    {  $domaci->delete();
        return response()->json(['Domaci je obrisan']);
    }
}
