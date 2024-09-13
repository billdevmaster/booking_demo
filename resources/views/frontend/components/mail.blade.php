<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
</head>
<body>
    <h2 style="border-bottom: 1px solid">{{ $data['location_name'] }}</h2>
    <p>{{__('messages.hello')}}.</p><br/>
    <p>{{__('messages.have_booked_service')}}: {{ $data['location_name'] }}</p><br/>
    <p>{{__('messages.department_address')}}: {{ $data['location_address'] }}</p><br/>
    <p>{{__('messages.booking_time')}}: {{ $data['time'] }}</p>
    <p>{{__('messages.selected_services')}}: {{ $data['service_name'] }}</p>
    <p>
        E-post: {{ $data['e_post'] }}<br/>
        {{__('messages.telephone')}}: {{ $data['telephone'] }}<br/>
        {{__('messages.notes')}}: {{ $data['message'] }}<br/><br/>
    </p>
    <p>
        {{__('messages.cancel1')}}<br/>
        {{__('messages.cancel2')}}
    </p>
    <p>
        {{__('messages.link')}}:
    </p>
    <a href="{{ env('APP_URL') }}/cancelBooking?id={{ $data['book_id'] }}">{{ env('APP_URL') }}/cancelBooking?id={{ $data['book_id'] }}</a>
    <br/><br/>
</body>
</html>