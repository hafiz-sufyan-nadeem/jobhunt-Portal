<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\JobListing;

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

    public function jobs(){
        return $this->hasMany(JobListing::class);
    }
}
