import SingleImageUploader from "../components/SingleImageUploader";
import VueCkeditor from "vue-ckeditor2";
new Vue({
    el: '#createHotel',
    components: {
        SingleImageUploader,
        VueCkeditor
    },
    data: {
        data: {
            name: '',
            street_address: '',
            country: '',
            city: '',
            zip: '',
            is_enable: '',
            description: '',
            medias: [],
        },
        is_submit: false,
        error: '',
        error_description: '',
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
                if(this.data.medias.length <= 0)
                {
                    this.error_image = "The Image field is required";
                    save = false;
                }
                if(!this.data.description)
                {
                    this.error_description = "The Description is required";
                    save = false;
                }else{
                    this.error_description = "";
                }

                if(result && save) {
                    axios.post('/admin/hotel/create',this.data).then(response => {
                       if(response.data.success){
                           window.location.href = '/admin/hotel/list';
                       }else{
                           console.log(response.data.message);
                           this.error = response.data.message;
                       }
                    });
                } else {
                    //set Window location to top
                    window.scrollTo(0, 0)
                }
            })
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
