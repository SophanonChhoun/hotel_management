@extends('admin.layout.default')
@section("content")
    <div class="container-fluid">
        <h1 class="mt-4">Slider</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('admin/slider/list') }}">Slider</a>
            </li>
            <li class="breadcrumb-item active">
                Create Slider
            </li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <div id="createSlider" v-cloak>
                    <form action="#" @submit.prevent="submit">
                        @include('admin.slider.form')
                        <div class="breadcrumb bg-danger" v-if="error">
                            <p>@{{ error }}</p>
                        </div>
                        <div class="text-right">
                            <button type="submit" id="submit"
                                    class="btn btn-success save-cancel">Save</button>
                            <a href="{{ url('admin/room_type/list') }}"
                               class="btn btn-default save-cancel">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
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
