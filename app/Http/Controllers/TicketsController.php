<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Http\Request;

class TicketsController extends Controller
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
        return view('tickets.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
         $request->validate([
        'object' => 'required',
        'service' =>  'required',
        'message_body' =>  'required',
        ]);
        
        // get data for a new conversation
       $new_conversation = array(
        'user_one'=>  $request->user_one,
        'conversation_subject'=>  $request->object,
        'send_time'=>  Now()->format('H:i:s'),
        'is_read'=>  0,
        'service'=>  $request->service,
        'is_closed'=>  0,
        );
        // create a new conversation
        $new_con=Conversation::create($new_conversation);

        // get data for a new message
        $new_message = array(
            'conversation_id'=>   $new_con->id,
            'message_body'=>  $request->message_body,
            'me_send_time'=>  Now()->format('H:i:s'),
            );
        // create a new message
        Message::create($new_message);

        return redirect()->route('tickets.index')->with(
            'success',
            'Ticket crée avec succès');
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
