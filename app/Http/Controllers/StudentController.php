<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Campus;
use Illuminate\Http\Request;
use Auth;
use Mail;
use Image;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use App\Models\Role;

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
        if (request()->ajax()) {
            return datatables()->of(Student::whereHas('campus')
            ->get()
            ->transform(function ($item) {
                 $item->campus_name = $item->campus->pluck('campus_name');
                 return $item;
             })
            ->all())
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
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
        # on aura besoin d'attribuer un campus à chaque etudiant
        $campus = Campus::all();

        return view('students.create', compact('campus'));
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

        $code="EST".(date('Y')-1800)."".rand(1000, 9999);

        //if the user has a avatar to upload
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');

            $filename = $code.rand(100000, 999999) . '.' . $avatar->getClientOriginalExtension();


            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/students/' . $filename));
        } else {
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
            'campus_id' => $request->campus_id,
            );

        // generate a random new password for the user
        $comb = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890#&@!$';
        $pass = array();
        $combLen = strlen($comb) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $combLen);
            $pass[] = $comb[$n];
        }
        $passw=implode($pass);
        $password= Hash::make($passw);

        $user = array(
                'type' => "Student",
                'email'=>$request->student_email,
                'password'=>$password);

        $mail_data=array(
                'name' => $request->student_name." ".$request->student_surname,
                'email'=>$request->student_email,
                'password'=>$passw);


        $usermail=$request->student_email;
        // send maill of the new password to the user
        // \Mail::to($usermail)->send(new \App\Mail\Newuser($mail_data));
        //  create the new user
        $newuser=User::create($user);
        $newuser->roles()->attach([1 => 1]);
        // save new Student
        $new_student = Student::create($form);
        return redirect()->route('students.index')->with(
            'success',
            'Etudiant ajouté avec succès'
        );
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
        # on aura besoin d'attribuer un campus à chaque etudiant
        $campus = Campus::all();

        $user=Student::findOrFail($id);
        return view('students.edit', compact('user', 'campus'));
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
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename =$id.rand(100000, 999999) . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/students/' . $filename));
        } else {
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
            'campus_id' => $request->campus_id,
            );
        //update Student
        Student::whereId($id)->update($form);
        return redirect()->route('students.index')->with(
            'success',
            'Etudiant actualisé avec succès'
        );
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
            'Edudiant supprimé avec succès'
        );
    }

    public function checkForm($request)
    {
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
            'student_email'=>  ['required', 'string', 'email', 'max:255'],
            'campus_id'=>  'nullable',
        ]);
    }

    
    public function updateUser(Request $request, $id)
    {
        $user_form=array();
        //check if the user want to change the password
        if ($request->password !=null || $request->password_actuel != null || $request->password_confirmation != null) {
            $hashedPassword=Auth::user()->getAuthPassword();
            // check if the user submitted the right password
            if (Hash::check($request->password_actuel, $hashedPassword)) {
                // if The passwords match validate the password length
                $request->validate([
                        'password' => ['required', 'string', 'min:8', 'confirmed'],
                    ]);

                //add the password in the array of the form
                $user_form['password']=Hash::make($request->password);
                
                // dd($user_form);
                // update the user info
                $data=User::whereId($id)->update($user_form);
                return redirect()->route('users.index')->with(
                    'success',
                    'Utilisateur a été actualisé avec succès'
                );
            } else {
                return redirect()->back()->with(
                    'error',
                    'le mot de passe actuel est incorrect'
                );
            }
        }
    }

    //restore user password
    public function restore(Request $request, $id)
    {
        // generate a random new password for the user
        $comb = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890#&@!$';
        $pass = array();
        $combLen = strlen($comb) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $combLen);
            $pass[] = $comb[$n];
        }
        $passw=implode($pass);
        $password= Hash::make($passw);

        //find the user info
        $data=User::findOrFail($id);

        $user = array('name'=>$data->name,
                'email'=>$data->email,
                'pass'=>$passw);
        $usermail=$data->email;
        // send maill of the new password to the user
        //    \Mail::to($usermail)->send(new \App\Mail\Resetpassword($user));
        //  update the new password to
        User::whereId($id)->update(['password' => $password]);
  
        return redirect()->route('users.index')->with(
            'success',
            'le mot de password a été réinitialié avec succès'
        );
    }
}
