@extends('admin.layout.default')
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Rooms
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> <a href="/admin/rooms/list">Rooms</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Create New Room
                </li>
            </ol>
        </div>
        <div id="createRoom" v-cloak>
            <form action="#" @submit.prevent="submit">

                <div class="m-20">
                        @include('admin.rooms.form')
                    <div class="breadcrumb bg-danger" v-if="error">
                        <p>@{{ error }}</p>
                    </div>
                    <div class="text-right">
                        <button type="submit" id="submit"
                                class="btn btn-success save-cancel">Save</button>
                        <a href="{{ url('admin/rooms/list') }}"
                           class="btn btn-default save-cancel">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section("script")
    <script>
        const room_types = @json($room_types);
        const hotels = @json($hotels);
    </script>
    <script>
        $(".select2-single").select2({
            'placeholder': "Please select province"
        });
        $(".select3-single").select2({
            'placeholder': "Please select property type"
        });
        $(".select4-single").select2({
            'placeholder': "Please select command"
        });
    </script>

    <script src="{{ mix('/dist/js/app.js') }}"></script>
    <script src="{{ mix('/dist/js/rooms/create.js') }}"></script>

@endsection
