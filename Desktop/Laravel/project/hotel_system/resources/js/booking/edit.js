import Multiselect from "vue-multiselect";
import SingleSelect from "../components/SingleSelect";

new Vue({
    el: '#editBooking',
    components: {
        Multiselect,
        SingleSelect
    },
    data: {
        data: data,
        is_submit: false,
        error: '',
        rooms: rooms,
        hotels: hotels,
        customers: customers,
        room_types: room_types,
        payment_types: payment_types,
        booking_types: booking_types,
        error_room: '',
        room_types_hotel: [],
        currentDate: currentDate,
        today : new Date().toISOString().slice(0, 10),
    },

    mounted() {
        this.getRoomTypeDefault();
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

                if(result && save) {
                    axios.post('/admin/bookings/update/'+this.data.id, {
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
                            window.location.href = '/admin/bookings/list';
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
        getRoom() {
            axios.post(`/admin/bookings/getRoom`,this.data).then(response => {
                if (response) {
                    this.rooms = response.data.data;
                } else {
                    alert(response.data.data);
                    hideLoading();
                }
            }).catch(error => {

                hideLoading();
            });
        },
        getRoomType(event) {
            const id = event.id;
            this.room_types_hotel = _.filter(this.room_types,['hotel_id',id]);
        },
        getRoomTypeDefault() {
            const id = this.data.hotel_id;
            this.room_types_hotel = _.filter(this.room_types,['hotel_id',id]);
        },
        minCheckOutDate() {
            if(typeof this.data.check_in_date == 'string' && this.data.check_in_date !== '')
            {
                const checkInDate = Date.parse(this.data.check_in_date);
                return new Date(checkInDate + 1 * 24 * 60 * 60 * 1000)
                    .toISOString()
                    .slice(0, 10);
            }
        },
    }
});
