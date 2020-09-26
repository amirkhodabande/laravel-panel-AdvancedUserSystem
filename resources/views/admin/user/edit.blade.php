@extends('layouts.admin')

@section('content')
    <section class="mt-3 container shadow d-flex justify-content-center p-5">
    <div class="card card-shadowed p-50 w-400 mb-0 ">
      <h5 class="text-uppercase text-center">ویرایش کاربر : {{ $user->name }}</h5>
      <br><br>

      <form class="form-type-material" method="POST" action="{{ route('users.update', $user->id) }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group">
          <input type="text" class="form-control" placeholder="" name="email">
          @if ($errors->has('email'))
          <span class="alert alert-danger form-control">
                  <small> {{ $errors->first('email') }}</small>
             </span>
            @endif
        </div>

        <br>
        <button class="btn btn-bold btn-block btn-primary" type="submit">ویرایش</button>
      </form>

    </div>
</section>
@stop
