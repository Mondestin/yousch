<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Models\Student;
class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
        $users=User::all();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->guard('web')->attempt(['email' => $request->input('email'),'password' => $request->input('password')])) {
           
            $user= User::where('email', 'like', '%'.$request->input('email').'%')->first();
            $student=Student::where('student_email', 'like', '%'.$request->input('email').'%')->first();
            
         
            return response()->json([  
            'user_one' => "".$user->id,
            'user_email' => $user->email,
            'student_id' => "".$student->id,
            'student_name' => $student->student_name." ".$student->student_surname,
            'student_class' => $student->class->class_code,
            'student_course' => $student->course->course_code,
            'student_img' => $student->avatar]);
         }
         return response()->json([
                'success' => false,
                'message' => 'Email ou mot de passe invalide',
          ], 401); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user= User::findOrfail($id);

          return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
