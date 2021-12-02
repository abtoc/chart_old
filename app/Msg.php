<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Msg extends Model
{
    //
    public static function send(int $from_id, int $to_id, string $body): void
    {
        DB::transaction(function () use ($from_id, $to_id, $body) {
            $msg = new Msg();
            $msg->user_id = $from_id;
            $msg->body    = $body;
            $msg->save();

            $from = new Head();
            $from->msg_id     = $msg->id;
            $from->user_id    = $from_id;
            $from->partner_id = $to_id;
            $from->send       = true;
            $from->save();
       
            $to = new Head();
            $to->msg_id     = $msg->id;
            $to->user_id    = $to_id;
            $to->partner_id = $from_id;
            $to->send       = false;
            $to->save();
        });
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function msg()
    {
        return $this->hasMany('App\Head');
    }
}
