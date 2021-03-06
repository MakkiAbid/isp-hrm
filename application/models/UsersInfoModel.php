<?php

use Illuminate\Database\Eloquent\Model;

class UsersInfoModel extends Model
{
    protected $table = 'personal_info';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(UserModel::class);
    }
}