<?php


use Illuminate\Database\Eloquent\Model;

class UserModel extends Model{

    protected $table = 'users';
    protected $guarded = [];


    public function scopeGetUsersWithPaginate($query, $limit, $start, $searchKeyWord, $role)
    {
        $data = $query->orderBy("id", "DESC")
                ->where('role', $role);

        if(!empty($searchKeyWord)){
            $data->where('name','LIKE',"%{$searchKeyWord}%")
                ->orWhere('email', 'LIKE', "%{$searchKeyWord}%")
                ->where('role', $role);
        }
        if($role === 'candidate' || $role === 'staff'){
            $data->has('personal_info');
        }


            return $data->skip($start)
            ->limit($limit)
            ->get();

    }

    public function scopeGetCountUsers($query, $searchKeyWord, $role)
    {
        $data = $query->where('role', $role);
        if(!empty($searchKeyWord)){
            $data->where('name','LIKE',"%{$searchKeyWord}%")
                ->orWhere('email', 'LIKE', "%{$searchKeyWord}%")
                ->where('role', $role);;
        }
        return $data->count();
    }

    public function personal_info()
    {
        return $this->hasOne(UsersInfoModel::class, 'user_id', 'id');
    }

    public function user_education()
    {
        return $this->hasMany(EducationModel::class, 'user_id', 'id');
    }

    public function user_experience()
    {
        return $this->hasMany(UsersExpModel::class, 'user_id', 'id');
    }


}