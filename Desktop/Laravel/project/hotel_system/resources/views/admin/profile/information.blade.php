@extends("admin.profile.index")

@section("content_profile")
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

@endsection
