@extends('layouts.admin')

@section('content')
<h3 >
    @if($t == 's')
        <p class="col-12"
            style="background-color: skyblue; color: whitesmoke; padding: 25px 10px; border-radius: 15px">
                تبریک عملیات <b>{{ $m }}</b> با موفقیت انجام شد
                <a  href="{{ route($l) }}">بازگشت</a>
            @elseif($t == 'f')
        </p>
        <p class="col-12"
            style="background-color: rgb(241, 121, 121); color: whitesmoke; padding: 25px 10px; border-radius: 15px"
            >متاسفانه عملیات به دلیل {{ $m }} با شکست مواجه شد.
            <a  href="{{ route($l) }}">بازگشت</a>
         </p>
    @endif
    </h3>
@stop
