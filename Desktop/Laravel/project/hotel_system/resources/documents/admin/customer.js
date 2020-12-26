/**
 * @api {get} /api/admin/customer/list 1. List Customer
 * @apiVersion 1.0.0
 * @apiName List Customer
 * @apiGroup Customer
 *
 * @apiHeader {String} Authorization    Authorize token for requesting API.
 * @apiHeader {String} Auth         Access token.
 * @apiHeader {String} Locale       Prefer Language(en || km). Fallback Language is "en".
 * @apiHeader {String} Accept       application/json => return response as JSON
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
                "id": 1,
                "first_name": "Sophanith",
                "last_name": "Chhoun",
                "email": "testing@codingate.com",
                "gender": "male",
                "phone_number": "012345678",
                "address": "Phnom Penh",
                "is_enable": true,
                "is_none_customer": 1,
                "created_at": "2020-07-11 19:59:05",
                "updated_at": "2020-07-11 20:00:08"
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
 * @api {get} /api/admin/customer/show/:customer_id 2. Show Customer
 * @apiVersion 1.0.0
 * @apiName Show Customer
 * @apiGroup Customer
 *
 * @apiUse GetHeader
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": {
        "id": 1,
        "first_name": "Sophanith",
        "last_name": "Chhoun",
        "email": "testing@codingate.com",
        "gender": "male",
        "phone_number": "012345678",
        "address": "Phnom Penh",
        "is_enable": true,
        "is_none_customer": 1,
        "created_at": "2020-07-11 19:59:05",
        "updated_at": "2020-07-11 19:59:05"
    }
}
 *
 * @apiUse AuthorizationInvalid
 * @apiUse AuthInvalid
 * @apiUse NotFound
 * @apiUse ServerServerError
 */

/**
 * @api {post} /api/admin/customer/create 3. Create Customer
 * @apiVersion 1.0.0
 * @apiName Create Customer
 * @apiGroup Customer
 *
 * @apiUse PostHeader
 *
 * @apiExample {curl} Example usage:
{
	"first_name" : "Sophanith",
	"last_name" : "Chhoun",
	"gender" : "male",
	"phone_number" : "012345678",
	"email" : "testing@codingate.com",
	"password" : "123",
	"address" : "Phnom Penh",
	"is_enable": true
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
 * @api {post} /api/admin/customer/update/:customer_id 4. Update Customer
 * @apiVersion 1.0.0
 * @apiName Update Customer
 * @apiGroup Customer
 *
 * @apiUse PostHeader
 *
 * @apiExample {curl} Example usage:
{
	"first_name" : "Sophanith",
	"last_name" : "Chhoun",
	"gender" : "male",
	"phone_number" : "012345678",
	"email" : "testing@codingate.com",
	"password" : "123",
	"address" : "Phnom Penh",
	"is_enable": true
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
 * @api {post} /api/admin/customer/status/:customer_id 5. Update Customer Status
 * @apiVersion 1.0.0
 * @apiName Update Customer Status
 * @apiGroup Customer
 *
 * @apiUse PostHeader
 *
 * @apiUse ActiveStatusParameter
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
 * @api {post} /api/admin/customer/delete/:customer_id 6. Delete Customer
 * @apiVersion 1.0.0
 * @apiName Delete Customer
 * @apiGroup Customer
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
