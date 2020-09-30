<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'url';
    }

    public static function search($data)
    {
        $user = Page::orderBy('created_at', 'desc');
        if (sizeof($data) > 0) {
            if (array_key_exists('title', $data))
                $user = $user->where('title', 'like', '%' . $data['title'] . '%');
        }
        $user = $user->paginate(8);
        return $user;
    }
}
