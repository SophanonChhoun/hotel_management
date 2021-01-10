
    <table class="table table-bordered">
        <tr>
            <th>@lang('general.name')</th>
            <th>@lang('general.city')</th>
            <th>@lang('general.country')</th>
            <th>@lang('general.image')</th>
            <th>@lang('general.status')</th>
            <th colspan="2" class="text-center">@lang('general.action')</th>
        </tr>
        @forelse($data as $hotel)
            <tr>
                <td>{{ $hotel->name }}</td>
                <td>{{ $hotel->city }}</td>
                <td>{{ $hotel->country }}</td>
                <td><img src="{{ $hotel->medias->first()->file_url ?? asset('image/noimage.png') }}" class="img-responsive" style="max-height: 200px;max-width: 200px"></td>
                <td>
                    <input type="checkbox" id="itemStatus{{ $hotel->id }}" @if($hotel->is_enable) checked @endif>
                    @include("admin.hotel.status")
                </td>
                <td><a href="/admin/hotel/show/{{ $hotel->id }}" class="btn btn-warning">@lang('general.edit')</a></td>
                <td>
                    <button type="button" class="btn btn-danger" id="myBtn{{ $hotel->id }}">@lang('general.delete')</button>
                    @include('admin.hotel.delete')
                </td>
                @empty
                    <td colspan="5" class="text-center">There is no value</td>
            </tr>
        @endforelse
    </table>
