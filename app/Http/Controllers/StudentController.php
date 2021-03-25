<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

use App\Mark;
use App\Subject;
use App\Student;

class StudentController extends Controller
{
    public function index()
    {
        return Student::all();
    }

    public function store(Request $request)
    {
        $validator = $this->validateStudent();
        if($validator->fails()){
            return response()->json(['message'=>$validator->messages(),'data'=>null],400);
        }
        if(Student::create($validator->validate())){
            return response()->json(['message'=>'Student Created','data'=>$validator->validate()],200);
        }
            return response()->json(['message'=>'Error Ocurred','data'=>null],400);
    }


    public function show(Student $student)
    {
        return response()->json(['message'=>'Success','data'=>$student],200);
    }

    public function show_marks(Student $student){
        $marks = $student->marks;
        if(count($marks) > 0){
            return response()->json(['message'=>'Success','data'=>$marks],200);
        }
            return response()->json(['message'=>'No Marks Found','data'=>null],200);
    }

    public function get_best_students()
    {

        // $beststudents = Student::with(['marks'=>function($query){
        //       $query ->select(DB::raw("SUM(mark) fullmarks, student_id"))
        //       ->groupBy("student_id")
        //       ->havingRaw("SUM(mark) > 250");
        // }])->get();

        $beststudents = Student::with(['marks'=>function($query){
            $query ->select(DB::raw("SUM(mark) fullmarks, student_id"))
            ->groupBy("student_id")
            ->havingRaw("SUM(mark) > 250");
      }])->get();
    return $beststudents;
        // return response()->json(['message'=>'Success','data'=>$beststudents],200);
    }

    public function validateStudent(){
        return Validator::make(request()->all(), [
            'name' => 'required|string|min:3|max:255'
        ]);
    }
}
