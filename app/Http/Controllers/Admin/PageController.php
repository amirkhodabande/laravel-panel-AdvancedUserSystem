<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Http\Requests\PageUpdateRequest;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pages = Page::search($request->all());
        return view('admin.pagemaker.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->can('create-page')) {
            return view('admin.pagemaker.create');
        } else {
            $t = 'f';
            $m = 'مهدودیت سطح دسترسی';
            $l = 'users.index';
            return view('admin.alert', compact('t', 'm', 'l'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\PageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        if (auth()->user()->can('create-page')) {
            return $request->storepage();
        } else {
            $t = 'f';
            $m = 'مهدودیت سطح دسترسی';
            $l = 'users.index';
            return view('admin.alert', compact('t', 'm', 'l'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $pager)
    {
        if (auth()->user()->can('edit-page')) {
            return view('admin.pagemaker.edit', compact('pager'));
        } else {
            $t = 'f';
            $m = 'مهدودیت سطح دسترسی';
            $l = 'users.index';
            return view('admin.alert', compact('t', 'm', 'l'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\PageUpdateRequest  $request
     * @param  \App\Page  $pager
     * @return \Illuminate\Http\Response
     */
    public function update(PageUpdateRequest $request, Page $pager)
    {
        if (auth()->user()->can('edit-page')) {
            $request->updatepage($pager);
            $t = 's';
            $m = "ویرایش صفحه";
            $l = 'pager.index';
            return  view('admin.alert', compact('m', 'l', 't'));
        } else {
            $t = 'f';
            $m = 'مهدودیت سطح دسترسی';
            $l = 'users.index';
            return view('admin.alert', compact('t', 'm', 'l'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $pager)
    {
        if (auth()->user()->can('edit-page')) {
            $pager->delete();
            $t = 's';
            $m = "حذف صفحه";
            $l = 'pager.index';
            return  view('admin.alert', compact('m', 'l', 't'));
        } else {
            $t = 'f';
            $m = 'مهدودیت سطح دسترسی';
            $l = 'users.index';
            return view('admin.alert', compact('t', 'm', 'l'));
        }
    }
}
