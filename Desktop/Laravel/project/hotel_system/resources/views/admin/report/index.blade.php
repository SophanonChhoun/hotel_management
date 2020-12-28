@extends("admin.layout.default")

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">


@section("content")

<h1>Report</h1>

<div class="container">
    <div class="row">

        <div class="col-md-12">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    <!-- loop to find any error & display each error -->
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <!-- <a href="/management/category/create" class="btn btn-success btn-sm float-right"><i class="fas fa-plus-circle"></i> Create Category</a> -->
        </div>
    </div>
    <div class="row">
        <form action="/report/show" method="GET">
            <div class="col-md-12">
                <div class="col-xs-4 m-2" >
                    <div class="form-group">
                    <label>From :</label>   <input type="date"id="start_date"  name="start_date" >
                    </div>
                </div>
                <div class="col-xs-4 m-2">
                <div class="form-group">
                    <label>To :</label>  <input type="date"  id="end_date" name="end_date">
                </div></div>
                <div class="col-xs-4">
                <input class="btn btn-primary" type="submit" value="show Report">
                </div>
    </div>

</form>
</div>
</div>


@endsection