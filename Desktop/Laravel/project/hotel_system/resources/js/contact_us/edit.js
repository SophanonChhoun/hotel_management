new Vue({
    el: '#editContactUs',
    data: {
        data: data,
        id: data.id,
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
                    axios.post('/admin/contact_us/update/'+this.id,this.data).then(response => {
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
