new Vue({
    el: '#createHotel',
    data: {
        data: {
            name: '',
            street_address: '',
            country: '',
            city: '',
            zip: '',
            is_enable: '',
        },
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
        }
    }
});
