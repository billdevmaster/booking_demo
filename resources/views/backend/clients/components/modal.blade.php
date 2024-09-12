<div class="modal fade text-left" id="client_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="client_modal_title">{{__('admin.add_customer')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.clients.save') }}" method="post">
                @csrf
                <input type="hidden" name="id" id="id" value="0">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="defaultInput">{{__('admin.name')}}</label>
                        <input class="form-control" type="text" placeholder="username" name="username"  id="username"/>
                    </div>
                    <div class="form-group">
                        <label for="selectDefault">{{__('admin.email')}}</label>
                        <input class="form-control" type="email" name="email" id="email" cols="30" rows="10"></input>
                    </div>
                    <div class="form-group">
                        <label for="defaultInput">{{__('messages.telephone')}}</label>
                        <input class="form-control" type="text" placeholder="phone" name="phone"  id="phone"/>
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