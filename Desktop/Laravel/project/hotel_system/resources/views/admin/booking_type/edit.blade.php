@extends('admin.layout.default')
@section("content")
    <div class="container-fluid">
        <h1 class="mt-4">Booking Type</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
                Update a Booking type
            </li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <div id="editBookingType" v-cloak>
                    <form action="#" @submit.prevent="submit">
                        <div class="portlet-body m-20">
                            @include('admin.booking_type.form')
                            <div class="breadcrumb bg-danger" v-if="error">
                                <p>@{{ error }}</p>
                            </div>
                            <div class="text-right">
                                <button type="submit" id="submit"
                                        class="btn btn-success save-cancel">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section("script")
    <script>
        const data = @json($booking_type);
    </script>
    <script src="{{ mix('/dist/js/app.js') }}"></script>
    <script src="{{ mix('/dist/js/booking_type/edit.js') }}"></script>
@endsection
