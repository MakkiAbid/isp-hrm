<?php
use Illuminate\Database\Eloquent\Model;

class EducationModel extends Model
{
    protected $table = 'users_education';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(UserModel::class);
    }

    public function education_type()
    {
        return $this->belongsTo(EducationTypesModel::class, 'education_type_id', 'id');
    }

    public function candidate_stats()
    {
        return $this->belongsTo(CandidateStatsModel::class);
    }
}