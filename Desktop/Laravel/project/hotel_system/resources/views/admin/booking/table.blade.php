
    <table class="table table-responsive">
        <tr>
            <th>Customer</th>
            <th>Hotel</th>
            <th>Booking Type</th>
            <th>Check in</th>
            <th>Check out</th>
            <th>Status</th>
            <th colspan="2">Action</th>
        </tr>
        @forelse($data as $booking)
            <tr>
                <td>{{ $booking->customer->last_name ?? null }} {{ $booking->customer->first_name ?? null }}</td>
                <td>{{ $booking->hotel->name }}</td>
                <td>{{ $booking->booking_type->name }}</td>
                <td>{{ $booking->check_in_date }}</td>
                <td>{{ $booking->check_out_date }}</td>
                <td>
                    <input type="checkbox" data-toggle="modal" data-target="#status{{ $booking->id }}" @if($booking->is_enable) checked @endif>
                    @include("admin.booking.status")
                </td>
                <td><a href="/admin/booking/show/{{ $booking->id }}" class="btn btn-warning">Edit</a></td>
                <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{ $booking->id }}">Delete</button>
                    @include('admin.booking.delete')
                </td>
                @empty
                    <td colspan="5" class="text-center">There is no value</td>
            </tr>
        @endforelse
    </table>
