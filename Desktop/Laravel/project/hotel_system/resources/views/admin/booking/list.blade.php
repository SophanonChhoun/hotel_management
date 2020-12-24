@extends("admin.layout.default")

@section("content")
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Booking
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a>
                </li>
                <li >
                    <i class="fa fa-file"></i>Booking
                </li>
            </ol>
        </div>

        <div class="col-lg-12">
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                    <form action="/admin/booking/list" method="get">
                        <label for="">Status: </label>
                        <div class="columns columns-left btn-group">
                            <select name="is_enable" class="form-control" onchange="this.form.submit()">
                                <option value="">All</option>
                                <option value="1" {{ request()->get('is_enable') == '1' ? 'selected' : '' }}>
                                    Active
                                </option>
                                <option value="0" {{ request()->get('is_enable') == '0' ? 'selected' : '' }}>
                                    Deactive
                                </option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                    <a href="/admin/booking/create" class="btn btn-primary" style="margin-bottom: 30px">Create a new booking</a>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            @include("admin.booking.table")
            @include("admin.layout.pagination")
        </div>
        </div>
    </div>
@endsection
