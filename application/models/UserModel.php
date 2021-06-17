<?php


use Illuminate\Database\Eloquent\Model;

class UserModel extends Model{

    protected $table = 'users';
    protected $guarded = [];


    public function scopeGetAdminWithPaginate($query, $limit, $start, $searchKeyWord)
    {
        $data = $query->orderBy("id", "DESC")
            ->where('role', 'admin');

        if(!empty($searchKeyWord)){
            $data->where('name','LIKE',"%{$searchKeyWord}%")
                ->orWhere('email', 'LIKE', "%{$searchKeyWord}%");
        }

            return $data->skip($start)
            ->limit($limit)
            ->get();

    }

    public function scopeGetCountAdmin($query, $searchKeyWord)
    {
        $data = $query->where('role', 'admin');
        if(!empty($searchKeyWord)){
            $data->where('name','LIKE',"%{$searchKeyWord}%")
                ->orWhere('email', 'LIKE', "%{$searchKeyWord}%");
        }
        return $data->count();
    }

    public function scopeGetStaffWithPaginate($query, $limit, $start)
    {
        return $query->orderBy("id", "DESC")
            ->where('role', 'staff')
            ->skip($start)
            ->limit($limit)
            ->get();

    }

    public function scopeGetCountStaff($query)
    {
        return $query->where('role', 'staff')
            ->count();
    }

    public function scopeGetCandidateWithPaginate($query, $limit, $start)
    {
        $data =  $query->orderBy("id", "DESC")
            ->where('role', 'candidate')
            ->skip($start)
            ->limit($limit)
            ->get();

    }

    public function scopeGetCountCandidate($query)
    {
        return $query->where('role', 'candidate')->count();
    }


}