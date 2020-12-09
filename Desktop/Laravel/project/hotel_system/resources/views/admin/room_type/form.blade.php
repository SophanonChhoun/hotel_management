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

<div class="form-group" :class="{'has-error' : error_image}">
    <label class="control-label">
        Image
        <span style="color: red">*</span>
    </label>
    <img :src="data.image ? data.image : (data.media ? data.media.file_url : '{{asset('image/noimage.png')}}' )"
         style='width: 300px;height: 300px;' class="img-responsive">
    <input type="file" :value="null"  name="adding_image" id="adding_image"
           v-model="data.image"
           placeholder="Image" data-vv-as="Image"
           @change="uploadAddingImage" accept=".png, .jpg">
    <span class="help-block" style="color: darkred">@{{ error_image }}</span>

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
