@extends('admin.layout.default')

@section("content")
    <div class="row" id="createHotel" v-cloak>
        <div class="col-lg-12">
            <h1 class="page-header">
                @lang('hotel.hotels')
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="#">@lang('dashboard.dashboard')</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> <a href="/admin/hotel/list">@lang('hotel.create')</a>
                </li>
            </ol>
        </div>
        <div>
            <form action="#" @submit.prevent="submit">
                <div class="portlet-body m-20">
                        @include('admin.hotel.form')
                    <div class="breadcrumb bg-danger" v-if="error">
                        <p>@{{ error }}</p>
                    </div>
                    <div class="text-right">
                        <button type="submit" id="submit"
                                class="btn btn-success save-cancel">@lang('general.save')</button>
                        <a href="{{ url('admin/hotel/list') }}"
                           class="btn btn-default save-cancel">@lang('general.cancel')</a>
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
