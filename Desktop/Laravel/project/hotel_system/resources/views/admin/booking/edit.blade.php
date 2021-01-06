@extends('admin.layout.default')
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Booking
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                </li>
                <li>
                    <i class="fa fa-file"></i> <a href="/admin/booking/list">Booking</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i>Update Booking
                </li>
            </ol>
        </div>
        <div id="editBooking" v-cloak>
            <form action="#" @submit.prevent="submit">
                <div class="portlet-body m-20">
                    @include('admin.booking.form')
                    <div class="breadcrumb bg-danger" v-if="error">
                        <p>@{{ error }}</p>
                    </div>
                    <div class="text-right">
                        <button type="submit" id="submit"
                                class="btn btn-success save-cancel">Save</button>
                        <a href="{{ url('admin/booking/list') }}"
                           class="btn btn-default save-cancel">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section("script")
    <script>
        const data = @json($booking);
        const hotels = @json($hotels);
        const customers = @json($customers);
        const booking_types = @json($booking_types);
        const payment_types = @json($payment_types);
        const room_types = @json($room_types);
        const rooms = @json($rooms);
        const currentDate = @json($current_date);
    </script>
    <script src="{{ mix('/dist/js/app.js') }}"></script>
    <script src="{{ mix('/dist/js/booking/edit.js') }}"></script>
@endsection
