@extends("admin.layout.default")

@section("content")
<div class="page-content">
    <div class="page-head">
        <div class="page-title">
            <h1>Profile</h1>
        </div>
    </div>
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="/admin/dashboard">Dashboard</a>

        </li>
        <li>
            <span class="active">Profile</span>
        </li>
    </ul>

    <div class="row" id="profile" vc>
        <div class="col-md-12">
            <div class="profile-sidebar col-md-4">
                <div class="portlet light profile-sidebar-portlet bordered text-center">
                    <div class="profile-userpic">
                        <img src="{{  $data->media ? $data->media->file_url ? $data->media->file_url : 'https://tracker.moodle.org/secure/attachment/30912/f3.png' : 'https://tracker.moodle.org/secure/attachment/30912/f3.png'  }}"
                             class="img-responsive img-circle center-block"
                             style="width: 200px; height: 200px;">
                    </div>
                    <div class="profile-user-title " >
                        <div class="profile-user-title-name"> <h3 class="bold">{{ $data->name }}</h3> </div>
                        <div class="profile-user-title-job"> <h4>{{ $data->email }}</h4> </div>
                    </div>
                    <div class="profile-user-menu">
                        <ul class="nav">
                            <li class="{{ request()->is('admin/profile/show') ? 'active' : '' }}">
                                <a href="/admin/profile/show" >
                                    <i class="icon-settings"></i>Personal Information</a>
                            </li>

                            <li class="{{ request()->is('/admin/profile/avatar') ? 'active' : '' }}">
                                <a href="/admin/profile/change/avatar" >
                                    <i class="icon-user"></i>Change profile</a>
                            </li>

                            <li class="{{ request()->is('/admin/profile/password') ? 'active' : '' }}">
                                <a href="/admin/profile/change/password">
                                    <i class="icon-key"></i>Change Password</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="profile-content col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light bordered">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase"> User Information </span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <div class="tab-pane active">
                                        @yield("content_profile")
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
