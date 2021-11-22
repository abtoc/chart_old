<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Head extends Model
{
    //
    public function msg()
    {
        return $this->belongsTo('App\Msg');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function partner()
    {
        return $this->belongsTo('App\User', 'partner_id');
    }
}
