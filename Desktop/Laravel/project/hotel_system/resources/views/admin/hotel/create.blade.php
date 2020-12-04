@extends('admin.layout.default')
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Hotels
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> <a href="/admin/hotel/list">Hotels</a>
                </li>
            </ol>
        </div>
        <div id="createHotel">
            <form action="#" @submit.prevent="submit">
                <div class="portlet-body m-20">
                        @include('admin.hotel.form')
                    <div class="text-right">
                        <button type="submit" id="submit"
                                class="btn btn-success save-cancel">Save</button>
                        <a href="{{ url('admin/hotel/list') }}"
                           class="btn btn-default save-cancel">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section("script")
    <script src="{{ mix('/dist/js/app.js') }}"></script>
    <script src="{{ mix('/dist/js/hotel/create.js') }}"></script>
@endsection
