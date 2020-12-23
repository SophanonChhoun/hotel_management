<div class="form-group" :class="{'has-error' : errors.first('name')}">
    <label class="control-label">
        @lang('general.name')
        <span style="color: red">*</span>
    </label>
    <input type="text"
           name="name"
           v-model="data.name"
           data-vv-as="@lang('general.name')"
           v-validate="'required'"
           class="form-control"
           placeholder="Name">

    <span class="help-block">@{{ errors.first('name') }}</span>
</div>

<div class="form-group" :class="{'has-error' : errors.first('street_address')}">
    <label class="control-label">
        @lang('general.street_address')
        <span style="color: red">*</span>
    </label>
    <input type="text"
           name="street_address"
           v-model="data.street_address"
           data-vv-as="@lang('general.street_address')"
           v-validate="'required'"
           class="form-control"
           placeholder="Street Address">
    <span class="help-block">@{{ errors.first('street_address') }}</span>
</div>

<div class="form-group" :class="{'has-error' : errors.first('city')}">
    <label class="control-label">
        @lang('general.city')
        <span style="color: red">*</span>
    </label>
    <input type="text"
           name="city"
           v-model="data.city"
           data-vv-as="@lang('general.city')"
           v-validate="'required'"
           class="form-control"
           placeholder="City">
    <span class="help-block">@{{ errors.first('city') }}</span>
</div>

<div class="form-group" :class="{'has-error' : errors.first('country')}">
    <label class="control-label">
        @lang('general.country')
        <span style="color: red">*</span>
    </label>
    <input type="text"
           name="country"
           v-model="data.country"
           data-vv-as="@lang('general.country')"
           v-validate="'required'"
           class="form-control"
           placeholder="Country">
    <span class="help-block">@{{ errors.first('country') }}</span>
</div>

<div class="form-group" :class="{'has-error' : errors.first('zip')}">
    <label class="control-label">
        @lang('general.zip')
        <span style="color: red">*</span>
    </label>
    <input type="text"
           name="zip"
           v-model="data.zip"
           data-vv-as="@lang('general.zip')"
           v-validate="'required'"
           class="form-control"
           placeholder="Zip">
    <span class="help-block">@{{ errors.first('zip') }}</span>
</div>
<div v-for="(image,index) in data.medias">
    <div class="portlet blue box" >
        <div class="portlet-title">
            <div class="caption"><i class="icon-picture"></i>Slider</div>

            <div class="tools">
                <a href="javascript:;" @click="removeSlider(index)">
                    <i class="fa fa-remove fa-lg" style="color: #ffff"></i>
                </a>
            </div>
        </div>
        <div class="portlet-body">
            <div class="form-group" >
                <label class="control-label col-md-2">Image
                    <span style="color: red">*</span></label>
                <input type="file"
                       class="form-control"
                       placeholder="Image"
                       data-vv-as="Image"
                       :value="null"
                       :name="'image-' + index" data-vv-as="Image"
                       @change="uploadAddingImage(index, $event)"
                >
                {{--                <span class="help-block">@{{ image.error.image }}</span>--}}
            </div>
            <div class="form-group row">
                <div class="col-md-10 col-md-offset-2">
                    <img :src="image.image ? image.image : (image.file_url ? image.file_url : '{{asset('image/noimage.png')}}' )" style='max-width: 300px;max-height: 300px;' class="img-thumbnail">
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <button type="button" class="btn btn-primary" @click="addMedias()">Add Image</button>
    <span class="help-block" style="color: red" >@{{ error_image }}</span>
</div>


<div class="form-group" :class="{'has-error' : errors.first('is_enable')}">
    <label class="control-label">
        @lang('general.status')
        <span style="color: red">*</span>
    </label>
    <input type="checkbox"
           style="margin-left: 2%"
           name="is_enable"
           v-model="data.is_enable"
           data-vv-as="@lang('general.status')"
           v-validate="'required'"
           >
    <span class="help-block">@{{ errors.first('is_enable') }}</span>
</div>

<br>
