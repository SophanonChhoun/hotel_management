@extends('admin.layout.default')
@section("content")
    <div class="container-fluid">
        <h1 class="mt-4">Room Type</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('admin/room_type/list') }}">Room Type</a>
            </li>
            <li class="breadcrumb-item active">
                Update Room type
            </li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <div id="editRoomType" v-cloak>
                    <form action="#" @submit.prevent="submit">
                        @include('admin.room_type.form')
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
        const data = @json($room_type);
        const hotels = @json($hotels);
    </script>
    <script src="{{ mix('/dist/js/app.js') }}"></script>
    <script src="{{ mix('/dist/js/room_type/edit.js') }}"></script>
@endsection
