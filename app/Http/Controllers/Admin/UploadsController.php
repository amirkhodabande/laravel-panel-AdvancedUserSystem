<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadsRequest;
use App\Upload;
use Illuminate\Http\Request;

class UploadsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $uploads = Upload::search($request->all());
        return view('admin.uploads.index', compact('uploads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.uploads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param   App\Http\Requests\UploadsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UploadsRequest $request)
    {
        // All functions are in UploadsRequest
        return $request->uploadImage()
            ->storeimage();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Upload  $series
     * @return \Illuminate\Http\Response
     */
    public function show(Upload $upload)
    {
        return view('admin.uploads.show', compact('upload'));
    }

    public function destroy(Upload $upload)
    {
        $user = auth()->user()->user_type;
        if ($user == 'boss' || $user == 'admin') {
            if (file_exists($upload->url)) {
                unlink($upload->url);
            }
            $upload->delete();

            $t = 's';
            $m = "حذف فایل";
            $l = 'uploads.index';
            return  view('admin.alert', compact('t', 'm', 'l'));
        } else {
            $t = 'f';
            $m = "مهدودیت دسترسی شما";
            $l = 'uploads.index';
            return  view('admin.alert', compact('t', 'm', 'l'));
        }
    }
}
