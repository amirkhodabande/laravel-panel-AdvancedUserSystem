@extends('layouts.admin');

@section('content')
    <b class="h1 text-primary">به پنل مدیریتی خوش امدید.</b>

    <div class="container" style="margin: 15% 40%">
        <section class="card">
            <div class="card-header">{{ $setting->company }}</div>
            <div class="card-body">
                {{ $setting->logo }}
                <hr>
                {{ $setting->tell }}
            </div>
        </section>
    </div>
@stop
