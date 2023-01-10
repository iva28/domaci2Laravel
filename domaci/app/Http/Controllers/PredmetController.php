<?php

namespace App\Http\Controllers;

use App\Models\Predmet;
use App\Http\Resources\PredmetResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PredmetController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $predmeti = Predmet::all();
        if(is_null($predmeti))
        return response()->json('Data not found');

        return  PredmetResource::collection($predmeti);
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
            'naziv'=>'required|string',
            'opis'=>'required|string',
            'sef_katedre'=>'required|string',
            'ESPB'=>'required',
        ]);

        if($validator->fails()){
            return response()->json([$validator->errors()]);
        }

        $predmet = Predmet::create([
            'naziv'=> $request->naziv,
            'opis'=> $request->opis,
            'sef_katedre'=> $request->sef_katedre,
            'ESPB'=> $request->ESPB,
        ]);

        return response()->json(['Predmet je sacuvan', new PredmetResource($predmet)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Predmet  $predmet
     * @return \Illuminate\Http\Response
     */
    public function show(Predmet $predmet)
    {
       return new PredmetResource($predmet);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Predmet  $predmet
     * @return \Illuminate\Http\Response
     */
    public function edit(Predmet $predmet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Predmet  $predmet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Predmet $predmet)
    {
        $validator = Validator::make($request->all(),[
            'naziv'=>'required|string',
            'opis'=>'required|string',
            'sef_katedre'=>'required|string',
            'ESPB'=>'required',
        ]);

        if($validator->fails()){
            return response()->json([$validator->errors()]);
        }

       $predmet->naziv = $request->naziv;
       $predmet->opis = $request->opis;
       $predmet->sef_katedre = $request->sef_katedre;
       $predmet->ESPB = $request->ESPB;
       $predmet->save();

       return response()->json(['Predmet je update-ovan!',new PredmetResource($predmet)]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Predmet  $predmet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Predmet $predmet)
    {
        $predmet->delete();
        return response()->json(['Predmet je obrisan']);
    }
}
