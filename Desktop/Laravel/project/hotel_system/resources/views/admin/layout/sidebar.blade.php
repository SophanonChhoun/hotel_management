<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">

            <li class="{{ request()->is('dashboard*') ? 'active' : '' }}">
                <a href="/dashboard"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>

            <li class="{{ request()->is('admin/user*') ? 'active' : '' }}">
                <a href="/admin/user/list"><i class="fa fa-fw fa-user"></i> @lang('user.users')</a>
            </li>

            <li class="{{ request()->is('admin/hotel*') ? 'active' : '' }}">
                <a href="/admin/hotel/list"><i class="fa fa-fw fa-home"></i> @lang('hotel.hotels')</a>
            </li>
            <li class="{{ request()->is('admin/customer*') ? 'active' : '' }}">
                <a href="/admin/customer/list"><i class="fa fa-fw fa-users"></i> Customer</a>
            </li>

            <li class="{{ request()->is('admin/identification_type*') ? 'active' : '' }}">
                <a href="/admin/identification_type/list"><i class="fa fa-fw fa-info"></i> Identification Type</a>
            </li>

            <li class="{{ request()->is('admin/booking*') ? 'active' : '' }}">
                <a href="javascript:;" data-toggle="collapse" data-target="#booking"><i class="fa fa-fw fa-arrows-v"></i> Booking <i class="fa fa-fw fa-caret-down"></i></a>
                <ul class="collapse" id="booking">
                    <li {{ request()->is('admin/booking_type*') ? "class=active" : null }}>
                        <a href="/admin/booking_type/list"><i class="fa fa-fw fa-star"></i> Booking Type</a>
                    </li>
                    <li class="{{ request()->is('admin/booking*') ? 'active' : '' }}">
                        <a href="/admin/booking/list"><i class="fa fa-fw fa-suitcase"></i> Booking</a>
                    </li>
                </ul>
            </li>

            <li class="{{ request()->is('admin/payment*') ? 'active' : '' }}">
                <a href="javascript:;" data-toggle="collapse" data-target="#payment"><i class="fa fa-fw fa-arrows-v"></i> Payment <i class="fa fa-fw fa-caret-down"></i></a>
                <ul class="collapse" id="payment">

                    <li class="{{ request()->is('admin/payment_type*') ? 'active' : '' }}">
                        <a href="/admin/payment_type/list"><i class="fa fa-fw fa-paypal"></i> Payment Type</a>
                    </li>
                    <li class="{{ request()->is('admin/payment*') ? 'active' : '' }}">
                        <a href="/admin/payment/list"><i class="fa fa-fw fa-money"></i> Payment</a>
                    </li>
                </ul>
            </li>


            <li class="{{ request()->is('admin/room*') ? 'active' : '' }}">
                <a href="javascript:;" data-toggle="collapse" data-target="#room"><i class="fa fa-fw fa-arrows-v"></i> Rooms <i class="fa fa-fw fa-caret-down"></i></a>
                <ul class="collapse" id="room">
                    <li {{ request()->is('admin/room_type*') ? "class=active" : null }}>
                        <a href="/admin/room_type/list"><i class="fa fa-fw fa-star"></i> Room Type</a>
                    </li>
                    <li class="{{ request()->is('admin/rooms*') ? 'active' : '' }}">
                        <a href="/admin/rooms/list"><i class="fa fa-fw fa-suitcase"></i> Room</a>
                    </li>
                </ul>
            </li>

            <li class="{{ request()->is('admin/pages*') ? 'active' : '' }}">
                <a href="javascript:;" data-toggle="collapse" data-target="#page"><i class="fa fa-fw fa-arrows-v"></i> Pages <i class="fa fa-fw fa-caret-down"></i></a>
                <ul class="collapse" id="page">
                    <li {{ request()->is('admin/about_us*') ? "class=active" : null }}>
                        <a href="/admin/about_us/1"><i class="fa fa-fw fa-user"></i>About Us</a>
                    </li>
                    <li class="{{ request()->is('admin/rooms*') ? 'active' : '' }}">
                        <a href="/admin/contact_us/list"><i class="fa fa-fw fa-file-text"></i>Contact Us</a>
                    </li>

                </ul>
            </li>

            <li class="{{ request()->is('admin/slider*') ? 'active' : '' }}">
                <a href="/admin/slider/list"><i class="fa fa-fw fa-sliders"></i> Slider</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->

