@extends("admin.layout.default")

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
                <li >
                    <i class="fa fa-file"></i>Rooms
                </li>
            </ol>
        </div>
        <div class="col-lg-12">
            <a href="/admin/rooms/create" class="btn btn-primary" style="margin-bottom: 30px">Create a room type</a>
            @include("admin.rooms.table")
        </div>
        </div>
    </div>
@endsection
