new Vue({
    el: '#createHotel',
    data: {
        data: data,
        id: data.id,
        test: 'Testing',
        is_submit: false,
        error: '',
        image: '',
    },
    mounted() {
    },
    methods: {
        submit() {
            this.$validator.validateAll().then((result) => {
                this.is_submit = true
                let save = true;
                console.log(this.data)
                if(result && save) {
                    axios.post('/admin/hotel/update/'+this.id,this.data).then(response => {
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
        uploadAddingImage(event) {
            let image = event.target.files[0];
            let reader = new FileReader();
            reader.readAsDataURL(image);
            reader.onload = event => {
                Vue.set(this.data, 'image', event.target.result)
            }
        }
    }
});
