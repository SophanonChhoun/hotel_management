new Vue({
    el: '#createHotel',
    data: {
        data: data,
        id: data.id,
        is_submit: false,
        error: '',
        error_image: '',
        image: '',
    },
    mounted() {
    },
    methods: {
        submit() {
            this.$validator.validateAll().then((result) => {
                this.is_submit = true
                let save = true;

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
