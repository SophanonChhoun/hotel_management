@extends("admin.layout.default")

@section("content")
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Contact Us
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i>Contact Us
                </li>
            </ol>
        </div>
        <div class="col-lg-12">
            <a href="/admin/contact_us/create" class="btn btn-primary" style="margin-bottom: 30px">Create a hotel</a>
            @include("admin.contact_us.table")

        </div>
        </div>
    </div>
@endsection
