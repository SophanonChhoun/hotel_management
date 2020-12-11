new Vue({
    el: '#createContactUs',

    data: {
        data: {
            is_enable: '',
            address: '',
            phone_number: '',
            fax: '',
            email: '',
            title: '',
        },
        error: '',
        is_submit: false,
    },
    mounted() {
    },
    methods: {
        submit() {
            this.$validator.validateAll().then((result) => {
                this.is_submit = true
                let save = true;

                if(result && save) {
                    axios.post('/admin/contact_us/create',this.data).then(response => {
                       if(response.data.success){
                           window.location.href = '/admin/contact_us/list';
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
    }
});
