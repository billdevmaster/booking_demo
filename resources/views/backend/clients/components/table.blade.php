<!-- Responsive Datatable -->
<section id="vehicleType-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">{{__('sidebar.customers')}}</h4>
                    <Button class="btn btn-primary waves-effect waves-float waves-light" id="add_new_client" data-toggle="modal" data-target="#client_modal">{{__('admin.add_customer')}}</Button>
                </div>
                <div class="card-datatable col-12">
                    <table class="table datatables-ajax" id="clients_table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>{{__('admin.name')}}</th>
                                <th>{{__('admin.email')}}</th>
                                <th>{{__('messages.telephone')}}</th>
                                <th>{{__('admin.activities')}}</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot></tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ Responsive Datatable -->
<script>
    $(function() {
        $("#add_new_client").click(function() {
            // $("#client_modal #client_modal_title").text("Lisa uus klient");
            $("#client_modal #id").val(0);
            $("#client_modal #username").val("");
            $("#client_modal #email").val("");
            $("#client_modal #phone").val("");
        })
    })
</script>