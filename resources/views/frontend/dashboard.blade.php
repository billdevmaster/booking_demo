@extends('layouts.frontend.app')
@section('content')
@if ($location)
<input type="hidden" id="interval" value="{{ $location->interval }}">
<input type="hidden" id="avaiable" value="true">
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-12">
			<h1>{{ env('APP_NAME') }}</h1>
		</div>
	</div>
    <div class="row">
    <div class="col-xs-12 col-md-12">
        <h4>{{ __('messages.choose_location') }}</h4>
			<!-- <h4>Esmalt vali osakond, kuhu soovid aega broneerida</h4> -->
		</div>
	</div>
    <div class="row">
        @foreach ($location_list as $location)
        
                <a class="btn btn-primary {{ $location->id == $location_id ? 'active' : '' }}" href="{{ route('index') }}?office={{ $location->id }}">{{ $location->name }}</a>
          
        @endforeach
    </div>
	<div class="row">
		<div class="col-xs-12 col-md-12 navTabsHolder hidden-xs hidden-sm">
			<ul class="nav nav-tabs" role="tablist">
				<li class="active">
                    <a href="{{ route('index') }}?office={{ $office }}#step1" role="tab" data-toggle="tab" title="" data-show="#dataFetcherHolder"><span>1</span> {{ __('messages.choose_service_time')}}</a>
                </li>
				<li>
                    <a href="{{ route('index') }}?office={{ $office }}#step2" role="tab" data-toggle="tab" title="" data-hide="#dataFetcherHolder"><span>2</span> {{__('messages.enter_contact_detail')}}</a>
                </li>
				<!-- <li><a href="#step3" role="tab" data-toggle="tab" title="" data-hide="#dataFetcherHolder"><span>3</span> Kontrolli ja kinnita</a></li> -->
			</ul>
		</div>
		<div id="dataFetcherHolder" class="col-xs-12 col-md-12">
			<form id="dataFetcher" action="{{ route('home.booking') }}" method="get" class="">
				<div class="row dateTimeHolder">
                    <div class="col-xs-12 col-xs-12 col-md-12" style="padding-left: 0">
                        <button type="button" class="btn pull-left hidden-xs hidden-sm direction-btn" data-modify-dp="#datetimepicker" data-from="0" style="width: 240px; margin-right: calc(50% - 409px);">{{__('messages.today')}}</button>
                        
                        <button type="button" class="btn prev-day disabled" data-picktime="false" data-modify-dp="#datetimepicker" data-days="-1"><i class="fa fa-angle-left"></i></button>
                        
						<a href="{{ route('index') }}#" id="datetimepicker">
							<span class="hidden-xs hidden-sm" data-date-format="dddd, DD.MMMM - YYYY">reede, 29.oktoober - 2021</span>
							<span class="visible-xs-inline-block visible-sm-inline-block" data-date-format="dd, DD.MM.YYYY">R, 29.10.2021</span>
							<input type="hidden" name="start_date" data-date-format="YYYY-MM-DD" value="2021-10-29">
						</a>

						<input type="hidden" name="office" value="{{ $office }}">

						<button type="button" class="btn next-day" data-modify-dp="#datetimepicker" data-days="1"><i class="fa fa-angle-right"></i></button>

						<button type="button" class="btn pull-right hidden-xs hidden-sm" data-modify-dp="#datetimepicker" data-from="1" style="width: 240px;">{{__('messages.tomorrow')}}</button>

						<div class="clearfix"></div>
					</div>
				</div>
			</form>
			<div class="fixedClone" style="height: 58px;"></div>
		</div>
	</div>
    <form class="form-horizontal bv-form" role="form" id="yw0" action="{{ route('index') }}/?office={{ $location_id }}" method="post"><button type="submit" class="bv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>	<div class="tab-content">
        @csrf
        <input type="hidden" name="location_id" value="{{ $location_id }}" />
        <input type="hidden" name="duration" value="0" id="duration"/>
        <div class="tab-pane  active" id="step1" data-validate="false">
            <div class="row dataHolder">
                <div class="col-xs-12 col-md-3">
                    <div class="row servicesHolder">
                        <nav class=" navbar navbar-default" role="navigation">
                            <div class="navbar-header visible-xs-block visible-sm-block collapsed" data-toggle="collapse" data-target="#services-collapse">
                                <button type="button" class="navbar-toggle">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <span>
                                    {{__('messages.select_service')}}
                                </span>
                            </div>

                            <div class="navbar-collapse collapse" id="services-collapse" style="height: 0px;">
                                <h4 class="hidden-xs hidden-sm">{{__('messages.choose_service_time')}}</h4>
                                <ul>
                                    @foreach ($location_services as $service)
                                    <li class="checkbox">
                                        <label>
                                            <input type="checkbox" name="BookingService[service_id][]" class="serv_select_42" data-name="Survepesu" data-duration="{{ $service->duration }}" value="{{ $service->id }}">
                                            <i class="fa fa-check"></i>
                                            {{ $service->name }}<span class="pull-right">{{ $service->duration }}min</span>
                                        </label>
                                    </li>
                                    @endforeach
                                </ul>
                                {{-- <h3>Lisainfo</h3>
                                <ul>
                                    @foreach ($location_pesuboxs as $pesubox)
                                        <li>
                                            <p style="font-weight: bold">{{ $pesubox->name }}&nbsp;: </p>
                                            <p>&nbsp;&nbsp;{{ $pesubox->description }}</p>
                                        </li>
                                    @endforeach
                                </ul> --}}
                            </div>
                        </nav>
                        <div class="hidden">

                            <div class="form-group">
                                
                                <label class="col-xs-12 col-md-2 control-label hidden-xs"></label>
                                <div class="col-xs-12 col-md-10">
                                    <input name="Bookings[started_at]" class="form-control" placeholder="Loodud" id="Bookings_started_at" type="text" data-bv-field="Bookings[started_at]">								<small class="help-block" data-bv-validator="notEmpty" data-bv-for="Bookings[started_at]" data-bv-result="NOT_VALIDATED" style="display: none;">Please enter a value</small><small class="help-block" data-bv-validator="momentDate" data-bv-for="Bookings[started_at]" data-bv-result="NOT_VALIDATED" style="display: none;">Please enter a valid date</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-md-2 control-label hidden-xs"></label>
                                <div class="col-xs-12 col-md-10">
                                    <input name="Bookings[ended_at]" class="form-control" placeholder="bookings.ended_at" id="Bookings_ended_at" type="text" data-bv-field="Bookings[ended_at]">								<small class="help-block" data-bv-validator="notEmpty" data-bv-for="Bookings[ended_at]" data-bv-result="NOT_VALIDATED" style="display: none;">Please enter a value</small><small class="help-block" data-bv-validator="momentDate" data-bv-for="Bookings[ended_at]" data-bv-result="NOT_VALIDATED" style="display: none;">Please enter a valid date</small></div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-md-2 control-label hidden-xs"></label>
                                <div class="col-xs-12 col-md-10">
                                    <input name="BookingResources[resource_id]" class="form-control" placeholder="booking_resources.resource_id" id="BookingResources_resource_id" type="text" maxlength="10" data-bv-field="BookingResources[resource_id]">								<small class="help-block" data-bv-validator="notEmpty" data-bv-for="BookingResources[resource_id]" data-bv-result="NOT_VALIDATED" style="display: none;">Please enter a value</small><small class="help-block" data-bv-validator="integer" data-bv-for="BookingResources[resource_id]" data-bv-result="NOT_VALIDATED" style="display: none;">Please enter a valid number</small><small class="help-block" data-bv-validator="stringLength" data-bv-for="BookingResources[resource_id]" data-bv-result="NOT_VALIDATED" style="display: none;">Please enter a value with valid length</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-9" id="slotChoose" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                </div>
            </div>
        </div>
        <div class="tab-pane" id="step2" data-validate="#step1">
            <div class="row">
                <div class="col-xs-12 col-sm-12 graybg">
                    <div class="dateInfo">
                        <div class="month" style="font-size: 22px;">
                            <div style="display: inline-block" class="title">{{__('messages.booked_time')}}: </div>
                            <div style="display: inline-block" class="time"><span data-showvalue="[name=&#39;Bookings[started_at]&#39;]" data-function="moment" data-format="L"></span> <span style="margin-left:10px" data-showvalue="[name=&#39;Bookings[started_at]&#39;]" data-function="moment" data-format="LT"></span> - <span data-showvalue="[name=&#39;Bookings[ended_at]&#39;]" data-function="moment" data-format="LT"></span></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <p>{{__('messages.enter_necessary_informations')}}</p>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <div class="form-group form-group-lg">
                        <div class="col-xs-12 col-md-6">
                            <input name="Bookings[first_name]" class="form-control" placeholder="{{__('messages.first_name')}}" id="Bookings_first_name" type="text" data-bv-field="Bookings[first_name]">						<small class="help-block" data-bv-validator="notEmpty" data-bv-for="Bookings[first_name]" data-bv-result="NOT_VALIDATED" style="display: none;">Please enter a value</small>
                        </div>
                    
                        <div class="col-xs-12 col-md-6">
                            <input name="Bookings[last_name]" class="form-control" placeholder="{{__('messages.sur_name')}}" id="Bookings_last_name" type="text" data-bv-field="Bookings[last_name]">						<small class="help-block" data-bv-validator="notEmpty" data-bv-for="Bookings[last_name]" data-bv-result="NOT_VALIDATED" style="display: none;">Please enter a value</small>
                        </div>
                    </div>
                    
                    <div class="form-group  form-group-lg">
                        <div class="col-xs-12 col-md-6">
                            <input name="Bookings[email]" class="form-control" placeholder="Email" id="Bookings_email" type="text" data-bv-field="Bookings[email]">						<small class="help-block" data-bv-validator="notEmpty" data-bv-for="Bookings[email]" data-bv-result="NOT_VALIDATED" style="display: none;">Palun sisesta email</small><small class="help-block" data-bv-validator="emailAddress" data-bv-for="Bookings[email]" data-bv-result="NOT_VALIDATED" style="display: none;">Please enter a valid email address</small>
                        </div>
                        
                        <div class="col-xs-12 col-md-6">
                            <input name="Bookings[phone]" class="form-control" placeholder="{{__('messages.telephone')}}" id="Bookings_phone" type="text" data-bv-field="Bookings[phone]"><small class="help-block" data-bv-validator="notEmpty" data-bv-for="Bookings[phone]" data-bv-result="NOT_VALIDATED" style="display: none;">{{__('messages.valid_telephone')}}</small>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group  form-group-lg" style="clear:both; color: #5998b6; display: none;">
                        <label class="control-label col-xs-12 col-md-12 text-left">&nbsp;</label>
                        <div class="input-holder" style="font-size: 20px;display: none;">
                            Hind kokku: <span class="priceHolder" style="color: #2f627a; font-weight: bold;" data-url="/public/servicePrices"></span> EUR
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <div class="form-group ">
                        <div class="col-xs-12 col-md-12">
                            <textarea name="Bookings[message]" rows="3" class="form-control" placeholder="{{__('messages.additional_information')}}" id="Bookings_message" style="border-radius: 20px; padding: 20px; font-size: 20px"></textarea>						</div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <button class="btn btn-success btn-lg pull-right" type="submit">{{__('messages.booking')}}</button>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    </form>
</div>

<script type="text/html" id="day">
    <?php echo '{{=[[ ]]=}}';?>
	<div class="day" data-resources="[[resources.length]]" data-activeResource="1">
		<div class="visible-xs-block resourceHolder text-center">
			<button type="button" class="btn prev-resource pull-left" data-trigger="swiperight"><i class="fa fa-angle-left"></i></button>
				<div class="resourceHeaderWrap">
					<div class="resourceHeaderHolder">
						[[#resources]]
							<h4 class="pull-left">[[name]]</h4>
						[[/resources]]
						<div class="clearfix">

                        </div>
					</div>
				</div>
			<button type="button" class="btn next-resource pull-right" data-trigger="swipeleft"><i class="fa fa-angle-right"></i></button>
		</div>
		<div class="fixedClone"></div>
		<div class="time">
			<div class="hidden-xs">Kell</div>
			[[#getSlots]]
			<span>[[getTime]]</span>
			[[/getSlots]]
		</div>
		<div>
			<div class="resources">
				[[#resources]]
					<div class="resource pull-left">
						<div class="name hidden-xs">
							[[name]]
						</div>
						<div class="slots">
							[[#getSlots]]
								<div class="slot" data-time="[[getTime]]" data-resource="[[parent.id]]" data-free="[[isFree]]" data-open="[[isOpen]]" data-place="[[place]]">
									[[#bookings]]
										<div class="booked" data-start="[[start]]" data-end="[[end]]" data-duration="[[duration]]" data-type="[[type]]"><p>{{__('messages.booked')}}</p></div>
									[[/bookings]]
									[[#plans]]
										<a href="#step2" title="{{__('messages.book_appointment')}}" data-changeForm="#yw0" data-changeFormData='{"BookingResources[resource_id]":[[parent.id]],"Bookings[started_at]":"[[getFrom]]","Bookings[ended_at]":"[[getTo]]"}'>{{__('messages.book_appointment')}}</a>
									[[/plans]]
								</div>
							[[/getSlots]]
						</div>
					</div>
				[[/resources]]
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</script>
<script type="text/html" id="checkedService">
	<li>[[name]]</li>
</script>
@else
<h1 style="text-align: center; padding-top: 50px">There is no location here. </h1>
@endif
@endsection