<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
                    <a href="students/'.$data->id.'" class="btn btn-success btn-sm" title="Profile">
                          <i class="fa fa-eye" ></i>
                    </a>
                    <a href="students/'.$data->id.'/edit/" class="btn btn-warning btn-sm text-white" title="Modifier">
                    <i class="fa fa-pen" ></i>
                   </a>
                   
                    <a href="students/'.$data->id.'/delete" class="btn btn-danger btn-sm" title="Supprimer">
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
        $this->checkForm($request);
        $code="EST".(date('Y')-1800)."".rand(1000,9999);

        //if the user has a avatar to upload
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename =$userName . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/students/' . $filename ) );
        }
        else{
                $filename="user.png";
        }
                  
          // GET DATA FROM THE FORM
          $form = array(
            'avatar'=>  $filename, 
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
            'student_ville'=>  $request->student_ville,
            'student_postal'=>  $request->student_postal, 
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
        $user=Student::findOrFail($id);
        return view('students.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=Student::findOrFail($id);
        return view('students.edit', compact('user'));
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
       
        $this->checkForm($request);
        //if the user has a avatar to upload
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename =$userName . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/students/' . $filename ) );
        }
        else{
                $filename="user.png";
        }
                  
          // GET DATA FROM THE FORM
          $form = array(
            'avatar'=>  $filename, 
            'student_name'=>  $request->student_name,
            'student_sexe'=>  $request->student_sexe,
            'student_surname'=>  $request->student_surname,
            'student_dob'=>  $request->student_dob,
            'student_pob'=>  $request->student_pob,
            'student_adress'=>  $request->student_adress,
            'student_phone'=>  $request->student_phone,
            'student_country'=>  $request->student_country,
            'student_email'=>  $request->student_email, 
            'student_ville'=>  $request->student_ville,
            'student_postal'=>  $request->student_postal, 
            );
                //update Student
           Student::whereId($id)->update($form);
            return redirect()->route('students.index')->with(
                    'success',
                    'Etudiant actualisé avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Student::whereId($id)->delete();
              return redirect()->route('students.index')->with(
                    'success',
                    'Edudiant supprimé avec succès');
    }
    public function checkForm($request){
        return $request->validate([
            // VALIDATIONS
            'student_name'=>  'required',
            'student_sexe'=>  'required',
            'student_surname'=>  'required',
            'student_dob'=>  'required',
            'student_pob'=>  'required',
            'student_adress'=>  'required',
            'student_phone'=>  'required',
            'student_country'=>  'required',
            'student_ville'=>  'required',
            'student_postal'=>  'required',
            'student_email'=>  ['required', 'string', 'email', 'max:255']
        ]);
    }
}
