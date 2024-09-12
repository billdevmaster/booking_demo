@extends('layouts.backend.app')


@section('page_vendor_css')
<link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/app-assets/css/plugins/extensions/ext-component-drag-drop.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/app-assets/vendors/css/forms/select/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/app-assets/vendors/css/jquery.calendar/jquery.calendar.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/app-assets/css/plugins/forms/pickers/form-pickadate.css')}}">
<style>

#order_modal {
    overflow-x: hidden; 
    overflow-y: auto;
}

#calendar{
    position: absolute;
    top: 275px;
    left: 20px;
    right: 20px;
    bottom: 10px;
    border: 1px solid #bbb;
    height: 1066px;
}
@media(max-width: 768px) {
    #calendar{ 
        top: 530px;
    }
}                    
.ui-cal-week .ui-cal-dateline, .ui-cal .ui-cal-resourceline {
    height: 35px;
}
.ui-cal-resources .ui-cal-wrapper, .ui-cal-resources .ui-cal-timeline {
    top: 57px;
}
.ui-cal-week .ui-cal-dateline-fill {
    height: 35px;
}
.ui-cal-week .ui-cal-resourceline-fill {
    height: 35px;
}
.ui-cal-week .ui-cal-label-date {
    border-right: 1px solid #a7a9af;
}
.ui-cal .ui-cal-label-resource .delimiter {
    border-right: 1px solid #a7a9af;
}
.ui-cal-event {
    z-index: 1 !important;
}

.ui-cal-week .ui-cal-time {
    border-top: 1px solid #d1d3d8;
}

</style>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">{{__('sidebar.desktop')}}</h2>
                    <!--<div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Order</a>
                            </li>
                        </ol>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <form class="form form-horizontal" style="margin-bottom: 15px;">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group row">
                        <div class="col-md-3 col-form-label">
                            <label for="location">{{__('sidebar.departments')}}</label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control select2" id="location">
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}" @if ($current_location_id == $location->id) selected @endif>{{ $location->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 row">
                    <div class="col-xs-8 col-md-8">
                        <input type="text" style="margin-bottom:10px" class="form-control" id="search_input" placeholder="{{__('admin.search_by_name')}}" value="{{ $search_input }}">
                    </div>
                    <div class="col-xs-4 col-md-4">
                        <button type="button" style="margin-bottom:10px" class="btn btn-primary" id="search">{{__('admin.search')}}</button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group row">
                        <div class="col-md-3 col-form-label">
                            <label for="location">{{__('admin.the_date')}}</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" style="margin-bottom:10px" class="form-control date" value="{{ $date }}" id="date">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-primary" onclick="getOrder(0)">{{__('admin.add_reservation')}}</button>
                </div>
            </div>
        </form>
        <div class="container">
            <div class="row" style="display: flex; justify-content: space-between">
                <div class="col-xs-1" style="position: relative; z-index: 1">
                    <a href="#" class="btn btn-prev btn-primary text-white"><i data-feather='arrow-left'></i></a>
                </div>
                <div class="col-xs-10">&nbsp;</div>
                <div class="col-xs-1" style="position: relative; z-index: 1">
                    <a href="#" class="btn btn-next btn-primary text-white"><i data-feather='arrow-right'></i></a>
                </div>
            </div>
            <div id="orders">
            </div>
        </div>
    </div>
</div>
{{-- @include('backend.home.components.modal') --}}
<div class="modal fade text-left" id="order_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true" style="overflow-x: hidden; overflow-y: auto;">
</div>

<script>
    $(function() {
        $('.select2').select2();
        $(".date").flatpickr({
            dateFormat: 'Y-m-d',
            "locale": {
                "firstDayOfWeek": 1 // start week on Monday
            }
        });
        $(".date").change(function() {
            getCalendar($(this).val())
        })
        var getCalendar = function(startDate = $(".date").val()) {
            var data = {current_location_id: {{ $current_location_id }}, search_input: '{{ $search_input }}'};
            if (startDate) {
                data.start_date = startDate
            }
            $.ajax({
                type: 'get',
                url: appUrl + '/admin/getCalendar',
                data: data,
                success: function(res) {
                    $("#orders").html(res)
                    if (startDate)
                        $(".date").val(startDate)
                    
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
        getCalendar();
        $("#location").change(function() {
            window.location.href = appUrl + '/admin?location_id=' + $(this).val();
        });
        $(".btn-prev").click(function() {
            getCalendar($("#prev_start_date").val());
        });
        $(".btn-next").click(function() {
            getCalendar($("#next_start_date").val());
        });

        $("#search").click(function() {
            window.location.href = appUrl + '/admin?location_id=' + $("#location").val() + "&search_input=" + $("#search_input").val();
        })
    })
    var getOrder = function(uid, time=null, pesubox=null) {
        console.log(pesubox)
        $.ajax({
            type: 'get',
            url: appUrl + "/admin/editOrder",
            data: {id: uid, location_id: $("#location").val()},
            success: (res) => {
                if (res.message) {
                    return alert(res.message)
                }
                $("#order_modal").html(res);
                $("#order_modal").modal("show");
                if (time != null) {
                    $("#start_time").val(time)
                } else if (uid == 0) {
                    var today = new Date();
                    var dd = String(today.getDate()).padStart(2, '0');
                    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                    var yyyy = today.getFullYear();
                    $("#start_time").val(yyyy + "-" + mm + "-" + dd + " 08:00:00")
                }
                if (pesubox) {
                    $("#pesubox_modal input[type=radio]").each(function() {
                        if ($(this).data("value") == pesubox) {
                            $(this).prop("checked", true);
                        }
                    })
                }
            },
            error: (err) => {
                console.log(err);
            }
        })
    }
</script>
@endsection

@section('page_vendor_js')
<script src="{{asset('public/assets/backend/app-assets/vendors/js/jquery.calendar/jquery.calendar.js')}}"></script>
<script src="{{asset('public/assets/backend/app-assets/vendors/js/pickers/pickadate/legacy.js')}}"></script>
<script src="{{asset('public/assets/backend/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('public/assets/backend/app-assets/vendors/js/extensions/dragula.min.js')}}"></script>
<script src="{{asset('public/assets/backend/app-assets/js/scripts/extensions/ext-component-drag-drop.min.js')}}"></script>
<script src="{{asset('public/assets/backend/app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('public/assets/backend/app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{asset('public/assets/backend/app-assets/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
<script src="{{asset('public/assets/backend/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
@endsection