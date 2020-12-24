<div class="modal fade" id="myModal{{ $user->id }}" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">@lang('general.sure')</h4>
            </div>
            <div class="modal-body">
                <p>@lang('user.delete')</p>
            </div>
            <div class="modal-footer">
                <div>

                </div>
                <form action="{{ url('admin/user/delete/'.$user->id) }}" method="post">
                    @csrf
                    <button class="btn btn-danger">@lang('general.delete')</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('general.close')</button>
                </form>
            </div>
        </div>

    </div>
</div>
