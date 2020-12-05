<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">

            <li class="{{ request()->is('admin/hotel*') ? 'active' : '' }}">
                <a href="/admin/hotel/list"><i class="fa fa-fw fa-bar-chart-o"></i>Hotel</a>
            </li>

        </ul>
    </div>
    <!-- /.navbar-collapse -->

