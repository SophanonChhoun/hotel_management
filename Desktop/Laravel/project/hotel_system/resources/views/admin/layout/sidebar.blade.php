<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">

            <li class="{{ request()->is('admin/hotel*') ? 'active' : '' }}">
                <a href="/admin/hotel/list"><i class="fa fa-fw fa-bar-chart-o"></i>Hotel</a>
            </li>


            <li class="{{ request()->is('admin/room*') ? 'active' : '' }}">
                <a href="javascript:;" data-toggle="collapse" data-target="#room"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                <ul class="collapse" id="room">
                    <li {{ request()->is('admin/room_type*') ? "class=active" : null }}>
                        <a href="/admin/room_type/list"><i class="fa fa-fw fa-bar-chart-o"></i>Room Type</a>
                    </li>
                    <li class="{{ request()->is('admin/rooms*') ? 'active' : '' }}">
                        <a href="/admin/rooms/list"><i class="fa fa-fw fa-bar-chart-o"></i>Room</a>
                    </li>
                </ul>
            </li>

            <li class="{{ request()->is('admin/room*') ? 'active' : '' }}">
                <a href="javascript:;" data-toggle="collapse" data-target="#page"><i class="fa fa-fw fa-arrows-v"></i> Pages <i class="fa fa-fw fa-caret-down"></i></a>
                <ul class="collapse" id="page">
                    <li {{ request()->is('admin/about_us*') ? "class=active" : null }}>
                        <a href="/admin/about_us/1"><i class="fa fa-fw fa-bar-chart-o"></i>About Us</a>
                    </li>
                    <li class="{{ request()->is('admin/rooms*') ? 'active' : '' }}">
                        <a href="/admin/contact_us/list"><i class="fa fa-fw fa-bar-chart-o"></i>Contact Us</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
    <!-- /.navbar-collapse -->

