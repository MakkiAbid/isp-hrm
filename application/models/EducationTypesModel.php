<?php

use Illuminate\Database\Eloquent\Model;

class EducationTypesModel extends Model
{
    protected $table = 'education_types';
    protected $guarded = [];

    public function job_posts()
    {
        return $this->hasMany(JobPostModel::class);
    }

    public function educations()
    {
        return $this->hasMany(EducationModel::class, 'education_type_id', 'id');
    }
}