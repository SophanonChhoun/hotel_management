@extends("admin.layout.default")

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
                <li class="active">
                    <i class="fa fa-file"></i> <a href="/admin/hotel/list">Hotels</a>
                </li>
            </ol>
        </div>
        <div class="col-lg-12">
            <a href="/admin/hotel/create" class="btn btn-primary" style="margin-bottom: 30px">Create a hotel</a>
            @include("admin.hotel.table")

        </div>
        </div>
    </div>
@endsection
