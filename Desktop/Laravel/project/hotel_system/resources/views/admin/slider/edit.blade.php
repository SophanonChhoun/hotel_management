@extends('admin.layout.default')
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                @lang('slider.sliders')
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="#">@lang('dashboard.dashboard')</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i>@lang('slider.sliders')
                </li>
            </ol>
        </div>
        <div id="editSliders" v-cloak>
            <form action="#" @submit.prevent="submit">
                <div class="portlet-body m-20">
                    @include('admin.slider.form')
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
@endsection
@section("script")
    <script>
        const data = @json($sliders);
    </script>
    <script src="{{ mix('/dist/js/app.js') }}"></script>
    <script src="{{ mix('/dist/js/sliders/edit.js') }}"></script>
@endsection
