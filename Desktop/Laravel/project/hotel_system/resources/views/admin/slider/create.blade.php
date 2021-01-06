@extends('admin.layout.default')
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Sliders
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="{{ url('admin/dashboard') }}">@lang('dashboard.dashboard')</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> <a href="/admin/slider/list">Sliders</a>
                </li>
            </ol>
        </div>
        <div id="createSlider" v-cloak>
            <form action="#" @submit.prevent="submit">
                    @include('admin.slider.form')
                    <div class="breadcrumb bg-danger" v-if="error">
                        <p>@{{ error }}</p>
                    </div>
                    <div class="text-right">
                        <button type="submit" id="submit"
                                class="btn btn-success save-cancel">@lang('general.save')</button>
                        <a href="{{ url('admin/slider/list') }}"
                           class="btn btn-default save-cancel">@lang('general.cancel')</a>
                    </div>
            </form>
        </div>
    </div>
@endsection
@section("script")
    <script>
        const hotels = @json($hotels);
    </script>
    <script src="{{ mix('/dist/js/app.js') }}"></script>
    <script src="{{ mix('/dist/js/sliders/create.js') }}"></script>
@endsection
