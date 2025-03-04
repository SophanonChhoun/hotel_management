<div class="col-lg-12">
    <div class="portlet blue box">
        <div class="portlet-title">
            <div class="caption"><i class="icon-picture"></i>Booking</div>

        </div>
        <div class="portlet-body">
            <div class="row">

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('check_in')}">
                    <label class="control-label">
                        Check In
                        <span style="color: red">*</span>
                    </label>
                    <input type="date"
                           name="check_in"
                           v-model="data.check_in_date"
                           data-vv-as="Check in"
                           v-validate="'required'"
                           class="form-control"
                           :min="today"
                    >
                    <span class="help-block">@{{ errors.first('check_in') }}</span>
                </div>


                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('check_out')}">
                    <label class="control-label">
                        Check Out
                        <span style="color: red">*</span>
                    </label>
                    <input type="date"
                           name="check_out"
                           v-model="data.check_out_date"
                           data-vv-as="Check out"
                           v-validate="'required'"
                           class="form-control"
                           :min="minCheckOutDate()"
                    >

                    <span class="help-block">@{{ errors.first('check_out') }}</span>
                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('customer_type')}">
                    <label class="control-label">
                        Customer Type
                        <span style="color: red">*</span>
                    </label>
                    <multiselect :name="'customer_type'"
                                 v-model="data.customer_type"
                                 deselect-label="Can't remove this value"
                                 track-by="name"
                                 label="name"
                                 placeholder="Select one"
                                 :options="customer_type"
                                 data-vv-as="Customer Type"
                                 v-validate="'required'"
                                 :allow-empty="false"
                                 @select="getTypeCustomer"
                    >
                    </multiselect>

                    <span class="help-block">@{{ errors.first('customer_type') }}</span>
                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('fname')}" v-if="data.customer_type_id == 1">
                    <label class="control-label">
                        Customer First Name
                        <span style="color: red">*</span>
                    </label>
                    <input type="text"
                           name="fname"
                           v-model="data.customer_first_name"
                           data-vv-as="Customer First Name"
                           v-validate="'required|alpha'"
                           class="form-control"
                           placeholder="First Name">

                    <span class="help-block">@{{ errors.first('fname') }}</span>

                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('lname')}" v-if="data.customer_type_id == 1">
                    <label class="control-label">
                        Customer Last Name
                        <span style="color: red">*</span>
                    </label>
                    <input type="text"
                           name="lname"
                           v-model="data.customer_last_name"
                           data-vv-as="Customer Last Name"
                           v-validate="'required|alpha'"
                           class="form-control"
                           placeholder="Last Name">

                    <span class="help-block">@{{ errors.first('lname') }}</span>
                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('identification_type')}" v-if="data.customer_type_id == 1">
                    <label class="control-label">
                        Identification Type
                        <span style="color: red">*</span>
                    </label>
                    <multiselect :name="'identification_type'"
                                 v-model="data.customer_identification_type"
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

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('identification_id')}" v-if="data.customer_type_id == 1">
                    <label class="control-label">
                        Identification ID
                        <span style="color: red">*</span>
                    </label>
                    <input type="number"
                           name="identification_id"
                           v-model="data.customer_identification_id"
                           data-vv-as="identification id"
                           v-validate="'required|min:1'"
                           class="form-control"
                           placeholder="Identification ID">
                    <span class="help-block">@{{ errors.first('identification_id') }}</span>
                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('customer')}" v-if="data.customer_type_id == 2">
                    <label class="control-label">
                        Customer
                        <span style="color: red">*</span>
                    </label>
                    <multiselect :name="'customer'"
                                 v-model="data.customer"
                                 deselect-label="Can't remove this value"
                                 track-by="id"
                                 label="name"
                                 placeholder="Select one"
                                 :options="customers"
                                 data-vv-as="Customer"
                                 v-validate="'required'"
                                 :allow-empty="false"
                    >
                    </multiselect>
                    <span class="help-block">@{{ errors.first('customer') }}</span>
                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('booking_type')}">
                    <label class="control-label">
                        Booking Type
                        <span style="color: red">*</span>
                    </label>
                    <multiselect :name="'booking_type'"
                                 v-model="data.booking_type"
                                 deselect-label="Can't remove this value"
                                 track-by="id"
                                 label="name"
                                 placeholder="Select one"
                                 :options="booking_types"
                                 data-vv-as="Booking Type"
                                 v-validate="'required'"
                                 :allow-empty="false">
                    </multiselect>
                    <span class="help-block">@{{ errors.first('booking_type') }}</span>
                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('payment_type')}">
                    <label class="control-label">
                        Payment Type
                        <span style="color: red">*</span>
                    </label>
                    <multiselect :name="'payment_type'"
                                 v-model="data.payment_type"
                                 deselect-label="Can't remove this value"
                                 track-by="id"
                                 label="name"
                                 placeholder="Select one"
                                 :options="payment_types"
                                 data-vv-as="Payment Type"
                                 v-validate="'required'"
                                 :allow-empty="false">
                    </multiselect>
                    <span class="help-block">@{{ errors.first('payment_type') }}</span>
                </div>
                <div v-if="data.check_in_date && data.check_out_date">
                    @{{ getRoom() }}
                    @{{ datediff() }}
                </div>
                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('hotel')}" v-if="data.check_in_date && data.check_out_date">
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
                                 @select="getRoomType"
                                 >
                    </multiselect>
                    <span class="help-block">@{{ errors.first('hotel') }}</span>
                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('room_type')}" v-if="data.check_in_date && data.check_out_date">
                    <label class="control-label">
                        Room Type
                        <span style="color: red">*</span>
                    </label>
                    <multiselect :name="'room_type'"
                                 v-model="data.room_types"
                                 deselect-label="Can't remove this value"
                                 track-by="id"
                                 label="name"
                                 placeholder="Select one"
                                 :options="room_types_hotel"
                                 data-vv-as="Room Type"
                                 v-validate="'required'"
                                 multiple
                                 :allow-empty="true">
                    </multiselect>
                    <span class="help-block">@{{ errors.first('room_type') }}</span>
                    <span class="help-block">@{{ error_room }}</span>
                </div>
                <div v-for="id in data.room_types" class="col-lg-12">
                    <h4>Room @{{ id.name }}  Price: $@{{ id.price }}</h4>
                    <span v-for="room in getRoomById(id)">
                        <label class="mt-checkbox" style="margin-right: 40px">
                            <input type="checkbox" v-model="data.room_id" :value="room.id"> @{{ room.name }}
                            <span></span>
                        </label>
                    </span>
                    <br>
                </div>
                <div class="form-group col-lg-12">
                    <h2 class="control-label" v-if="totalDate">
                        Day amounts: @{{ totalDate }}
                    </h2>
                    <h2 class="control-label" v-if="totalAmount">
                        Total: $ @{{ totalAmount }}
                    </h2>
                </div>

                <div class="form-group col-lg-12" :class="{'has-error' : errors.first('is_enable')}">
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
            </div>

        </div>
    </div>

</div>

<br>
