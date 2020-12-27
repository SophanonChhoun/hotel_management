import VueCkeditor from 'vue-ckeditor2';
import Multiselect from "vue-multiselect";
import SingleSelect from "../components/SingleSelect";

new Vue({
    el: '#createRoomType',
    components: { VueCkeditor, Multiselect, SingleSelect },
    data: {
        data: {
            name: '',
            description: '',
            price: '',
            is_enable: '',
            image: '',
            medias: []
        },
        hotels: hotels,
        is_submit: false,
        error: '',
        error_image: '',
        image: '',
        config: {
            toolbar: [
                ['Bold', 'Italic', 'Underline', 'Strike', 'NumberedList',
                    'BulletedList', 'Indent', 'Outdent', 'Format', 'BGColor', 'TextColor']
            ],
            height: 300
        }
    },
    mounted() {
    },
    methods: {
        submit() {
            this.$validator.validateAll().then((result) => {
                this.is_submit = true
                let save = true;
                if(this.data.medias.length <= 0){
                    this.error_image = 'The Image field is required'
                    save = false;
                }
                this.data.hotel_id = this.data.hotel.id;
                if(result && save) {
                    axios.post('/admin/room_type/create',this.data).then(response => {
                        if(response.data.success){
                            window.location.href = '/admin/room_type/list';
                        }else{
                            console.log(response.data.message);
                            this.error = response.data.message;
                        }
                    });
                } else {
                    window.scrollTo(0, 0)
                }
            })
        },

        uploadImage(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                var img = new Image();
                img.onload = function() {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.image = e.target.result
                    }
                    reader.readAsDataURL(input.files[0])
                }
            }
        },

        uploadAddingImage(index,event) {
            let image = event.target.files[0];
            console.log(event.target.files[0].size)
            let reader = new FileReader();
            reader.readAsDataURL(image);
            reader.onload = event =>{
                Vue.set(this.data.medias[index], 'image', event.target.result)
                this.data[index].error = {
                    image: ''
                };
            }
        },
        addMedias() {
            this.data.medias.push({
                image: '',
                error: {
                    image: ''
                },
                sort: this.data.medias.length + 1,
            });
        },

        removeSlider(index) {
            this.data.medias.splice(index, 1)
            this.data.medias.forEach(function (item, i) {
                item.sort = i + 1
            })
        },

    }
});
