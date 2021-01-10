@extends("admin.layout.default")

@section("content")
    <div class="container-fluid">
        <h1 class="mt-4">Payment</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                Payment
            </li>
        </ol>

        <div class="row">

            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
                <form action="/admin/payment/list" method="get">
                    <label for="">Status: </label>
                    <div class="columns columns-left btn-group">
                        <select name="is_enable" class="form-control" onchange="this.form.submit()">
                            <option value="">All</option>
                            <option value="1" {{ request()->get('is_enable') == '1' ? 'selected' : '' }}>
                                @lang('general.active')
                            </option>
                            <option value="0" {{ request()->get('is_enable') == '0' ? 'selected' : '' }}>
                                @lang('general.inactive')
                            </option>
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    @include("admin.payment.table")
                    @include("admin.layout.pagination")
                </div>
            </div>
        </div>
    </div>
@endsection
