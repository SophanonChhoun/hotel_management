import VueCkeditor from "vue-ckeditor2";

new Vue({
    el: '#editAboutUs',
    components: { VueCkeditor },
    data: {
        data: data,
        id: data.id,
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
                if(result && save) {
                    axios.post('/admin/about_us/'+this.id,this.data).then(response => {
                        if(response.data.success){
                            window.location.href = '/admin/about_us/'+this.id;
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
