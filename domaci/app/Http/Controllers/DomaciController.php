<?php

namespace App\Http\Controllers;


use App\Models\Domaci;
use App\Http\Resources\DomaciResource;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Domaci  $domaci
     * @return \Illuminate\Http\Response
     */
    public function show(Domaci $domaci)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Domaci  $domaci
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domaci $domaci)
    {
        //
    }
}
