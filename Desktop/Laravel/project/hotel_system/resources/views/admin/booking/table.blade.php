
    <table class="table table-bordered">
        <tr>
            <th>Booking No</th>
            <th>Customer</th>
            <th>Hotel</th>
            <th>Check in</th>
            <th>Check out</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @forelse($data as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->customer->last_name ?? null }} {{ $booking->customer->first_name ?? null }}</td>
                <td>{{ $booking->hotel->name }}</td>
                <td>{{ $booking->check_in_date }}</td>
                <td>{{ $booking->check_out_date }}</td>
                <td>
                    <input type="checkbox" id="itemStatus{{$booking->id}}" @if($booking->is_enable) checked @endif>
                    @include("admin.booking.status")
                </td>
                <td><a href="/admin/bookings/show/{{ $booking->id }}" class="btn btn-success">Show</a></td>
{{--                <td>--}}
{{--                    <button type="button" class="btn btn-danger" id="myBtn{{ $booking->id }}">Delete</button>--}}
{{--                    @include('admin.booking.delete')--}}
{{--                </td>--}}
                @empty
                    <td colspan="5" class="text-center">There is no value</td>
            </tr>
        @endforelse
    </table>
