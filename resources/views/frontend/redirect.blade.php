@extends('layouts.frontend.app')

@section('content')

<div>
    <div class="container">
        <h1 style="text-align: center; margin-top: 150px;">{{__('messages.thank_you')}}</h1>
        <h3 style="text-align: center; margin-top: 100px">{{__('messages.confirmed_reservation')}}</h3>

        <hr />
        <p style="text-align: center;; margin-top: 20px">{{__('messages.will_send_confirm_email')}}</p>
        <div class="text-center" style="margin-top: 30px;">
            <a href={{ env('APP_URL') }} class="btn btn-primary">{{__('messages.return_home')}}</a>
        </div>
    </div>
</div>

@endsection