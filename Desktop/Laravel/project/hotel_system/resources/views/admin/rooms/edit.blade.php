@extends('admin.layout.default')
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Rooms
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a>
                </li>
                <li>
                    <i class="fa fa-file"></i> <a href="/admin/rooms/list">Rooms</a>
                </li>
                <li class="active">
                    <i class="fa fa-edit"></i>Update Room
                </li>
            </ol>
        </div>
        <div id="editRoom" v-cloak>
            <form action="#" @submit.prevent="submit">
                <div class="portlet-body m-20">

                    <div class="form-group" :class="{'has-error' : errors.first('name')}">
                        <label class="control-label">
                            Name
                            <span style="color: red">*</span>
                        </label>
                        <input type="text"
                               name="name"
                               v-model="data.name"
                               data-vv-as="Name"
                               v-validate="'required'"
                               class="form-control"
                               placeholder="Name">
                        <span class="help-block">@{{ errors.first('name') }}</span>
                    </div>

                    <div class="form-group" :class="{'has-error' : errors.first('hotel')}">
                        <label class="control-label">
                            Hotel
                            <span style="color: red">*</span>
                        </label>
                        <multiselect name="hotel"
                                     v-model="data.hotel"
                                     deselect-label="Can't remove this value"
                                     track-by="name"
                                     label="name"
                                     placeholder="Select one"
                                     :options="hotels"
                                     data-vv-as="Hotel"
                                     v-validate="'required'"
                                     :allow-empty="false">
                        </multiselect>
                        <span class="help-block">@{{ errors.first('hotel') }}</span>
                    </div>

                    <div class="form-group" :class="{'has-error' : errors.first('room_type')}">
                        <label class="control-label">
                            Room Type
                            <span style="color: red">*</span>
                        </label>
                        <multiselect name="room_type"
                                     v-model="data.room_type"
                                     deselect-label="Can't remove this value"
                                     track-by="name"
                                     label="name"
                                     placeholder="Select one"
                                     :options="room_types"
                                     data-vv-as="Room Type"
                                     v-validate="'required'"
                                     :allow-empty="false">
                        </multiselect>
                        <span class="help-block">@{{ errors.first('room_type') }}</span>
                    </div>

                    <div class="form-group" :class="{'has-error' : errors.first('is_enable')}">
                        <label class="control-label">
                            Status
                            <span style="color: red">*</span>
                        </label>
                        <input type="checkbox"
                               style="margin-left: 2%"
                               name="is_enable"
                               v-model="data.is_enable"
                               data-vv-as="Status"
                               v-validate="'required'"
                        >
                        <span class="help-block">@{{ errors.first('is_enable') }}</span>
                    </div>

                    <div class="breadcrumb bg-danger" v-if="error">
                        <p>@{{ error }}</p>
                    </div>
                    <div class="text-right">
                        <button type="submit" id="submit"
                                class="btn btn-success save-cancel">Save</button>
                        <a href="{{ url('admin/room_types/list') }}"
                           class="btn btn-default save-cancel">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section("script")
    <script>
        const data = @json($room);
        const room_types = @json($room_types);
        const hotels = @json($hotels);
    </script>
    <script src="{{ mix('/dist/js/app.js') }}"></script>
    <script src="{{ mix('/dist/js/rooms/edit.js') }}"></script>
@endsection
