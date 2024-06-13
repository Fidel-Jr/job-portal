<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSaved extends Model
{
    use HasFactory;

    protected $table = 'jobsaved';
    protected $fillable = [
        'id',
        'job_id',
        'user_id',
        'job_image',
        'job_title',
        'job_region',
        'job_type',
        'company',
    ];
    public $timestamps = true;

}
