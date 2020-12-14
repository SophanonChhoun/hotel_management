<div style="margin-top: 20%"></div>
<div v-for="(identification_type,index) in data">
    <div class="portlet blue box" >
        <div class="portlet-title">
            <div class="caption"><i class="icon-picture"></i>identification_type</div>

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
                       v-model="identification_type.name"
                       data-vv-as="Name"
                       v-validate="'required'"
                       class="form-control"
                       placeholder="Name">
                <span class="help-block">@{{ errors.first('name'+index) }}</span>
            </div>

            <div class="form-group" :class="{'has-error' : errors.first('is_enable'+index)}">
                <label class="control-label">
                    Status
                    <span style="color: red">*</span>
                </label>
                <input type="checkbox"
                       style="margin-left: 2%"
                       :name="'is_enable'+index"
                       v-model="identification_type.is_enable"
                       data-vv-as="Status"
                       v-validate="'required'"
                >
                <span class="help-block">@{{ errors.first('is_enable'+index) }}</span>
            </div>
        </div>
    </div>
</div>

<div>
    <button type="button" class="btn btn-primary" @click="addRoom()">Add Identification Type</button>
</div>

<br>

