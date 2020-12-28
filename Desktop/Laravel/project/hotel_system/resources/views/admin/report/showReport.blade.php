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
        <div class="col-md-12"></div>
        @if($sales->count() > 0 )
        <div class="alert alert-success">The total amount of Sale from {{ $start_date }} To {{ $end_date }} is {{ number_format($totalSale, 2) }}</div>

        @else 
            <div class="alert alert-danger">There is no sale report from your date</div>


        @endif
        
    </div>
</div>


@endsection