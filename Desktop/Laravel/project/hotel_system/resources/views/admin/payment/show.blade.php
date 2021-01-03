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
                <address>
                    <strong>
                        {{ $payment->customer->last_name }} {{ $payment->customer->first_name }}
                    </strong>
                    <br>
                    Address:
                    {{ $payment->customer->street_address }}                                    <br>
                    Phone:
                    {{ $payment->customer->phone_number }}                                   <br>
                    Email:{{ $payment->customer->email }}                                </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Invoice #{{ $payment->id }}</b><br>
                <br>
                <b>Order ID:</b> {{ $payment->booking->id }}<br>
                <b>Payment:</b> {{ $payment->booking->payment_type->name ?? null }}<br>
                <b>Hotel:</b> {{ $payment->booking->hotel->name ?? null }}
            </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Room Type</th>
                        <th>Room Number</th>
                        <th>Amount of Days</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($payment->booking->room as $room)
                    <tr>
                        <td>{{ $room->roomType->name ?? null }}</td>
                        <td>{{ $room->name }}</td>
                        <td>{{ $payment->days }}</td>
                        <td>{{ ($room->roomType->price * $payment->days) ?? null }}</td>
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
                            <td>${{ $payment->total }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <a href="/admin/payment/list" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i>Back</a>
            </div>
        </div>
    </section>
</section>
</body>
</html>
