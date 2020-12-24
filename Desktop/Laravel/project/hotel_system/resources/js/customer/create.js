import Multiselect from "vue-multiselect";
import SingleSelect from "../components/SingleSelect";

new Vue({
    el: '#CreateCustomer',

    data: {
        data: {
            first_name: '',
            last_name: '',
            email: '',
            password : '',
            identification_type: '',
            identification_type_id: '',
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
        identification_type: identification_type,
        is_submit: false,
        error: '',

    },
    components: {SingleSelect,Multiselect},
    mounted() {
    },
    methods: {
        submit() {
            this.$validator.validateAll().then((result) => {
                this.is_submit = true
                let save = true;
                this.data.identification_type_id = this.data.identification_type.id;

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
