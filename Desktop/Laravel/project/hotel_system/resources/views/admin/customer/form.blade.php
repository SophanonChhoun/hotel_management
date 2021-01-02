

<div class="col-md-12">

<div class="row">
    <div class="form-group col-lg-12" :class="{'has-error' : errors.first('fname')}">
        <label class="control-label">
            First Name
            <span style="color: red">*</span>
        </label>
        <input type="text"
               name="first_name"
               v-model="data.first_name"
               data-vv-as="First Name"
               v-validate="'required|alpha'"
               class="form-control"
               placeholder="First Name">

        <span class="help-block">@{{ errors.first('fname') }}</span>

    </div>

    <div class="form-group col-lg-12" :class="{'has-error' : errors.first('lname')}">
        <label class="control-label">
            Last Name
            <span style="color: red">*</span>
        </label>
        <input type="text"
               name="last_name"
               v-model="data.last_name"
               data-vv-as="Last Name"
               v-validate="'required|alpha'"
               class="form-control"
               placeholder="Last Name">

        <span class="help-block">@{{ errors.first('lname') }}</span>
    </div>

    <div class="form-group col-lg-12" :class="{'has-error' : errors.first('email')}">
        <label class="control-label">
            Email
            <span style="color: red">*</span>
        </label>
        <input type="email"
               name="email"
               v-model="data.email"
               data-vv-as="Email"
               v-validate="'required|email'"
               class="form-control"
               placeholder="Email">

               <span style="color:red"  class="help-block">@{{ errors.first('email') }} </span>
</div>
</div>
<div class="row">

    <div class="form-group col-lg-12" :class="{'has-error' : errors.first('password')}">
        <label class="control-label">
            Password
            <span style="color: red">*</span>
        </label>
        <input type="password"
               name="password"
               v-model="data.password"
               data-vv-as="password"
               v-validate="'required|min:6'"
               class="form-control"
               placeholder="password"
               ref="password"
               >

        <span class="help-block">@{{ errors.first('password') }}</span>
    </div>

    <div class="form-group col-lg-12" :class="{'has-error' : errors.first('confirm_password')}">
        <label class="control-label">
            Confirm Password
            <span style="color: red">*</span>
        </label>
        <input type="password"
               name="confirm_password"
               v-model="data.confirm_password"
               data-vv-as="password"
               v-validate="'required|confirmed:password'"
               class="form-control"
               placeholder="Confirm Password">

        <span class="help-block">@{{ errors.first('confirm_password') }}</span>
    </div>


    <div class="form-group col-lg-12" :class="{'has-error' : errors.first('dob')}">
        <label class="control-label">
            Date Of Birth
            <span style="color: red">*</span>
        </label>
        <input type="date"
               name="dob"
               v-model="data.dob"
               data-vv-as="date of birth"
               v-validate="'required'"
               class="form-control"
               value="2000-01-01"
               min="1950-01-01"
               max="2020-01-01"
         >


        <span class="help-block">@{{ errors.first('dob') }}</span>
    </div>

      <div class="form-group form-check col-lg-12">
    <label class="control-label">
        Gender
        <span style="color: red">*</span>
    </label>
    <label class="form-check-label" for="male">Male</label>
        <input
          class="form-check-input"
          type="radio"
          name="gender"
          v-model="data.gender"
          id="male"
          value="m"
          required
        />
        <label class="form-check-label" for="femlae">Female</label>
        <input
        class="form-check-input"
        type="radio"
        name="gender"
        v-model="data.gender"
        id="female"
        value="f"
        required
      />
          <br>
      </div>

</div>

<div class="row">
    <div class="form-group col-lg-12" :class="{'has-error' : errors.first('identification_id')}">
        <label class="control-label">
            Identification ID
            <span style="color: red">*</span>
        </label>
        <input type="number"
               name="identification_id"
               v-model="data.identification_id"
               data-vv-as="identification id"
               v-validate="'required|min:1'"
               class="form-control"
               placeholder="Identification ID">
        <span class="help-block">@{{ errors.first('identification_id') }}</span>
    </div>
    <div class="form-group col-lg-12" :class="{'has-error' : errors.first('identification_type')}">
        <label class="control-label">
            Identification Type
            <span style="color: red">*</span>
        </label>
        <multiselect :name="'identification_type'"
                     v-model="data.identification_type"
                     deselect-label="Can't remove this value"
                     track-by="name"
                     label="name"
                     placeholder="Select one"
                     :options="identification_type"
                     data-vv-as="Identification Type"
                     v-validate="'required'"
                     :allow-empty="false">
        </multiselect>
        <span class="help-block">@{{ errors.first('identification_type') }}</span>
    </div>

    <div class="form-group col-lg-12" :class="{'has-error' : errors.first('phone_number')}">
        <label class="control-label">
            Phone Number
            <span style="color: red">*</span>
        </label>
        <input type="number"
               name="phone_number"
               v-model="data.phone_number"
               data-vv-as="phone number "
               v-validate="'required'"
               class="form-control"
               placeholder="phone number">
        <span class="help-block">@{{ errors.first('phone_number') }}</span>
    </div>
<div class="form-group col-lg-12" :class="{'has-error' : errors.first('street_address')}">
    <label class="control-label">
        Street Address
        <span style="color: red">*</span>
    </label>
    <input type="text"
           name="street_address"
           v-model="data.street_address"
           data-vv-as="Street Address"
           v-validate="'required|'"
           class="form-control"
           placeholder="Street Address">
    <span class="help-block">@{{ errors.first('street_address') }}</span>
</div>

</div>


<div class="row">
<div class="form-group col-lg-12" :class="{'has-error' : errors.first('city')}">
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

<div class="form-group col-lg-12" :class="{'has-error' : errors.first('country')}">
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

<div class="form-group col-lg-12" :class="{'has-error' : errors.first('zip')}">
    <label class="control-label">
        Zip
        <span style="color: red">*</span>
    </label>
    <input type="text"
           name="zip"
           v-model="data.zip"
           data-vv-as="Zip"
           v-validate="'required|max:10'"
           class="form-control"
           placeholder="Zip">
    <span class="help-block">@{{ errors.first('zip') }}</span>
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


