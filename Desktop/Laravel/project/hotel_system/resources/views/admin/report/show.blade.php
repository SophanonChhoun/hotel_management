<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        .invoice {
            position: relative;
            background: #fff;
            border: 1px solid #f4f4f4;
            padding: 20px;
            margin: 10px 25px;
        }
        .page-header {
            margin: 10px 0 20px 0;
            font-size: 22px;
        }
    </style>
</head>
<body>
<section class="content content_content" style="width: 70%; margin: auto;">
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-globe"></i> SSB .
                    <small class="pull-right">Hotel Management</small>
                </h2>
            </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                From
                <address>
                    <strong>
                        SSB
                    </strong>
                </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
                To
                <strong>
                    Date
                </strong>
                <address>
                    Check In:
                    {{ $start_date }}                                    <br>
                    Check Out:
                {{ $end_date }}
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
            </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th >Customer name</th>
                        <th >Check in</th>
                        <th >Check out</th>
                        <th >Room Amount</th>
                        <th >Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($payments as $payment)
                        <tr>
                            <td >{{ $payment->customer->last_name ?? null }} {{ $payment->customer->first_name ?? null }}</td>
                            <td >{{ $payment->booking->check_in_date ?? null }}</td>
                            <td >{{ $payment->booking->check_out_date ?? null }}</td>
                            <td >{{ $payment->amount }}</td>
                            <td >{{ $payment->price }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>


                        <tr>
                            <th>Total:</th>
                            <td>${{ $total }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <a href="/admin/dashboard" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i>Back</a>
            </div>
        </div>
    </section>
</section>
</body>
</html>
