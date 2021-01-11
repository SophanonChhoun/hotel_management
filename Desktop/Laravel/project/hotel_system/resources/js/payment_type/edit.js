import SingleSelect from "../components/SingleSelect";
import Multiselect from "vue-multiselect";

new Vue({
    el: '#editPaymentType',
    components: { SingleSelect, Multiselect },
    data: {
        data: data,
        test:[],
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

                if(result && save) {
                    axios.post('/admin/payments_type/update',{
                        "data": this.data
                    }).then(response => {
                        if(response.data.success){
                            window.location.href = '/admin/payments_type/list';
                        }else{
                            this.error = response.data.message;
                        }
                    });
                } else {
                    window.scrollTo(0, 0)
                }
            })
        },
        addRoom() {
            this.data.push({
                name: '',
                is_enable: '',
                sort: this.data.length + 1,
            });
        },

        removeRoom(index) {
            this.data.splice(index, 1)
            this.data.forEach(function (item, i) {
                item.sort = i + 1
            })
        },

    }
});
