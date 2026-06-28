<?php

namespace App\Models;
use App\Models\Employer;
use App\Models\JobCategory;

use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    protected $fillable = [
        'employer_id',
        'category_id',
        'title',
        'description',
        'type',
        'city',
        'salary_range',
        'status',
        'deadline'
    ];

    public function employer(){
        return $this->belongsTo(Employer::class);
    }

    public function category(){
        return $this->belongsTo(JobCategory::class);
    }

    public  function applications(){
        return $this->hasMany(Application::class);
    }
}
