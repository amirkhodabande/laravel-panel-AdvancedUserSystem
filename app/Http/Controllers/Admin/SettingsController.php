<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $user = auth()->user()->user_type;
        if ($user == 'boss') {
            $request->validate([
                'company' => 'required',
                'logo' => 'required',
                'tell' => 'required',
            ]);
            $setting->update($request->all());

            $t = 's';
            $m = "ویرایش تنظیمات";
            $l = 'dashbord.index';
            $id = 1;
            return  view('admin.alert', compact('m', 'l', 't'));
        } else {
            $t = 'f';
            $m = "مهدودیت دسترسی شما";
            $l = 'dashbord.index';
            return  view('admin.alert', compact('t', 'm', 'l'));
        }
    }
}
