<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studenti = Student::all();
        if(is_null($studenti))
        return response()->json('Data not found');
        return StudentResource::collection($studenti);

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
            'ime'=>'required|string',
            'prezime'=>'required|string',
            'broj_indeksa'=>'required|string',
        ]);

        if($validator->fails()){
            return response()->json([$validator->errors()]);
        }

        $student = Student::create([
            'ime'=> $request->ime,
            'prezime'=> $request->prezime,
            'broj_indeksa'=> $request->broj_indeksa,
        ]);

        return response()->json(['Student je sacuvan', new StudentResource($student)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return new StudentResource($student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $validator = Validator::make($request->all(),[
            'ime'=>'required|string',
            'prezime'=>'required|string',
            'broj_indeksa'=>'required|string',
        ]);

        if($validator->fails()){
            return response()->json([$validator->errors()]);
        }

       $student->ime = $request->ime;
       $student->prezime = $request->prezime;
       $student->broj_indeksa = $request->broj_indeksa;
       
       $student->save();

       return response()->json(['Student je update-ovan!',new StudentResource($student)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {   $student->delete();
        return response()->json(['Student je obrisan']);
    }
}
