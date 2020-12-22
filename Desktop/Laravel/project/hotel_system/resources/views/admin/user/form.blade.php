<div class="row">
    <div class="form-group col-lg-6" :class="{'has-error' : errors.first('first_name')}">
        <label class="control-label">
            First Name
            <span style="color: red">*</span>
        </label>
        <input type="text"
               name="first_name"
               v-model="data.first_name"
               data-vv-as="First Name"
               v-validate="'required'"
               class="form-control"
               placeholder="First Name">
        <span class="help-block">@{{ errors.first('first_name') }}</span>
    </div>

    <div class="form-group col-lg-6" :class="{'has-error' : errors.first('last_name')}">
        <label class="control-label">
            Last Name
            <span style="color: red">*</span>
        </label>
        <input type="text"
               name="last_name"
               v-model="data.last_name"
               data-vv-as="Last Name"
               v-validate="'required'"
               class="form-control"
               placeholder="Last Name">
        <span class="help-block">@{{ errors.first('last_name') }}</span>
    </div>

</div>

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

<div class="form-group" :class="{'has-error' : errors.first('phone_number')}">
    <label class="control-label">
        Phone Number
        <span style="color: red">*</span>
    </label>
    <input type="text"
           name="phone_number"
           v-model="data.phone_number"
           data-vv-as="Phone Number"
           v-validate="'required'"
           class="form-control"
           placeholder="Phone Number">
    <span class="help-block">@{{ errors.first('phone_number') }}</span>
</div>

<div class="form-group" :class="{'has-error' : errors.first('email')}">
    <label class="control-label">
        Email
        <span style="color: red">*</span>
    </label>
    <input type="email"
           name="email"
           v-model="data.email"
           data-vv-as="Email"
           v-validate="'required'"
           class="form-control"
           placeholder="Email">
    <span class="help-block">@{{ errors.first('email') }}</span>
</div>

<div class="form-group" :class="{'has-error' : errors.first('password')}">
    <label class="control-label">
        Password
        <span style="color: red">*</span>
    </label>
    <input type="password"
           name="password"
           v-model="data.password"
           data-vv-as="Password"
           v-validate="'required'"
           class="form-control"
           placeholder="password">
    <span class="help-block">@{{ errors.first('password') }}</span>
</div>

<div class="form-group" :class="{'has-error' : error_image}">
    <label class="control-label">
        Profile
        <span style="color: red">*</span>
    </label>
    <img :src="data.image ? data.image : (data.media ? data.media.file_url : '{{asset('image/noimage.png')}}' )"
         style='width: 300px;height: 300px;' class="img-responsive">
    <input type="file" :value="null"  name="adding_image" id="adding_image"
           v-model="data.image"
           placeholder="Image" data-vv-as="Image"
           @change="uploadAddingImage" accept=".png, .jpg">
    <span class="help-block">@{{ error_image }}</span>

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
