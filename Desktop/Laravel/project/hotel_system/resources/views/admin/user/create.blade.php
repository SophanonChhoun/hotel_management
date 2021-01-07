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
                <li class="active">
                    <i class="fa fa-file"></i> <a href="/admin/user/list">Users</a>
                </li>
                <li>
                    <i class="fa fa-user"></i> Create a user
                </li>
            </ol>
        </div>
        <div id="createUser" v-cloak>
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
    </script>
    <script src="{{ mix('/dist/js/app.js') }}"></script>
    <script src="{{ mix('/dist/js/user/create.js') }}"></script>
@endsection
