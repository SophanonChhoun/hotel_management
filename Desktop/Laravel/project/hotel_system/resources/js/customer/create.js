new Vue({
    el: '#CreateCustomer',

    data: {
        data: {
            first_name: '',
            last_name: '',
            email: '',
            password : '',
            confirm_password : '',
            dob: '',
            gender:'',
            identification_id:'',
            phone_number:'',
            street_address: '',
            country: '',
            city: '',
            zip: '',
            is_enable: '',
        },
        is_submit: false,
        error: '',
     
    },
    mounted() {
    },
    methods: {
        submit() {
            this.$validator.validateAll().then((result) => {
                this.is_submit = true
                let save = true;
        
                if(result && save) {
                    axios.post('/admin/customer/create',this.data).then(response => {
                       if(response.data.success){
                           window.location.href = '/admin/customer/list';
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
