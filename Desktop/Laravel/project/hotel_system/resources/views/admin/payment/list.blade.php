@extends("admin.layout.default")

@section("content")
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Payment
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a>
                </li>
                <li >
                    <i class="fa fa-file"></i>Payment
                </li>
            </ol>
        </div>

        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                    <form action="/admin/payment/list" method="get">
                        <label for="">Status: </label>
                        <div class="columns columns-left btn-group">
                            <select name="is_enable" class="form-control" onchange="this.form.submit()">
                                <option value="">All</option>
                                <option value="1" {{ request()->get('is_enable') == '1' ? 'selected' : '' }}>
                                    Active
                                </option>
                                <option value="0" {{ request()->get('is_enable') == '0' ? 'selected' : '' }}>
                                    Pay
                                </option>
                                <option value="2" {{ request()->get('is_enable') == '2' ? 'selected' : '' }}>
                                    Cancel
                                </option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            @include("admin.payment.table")
            @include("admin.layout.pagination")
        </div>
        </div>
    </div>
@endsection
