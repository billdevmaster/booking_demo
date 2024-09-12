<div class="modal fade text-left" id="location_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel18">{{__('admin.add_department')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.locations.save') }}" method="post">
                @csrf
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="defaultInput">{{__('admin.name')}}</label>
                        <input class="form-control" type="text" placeholder="{{__('admin.name')}}" name="name"  id="name"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{__('admin.save')}}</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('admin.delete')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
