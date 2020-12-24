@extends("admin.layout.default")

@section("content")
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Customers
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="#"> Dashboard</a>
                    {{-- <i class="fas fa-user-tie"></i><a href="#"> Dashboard</a> --}}
                </li>
                <li class="active">
                    <i class="fa fa-users"></i> Customer
                </li>
            </ol>
        </div>
        <div class="col-lg-12">
            <a href="/admin/customer/create" class="btn btn-primary" style="margin-bottom: 30px; color:white;"> <i class="fas fa-user-plus"></i> Register a new customer</a>
            @include("admin.customer.table")

        </div>
        </div>
    </div>
@endsection
