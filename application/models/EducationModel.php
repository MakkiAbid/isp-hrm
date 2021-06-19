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
        return $this->hasOne(EducationTypesModel::class, 'id', 'education_type_id');
    }
}