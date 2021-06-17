<?php
use Illuminate\Database\Eloquent\Model;

class CampusModel extends Model
{

    protected $table = 'campus';
    protected $guarded = [];

    public function job_posts()
    {
        return $this->hasMany(JobPostModel::class);
    }

}