@component('mail::message')
# خوش امدید

لطفا حساب خود را تایید بنمایید.

@component('mail::button', ['url' => route('confirm-email') . '?token=' . $user->confirm_token]])
تایید هویت
@endcomponent

ممنون,<br>
{{ config('app.name') }}
@endcomponent
