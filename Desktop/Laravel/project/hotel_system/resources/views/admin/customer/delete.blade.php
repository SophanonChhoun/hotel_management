<div class="modal fade" id="myModal{{ $customer->id }}" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Are you sure to delete ?</h4>
            </div>
            <div class="modal-body">
                <p>Do you want to delete this customer ?</p>
            </div>
            <div class="modal-footer">
                <div>

                </div>
                <form action="{{ url('admin/customer/delete/'.$customer->id) }}" method="post">
                    @csrf
                    <button class="btn btn-danger">Delete it</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>

    </div>
</div>
