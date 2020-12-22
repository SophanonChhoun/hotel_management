<div class="modal fade" id="status{{ $user->id }}" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">@lang('general.sure')</h4>
            </div>
            <div class="modal-body">
                <p>@lang('user.status')</p>
            </div>
            <div class="modal-footer">
                <div>

                </div>
                <form action="{{ url('admin/user/update/status/'.$user->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="is_enable" value="{{ $user->is_enable ? 0 : 1 }}">
                    <button class="btn btn-danger">@lang('general.update')</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('general.close')</button>
                </form>
            </div>
        </div>

    </div>
</div>
