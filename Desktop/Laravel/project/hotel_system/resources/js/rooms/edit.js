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
        error_roomType: '',
        hotels: hotels,
        room_types: []
    },
    mounted() {
        this.getRoomType(this.data.hotel)
    },
    methods: {
        submit() {
            this.$validator.validateAll().then((result) => {
                this.is_submit = true
                let save = true;
                if(!this.data.roomType_id)
                {
                    this.error_roomType = "The Room Type field is required"
                    save = false;
                }else{
                    this.error_roomType = ""
                }
                if(result && save) {
                    axios.post('/admin/rooms/update/'+this.id,{
                        "name": this.data.name,
                        "is_enable": this.data.is_enable,
                        "hotel_id": this.data.hotel.id,
                        "roomType_id": this.data.roomType_id,
                        "status": this.data.status
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
        getRoomType(event) {
            let id = event.id
            if(!id){
                id=0;
            }
            axios.get(`/admin/hotel/roomType/${id}`).then(response => {
                if (response) {
                    console.log(response.data.data)
                    this.room_types = response.data.data
                } else {
                    hideLoading();
                }
            }).catch(error => {
                hideLoading();
            });
        },

    }
});
