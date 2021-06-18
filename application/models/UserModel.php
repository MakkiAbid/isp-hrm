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


}