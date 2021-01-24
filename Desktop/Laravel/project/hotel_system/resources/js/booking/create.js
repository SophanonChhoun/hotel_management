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
            customer_type_id: '',
            customer_type: '',
            customer_first_name: '',
            customer_last_name: ''
        },
        is_submit: false,
        error: '',
        totalDate: 0,
        rooms: rooms,
        hotels: hotels,
        customers: customers,
        room_types: room_types,
        payment_types: payment_types,
        booking_types: booking_types,
        room_types_hotel: [],
        error_room: '',
        today : new Date().toISOString().slice(0, 10),
        total: 0,
        customer_type: [
            {
                "id":1,
                "name":"New Customer"
            },
            {
                "id":2,
                "name":"Old Customer"
            }
        ]
    },
    computed: {
        totalAmount() {
            if(this.data.room_id.length > 0)
            {
                var total=0;
                for(var i=0;i<this.data.room_id.length;i++)
                {
                    var price = 0;
                    var room_type_id=_.find(this.rooms, ['id', this.data.room_id[i]]);
                    var room_type =_.find(this.room_types, ['id',room_type_id.roomType_id]);
                    price = room_type.price * this.totalDate;
                    total += price;
                }
                return total;
            }
        }
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
                if(this.data.room_id.length == 0)
                {
                    this.error_room = "Please input room";
                    save = false;
                }
                if(result && save) {
                    axios.post('/admin/bookings/create', {
                        "check_in_date": this.data.check_in_date,
                        "check_out_date": this.data.check_out_date,
                        "customer_id": this.data.customer.id,
                        "booking_type_id": this.data.booking_type.id,
                        "hotel_id": this.data.hotel.id,
                        "payment_type_id": this.data.payment_type.id,
                        "rooms": this.data.room_id,
                        "is_enable": this.data.is_enable,
                        "room_type_id": this.data.room_type_id,
                        "customer_type_id": this.data.customer_type_id,
                        "customer_first_name": this.data.customer_first_name,
                        "customer_last_name": this.data.customer_last_name
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
                }
            }).catch(error => {

            });
        },
        getRoomType(event) {
            const id = event.id;
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
        datediff() {
            var date1 = new Date(this.data.check_in_date);
            var date2 = new Date(this.data.check_out_date);
            var Difference_In_Time = date2.getTime() - date1.getTime();

            var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
            this.totalDate = Difference_In_Days;

        },
        getTypeCustomer(event) {
            this.data.customer_type_id = event.id;
        }
    }
});
