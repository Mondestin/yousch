<?php

namespace App\Models;

use App\Models\Conversation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class message extends Model
{
    use HasFactory;
    protected $fillable=['conversation_id','message_body' ,'me_send_time'];
    protected $date=['created_at','updated_at'];

    public function conversation()
    {
        return $this->belongsToMany(Conversation::class);
    }
}
