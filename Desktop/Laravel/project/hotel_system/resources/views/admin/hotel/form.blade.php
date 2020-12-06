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

<div class="form-group" :class="{'has-error' : errors.first('street_address')}">
    <label class="control-label">
        Street Address
        <span style="color: red">*</span>
    </label>
    <input type="text"
           name="street_address"
           v-model="data.street_address"
           data-vv-as="Street Address"
           v-validate="'required'"
           class="form-control"
           placeholder="Street Address">
    <span class="help-block">@{{ errors.first('street_address') }}</span>
</div>

<div class="form-group" :class="{'has-error' : errors.first('city')}">
    <label class="control-label">
        City
        <span style="color: red">*</span>
    </label>
    <input type="text"
           name="city"
           v-model="data.city"
           data-vv-as="City"
           v-validate="'required'"
           class="form-control"
           placeholder="City">
    <span class="help-block">@{{ errors.first('city') }}</span>
</div>

<div class="form-group" :class="{'has-error' : errors.first('country')}">
    <label class="control-label">
        Country
        <span style="color: red">*</span>
    </label>
    <input type="text"
           name="country"
           v-model="data.country"
           data-vv-as="country"
           v-validate="'required'"
           class="form-control"
           placeholder="Country">
    <span class="help-block">@{{ errors.first('country') }}</span>
</div>

<div class="form-group" :class="{'has-error' : errors.first('zip')}">
    <label class="control-label">
        Zip
        <span style="color: red">*</span>
    </label>
    <input type="text"
           name="zip"
           v-model="data.zip"
           data-vv-as="Zip"
           v-validate="'required'"
           class="form-control"
           placeholder="Zip">
    <span class="help-block">@{{ errors.first('zip') }}</span>
</div>

<div class="form-group" :class="{'has-error' : errors.first('adding_image')}">
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
    <span class="help-block">@{{ errors.first('adding_image') }}</span>

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
