<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'concept', 'description', 'amount', 'authorize_coordinator', 'authorize_accountant', 'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
