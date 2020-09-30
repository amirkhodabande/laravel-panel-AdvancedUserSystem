<?php

namespace App\Http\Requests;

use App\Page;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255|unique:pages',
            'description' => 'required|max:255',
            'body' => 'required',
        ];
    }

    public function storepage()
    {
        $title = $this->title;
        Page::create([
            'title' => $title,
            'url' => Str::slug($title),
            'description' => $this->description,
            'body' => $this->body,
            'status' => $this->status,
        ]);
        $t = 's';
        $m = "ساخت صفحه جدید";
        $l = 'pager.index';
        return  view('admin.alert', compact('m', 'l', 't'));
    }
}
