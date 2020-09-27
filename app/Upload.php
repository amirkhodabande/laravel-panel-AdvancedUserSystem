<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $guarded = [];

    public static function search($data)
    {
        $user = Upload::orderBy('created_at', 'desc');
        if (sizeof($data) > 0) {
            if (array_key_exists('title', $data) && array_key_exists('upload_type', $data))
                $user = $user->where('title', 'like', '%' . $data['title'] . '%')
                    ->where('upload_type', 'like', '%' . $data['upload_type'] . '%');
        }
        $user = $user->paginate(3);
        return $user;
    }
}
