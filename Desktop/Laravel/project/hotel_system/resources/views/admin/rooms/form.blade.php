<div class="col-lg-12">
    <div class="portlet blue box" >
        <div class="portlet-title">
            <div class="caption"><i class="icon-picture"></i>Room</div>

        </div>
        <div class="portlet-body">
            <div class="form-group" :class="{'has-error' : errors.first('name')}">
                <label class="control-label">
                    Name
                    <span style="color: red">*</span>
                </label>
                <input type="text"
                       :name="'name'"
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
                <multiselect :name="'hotel'"
                             v-model="data.hotel"
                             deselect-label="Can't remove this value"
                             track-by="id"
                             label="name"
                             placeholder="Select one"
                             :options="hotels"
                             data-vv-as="Hotel"
                             @select="getRoomType"
                             v-validate="'required'"
                             :allow-empty="true">
                </multiselect>
                <span class="help-block">@{{ errors.first('hotel') }}</span>
            </div>

            <div class="form-group row" v-if="data.hotel" :class="{'has-error' : error_roomType }">
                <div class="col-md-12">
                    <label class="control-label">
                        Room Type <span style="color: red">*</span>
                    </label>
                    <div class="mt-checkbox-inline" v-for="(room_type, index) in room_types">
                        <label class="mt-checkbox">
                            <input type="radio" :name="'room_type'" v-model="data.roomType_id" :value="room_type.id"> @{{room_type.name}}
                            <span></span>
                        </label>
                        <span class="help-block">@{{ error_roomType }}</span>
                    </div>

                    <p class="text-center text-danger" v-if="room_types == 0">No data</p>
                </div>
            </div>

            <div class="form-group" :class="{'has-error' : errors.first('is_enable')}">
                <label class="control-label">
                    Available
                    <span style="color: red">*</span>
                </label>
                <input type="checkbox"
                       style="margin-left: 2%"
                       :name="'is_enable'"
                       v-model="data.is_enable"
                       data-vv-as="Available"
                       v-validate="'required'"
                >
                <span class="help-block">@{{ errors.first('is_enable') }}</span>
            </div>
            <div class="form-group" :class="{'has-error' : errors.first('status')}">
                <label class="control-label">
                    Status
                    <span style="color: red">*</span>
                </label>
                <input type="checkbox"
                       style="margin-left: 2%"
                       :name="'status'"
                       v-model="data.status"
                       data-vv-as="Status"
                       v-validate="'required'"
                >
                <span class="help-block">@{{ errors.first('status') }}</span>
            </div>
        </div>
    </div>

</div>
