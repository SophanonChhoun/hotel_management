/**
 * @api {get} /api/admin/advertisement/list 1. List Advertisement
 * @apiVersion 1.0.0
 * @apiName List Advertisement
 * @apiGroup Advertisement
 *
 * @apiUse GetHeader
 *
 * @apiUse DefaultListParameter
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": {
        "list": [
            {
                "id": 9,
                "position": "center",
                "start_date": "2020-10-18",
                "end_date": "2020-10-19",
                "price": "200.10",
                "is_enable": false,
                "image": "http://127.0.0.1:8081/uploads/images/ccbf5c8fed53bd3ecd5e5018bed0cc6a.png"
            }
        ],
        "total": 1
    }
}
 *
 * @apiUse AuthorizationInvalid
 * @apiUse AuthInvalid
 * @apiUse ServerServerError
 */

/**
 * @api {get} /api/admin/advertisement/show/:advertisement_id 2. Show Advertisement
 * @apiVersion 1.0.0
 * @apiName Show Advertisement
 * @apiGroup Advertisement
 *
 * @apiUse GetHeader
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": {
        "id": 1,
        "position": "right",
        "price": "200.10",
        "start_date": "2020-10-18",
        "end_date": "2020-10-19",
        "is_enable": false,
        "description": "Hello World",
        "media_id": 73,
        "created_at": "2020-10-16 10:51:05",
        "media": {
            "file_url": "http://127.0.0.1:8081/uploads/images/8c92842d58a0635b6c2643a9d4f4ba32.png",
            "file_name": "8c92842d58a0635b6c2643a9d4f4ba32.png",
            "file_type": "image",
            "size": "original"
        }
    }
}
 *
 * @apiUse AuthorizationInvalid
 * @apiUse AuthInvalid
 * @apiUse NotFound
 * @apiUse ServerServerError
 */

/**
 * @api {post} /api/admin/advertisement/store 3. Create Advertisement
 * @apiVersion 1.0.0
 * @apiName Create Advertisement
 * @apiGroup Advertisement
 *
 * @apiUse PostHeader
 * @apiParam {decimal} price                        Price of advertisement
 * @apiParam {date}  start_date                     Start date of advertisement
 * @apiParam {date}  end_date                     End date of advertisement
 * @apiParam {string} position                    Position of advertisement
 * @apiParam {string} description                 Description of advertisement
 * @apiParam {Base64} image                       Image of advertisement
 *
 * @apiExample {curl} Example usage:
 {
    "success": true,
    "data": "The Advertisement was created."
}
 *
 * @apiUse DefaultPoseSuccessExampleResponse
 *
 * @apiUse AuthorizationInvalid
 * @apiUse AuthInvalid
 * @apiUse ErrorValidation
 * @apiUse ServerServerError
 */

/**
 * @api {post} /api/admin/advertisement/update/:advertisement_id 4. Update Advertisement
 * @apiVersion 1.0.0
 * @apiName Update Advertisement
 * @apiGroup Advertisement
 *
 * @apiUse PostHeader
 * @apiParam {decimal} price                        Price of advertisement
 * @apiParam {date}  start_date                     Start date of advertisement
 * @apiParam {date}  end_date                     End date of advertisement
 * @apiParam {string} position                    Position of advertisement
 * @apiParam {string} description                 Description of advertisement
 * @apiParam {Base64} image                       Image of advertisement
 *
 * @apiExample {curl} Example usage:
 {
    "success": false,
    "message": "The Advertisement is not found."
}
 *
 * @apiUse DefaultPoseSuccessExampleResponse
 *
 * @apiUse AuthorizationInvalid
 * @apiUse AuthInvalid
 * @apiUse NotFound
 * @apiUse ErrorValidation
 * @apiUse ServerServerError
 */

/**
 * @api {post} /api/admin/advertisement/destroy/:advertisement_id 6. Delete Advertisement
 * @apiVersion 1.0.0
 * @apiName Delete Advertisement
 * @apiGroup Advertisement
 *
 * @apiUse PostHeader
 *
 * @apiUse DefaultPoseSuccessExampleResponse
 *
 * @apiUse AuthorizationInvalid
 * @apiUse AuthInvalid
 * @apiUse NotFound
 * @apiUse ServerServerError
 */
