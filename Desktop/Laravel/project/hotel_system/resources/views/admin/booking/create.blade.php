@extends('admin.layout.default')
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Booking
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> <a href="/admin/booking/list">Booking</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Create New Booking
                </li>
            </ol>
        </div>
        <div id="createRoomType" v-cloak>
            <form action="#" @submit.prevent="submit">

                <div class="portlet-body m-20">
                        @include('admin.booking.form')
                    <div class="breadcrumb bg-danger" v-if="error">
                        <p>@{{ error }}</p>
                    </div>
                    <div class="text-right">
                        <button type="submit" id="submit"
                                class="btn btn-success save-cancel">Save</button>
                        <a href="{{ url('admin/room_type/list') }}"
                           class="btn btn-default save-cancel">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section("script")
    <script src="{{ mix('/dist/js/app.js') }}"></script>
    <script src="{{ mix('/dist/js/room_type/create.js') }}"></script>

@endsection
