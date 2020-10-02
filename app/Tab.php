<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tab extends Model
{
    protected $guarded = [];

    public static function search($data)
    {
        $tab = Tab::orderBy('created_at', 'desc');
        if (sizeof($data) > 0) {
            if (array_key_exists('title', $data) && array_key_exists('status', $data)
                 && array_key_exists('url', $data)  && array_key_exists('tab_id', $data))

                  $tab = $tab->where('title', 'like', '%' . $data['title'] . '%')

                        ->where('url', 'like', '%' . $data['url'] . '%')

                        ->where('tab_id', 'like', '%' . $data['tab_id'] . '%')

                       ->where('status', 'like', '%' . $data['status'] . '%');

        }
        $tab = $tab->paginate(8);
        return $tab;
    }
}
