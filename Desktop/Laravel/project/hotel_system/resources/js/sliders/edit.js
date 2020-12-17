
new Vue({
    el: '#editSliders',
    data: {
        data: data,
        test:"test",
        is_submit: false,
        error: '',
    },
    computed: {

    },
    methods: {
        submit() {
            this.$validator.validateAll().then((result) => {
                this.is_submit = true
                let save = true;

                this.data.filter(function(slider)  {
                    if(!slider.image && !slider.media){
                        slider.error.image = "This Image field is required"
                        save = false
                    }else{
                        slider.error.image = ""
                    }
                })
                if(result && save) {
                    axios.post('/admin/slider/update',{
                        "data": this.data
                    }).then(response => {
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
        addSlider() {

            this.data.push({
                image: '',
                is_enable: '',
                error: {
                    image: ''
                },
                sort: this.data.length + 1,
            });
        },

        removeSlider(index) {
            this.data.splice(index, 1)
            this.data.forEach(function (item, i) {
                item.sort = i + 1
            })
        },
        uploadAddingImage(index,event) {
            let image = event.target.files[0];
            console.log(event.target.files[0].size)
            let reader = new FileReader();
            reader.readAsDataURL(image);
            reader.onload = event =>{
                Vue.set(this.data[index], 'image', event.target.result)
                this.data[index].error = {
                    image: ''
                };
            }
        },


    }
});
