<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::all();
        return response()->json($student);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array();
        $data['class_id'] = $request->class_id ;
        $data['section_id'] = $request->section_id ;
        $data['name'] = $request->name ;
        $data['phone'] = $request->phone ;
        $data['email'] = $request->email ;
        $data['password'] = Hash::make($request->password) ;
        $data['photo'] = $request->photo ;
        $data['address'] = $request->address ;
        $data['gender'] = $request->gender ;

        Student::create($data);
        return response('Student created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::findorfail($id);
        return response()->json($student);
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
        $student = Student::findorfail($id);
        $data = array();
        $data['class_id'] = $request->class_id ;
        $data['section_id'] = $request->section_id ;
        $data['name'] = $request->name ;
        $data['phone'] = $request->phone ;
        $data['email'] = $request->email ;
        $data['password'] = Hash::make($request->password) ;
        $data['photo'] = $request->photo ;
        $data['address'] = $request->address ;
        $data['gender'] = $request->gender ;

        $student->update($data);
        return response('Student updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findorfail($id);
        $img_path = $student->photo;
        unlink($img_path);
        $student->delete();
        return response('student deleted');

    }
}
