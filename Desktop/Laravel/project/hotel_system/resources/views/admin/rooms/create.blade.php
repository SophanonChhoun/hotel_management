@extends('admin.layout.default')
@section("content")
    <div class="container-fluid">
        <h1 class="mt-4">Room</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('admin/rooms/list') }}">Room</a>
            </li>
            <li class="breadcrumb-item active">
                Create Room
            </li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <div id="createRoom" v-cloak>
                    <form action="#" @submit.prevent="submit">
                        @include('admin.rooms.form')
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
