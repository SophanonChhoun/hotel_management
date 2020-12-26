/**
 * @api {get} /api/admin/facility_category/list 1. List Facility Category
 * @apiVersion 1.0.0
 * @apiName List Facility Category
 * @apiGroup Facility Category
 *
 * @apiHeader {String} Authorization    Authorize token for requesting API.
 * @apiHeader {String} Auth         Access token.
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
                "order": 1,
                "is_enable": true,
                "created_at": "2020-08-18 10:24:35",
                "translation": {
                    "facility_category_id": 2,
                    "lang": "en",
                    "name": "Facility category name en",
                    "description": "description en"
                }
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
 * @api {get} /api/admin/facility_category/list/all 0. List All Facility Category
 * @apiVersion 1.0.0
 * @apiName List All Facility Category
 * @apiGroup Facility Category
 *
 * @apiHeader {String} Authorization    Authorize token for requesting API.
 * @apiHeader {String} Auth         Access token.
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
    "data": [
        {
            "id": 2,
            "order": 1,
            "is_enable": true,
            "created_at": "2020-08-18 10:24:35",
            "translation": {
                "facility_category_id": 2,
                "lang": "en",
                "name": "Facility category name en",
                "description": "description en"
            }
        }
    ]
}
 *
 * @apiUse AuthorizationInvalid
 * @apiUse AuthInvalid
 * @apiUse ServerServerError
 */

/**
 * @api {get} /api/admin/facility_category/show/:facility_category_id 2. Show Facility Category
 * @apiVersion 1.0.0
 * @apiName Show Facility Category
 * @apiGroup Facility Category
 *
 * @apiUse GetHeader
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": {
        "id": 2,
        "order": 1,
        "is_enable": true,
        "created_at": "2020-08-18 10:24:35",
        "translations": [
            {
                "facility_category_id": 2,
                "lang": "en",
                "name": "Facility category name en",
                "description": "description en"
            },
            {
                "facility_category_id": 2,
                "lang": "jp",
                "name": "Facility category name jp",
                "description": "description jp"
            },
            {
                "facility_category_id": 2,
                "lang": "km",
                "name": "Facility category name km",
                "description": "description km"
            },
            {
                "facility_category_id": 2,
                "lang": "zh",
                "name": "Facility category name zh",
                "description": "description zh"
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
 * @api {post} /api/admin/facility_category/create 3. Create Facility Category
 * @apiVersion 1.0.0
 * @apiName Create Facility Category
 * @apiGroup Facility Category
 *
 * @apiUse PostHeader
 * @apiParam {array}  translations                  Transaltions
 * @apiParam {string} translations.name             Name of command
 * @apiParam {string} translations.lang             Language: `en`, `km`, `zh`, `jp`
 * @apiParam {string} [translations.description]    Description of command
 * @apiParam {integer} order                        Sequence order
 * @apiParam {string} is_enable                     Enable status. Default is `true`
 *
 * @apiExample {curl} Example usage:
{
	"translations" : [{
		"lang" : "en",
		"name" : "Facility category name en",
		"description": "description en"
	},{
		"lang" : "km",
		"name" : "Facility category name km",
		"description": "description km"
	},{
		"lang" : "zh",
		"name" : "Facility category name zh",
		"description": "description zh"
	},{
		"lang" : "jp",
		"name" : "Facility category name jp",
		"description": "description jp"
	}],
	"order": 1,
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
 * @api {post} /api/admin/facility_category/update/:facility_category_id 4. Update Facility Category
 * @apiVersion 1.0.0
 * @apiName Update Facility Category
 * @apiGroup Facility Category
 *
 * @apiUse PostHeader
 * @apiParam {array}  translations                  Transaltions
 * @apiParam {string} translations.name             Name of command
 * @apiParam {string} translations.lang             Language: `en`, `km`, `zh`, `jp`
 * @apiParam {string} [translations.description]    Description of command
 * @apiParam {integer} order                        Sequence order
 * @apiParam {string} is_enable                     Enable status. Default is `true`
 *
 * @apiExample {curl} Example usage:
{
	"translations" : [{
		"lang" : "en",
		"name" : "Facility category name en updated",
		"description": "description en"
	},{
		"lang" : "km",
		"name" : "Facility category name km",
		"description": "description km"
	},{
		"lang" : "zh",
		"name" : "Facility category name zh",
		"description": "description zh"
	},{
		"lang" : "jp",
		"name" : "Facility category name jp",
		"description": "description jp"
	}],
	"order": 1,
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
 * @api {post} /api/admin/facility_category/status/:facility_category_id 5. Update Facility Category Status
 * @apiVersion 1.0.0
 * @apiName Update Facility Category Status
 * @apiGroup Facility Category
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
 * @api {post} /api/admin/facility_category/delete/:facility_category_id 6. Delete Facility Category
 * @apiVersion 1.0.0
 * @apiName Delete Facility Category
 * @apiGroup Facility Category
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
