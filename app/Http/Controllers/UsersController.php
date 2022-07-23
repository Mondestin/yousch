<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Datatables;
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
                    <a href="users/'.$data->id.'" class="btn btn-success btn-sm" title="Profile">
                          <i class="fa fa-eye" ></i>
                        </a>
                <a href="users/'.$data->id.'/edit/" class="btn btn-warning btn-sm" title="Modifier">
                                <i class="fa fa-pencil" style="color: #fff;"></i>
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "profile";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "edit";
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
        return "delete";
    }
}
