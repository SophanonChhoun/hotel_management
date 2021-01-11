
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Hotel</th>
            <th>Price</th>
            <th>Image</th>
            <th>Status</th>
            <th colspan="2" class="text-center">Action</th>
        </tr>
        @forelse($data as $room_type)
            <tr>
                <td>{{ $room_type->name }}</td>
                <td>{{ $room_type->hotel->name ?? null }}</td>
                <td>{{ $room_type->price }}</td>
                <td><img src="{{ $room_type->medias->first()->file_url ?? asset('image/noimage.png') }}" class="img-responsive" style="max-height: 200px;max-width: 200px"></td>
                <td>
                    <input type="checkbox" id="itemStatus{{ $room_type->id }}" @if($room_type->is_enable) checked @endif>
                    @include("admin.room_type.status")
                </td>
                <td><a href="/admin/room_type/show/{{ $room_type->id }}" class="btn btn-warning">Edit</a></td>
                <td>
                    <button type="button" class="btn btn-danger" id="myBtn{{ $room_type->id }}">Delete</button>
                    @include('admin.room_type.delete')
                </td>
                @empty
                    <td colspan="9" class="text-center">There is no value</td>
            </tr>
        @endforelse
    </table>
