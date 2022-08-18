<?php

namespace App\Http\Controllers;

use Datatables;
use App\Models\Role;
use Illuminate\Support\Arr;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class UsersController extends Controller
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
            return datatables()->of(User::select('*'))
            ->addColumn('action', function($data){
                return '
                    <a href="users/'.$data->id.'/edit" class="btn btn-warning btn-sm text-white" title="Modifier">
                          <i class="fa fa-pen" ></i>
                    </a>
                    <a href="delete/users/'.$data->id.'" class="btn btn-danger btn-sm" title="Supprimer">
                          <i class="fa fa-trash" style="color: #fff;"></i>
                    </a>
                    ';
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all();
        return view('auth.register', compact('roles'));
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
                    // generate a random password for the user
                    // $comb = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890#&@!$';
                    // $pass = array(); 
                    // $combLen = strlen($comb) - 1; 
                    // for ($i = 0; $i < 8; $i++) {
                    //     $n = rand(0, $combLen);
                    //     $pass[] = $comb[$n];
                    // }
                    //  $passw=implode($pass);
       
                     $email = $request['email'];
                     $name = $request['name'];
                     $password= Hash::make($request['password']);
                     
                    //  $user = array('name'=>$name,
                    //          'email'=>$email,
                    //          'pass'=>$passw);
                    //   \Mail::to($email)->send(new \App\Mail\SendMail($user));
                      
               
                    $user = User::create([
                   'name' => $email,
                   'email' => $name,
                   'password' => $password,
               ]);
               $user->roles()->attach($request['role']);
             if ($user) {
                dd("bon");
             }
             else {
                dd("pas bon");
             }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       abort("404");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
           //find the specific user by id
           $user=User::where('id', $id)->with('roles')->first();
           $rolesAll=Role::all();
           return view('users.edit', compact('user','rolesAll'));

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
        return "update";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            if (User::whereId($id)->delete()) {
                 dd("dhfoidhofhdf");
             } 
             else{ 

                 dd("True");
              }
        } catch (Exception $e) {
            return redirect()->route('users.index')->with(
              'error',
              $e);
        }
    }
}
