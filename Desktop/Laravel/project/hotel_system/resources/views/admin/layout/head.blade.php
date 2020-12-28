<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.html">SSB</a>
</div>
<!-- Top Menu Items -->
<ul class="nav navbar-right top-nav">

    <li>
        <a href="#" style="color:white;"></span>
            <span id="day"></span></a>
    </li>
    <li><a href="#" style="color:white;"><span id="time"></a></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ auth()->user()->name }} <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>
                <a href="{{ url('admin/profile/show') }}"><i class="fa fa-fw fa-user"></i> Profile</a>
            </li>
{{--            <li>--}}
{{--                <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>--}}
{{--            </li>--}}
            <li>
                <a href="{{ url('admin/user/show/'.auth()->user()->id) }}"><i class="fa fa-fw fa-gear"></i> Settings</a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="/admin/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
            </li>
        </ul>
    </li>
</ul>

