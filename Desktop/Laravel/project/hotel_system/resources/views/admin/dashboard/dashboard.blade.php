@extends('admin.layout.default')

@section("content")
    <div class="">
        <div class="row">
            <div class="col-md-3">
                <div class="card-counter success">
                    <i class="fa fa-key"></i>
                    <span class="count-numbers">  {{$room_available }}</span>
                    <a href="/admin/rooms/list/1" style="color:white;">
                        <span class="count-name">Room Available</span>
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-counter warning">
                    <i class="fa fa-calendar"></i>
                    <span class="count-numbers">
                      {{ $check_in }}</span>
                    <span class="count-name">Check-In</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-counter danger">
                    <i class="fa fa-usd"></i>
                    <span class="count-numbers">{{ $check_out }}</span>
                    <span class="count-name">Check-Out</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-counter info">
                    <i class="fa fa-bookmark"></i>
                    <span class="count-numbers">
                     {{ $room_booked }}  </span>
                    <a href="/admin/rooms/list/0">
                        <span class="count-name">Room Booked</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="">
            <div class="row">

                <div class="col-md-3">

                    <div class="card-counter primary">
                        <i class="fa fa-home"></i>
                        <span class="count-numbers">  {{$total_room }}</span>
                        <a href="admin/rooms/list" style="color:white;"><span class="count-name">Room</span></a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter siliver">
                        <i class="fa fa-archive"></i>
                        <span class="count-numbers">
                      {{ $room_type }}</span>
                        <a href="admin/room_type/list" style="color:white;"><span class="count-name">Room Type</span></a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card-counter orange">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span class="count-numbers">{{ $customer_today }}</span>
                        <a href="admin/customer/list" style="color:white"><span class="count-name">New Customers</span></a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-counter secondary">
                        <i class="fa fa-money"></i>
                        <span class="count-numbers">
                        {{$payment_today }}</span>
                        <a href="admin/payment/list" style="color:white"><span class="count-name">Payment</span></a>
                    </div>
                </div>
            </div>
            <div style="margin-top: 2%;">
                <div class="row">
                    <form action="{{ url('/admin/report/show') }}" method="get">
                        <div class="col-md-12">
                            <div class="col-xs-4 m-2" >
                                <div class="form-group">
                                    <label>From :</label>   <input type="date" id="start_date"  name="start_date" >
                                </div>
                            </div>
                            <div class="col-xs-4 m-2">
                                <div class="form-group">
                                    <label>To :</label>  <input type="date"  id="end_date" name="end_date">
                                </div></div>
                            <div class="col-xs-4">
                                <input class="btn btn-primary" type="submit" value="show Report">
                            </div>
                        </div>
                    </form>
            </div>
            <h1 class="p-3 mb-2 text-white">Recently Booking</h1>
            <table class="table table-responsive table-bordered "  id="table_id">
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Hotel</th>
                    <th>Booking Type</th>
                    <th>Check in</th>
                    <th>Check out</th>
                    <th>Status</th>
                    <th colspan="2">Action</th>
                </tr>
                <div class="col-md-5"></div>
                @forelse($data as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>
                            <a href="{{ url('/admin/booking/show/payment/'.$booking->id) }}">{{ $booking->customer->last_name ?? null }} {{ $booking->customer->first_name ?? null }}</a>
                        </td>
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
@endsection
