<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Student::all();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datasubmit');
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
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required',
        ]);


        $res=new student;
        $res->name=$request->input('name');
        $res->email=$request->input('email');
        $res->password=$request->input('password');
        $res->city=$request->input('city');

        $res->save();
        return redirect('datashow');


    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
        $data=student::all();
        return view('data',array('data'=>$data));
    }

    public function trash(student $student)
    {
        $data=student::onlyTrashed()->get();
        return view('trash',array('data'=>$data));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student,$id)
    {
        return view('dataedit')->with('data',student::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, student $student,$id)
    {
        $res=student::find($id);
        $res->name=$request->input('name');
        $res->email=$request->input('email');
        $res->password=$request->input('password');
        $res->city=$request->input('city');

        $res->save();
        return redirect('datashow');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student,$id)
    {
        student::destroy(array('id'=>$id));
        return redirect('datashow');
    }

    public function restore(student $student,$id)
    {
        $student=student::withTrashed()->find($id);
        if (!is_null($student)) {
            $student->restore();
        }
        return redirect('datashow');
    }

    public function forcedelete(student $student,$id)
    {
        $student=student::withTrashed()->find($id);
        if (!is_null($student)) {
            $student->forcedelete();
        }
        return redirect()->back();
    }
}
