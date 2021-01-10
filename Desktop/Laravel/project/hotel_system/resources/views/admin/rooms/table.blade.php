
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Room Type</th>
            <th>Hotel</th>
            <th>Occupancy</th>
            <th>Status</th>
            <th colspan="2">Action</th>
        </tr>
        @forelse($data as $room)
            <tr>
                <td>{{ $room->name }}</td>
                <td>{{ $room->roomType->name ?? null }}</td>
                <td>{{ $room->hotel->name ?? null }}</td>
                <td>{{ $room->is_enable ? "Available":"Unavailable" }}</td>
                <td>
                    <input type="checkbox" id="itemStatus{{ $room->id }}" @if($room->status) checked @endif>
                    @include("admin.rooms.status")
                </td>
                <td><a href="/admin/rooms/show/{{ $room->id }}" class="btn btn-warning">Edit</a></td>
                <td>
                    <button type="button" class="btn btn-danger" id="myBtn{{ $room->id }}">Delete</button>
                    @include('admin.rooms.delete')
                </td>
                @empty
                    <td colspan="5" class="text-center">There is no value</td>
            </tr>
        @endforelse
    </table>
