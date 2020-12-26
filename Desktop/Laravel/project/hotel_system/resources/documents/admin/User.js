/**
 * @api {get} /api/admin/user/list 1. List User
 * @apiVersion 1.0.0
 * @apiName List User
 * @apiGroup User
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
                "id": 2,
                "user_type_id": null,
                "manager_id": null,
                "first_name": "Sophanith",
                "last_name": "Chhoun",
                "user_name": "sophanith",
                "email": "sophanith.chhoun@codingate.com",
                "gender": "male",
                "phone_number": "086457447",
                "address": "Phnom Penh",
                "is_enable": true,
                "is_resource": false,
                "created_by": 1,
                "updated_by": null,
                "created_at": "2020-04-15 09:08:52",
                "updated_at": "2020-04-15 09:08:52",
                "media": null,
                "roles": [
                    {
                        "id": 1,
                        "name": "Super Admin"
                    }
                ]
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
 * @api {get} /api/admin/user/list/all 2. List All User
 * @apiVersion 1.0.0
 * @apiName List All User
 * @apiGroup User
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
            "first_name": "Codingate",
            "last_name": "Technology",
            "user_name": "Admin"
        }
    ]
 }
 *
 * @apiUse AuthorizationInvalid
 * @apiUse AuthInvalid
 * @apiUse ServerServerError
 */

/**
 * @api {get} /api/admin/user/show/:user_id 3. Show User
 * @apiVersion 1.0.0
 * @apiName Show User
 * @apiGroup User
 *
 * @apiUse GetHeader
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": {
        "id": 2,
        "user_type_id": null,
        "manager_id": null,
        "first_name": "Sophanith",
        "last_name": "Chhoun",
        "user_name": "sophanith",
        "email": "sophanith.chhoun@codingate.com",
        "gender": "male",
        "phone_number": "086457447",
        "address": "Phnom Penh",
        "is_enable": false,
        "is_resource": false,
        "created_by": 1,
        "updated_by": 1,
        "created_at": "2020-04-15 09:08:52",
        "updated_at": "2020-04-15 09:10:08",
        "media": null,
        "roles": [
            {
                "id": 1,
                "name": "Super Admin"
            }
        ]
    }
 }
 *
 * @apiUse AuthorizationInvalid
 * @apiUse AuthInvalid
 * @apiUse NotFound
 * @apiUse ServerServerError
 */

/**
 * @api {post} /api/admin/user/create 4. Create User
 * @apiVersion 1.0.0
 * @apiName Create User
 * @apiGroup User
 *
 * @apiUse PostHeader
 *
 * @apiExample {curl} Example usage:
 {
	"first_name" : "Sophanith",
	"last_name" : "Chhoun",
	"gender" : "male",
	"phone_number" : "086457447",
	"user_name" : "sophanith",
	"email" : "sophanith.chhoun@codingate.com",
	"password" : "123",
	"address" : "Phnom Penh",
	"roles" : [1, 2],
	"is_resource": false,
	"is_enable": true,
	"manager_id": null,
	"user_type_id": null
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
 * @api {post} /api/admin/user/update/:user_id 5. Update User
 * @apiVersion 1.0.0
 * @apiName Update User
 * @apiGroup User
 *
 * @apiUse PostHeader
 *
 * @apiExample {curl} Example usage:
 {
	"first_name" : "Sophanith",
	"last_name" : "Chhoun",
	"gender" : "male",
	"phone_number" : "086457447",
	"user_name" : "sophanith",
	"email" : "sophanith.chhoun@codingate.com",
	"password" : "1234",
	"address" : "Phnom Penh",
	"roles" : [1, 2],
	"is_resource": false,
	"is_enable": true,
	"manager_id": null,
	"user_type_id": null
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
 * @api {post} /api/admin/user/status/:user_id 6. Update User Status
 * @apiVersion 1.0.0
 * @apiName Update User Status
 * @apiGroup User
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
 * @api {post} /api/admin/user/delete/:user_id 7. Delete User
 * @apiVersion 1.0.0
 * @apiName Delete User
 * @apiGroup User
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
