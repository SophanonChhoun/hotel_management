<div class="modal fade" id="status{{ $hotel->id }}" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">@lang('general.sure')</h4>
            </div>
            <div class="modal-body">
                <p>@lang('hotel.status')</p>
            </div>
            <div class="modal-footer">
                <div>

                </div>
                <form action="{{ url('admin/hotel/update/status/'.$hotel->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="is_enable" value="{{ $hotel->is_enable ? 0 : 1 }}">
                    <button class="btn btn-danger">@lang('general.update')</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('general.close')</button>
                </form>
            </div>
        </div>

    </div>
</div>
