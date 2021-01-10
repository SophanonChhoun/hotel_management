@extends("admin.layout.default")

@section("content")
    <div class="container-fluid">
        <h1 class="mt-4">Booking</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
                Booking
            </li>
        </ol>

        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
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
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                    <a href="/admin/booking/create" class="btn btn-primary" style="margin-bottom: 30px">Create a new booking</a>
                </div>
            </div>

        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    @include("admin.booking.table")
                    @include("admin.layout.pagination")
                </div>
            </div>
        </div>
    </div>
@endsection
@section("script")
    <script>
        const data = @json($data);

    </script>
    <script>
        function status(item)
        {
            $(document).ready(function(){
                $("#myBtn"+item.id).click(function(){
                    $("#myModal"+item.id).modal();
                });
                $("#itemStatus"+item.id).click(function(){
                    $("#status"+item.id).modal();
                });
            });
        }
        data.data.forEach(status);

    </script>
@endsection

