<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class PageUpdateRequest extends FormRequest
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
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'body' => 'required',
        ];
    }

    public function updatepage($page)
    {
        $url = Str::slug($this->title);
        $page->update([
            'title' => $this->title,
            'description' => $this->description,
            'body' => $this->body,
            'status' => $this->status,
            'url' => $url,
        ]);
    }
}
