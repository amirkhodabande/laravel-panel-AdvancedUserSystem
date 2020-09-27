<?php

namespace App\Http\Requests;

use App\Upload;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class UploadsRequest extends FormRequest
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
            'title' => 'required',
            'url' => 'required|image'
        ];
    }

    public function uploadImage()
    {
        $uploadedImage = $this->url;

        // Upload file
        $this->fileName =  Str::slug($this->title) . '.' . $uploadedImage->getClientOriginalExtension();
        $uploadedImage->storePubliclyAs('public/uploads', $this->fileName);

        return $this;
    }

    public function storeimage()
    {
        // dd($this->fileName);
        $title = $this->title;
        Upload::create([
            'title' => $title,
            'upload_type' => 'image',
            'url' => 'storage/uploads/' . $this->fileName,
        ]);
        $t = 's';
        $m = "آپلود تصویر";
        $l = 'uploads.index';
        return  view('admin.alert', compact('m', 'l', 't'));
    }
}
