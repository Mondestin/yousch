<?php

namespace App\Http\Controllers;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ApiTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**user_one' : user_one, 
        'service' : serviceController.text, 
        'conversation_subject' : subjectController.text,
        'message_body' : messageController.text
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( $request->input('service')!=null && $request->input('conversation_subject')!=null && $request->input('message_body')!=null){
            
            // get data for a new conversation
            $new_conversation = array(
                'user_one'=>  $request->user_one,
                'conversation_subject'=>  $request->conversation_subject,
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
                'user_id'=>   $request->user_one,
                'message_body'=>  $request->message_body,
                'me_send_time'=>  Now()->format('H:i:s'),
                );
            // create a new message
            Message::create($new_message);
            
            return response()->json([
                'success' => true,
                'message' => 'Ticket created successfully',
          ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => $request->input('service'),
      ], 401);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tickets=DB::select("SELECT * FROM `conversations` WHERE conversations.user_one=$id");
        return response()->json($tickets);
        
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
