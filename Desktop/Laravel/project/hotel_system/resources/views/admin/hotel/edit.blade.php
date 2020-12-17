@extends('admin.layout.default')
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                @lang('hotel.hotels')
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="#">@lang('dashboard.dashboard')</a>
                </li>
                <li>
                    <i class="fa fa-file"></i> <a href="/admin/hotel/list">@lang('hotel.hotels')</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i>@lang('hotel.update')
                </li>
            </ol>
        </div>
        <div id="createHotel" v-cloak>
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
    <script>
        const data = @json($hotel);
    </script>
    <script src="{{ mix('/dist/js/app.js') }}"></script>
    <script src="{{ mix('/dist/js/hotel/edit.js') }}"></script>
@endsection
