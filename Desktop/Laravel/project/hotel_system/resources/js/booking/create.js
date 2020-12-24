import Multiselect from "vue-multiselect";
import SingleSelect from "../components/SingleSelect";

new Vue({
    el: '#createBooking',
    components: {
        Multiselect,
        SingleSelect
    },
    data: {
        data: {
            check_in_date: '',
            check_out_date: '',
            customer: '',
            customer_id: '',
            hotel: '',
            hotel_id: '',
            room_types: [],
            room_type_id: [],
            room_id: [],
            is_enable: '',
            payment_type: '',
            payment_type_id: '',
            booking_type: '',
            booking_type_id: '',
        },
        is_submit: false,
        error: '',
        rooms: rooms,
        hotels: hotels,
        customers: customers,
        room_types: room_types,
        payment_types: payment_types,
        booking_types: booking_types,
        currentDate: currentDate
    },

    mounted() {
    },
    methods: {
        submit() {
            this.$validator.validateAll().then((result) => {
                this.is_submit = true
                let save = true;
                this.data.customer_id = this.data.customer.id;
                this.data.booking_type_id = this.data.booking_type.id;
                this.data.hotel_id = this.data.hotel.id;
                this.data.room_type_id = this.data.room_types.map(roomType => roomType.id);
                console.log(this.data.room_type_id);
                if(result && save) {
                    axios.post('/admin/booking/create', {
                        "check_in_date": this.data.check_in_date,
                        "check_out_date": this.data.check_out_date,
                        "customer_id": this.data.customer.id,
                        "booking_type_id": this.data.booking_type.id,
                        "hotel_id": this.data.hotel.id,
                        "payment_type_id": this.data.payment_type.id,
                        "rooms": this.data.room_id,
                        "is_enable": this.data.is_enable,
                        "room_type_id": this.data.room_type_id
                    }).then(response => {
                        if(response.data.success){
                            window.location.href = '/admin/booking/list';
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
        getRoomById(roomType) {
            const id = roomType.id;
            const room = _.filter(this.rooms, ['roomType_id', id]);
            return _.filter(room, ['hotel_id',this.data.hotel.id]);
        },
    }
});
