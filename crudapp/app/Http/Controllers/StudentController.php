<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public  function index()
    {
        $students = Student::paginate(6);
        return view('welcome',compact('students'));
    }
    public function create(){
        return view('create');
    }
    public  function  store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'class'=>'required',
            'address'=>'required'
        ]);

        $student = new Student();
        $student->name = $request->name;
        $student->class = $request->class;
        $student->address = $request->address;
        $student->save();
        return redirect(route('home'))->with('successMsg','Student added Successfully');
    }
    public  function edit($id){
        $student = Student::find($id);
        return view('edit',compact('student'));
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'name'=>'required',
            'class'=>'required',
            'address'=>'required'
        ]);


        $student = Student::find($id);
        $student->name = $request->name;
        $student->class = $request->class;
        $student->address = $request->address;
        $student->save();
        return redirect(route('home'))->with('successMsg','Student update Successfully');

    }
    public function delete($id){
          Student::find($id)->delete();
        return redirect(route('home'))->with('successMsg','Student deleted Successfully');
    }
}
