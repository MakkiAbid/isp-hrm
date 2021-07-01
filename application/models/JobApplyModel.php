<?php

use Illuminate\Database\Eloquent\Model;

class JobApplyModel extends Model
{
    protected $table = 'job_apply';
    protected $guarded = [];

    public function job_post()
    {
        return $this->belongsTo(JobPostModel::class);
    }
}