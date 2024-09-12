<form method="post" id="location_general_form">
    @csrf
    <input type="hidden" name="id" id="id" value={{ $location->id }}>
    <div class="form-group">
        <label for="defaultInput">{{__('admin.name')}}</label>
        <input class="form-control" type="text" placeholder="Location Name" name="name"  id="name" value="{{ $location->name }}"/>
    </div>
    <div class="form-group">
        <label for="defaultInput">{{__('admin.address')}}</label>
        <div class="row">
            <div class="col-4">
                <input class="form-control" type="text" placeholder="Address" name="address"  id="address" value="{{ $location->address }}"/>
            </div>
            <div class="col-4">
                <input class="form-control" type="text" placeholder="Street" name="street"  id="street" value="{{ $location->street }}"/>
            </div>
            <div class="col-4">
                <input class="form-control" type="text" placeholder="City" name="city"  id="city" value="{{ $location->city }}"/>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="defaultInput">{{__('admin.start_end')}}</label>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label">
                        <label for="first-name">{{__('admin.monday')}}</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="time" class="form-control" name="Mon_start" id="Mon_start" placeholder="Start time"  value="{{ $location->Mon_start }}"/>
                    </div>
                    <div class="col-sm-1" style="align-items: center; display: flex;">
                        <i data-feather='minus'></i>
                    </div>
                    <div class="col-sm-4">
                        <input type="time" class="form-control" name="Mon_end" id="Mon_end" placeholder="End time"  value="{{ $location->Mon_end }}"/>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label">
                        <label for="first-name">{{__('admin.tuesday')}}</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="time" class="form-control" name="Tue_start" id="Tue_start" placeholder="Start time"  value="{{ $location->Tue_start }}"/>
                    </div>
                    <div class="col-sm-1" style="align-items: center; display: flex;">
                        <i data-feather='minus'></i>
                    </div>
                    <div class="col-sm-4">
                        <input type="time" class="form-control" name="Tue_end" id="Tue_end" placeholder="End time"  value="{{ $location->Tue_end }}"/>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label">
                        <label for="first-name">{{__('admin.wednesday')}}</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="time" class="form-control" name="Wed_start" id="Wed_start" placeholder="Start time"  value="{{ $location->Wed_start }}"/>
                    </div>
                    <div class="col-sm-1" style="align-items: center; display: flex;">
                        <i data-feather='minus'></i>
                    </div>
                    <div class="col-sm-4">
                        <input type="time" class="form-control" name="Wed_end" id="Wed_end" placeholder="End time"  value="{{ $location->Wed_end }}"/>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label">
                        <label for="first-name">{{__('admin.thursday')}}</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="time" class="form-control" name="Thu_start" id="Thu_start" placeholder="Start time"  value="{{ $location->Thu_start }}"/>
                    </div>
                    <div class="col-sm-1" style="align-items: center; display: flex;">
                        <i data-feather='minus'></i>
                    </div>
                    <div class="col-sm-4">
                        <input type="time" class="form-control" name="Thu_end" id="Thu_end" placeholder="End time"  value="{{ $location->Thu_end }}"/>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label">
                        <label for="first-name">{{__('admin.friday')}}</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="time" class="form-control" name="Fri_start" id="Fri_start" placeholder="Start time"  value="{{ $location->Fri_start }}"/>
                    </div>
                    <div class="col-sm-1" style="align-items: center; display: flex;">
                        <i data-feather='minus'></i>
                    </div>
                    <div class="col-sm-4">
                        <input type="time" class="form-control" name="Fri_end" id="Fri_end" placeholder="End time"  value="{{ $location->Fri_end }}"/>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label">
                        <label for="first-name">{{__('admin.saturday')}}</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="time" class="form-control" name="Sat_start" id="Sat_start" placeholder="Start time"  value="{{ $location->Sat_start }}"/>
                    </div>
                    <div class="col-sm-1" style="align-items: center; display: flex;">
                        <i data-feather='minus'></i>
                    </div>
                    <div class="col-sm-4">
                        <input type="time" class="form-control" name="Sat_end" id="Sat_end" placeholder="End time"  value="{{ $location->Sat_end }}"/>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label">
                        <label for="first-name">{{__('admin.sunday')}}</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="time" class="form-control" name="Sun_start" id="Sun_start" placeholder="Start time"  value="{{ $location->Sun_start }}"/>
                    </div>
                    <div class="col-sm-1" style="align-items: center; display: flex;">
                        <i data-feather='minus'></i>
                    </div>
                    <div class="col-sm-4">
                        <input type="time" class="form-control" name="Sun_end" id="Sun_end" placeholder="End time"  value="{{ $location->Sun_end }}"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label for="defaultInput">{{__('admin.interval')}}</label>
            <input class="form-control" type="text" placeholder="Interval" name="interval"  id="interval"  value="{{ $location->interval }}"/>
        </div>
        <div class="col-md-4" data-toggle="tooltip" data-placement="top" data-original-title="{{__('admin.buffer_time_detail')}}">
            <label for="defaultInput">{{__('admin.buffer_time')}}</label>
            <input class="form-control" type="text" placeholder="buffer" name="buffer"  id="buffer"  value="{{ $location->buffer }}"/>
        </div>
        <div class="col-md-4" data-toggle="tooltip" data-placement="top" data-original-title="{{__('admin.book_days_inadvance_detail')}}">
            <label for="defaultInput">{{__('admin.book_days_inadvance')}}</label>
            <input class="form-control" type="text" placeholder="Enabled Days" name="enable_days"  id="enable_days"  value="{{ $location->enable_days }}"/>
        </div>
    </div>
    <button type="button" class="btn btn-primary mr-1" id="submit">{{__('admin.save')}}</button>
</form>