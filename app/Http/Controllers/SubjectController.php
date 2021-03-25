<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Mark;
use App\Subject;
use App\Student;

class SubjectController extends Controller
{
    public function index()
    {
        return Subject::all();
    }

    public function store(Request $request)
    {
        $validator = $this->validateSubject();
        if($validator->fails()){
            return response()->json(['message'=>$validator->messages(),'data'=>null],400);
        }
        if(Subject::create($validator->validate())){
            return response()->json(['message'=>'Subject Created','data'=>$validator->validate()],200);
        }
            return response()->json(['message'=>'Error Ocurred','data'=>null],400);
    }

    public function show(Subject $subject)
    {
        return response()->json(['message'=>'Success','data'=>$subject],200);
    }

    public function validateSubject(){
        return Validator::make(request()->all(), [
            'name' => 'required|string|min:3|max:255'
        ]);
    }
}
