<?php

use Illuminate\Database\Eloquent\Model;

class JobPostModel extends Model
{
    protected $table = 'job_post';
    protected $guarded = [];

    public function department()
    {
        return $this->belongsTo(DepartmentsModel::class);
    }

    public function education_types()
    {
        return $this->belongsTo(EducationTypesModel::class);
    }

    public function campus()
    {
        return $this->belongsTo(CampusModel::class);
    }
}