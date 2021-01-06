<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"> </span>
    </button>
    <a class="navbar-brand" href="index.html">SSB</a>

</div>
<!-- Top Menu Items -->
<ul class="nav navbar-right top-nav">

{{--    <li class="dropdown">--}}
{{--        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>--}}
{{--        <ul class="dropdown-menu message-dropdown">--}}
{{--            <li class="message-preview">--}}
{{--                <a href="#">--}}
{{--                    <div class="media">--}}
{{--                                    <span class="pull-left">--}}
{{--                                        <img class="media-object" src="http://placehold.it/50x50" alt="">--}}
{{--                                    </span>--}}
{{--                        <div class="media-body">--}}
{{--                            <h5 class="media-heading">--}}
{{--                                <strong></strong>--}}
{{--                            </h5>--}}
{{--                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetur...</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="message-preview">--}}
{{--                <a href="#">--}}
{{--                    <div class="media">--}}
{{--                                    <span class="pull-left">--}}
{{--                                        <img class="media-object" src="http://placehold.it/50x50" alt="">--}}
{{--                                    </span>--}}
{{--                        <div class="media-body">--}}
{{--                            <h5 class="media-heading">--}}
{{--                                <strong>John Smith</strong>--}}
{{--                            </h5>--}}
{{--                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetur...</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="message-preview">--}}
{{--                <a href="#">--}}
{{--                    <div class="media">--}}
{{--                                    <span class="pull-left">--}}
{{--                                        <img class="media-object" src="http://placehold.it/50x50" alt="">--}}
{{--                                    </span>--}}
{{--                        <div class="media-body">--}}
{{--                            <h5 class="media-heading">--}}
{{--                                <strong>John Smith</strong>--}}
{{--                            </h5>--}}
{{--                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetur...</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="message-footer">--}}
{{--                <a href="#">Read All New Messages</a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </li>--}}
{{--    <li class="dropdown">--}}
{{--        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>--}}
{{--        <ul class="dropdown-menu alert-dropdown">--}}
{{--            <li>--}}
{{--                <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>--}}
{{--            </li>--}}
{{--            <li class="divider"></li>--}}
           <li>
               <a href="#" style="color:white;"></span>
                <span id="day"></span></a>
   </li>
   <li><a href="#" style="color:white;"><span id="time"></a></li>
{{--        </ul>--}}
{{--    </li>--}}

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




<script>
  function time(){
    var date = new Date();
    var time = date.toLocaleTimeString();
    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    var day = date.toLocaleDateString('en-US',options);
    document.getElementById('time').innerHTML = time;
    document.getElementById('day').innerHTML = day;
  }
  setInterval(function(){
    time();
  },1000);
</script>
