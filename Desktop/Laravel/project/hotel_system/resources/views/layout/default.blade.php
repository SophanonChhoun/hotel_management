@include("layout.header")
<body>

<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        @include("layout.head")
        <!-- Navigation -->
        @include("layout.sidebar")
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
{{--            @yield("content")--}}
            <form action="/foo/bar" method="post" class="form-control">
                @csrf
                <input type="text" class="form-control" name="test">
                <input type="submit" class="btn btn-primary">
            </form>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
@include("layout.footer")
