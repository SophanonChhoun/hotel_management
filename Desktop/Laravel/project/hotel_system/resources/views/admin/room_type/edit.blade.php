@extends('admin.layout.default')
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Hotels
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a>
                </li>
                <li>
                    <i class="fa fa-file"></i> <a href="/admin/room_types/list">Room Types</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i>Update Room Type
                </li>
            </ol>
        </div>
        <div id="editRoomType">
            <form action="#" @submit.prevent="submit">
                <div class="portlet-body m-20">
                    @include('admin.room_type.form')
                    <div class="breadcrumb bg-danger" v-if="error">
                        <p>@{{ error }}</p>
                    </div>
                    <div class="text-right">
                        <button type="submit" id="submit"
                                class="btn btn-success save-cancel">Save</button>
                        <a href="{{ url('admin/room_types/list') }}"
                           class="btn btn-default save-cancel">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section("script")
    <script>
        const data = @json($room_type);
    </script>
    <script src="{{ mix('/dist/js/app.js') }}"></script>
    <script src="{{ mix('/dist/js/room_type/edit.js') }}"></script>
@endsection
