import SingleSelect from "../components/SingleSelect";
import Multiselect from "vue-multiselect";

new Vue({
    el: '#editRoom',
    components: { SingleSelect, Multiselect },
    data: {
        data: data,
        id: data.id,
        test:[],
        is_submit: false,
        error: '',
        hotels: hotels,
        room_types: room_types
    },
    computed: {

    },
    methods: {
        submit() {
            this.$validator.validateAll().then((result) => {
                this.is_submit = true
                let save = true;

                if(result && save) {
                    axios.post('/admin/rooms/update/'+this.id,{
                        "name": this.data.name,
                        "is_enable": this.data.is_enable,
                        "hotel_id": this.data.hotel.id,
                        "roomType_id": this.data.room_type.id
                    }).then(response => {
                        if(response.data.success){
                            window.location.href = '/admin/rooms/list';
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
                hotel: '',
                roomType: '',
                test: [],
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
