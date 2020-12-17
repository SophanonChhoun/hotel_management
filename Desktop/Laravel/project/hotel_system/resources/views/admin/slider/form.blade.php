<div style="margin-top: 20%"></div>
<div v-for="(slider,index) in data">
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
            <div class="form-group" :class="{'has-error': slider.error.image}">
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
                <span class="help-block">@{{ slider.error.image }}</span>
            </div>
            <div class="form-group row">
                <div class="col-md-10 col-md-offset-2">
                    <img :src="slider.image ? slider.image : (slider.media ? slider.media.file_url : '{{asset('image/noimage.png')}}')" style='max-width: 300px;max-height: 300px;' class="img-thumbnail">
                </div>
            </div>

            <div class="form-group" :class="{'has-error' : errors.first('is_enable'+index)}">
                <label class="control-label">
                    Status
                    <span style="color: red">*</span>
                </label>
                <input type="checkbox"
                       style="margin-left: 2%"
                       :name="'is_enable'+index"
                       v-model="slider.is_enable"
                       data-vv-as="Status"
                       v-validate="'required'"
                >
                <span class="help-block">@{{ errors.first('is_enable'+index) }}</span>
            </div>
        </div>
    </div>
</div>

<div>
    <button type="button" class="btn btn-primary" @click="addSlider()">Add Slider</button>
</div>

<br>

