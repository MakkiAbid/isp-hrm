<?php
use Illuminate\Database\Eloquent\Model;

class DepartmentsModel extends Model
{
    protected $table = 'departments';
    protected $guarded = [];

    public function job_posts()
    {
        return $this->hasMany(JobPostModel::class);
    }
}