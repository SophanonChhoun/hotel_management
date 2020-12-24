@include("admin.layout.header")
<body>

<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        @include("admin.layout.head")
        <!-- Navigation -->
        @include("admin.layout.sidebar")
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">
            <!-- Page Heading -->
            <div id="app" style="margin-left: 10px;">
                @yield("content")

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
@include("admin.layout.footer")
@include("admin.layout.alert")

