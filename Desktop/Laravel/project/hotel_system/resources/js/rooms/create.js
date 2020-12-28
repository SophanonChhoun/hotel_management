import SingleSelect from "../components/SingleSelect";
import Multiselect from "vue-multiselect";

new Vue({
    el: '#createRoom',
    components: { SingleSelect, Multiselect },
    data: {
        data: {
            name: '',
            hotel_id: '',
            roomType_id: '',
            is_enable: '',
            status: ''
        },
        test:[],
        is_submit: false,
        error: '',
        hotels: hotels,
        error_roomType: '',
        room_types: []
    },
    computed: {

    },
    methods: {
        submit() {
            this.$validator.validateAll().then((result) => {
                this.is_submit = true
                let save = true;
                this.data.hotel_id = this.data.hotel.id;
                if(!this.data.roomType_id)
                {
                    this.error_roomType = "The Room Type field is required"
                    save = false;
                }else{
                    this.error_roomType = ""
                }
                if(result && save) {
                    axios.post('/admin/rooms/create',this.data).then(response => {
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
