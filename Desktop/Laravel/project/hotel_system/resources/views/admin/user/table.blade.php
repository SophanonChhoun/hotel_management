
    <table class="table table-responsive">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Profile</th>
            <th>@lang('general.status')</th>
            <th colspan="2">@lang('general.action')</th>
        </tr>
        @forelse($data as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><img src="{{ $user->media->file_url ?? asset('image/noimage.png') }}" class="img-responsive" style="max-height: 200px;max-width: 200px"></td>
                <td>
                    <input type="checkbox" data-toggle="modal" data-target="#status{{ $user->id }}" @if($user->is_enable) checked @endif>
                    @include("admin.user.status")
                </td>
                <td><a href="/admin/user/show/{{ $user->id }}" class="btn btn-warning">@lang('general.edit')</a></td>
                <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{ $user->id }}">@lang('general.delete')</button>
                    @include('admin.user.delete')
                </td>
                @empty
                    <td colspan="5" class="text-center">There is no value</td>
            </tr>
        @endforelse
    </table>
