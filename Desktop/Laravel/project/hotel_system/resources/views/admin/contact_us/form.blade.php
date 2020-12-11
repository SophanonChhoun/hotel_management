<div class="form-group" :class="{'has-error' : errors.first('title')}">
    <label class="control-label">
        Title
        <span style="color: red">*</span>
    </label>
    <input type="text"
           name="name"
           v-model="data.title"
           data-vv-as="Title"
           v-validate="'required'"
           class="form-control"
           placeholder="Title">

    <span class="help-block">@{{ errors.first('title') }}</span>
</div>

<div class="form-group" :class="{'has-error' : errors.first('address')}">
    <label class="control-label">
        Address
        <span style="color: red">*</span>
    </label>
    <input type="text"
           name="address"
           v-model="data.address"
           data-vv-as="Address"
           v-validate="'required'"
           class="form-control"
           placeholder="Address">
    <span class="help-block">@{{ errors.first('address') }}</span>
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

<div class="form-group" :class="{'has-error' : errors.first('fax')}">
    <label class="control-label">
        Fax
        <span style="color: red">*</span>
    </label>
    <input type="text"
           name="fax"
           v-model="data.fax"
           data-vv-as="Fax"
           v-validate="'required'"
           class="form-control"
           placeholder="Fax">
    <span class="help-block">@{{ errors.first('fax') }}</span>
</div>

<div class="form-group" :class="{'has-error' : errors.first('email')}">
    <label class="control-label">
        Email
        <span style="color: red">*</span>
    </label>
    <input type="text"
           name="email"
           v-model="data.email"
           data-vv-as="Email"
           v-validate="'required'"
           class="form-control"
           placeholder="Email">
    <span class="help-block">@{{ errors.first('email') }}</span>
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
