@extends('admin.layout.default')
@section("content")
    <div class="container-fluid">
        <h1 class="mt-4">Contact us</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('admin/contact_us/list') }}">Contact us</a>
            </li>
            <li class="breadcrumb-item active">
                Create a Contact Us
            </li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <div id="createContactUs" v-cloak>
                    <form action="#" @submit.prevent="submit">
                        @include('admin.contact_us.form')
                        <div class="breadcrumb bg-danger" v-if="error">
                            <p>@{{ error }}</p>
                        </div>
                        <div class="text-right">
                            <button type="submit" id="submit"
                                    class="btn btn-success save-cancel">Save</button>
                            <a href="{{ url('admin/contact_us/list') }}"
                               class="btn btn-default save-cancel">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section("script")
    <script src="{{ mix('/dist/js/app.js') }}"></script>
    <script src="{{ mix('/dist/js/contact_us/create.js') }}"></script>
@endsection
