<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

use App\Mark;
use App\Subject;
use App\Student;

class MarkController extends Controller
{
    public function index()
    {
        return Mark::all();
    }

    public function store(Request $request, Student $student, Subject $subject)
    {
        $validator = $this->validateMark();
        if($validator->fails()){
            return response()->json(['message'=>$validator->messages(),'data'=>null],400);
        }

        $mark = new Mark($validator->validate());
       
    	$mark->mark = $request->get('mark');
        $mark->student_id = $request->get('student_id');
    	$mark->subject_id = $request->get('subject_id');

    	$mark->save();
        return response()->json(['message'=>'Mark Saved','data'=>$mark],200);

        return response()->json(['message'=>'Error Occured','data'=>null],400);
    }

    public function show(Mark $mark)
    {
        return response()->json(['message'=>'Success','data'=>$mark],200);
    }


    public function validateMark(){
        return Validator::make(request()->all(), [
            'mark' => 'required|numeric|max:100'
        ]);
    }
}
