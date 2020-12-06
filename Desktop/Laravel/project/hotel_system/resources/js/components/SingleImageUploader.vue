<template>
    <div>
        <img id="thumb-image"
             :width="pw"
             :height="ph"
             :src="value ? value :  (image ? image : defaultImage)"
             alt=""/>
        <br/>
        <label class="mediasize">
            {{ $t('general.maximum_size', {size: size}) }}
            <br/>
            {{ $t('general.dimensions_size', {width: pw, height: ph}) }}
        </label>
        <br  v-if="!isDisable">
        <div class="btn default btn-file" v-if="!isDisable">
            <span> {{ $t('general.click_to_choose') }} </span>
            <input type="file"
                   name="image"
                   :data-size="size"
                   :data-width="pw"
                   :data-height="ph"
                   accept=".jpg,.png"
                   @change="uploadImage">
        </div>
    </div>
</template>

<script>
    export default {
        name: "SingleImageUploader",

        data: function () {
            return {

            }
        },

        props: {
            image: {},
            value: {},
            size: {},
            pw: {},
            ph: {},
            defaultImage: {},
            isDisable: {
                type: Boolean,
                default: false,
            },
        },

        methods: {
            uploadImage(event) {
                const defaultSize = $(event.target).data('size');
                const that = this
                const input = event.target;
                var width = $(input).data('width');
                var height = $(input).data('height');

                if (input.files && input.files[0]) {
                    const size = input.files[0].size / 1024 / 1024
                    if (size < defaultSize) {
                        var img = new Image();
                        img.onload = function(e) {
                            if (this.width != width || this.height != height) {
                                $.dialog({
                                    title: 'Image Size',
                                    content: 'Image size must be ' + width + 'x' + height
                                });
                            } else {
                                var reader = new FileReader()
                                reader.onload = (e) => {
                                    that.$emit('input', e.target.result)
                                }
                                reader.readAsDataURL(input.files[0])
                            }
                        };
                        img.src = URL.createObjectURL(input.files[0]);
                    } else {
                        $.dialog({
                            title: this.label + ' Size',
                            content: `${this.label} size must be less than  ${defaultSize}  MB`
                        });
                    }
                }
            }
        }
    }
</script>

<style scoped>

</style>
