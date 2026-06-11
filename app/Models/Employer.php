<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $fillable = [
        'user_id',
        'company_name',
        'city',
        'description'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
