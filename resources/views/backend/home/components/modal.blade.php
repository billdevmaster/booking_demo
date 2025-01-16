<style>
    .order-form #duration button {
        margin: 8px;
        width: 75px;
    }

    .order-form #duration button.selected {
        background-color: #05c128;
        color: white;
    }

    

    .list-group .list-group-item {
        line-height: 1.5;
        background-color: #e2ffe8
    }

    .custom-control-label {
        margin-bottom: 1em;
    }

    .btn-success {
        border-color: #555 !important;
        background-color: #fff !important;
        color: #555 !important;
    }

    .modal .modal-header {
        background-color: #7367f0;
    }

    .modal-title {
        color: #fff;
    }

</style>
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel18">{{__('admin.add_new_reservation')}}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="order-form">
            @csrf
            <input type="hidden" name="id" value={{ $id }}>
            <input type="hidden" name="location_id" value="{{ $location_id }}">
            <input type="hidden" name="duration" value="@if ($order != null)
            {{ $order->duration }}
        @else {{ $interval }} @endif">
            <input type="hidden" name="service_id" value="">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="start_time">{{__('admin.beginning')}}</label>
                        <input type="text" id="start_time" class="form-control flatpickr-date-time" placeholder="YYYY-MM-DD HH:MM" value='@if ($order != null)
                            {{ $order->date . " " . $order->time }}
                        @endif' name="datetime" />
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="end_time">{{__('admin.end')}}</label>
                        <input type="text" id="end_time" class="form-control flatpickr-date-time" placeholder="YYYY-MM-DD HH:MM" value='@if ($order != null)
                            {{ $end_time }}
                        @endif' name="enddatetime" disabled/>
                    </div>
                    <div class="col-md-12 form-group" id="duration">
                        <label for="start_time">{{__('admin.durability')}}</label>
                        <div class="flex">
                            <button type="button" class="btn btn-default item @if($order != null && $order->duration == 30) selected @endif" data-value="{{ $interval }}">{{ $interval }}M</button>
                            <button type="button" class="btn btn-default item @if($order != null && $order->duration == 60) selected @endif" data-value="{{ 2 * $interval }}">{{ 2 * $interval }}M</button>
                            <button type="button" class="btn btn-default item @if($order != null && $order->duration == 90) selected @endif" data-value="{{ 3 * $interval }}">{{ 3 * $interval }}M</button>
                            <button type="button" class="btn btn-default item @if($order != null && $order->duration == 120) selected @endif" data-value="{{ 4 * $interval }}">{{ 4 * $interval }}M</button>
                            <button type="button" class="btn btn-default item @if($order != null && $order->duration == 150) selected @endif" data-value="{{ 5 * $interval }}">{{ 5 * $interval }}M</button>
                            <button type="button" class="btn btn-default item @if($order != null && $order->duration == 180) selected @endif" data-value="{{ 6 * $interval }}">{{ 6 * $interval }}M</button>
                            <button type="button" class="btn btn-default item @if($order != null && $order->duration == 210) selected @endif" data-value="{{ 7 * $interval }}">{{ 7 * $interval }}M</button>
                            <button type="button" class="btn btn-default item" data-value="600">Max</button>
                        </div>
                    </div>
                   
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <button type="button" class="btn btn-round" id="services">{{__('sidebar.services')}}</button>
                                <p class="text-left" style="margin-top: 10px">{{__('admin.selected_services')}}</p>
                                <ul class='list-group text-left' style="margin-bottom: 20px" id="order_services">
                                    @foreach ($order_services as $service)
                                        <li class="list-group-item draggable" data-id="{{ $service->id }}"><span class="handle mr-50">+</span>{{ $service->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            
                            <div class="col-md-6 text-center">
                                <button type="button" class="btn btn-round" id="pesuboxs">{{__('admin.employee')}}</button>
                                <p class="text-left" style="margin-top: 10px">{{__('adminselected_employee')}}</p>
                                <ul class='list-group text-left' style="margin-bottom: 20px">
                                    @foreach ($location_pesuboxs as $pesubox)
                                        @if ($order != null && $order->pesubox_id == $pesubox->id)
                                            <li class="list-group-item">{{ $pesubox->name }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="start_time">{{__('messages.first_name')}}</label>
                        <input type="text" class="form-control" name="first_name" value="@if ($order != null) {{ $order->first_name }} @endif" />
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="start_time">{{__('messages.sur_name')}}</label>
                        <input type="text" class="form-control" name="last_name" value="@if ($order != null) {{ $order->last_name }} @endif" />
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="start_time">{{__('admin.type')}}</label>
                        <select class="form-control mb-1" id="icon" name="type">
                            <option value="red" @if ($order != null && $order->type == "red") selected @endif >{{__('messages.telephone')}}</option>
                            <option value="green" @if ($order != null && $order->type == "green") selected @endif >{{__('admin.present_recurring')}}</option>
                            <option value="yellow" @if ($order != null && $order->type == "yellow") selected @endif >Online</option>
                            <option value="blue" @if ($order != null && $order->type == "blue") selected @endif >{{__('admin.present_primary')}}</option>
                            <option value="light-grey" @if ($order != null && $order->type == "light-grey") selected @endif >{{__('admin.vocation')}}</option>
                        </select>
                    </div>
                    {{-- <div class="col-md-6 form-group">
                        
                        <div class="row">
                            <div class="col-md-4">
                                <label for="birth_year">Sünniaasta:</label>
                                <select name="birth_year" class="form-control select2">
                                    @for ($i = 1900; $i <= date("Y"); $i++)
                                        <option value="{{ $i }}" @if ($order != null && substr($order->birth_date, 0, 4) == $i) selected @endif>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="birth_month">Kuu:</label>
                                <select name="birth_month" class="form-control select2">
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}" @if ($order != null && substr($order->birth_date, 5, 2) == $i) selected @endif>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="birth_date">Päev:</label>
                                <select name="birth_date" class="form-control select2">
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option value="{{ $i }}" @if ($order != null && substr($order->birth_date, 8, 2) == $i) selected @endif>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-md-6 form-group">
                        <label for="start_time">Email</label>
                        <input type="text" class="form-control" name="email" value="@if ($order != null) {{ $order->email }} @endif" />
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="start_time">{{__('messages.telephone')}}</label>
                        <input type="text" class="form-control" name="phone" value="@if ($order != null) {{ $order->phone }} @endif" />
                    </div>
                    
                    <div class="col-md-12 form-group">
                        <label for="start_time">{{__('messages.additional_information')}}</label>
                        <textarea type="text" class="form-control" name="message">@if ($order != null) {{ $order->message }} @endif</textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="submit" class="btn btn-primary">{{__('admin.save')}}</button>
                @if ($order != null)
                <button type="button" id="delete" class="btn btn-red text-white" data-id="{{ $order->id }}">{{__('admin.delete')}}</button>
                @endif
                <button type="button" class="btn btn-success text-white" data-dismiss="modal">{{__('admin.cancel')}}</button>
            </div>
        </form>
    </div>
</div>
<div class="modal fade text-left" id="service_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{__('admin.select_services')}}</h4>
                <button type="button" class="close" onclick="closeServiceModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @foreach ($location_services as $service)
                        <div class="col-md-6">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="{{ $service->id }}" data-duration="{{ $service->duration }}" data-value="{{ $service->id }}" data-name="{{ $service->name }}" @if ($order != null && in_array($service->id, explode(",", $order->service_id)))
                                    checked
                                @endif 
                                >
                                <label class="custom-control-label" for="{{ $service->id }}">{{ $service->name }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="closeServiceModal()">{{__('admin.save')}}</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="pesubox_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{__('admin.select_employee')}}</h4>
                <button type="button" class="close" onclick="closePesuboxModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @foreach ($location_pesuboxs as $pesubox)
                        <div class="col-md-6">
                            <div class="custom-control custom-checkbox">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="inlineRadioOptions"
                                    id="radio{{ $pesubox->id }}"
                                    value="{{ $pesubox->id }}"
                                    data-value="{{ $pesubox->id }}"
                                    @if ($order != null && $order->pesubox_id == $pesubox->id)
                                        checked
                                    @endif
                                />
                                <label class="form-check-label" for="radio{{ $pesubox->id }}">{{ $pesubox->name }}</label>
                                {{-- <input type="radio" class="custom-control-input" id="{{ $pesubox->id }}" data-value="{{ $pesubox->id }}"/>
                                <label class="custom-control-label" for="{{ $pesubox->id }}">{{ $pesubox->name }}</label> --}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="closePesuboxModal()">{{__('admin.save')}}</button>
            </div>
        </div>
    </div>
</div>


<script>
var location_lasttimes = '{{ $location_lasttimes }}';
location_lasttimes = location_lasttimes.replace(/&quot;/g, '"');
location_lasttimes_array = JSON.parse(location_lasttimes);
services_array = [];
$(function() {
    $("#start_time").flatpickr({
        enableTime: true
    });
    dragula([document.getElementById('order_services')]);
    $('.select2').select2();
    $(".order-form #submit").click(function() {
        var formdata = new FormData($(".order-form")[0]);
        var service_id = [];
        if ($("#start_time").val() == "") {
            return alert("Please select the time")
        }
        // console.log(formdata.get("service_id"));
        $("#order_services li").each(function() {
            service_id.push($(this).data("id"))
        })
        // if (service_id.length == 0) {
        //     return alert("Please select the service")
        // }
        formdata.set("service_id", service_id)
        var pesubox_id = [];
        $("#pesubox_modal input[type=radio]").each(function() {
            if ($(this).prop("checked")) {
                pesubox_id.push($(this).data("value"))
            }
        })
        if (pesubox_id.length == 0) {
            return alert("Please select the Pesubox")
        }
        formdata.set("pesubox_id", pesubox_id)
        $.ajax({
            type: "post",
            url: appUrl + '/admin/updateOrder',
            data: formdata,
            dataType:"JSON",
            processData: false,
            contentType: false,
            cache: false,
            success: (res) => {
                if (res.success) {
                    window.location.href = appUrl + '/admin?location_id=' + $("#location").val() + "&date=" + $(".date").val();
                } else {
                    if (res.message) {
                        alert(res.message);
                    } else {
                        alert('Something is Wrong');
                    }
                }
            },
            error: (err) => {
                console.log(err);
            }
        });
    })
    $("#duration .item").click(function() {
        $("#duration").find(".selected").removeClass("selected");
        if (navigator.userAgent.toLowerCase().indexOf("iphone") ==-1) {
            var d = new Date($("#start_time").val());
        } else {
            var t = $("#start_time").val().split(/[- :]/);
            // Apply each element to the Date function
            var actiondate = new Date(t[0], t[1]-1, t[2], t[3], t[4], t[5]);
            var d = new Date(actiondate);
        }
        if ($(this).data("value") != '600') {
            $(".order-form [name=duration]").val($(this).data("value"));
            d.setMinutes(d.getMinutes() * 1 + $(".order-form [name=duration]").val() * 1);
            $("#end_time").val(d.getFullYear() + "-" + String(d.getMonth() + 1).padStart(2, '0') + "-" + String(d.getDate()).padStart(2, '0') + " " + String(d.getHours()).padStart(2, '0') + ":" + String(d.getMinutes()).padStart(2, '0'))
            $(this).addClass("selected");
        } else {
            if ($("#start_time").val() == "") {
                return alert("please select the start date");
            }
            var pesubox_id = [];
            $("#pesubox_modal input[type=radio]").each(function() {
                if ($(this).prop("checked")) {
                    pesubox_id.push($(this).data("value"))
                }
            })
            if (pesubox_id.length == 0) {
                return alert("Please select the Pesubox")
            }
            $.ajax({
                type: "post",
                url: appUrl + '/admin/getDayEndTime',
                data: {date: $("#start_time").val(), location_id: $("input[name=location_id]").val(), pesubox_id: pesubox_id},
                success: (res) => {
                    res = JSON.parse(res)
                    $(".order-form [name=duration]").val(res.difference);
                    $("#end_time").val(res.end_time)
                    $(this).addClass("selected");
                },
                error: (err) => {
                    console.log(err);
                }
            });
        }
        
    })
    $("#start_time").change(function() {
        var d = new Date($(this).val());
        d.setMinutes(d.getMinutes() + $(".order-form [name=duration]").val());
        $("#end_time").val(d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate() + " " + d.getHours() + ":" + d.getMinutes())
    });
    $("#services").click(function() {
        $("#service_modal").modal("show");
    });
    $("#pesuboxs").click(function() {
        $("#pesubox_modal").modal("show");
    });
    $("#delete").click(function() {
        $.ajax({
            type: "post",
            url: appUrl + '/admin/deleteOrder',
            data: {id: $(this).data("id")},
            success: (res) => {
                console.log(res)
                res = JSON.parse(res);
                if (res.success) {
                    window.location.href = appUrl + '/admin?location_id=' + $("#location").val() + "&date=" + $(".date").val();
                } else {
                    alert("Something is wrong");
                }
            },
            error: (err) => {
                console.log(err);
            }
        });
    });
    $("#service_modal").find("input[type=checkbox]").change(function() {
        var duration = 0;
        var html = "";
        $("#service_modal input[type=checkbox]").each(function() {
            if ($(this).prop("checked")) {
                duration += ($(this).data("duration") / {{ $interval }}) != Math.floor($(this).data("duration") / {{ $interval }}) ? ((Math.floor($(this).data("duration") / {{ $interval }}) + 1) * {{ $interval }}) : $(this).data("duration");
                html += '<li class="list-group-item draggable" data-id="' + $(this).data("value") + '"><span class="handle mr-50">+</span>' + $(this).data("name") + '</li>';
            }
        })
        $("#order_services").html(html);
        $("#duration").find("button.selected").removeClass("selected");
        $("#duration").find("button").each(function() {
            if ($(this).data("value") == duration) {
                $(this).addClass("selected");
            }
        });
        $(".order-form [name=duration]").val(duration);
        var d = new Date($("#start_time").val());
        d.setMinutes(d.getMinutes() * 1 + $(".order-form [name=duration]").val() * 1);
        $("#end_time").val(d.getFullYear() + "-" + String(d.getMonth() + 1).padStart(2, '0') + "-" + String(d.getDate()).padStart(2, '0') + " " + String(d.getHours()).padStart(2, '0') + ":" + String(d.getMinutes()).padStart(2, '0'));
        // remake location services list
    })
});
function closeServiceModal() {
    $("#service_modal").modal("hide");
}
function closePesuboxModal() {
    $("#pesubox_modal").modal("hide");
}
</script>