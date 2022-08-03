<?php

namespace App\Http\Controllers;

use App\Models\Student;
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
        if(request()->ajax()) {
            return datatables()->of(Student::select('*'))
            ->addColumn('action', function($data){
                return '
                    <a href="#" class="btn btn-success btn-sm" title="Profile">
                          <i class="fa fa-eye" ></i>
                    </a>
                    <a href="#" class="btn btn-warning btn-sm text-white" title="Modifier">
                    <i class="fa fa-pen" ></i>
              </a>
                    <a href="#" class="btn btn-danger btn-sm" title="Supprimer">
                          <i class="fa fa-trash" style="color: #fff;"></i>
                    </a>
                    ';
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('students.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
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
            // VALIDATIONS
         
            'student_name'=>  'required',
            'student_sexe'=>  'required',
            'student_surname'=>  'required',
            'student_dob'=>  'required',
            'student_pob'=>  'required',
            'student_adress'=>  'required',
            'student_phone'=>  'required',
            'student_country'=>  'required',
            'student_email'=>  ['required', 'string', 'email', 'max:255', 'unique:students']
        ]);
        $code="ESC".date('Y')."".rand(100,999);
        // GET DATA FROM THE FORM
        $form = array(
            'student_code'=>  $code,
            'student_name'=>  $request->student_name,
            'student_sexe'=>  $request->student_sexe,
            'student_surname'=>  $request->student_surname,
            'student_dob'=>  $request->student_dob,
            'student_pob'=>  $request->student_pob,
            'student_adress'=>  $request->student_adress,
            'student_phone'=>  $request->student_phone,
            'student_country'=>  $request->student_country,
            'student_email'=>  $request->student_email, 
               );

         
                // save new Student
            $new_student = Student::create($form);
            return redirect()->route('students.index')->with(
                    'success',
                    'Etudiant ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
