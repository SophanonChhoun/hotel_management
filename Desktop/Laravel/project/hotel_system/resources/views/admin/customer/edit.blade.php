@extends("admin.layout.default")

@section("style")
    <style>
        .nav li.active > a {
            background-color: #fcba03;
            color: #fff;
        }
        a{
            color: #0c91e5;
        }
    </style>
@endsection
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
                                        <span class="caption-subject font-blue-madison bold uppercase"> Customer Information </span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active">
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="control-label col-md-2">First Name</label>
                                                    <div class="col-md-10">
                                                        <label><b>{{$data->first_name}}</b></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="control-label col-md-2">Last Name</label>
                                                    <div class="col-md-10">
                                                        <label><b>{{$data->last_name}}</b></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="control-label col-md-2">Telephone</label>
                                                    <div class="col-md-10">
                                                        <label><b>{{$data->phone_number}}</b></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="control-label col-md-2">Email</label>
                                                    <div class="col-md-10">
                                                        <label><b>{{$data->email}}</b></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="control-label col-md-2">Status</label>
                                                    <div class="col-md-10">
                                                        <label>
                                                            <div class="form-group"title="Change Status for this Product">
                                                                <label class="mt-checkbox mt-checkbox-outline">
                                                                    <span><?php
                                                                        echo $data->is_enable ? 'Active' : 'Deactivate';
                                                                        ?></span>
                                                                </label>
                                                            </div>
                                                        </label>
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
            </div>
        </div>
    </div>
@endsection
