<div class="modal fade text-left" id="service_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel18">{{__('admin.add_service')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.services.save') }}" method="post">
                @csrf
                <input type="hidden" name="id" id="id" value="0">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="defaultInput">{{__('admin.name')}}</label>
                        <input class="form-control" type="text" placeholder="name" name="name"  id="name"/>
                    </div>
                    <div class="form-group">
                        <label for="selectDefault">{{__('admin.description')}}</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="defaultInput">{{__('admin.durability')}}(min)</label>
                        <input class="form-control" type="text" placeholder="duration" name="duration"  id="duration"/>
                    </div>
                    <div class="form-group">
                        <label for="defaultInput">{{__('admin.price')}}(€)</label>
                        <input class="form-control" type="text" placeholder="price" name="price"  id="price"/>
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
<script>
    $(function() {
        console.log("okay")
    })
</script>