@extends('admin.layout.default')
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                @lang('user.users')
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="{{ url('admin/dashboard') }}">@lang('dashboard.dashboard')</a>
                </li>
                <li>
                    <i class="fa fa-file"></i> <a href="/admin/hotel/list">@lang('user.users')</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i>@lang('user.update')
                </li>
            </ol>
        </div>
        <div id="editUser" v-cloak>
            <form action="#" @submit.prevent="submit">
                <div class="portlet-body m-20">
                    @include('admin.user.form')
                    <div class="breadcrumb bg-danger" v-if="error">
                        <p>@{{ error }}</p>
                    </div>
                    <div class="text-right">
                        <button type="submit" id="submit"
                                class="btn btn-success save-cancel">@lang('general.save')</button>
                        <a href="{{ url('admin/user/list') }}"
                           class="btn btn-default save-cancel">@lang('general.cancel')</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section("script")
    <script>
        const roles = @json($roles);
        const data = @json($user);
    </script>
    <script src="{{ mix('/dist/js/app.js') }}"></script>
    <script src="{{ mix('/dist/js/user/edit.js') }}"></script>
@endsection
