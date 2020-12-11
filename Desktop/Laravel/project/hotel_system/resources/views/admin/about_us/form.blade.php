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
