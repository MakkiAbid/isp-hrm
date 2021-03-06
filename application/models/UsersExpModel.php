<?php

use Illuminate\Database\Eloquent\Model;

class UsersExpModel extends Model
{
    protected $table = 'users_experience';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(UserModel::class);
    }

    public function candidate_stats()
    {
        return $this->belongsTo(CandidateStatsModel::class);
    }
}