import Multiselect from "vue-multiselect";
import SingleSelect from "../components/SingleSelect";
import VueCkeditor from "vue-ckeditor2";

new Vue({
    el: '#editSliders',
    data: {
        data: data,
        test:"test",
        is_submit: false,
        error: '',
        id: data.id,
        hotels: hotels,
        error_image: '',
        error_description: '',
        config: {
            toolbar: [
                ['Bold', 'Italic', 'Underline', 'Strike', 'NumberedList',
                    'BulletedList', 'Indent', 'Outdent', 'Format', 'BGColor', 'TextColor']
            ],
            height: 300
        },
    },
    components: { Multiselect,VueCkeditor },
    computed: {

    },
    methods: {
        submit() {
            this.$validator.validateAll().then((result) => {
                this.is_submit = true
                let save = true;

                if(!this.data.image && !this.data.media)
                {
                    this.error_image="The Image field is required"
                    save = false
                }else{
                    this.error_image = "";
                }
                this.data.hotel_id = this.data.hotel.id;
                if(result && save) {
                    axios.post('/admin/slider/update/'+this.id,this.data).then(response => {
                        if(response.data.success){
                            window.location.href = '/admin/slider/list';
                        }else{
                            this.error = response.data.message;
                        }
                    });
                } else {
                    window.scrollTo(0, 0)
                }
            })
        },
        uploadAddingImage(event) {
            let image = event.target.files[0];
            let reader = new FileReader();
            reader.readAsDataURL(image);
            reader.onload = event => {
                Vue.set(this.data, 'image', event.target.result)
            }
        },


    }
});
