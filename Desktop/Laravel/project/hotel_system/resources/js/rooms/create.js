import SingleSelect from "../components/SingleSelect";
import Multiselect from "vue-multiselect";

new Vue({
    el: '#createRoom',
    components: { SingleSelect, Multiselect },
    data: {
        data: [],
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
                this.data = this.data.map(function(data){
                    data = {
                        "name": data.name,
                        "hotel_id": data.hotel.id,
                        "hotel": data.hotel,
                        "is_enable": data.is_enable,
                        "roomType_id": data.roomType.id,
                        "roomType": data.roomType
                    }
                    return data;
                })
                if(result && save) {
                    axios.post('/admin/rooms/create',{
                        "data": this.data
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

        getValue() {
            console.log("Hello")
        }
    }
});
