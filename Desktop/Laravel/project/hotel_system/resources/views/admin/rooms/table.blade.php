
    <table class="table table-responsive">
        <tr>
            <th>Name</th>
            <th>Room Type</th>
            <th>Hotel</th>
            <th>Status</th>
            <th colspan="2">Action</th>
        </tr>
        @forelse($data as $room)
            <tr>
                <td>{{ $room->name }}</td>
                <td>{{ $room->roomType->name ?? null }}</td>
                <td>{{ $room->hotel->name ?? null }}</td>
                <td>
                    <input type="checkbox" data-toggle="modal" data-target="#status{{ $room->id }}" @if($room->is_enable) checked @endif>
                    @include("admin.rooms.status")
                </td>
                <td><a href="/admin/rooms/show/{{ $room->id }}" class="btn btn-warning">Edit</a></td>
                <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{ $room->id }}">Delete</button>
                    @include('admin.rooms.delete')
                </td>
                @empty
                    <td colspan="5" class="text-center">There is no value</td>
            </tr>
        @endforelse
    </table>
