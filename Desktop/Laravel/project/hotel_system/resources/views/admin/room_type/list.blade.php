@extends("admin.layout.default")

@section("content")
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Room Types
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a>
                </li>
                <li >
                    <i class="fa fa-file"></i>Room Types
                </li>
            </ol>
        </div>
        <div class="col-lg-12">
            <a href="/admin/room_type/create" class="btn btn-primary" style="margin-bottom: 30px">Create a room type</a>
            @include("admin.room_type.table")
        </div>
        </div>
    </div>
@endsection
