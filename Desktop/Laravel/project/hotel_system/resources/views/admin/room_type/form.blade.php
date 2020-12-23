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

<div class="form-group" >
    <label class="control-label">
        Description
    </label>
    <vue-ckeditor
        v-model="data.description"
        v-validate="'required'"
        name="description"
        data-vv-as="Description"
        :config="config"/>
</div>

<div class="form-group" :class="{'has-error' : errors.first('price')}">
    <label class="control-label">
        Price
        <span style="color: red">*</span>
    </label>
    <input type="text"
           name="price"
           v-model="data.price"
           data-vv-as="Price"
           v-validate="'required'"
           class="form-control"
           placeholder="Price">
    <span class="help-block">@{{ errors.first('price') }}</span>
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

<br>
