@extends('admin.layout.default')
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Rooms
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a>
                </li>
                <li>
                    <i class="fa fa-file"></i> <a href="/admin/rooms/list">Rooms</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i>Update Room
                </li>
            </ol>
        </div>
        <div id="editRoom" v-cloak>
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
        const data = @json($room);
        const hotels = @json($hotels);
    </script>
    <script src="{{ mix('/dist/js/app.js') }}"></script>
    <script src="{{ mix('/dist/js/rooms/edit.js') }}"></script>
@endsection
