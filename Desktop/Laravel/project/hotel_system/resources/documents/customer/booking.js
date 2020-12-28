/**
 * @api {get} /api/bookings 1. List Booking
 * @apiVersion 1.0.0
 * @apiName List Booking
 * @apiGroup Booking
 *
 * @apiUse GetHeader
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": [
        {
            "id": 1,
            "checkInDate": "2020-12-24",
            "checkOutDate": "2020-12-31",
            "hotel": {
                "id": 1,
                "name": "Siem Reap hotel",
                "street_address": "193",
                "city": "Siem Reap",
                "country": "Cambodia",
                "zip": "855"
            },
            "roomType": []
        },
        {
            "id": 2,
            "checkInDate": "2020-12-24",
            "checkOutDate": "2020-12-30",
            "hotel": {
                "id": 1,
                "name": "Siem Reap hotel",
                "street_address": "193",
                "city": "Siem Reap",
                "country": "Cambodia",
                "zip": "855"
            },
            "roomType": [
                {
                    "name": "Hello",
                    "images": [
                        {
                            "imageSrc": "http://127.0.0.1:8000/uploads/images/87723d9333ee51f22284240da5191904.png",
                            "imageAlt": "image"
                        },
                        {
                            "imageSrc": "http://127.0.0.1:8000/uploads/images/15ef9d0e6e01ec0c99ce5e09238dd8f8.png",
                            "imageAlt": "image"
                        },
                        {
                            "imageSrc": "http://127.0.0.1:8000/uploads/images/74c8c2144d2186bed7788c9a4541767e.png",
                            "imageAlt": "image"
                        }
                    ]
                },
            ]
        }
    ]
}
 *
 * @apiUse NotFound
 * @apiUse ServerServerError
 * @apiUse AuthInvalid
 */

/**
 * @api {get} /api/booking/stay 2. Book a stay
 * @apiVersion 1.0.0
 * @apiName Book a stay
 * @apiGroup Booking
 *
 * @apiUse GetHeaderWithoutAuth
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": {
        "hotels": [
            {
                "id": 1,
                "name": "Siem Reap hotel"
            },
            {
                "id": 2,
                "name": "Phnom Penh Hotel"
            },
            {
                "id": 3,
                "name": "Borey Angkor"
            },
            {
                "id": 4,
                "name": "Borey Angkor"
            }
        ]
    }
}
 *
 * @apiUse NotFound
 * @apiUse ServerServerError
 */

/**
 * @api {get} /api/booking-offers 3. Booking Offer
 * @apiVersion 1.0.0
 * @apiName Booking Offer
 * @apiGroup Booking
 *
 * @apiUse GetHeaderWithoutAuth
 *
 * @apiParam {integer} hotel_id         Hotel Id
 * @apiParam {date} checkInDate         Check in
 * @apiParam {date} checkOutDate        Check out
 * @apiParam {integer} people           People
 *
 * @apiExample {curl} Example usage:
{
    "checkOutDate": "2020-12-28",
    "checkInDate": "2020-12-25",
    "hotel_id": 2,
    "people": 2
}
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": {
        "hotel_id": 2,
        "rooms": [
            {
                "id": 12,
                "name": "14",
                "roomType": {
                    "id": 17,
                    "name": "Borey Jr"
                }
            }
        ],
        "paymentType": [
            {
                "id": 1,
                "name": "Visa card"
            }
        ]
    }
}
 *
 * @apiUse NotFound
 * @apiUse ServerServerError
 */


/**
 * @api {get} /api/booking/store 4. Booking Store
 * @apiVersion 1.0.0
 * @apiName Booking Store
 * @apiGroup Booking
 *
 * @apiUse PostHeader
 *
 * @apiParam {integer} hotel_id         Hotel Id
 * @apiParam {integer} payment_type_id  Payment Type Id
 * @apiParam {date} check_in_date    Check In
 * @apiParam {date} check_out_date   Check Out
 * @apiParam {array} rooms            Room IDs
 * @apiParam {array} room_types_id            Room Type IDs
 *
 * @apiExample {curl} Example usage:
 {
    "rooms" : [
        1
    ],
    "check_in_date" : "2020-12-30",
    "check_out_date" : "2021-01-05",
    "room_types_id" : [
        13
    ],
    "payment_type_id" : 1,
    "hotel_id": 1
 }
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": "Booking successful"
 }
 *
 * @apiUse NotFound
 * @apiUse ServerServerError
 */
