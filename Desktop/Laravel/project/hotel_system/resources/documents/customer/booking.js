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
 * @api {get} /api/hotel/show/:id 2. Show hotel
 * @apiVersion 1.0.0
 * @apiName show hotel
 * @apiGroup Hotel
 *
 * @apiUse GetHeaderWithoutAuth
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": {
        "id": 1,
        "title": "Siem Reap hotel",
        "street_address": "193",
        "city": "Siem Reap",
        "country": "Cambodia",
        "description": "<p>Hello World</p>",
        "medias": [
            {
                "imageSrc": "http://127.0.0.1:8000/uploads/images/5df240b2530816bd2bfae92d7942609c.png",
                "imageAlt": "image"
            }
        ]
    }
}
 *
 * @apiUse NotFound
 * @apiUse ServerServerError
 */
