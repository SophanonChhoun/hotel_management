<div class="col-lg-12">
    <div class="portlet blue box" >
        <div class="portlet-title">
            <div class="caption"><i class="icon-picture"></i>Slider</div>

        </div>
        <div class="portlet-body">
            <div class="form-group" :class="{'has-error' : errors.first('caption')}">
                <label class="control-label">
                    Caption
                    <span style="color: red">*</span>
                </label>
                <input type="text"
                       name="caption"
                       v-model="data.caption"
                       data-vv-as="Caption"
                       v-validate="'required'"
                       class="form-control"
                       placeholder="Caption">
                <span class="help-block">@{{ errors.first('caption') }}</span>
            </div>

            <div class="form-group" :class="{'has-error' : errors.first('title')}">
                <label class="control-label">
                    Title
                    <span style="color: red">*</span>
                </label>
                <input type="text"
                       name="title"
                       v-model="data.title"
                       data-vv-as="Caption"
                       v-validate="'required'"
                       class="form-control"
                       placeholder="Title">
                <span class="help-block">@{{ errors.first('caption') }}</span>
            </div>
            <div class="form-group" :class="{'has-error' : error_description}">
                <label class="control-label">
                    Description
                    <span style="color: red">*</span>
                </label>

                <vue-ckeditor
                    v-model="data.description"
                    v-validate="'required'"
                    name="description"
                    data-vv-as="Description"
                    :config="config"/>
                <br>
            </div>
            <span class="help-block" style="color: #a94442">@{{ error_description }}</span>
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
                             v-validate="'required'"
                             :allow-empty="false">
                </multiselect>
                <span class="help-block">@{{ errors.first('hotel') }}</span>
            </div>


            <div class="form-group" :class="{'has-error' : error_image}">
                <label class="control-label">
                    Image
                    <span style="color: red">*</span>
                </label>
                <br>
                <img :src="data.image ? data.image : (data.media ? data.media.file_url : '{{asset('image/noimage.png')}}' )"
                     style='width: 300px;height: 300px;' class="img-responsive">
                <br>
                <input type="file" :value="null"  name="adding_image" id="adding_image"
                       v-model="data.image"
                       placeholder="Image" data-vv-as="Image"
                       accept=".png, .jpg"
                       v-on:change="uploadAddingImage"
                >
                <span class="help-block" v-if="error_image">@{{ error_image }}</span>

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
        </div>
    </div>

</div>


<br>

