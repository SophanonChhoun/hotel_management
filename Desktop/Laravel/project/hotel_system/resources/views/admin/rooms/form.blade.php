<div style="margin-top: 20%"></div>
<div v-for="(room,index) in data">
    <div class="portlet blue box" >
        <div class="portlet-title">
            <div class="caption"><i class="icon-picture"></i>Room</div>

            <div class="tools">
                <a href="javascript:;" @click="removeRoom(index)">
                    <i class="fa fa-remove fa-lg" style="color: #ffff"></i>
                </a>
            </div>
        </div>
        <div class="portlet-body">
            <div class="form-group" :class="{'has-error' : errors.first('name'+index)}">
                <label class="control-label">
                    Name
                    <span style="color: red">*</span>
                </label>
                <input type="text"
                       :name="'name'+index"
                       v-model="room.name"
                       data-vv-as="Name"
                       v-validate="'required'"
                       class="form-control"
                       placeholder="Name">
                <span class="help-block">@{{ errors.first('name'+index) }}</span>
            </div>

            <div class="form-group" :class="{'has-error' : errors.first('hotel'+index)}">
                <label class="control-label">
                    Hotel
                    <span style="color: red">*</span>
                </label>
                <multiselect :name="'hotel'+index"
                             v-model="room.hotel"
                             deselect-label="Can't remove this value"
                             track-by="name"
                             label="name"
                             placeholder="Select one"
                             :options="hotels"
                             data-vv-as="Hotel"
                             v-validate="'required'"
                             :allow-empty="false">
                </multiselect>
                <span class="help-block">@{{ errors.first('hotel'+index) }}</span>
            </div>

            <div class="form-group" :class="{'has-error' : errors.first('room_type'+index)}">
                <label class="control-label">
                    Room Type
                    <span style="color: red">*</span>
                </label>
                <multiselect :name="'room_type'+index"
                             v-model="room.roomType"
                             deselect-label="Can't remove this value"
                             track-by="name"
                             label="name"
                             placeholder="Select one"
                             :options="room_types"
                             data-vv-as="Room Type"
                             v-validate="'required'"
                             :allow-empty="false">
                </multiselect>
                <span class="help-block">@{{ errors.first('room_type'+index) }}</span>
            </div>

            <div class="form-group" :class="{'has-error' : errors.first('is_enable'+index)}">
                <label class="control-label">
                    Status
                    <span style="color: red">*</span>
                </label>
                <input type="checkbox"
                       style="margin-left: 2%"
                       :name="'is_enable'+index"
                       v-model="room.is_enable"
                       data-vv-as="Status"
                       v-validate="'required'"
                >
                <span class="help-block">@{{ errors.first('is_enable'+index) }}</span>
            </div>
        </div>
    </div>
</div>

<div>
    <button type="button" class="btn btn-primary" @click="addRoom()">Add Image</button>
</div>



{{--<div class="form-group" >--}}
{{--    <label class="control-label">--}}
{{--        Description--}}
{{--    </label>--}}
{{--    <vue-ckeditor--}}
{{--        v-model="data.description"--}}
{{--        v-validate="'required'"--}}
{{--        name="description"--}}
{{--        data-vv-as="Description"--}}
{{--        :config="config"/>--}}
{{--</div>--}}

{{--<div class="form-group" :class="{'has-error' : errors.first('price')}">--}}
{{--    <label class="control-label">--}}
{{--        Price--}}
{{--        <span style="color: red">*</span>--}}
{{--    </label>--}}
{{--    <input type="text"--}}
{{--           name="price"--}}
{{--           v-model="data.price"--}}
{{--           data-vv-as="Price"--}}
{{--           v-validate="'required'"--}}
{{--           class="form-control"--}}
{{--           placeholder="Price">--}}
{{--    <span class="help-block">@{{ errors.first('price') }}</span>--}}
{{--</div>--}}

{{--<div class="form-group" :class="{'has-error' : error_image}">--}}
{{--    <label class="control-label">--}}
{{--        Image--}}
{{--        <span style="color: red">*</span>--}}
{{--    </label>--}}
{{--    <img :src="data.image ? data.image : (data.media ? data.media.file_url : '{{asset('image/noimage.png')}}' )"--}}
{{--         style='width: 300px;height: 300px;' class="img-responsive">--}}
{{--    <input type="file" :value="null"  name="adding_image" id="adding_image"--}}
{{--           v-model="data.image"--}}
{{--           placeholder="Image" data-vv-as="Image"--}}
{{--           @change="uploadAddingImage" accept=".png, .jpg">--}}
{{--    <span class="help-block" style="color: darkred">@{{ error_image }}</span>--}}

{{--</div>--}}

{{--<div class="form-group" :class="{'has-error' : errors.first('is_enable')}">--}}
{{--    <label class="control-label">--}}
{{--        Status--}}
{{--        <span style="color: red">*</span>--}}
{{--    </label>--}}
{{--    <input type="checkbox"--}}
{{--           style="margin-left: 2%"--}}
{{--           name="is_enable"--}}
{{--           v-model="data.is_enable"--}}
{{--           data-vv-as="Status"--}}
{{--           v-validate="'required'"--}}
{{--           >--}}
{{--    <span class="help-block">@{{ errors.first('is_enable') }}</span>--}}
{{--</div>--}}

<br>
