/**
 * @api {get} /api/admin/property_type/list 1. List Property Type
 * @apiVersion 1.0.0
 * @apiName List Property Type
 * @apiGroup Property Type
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
                "created_at": "2020-08-18 21:42:55",
                "translation": {
                    "property_type_id": 2,
                    "lang": "en",
                    "name": "Property type name en",
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
 * @api {get} /api/admin/property_type/list/all 0. List All Property Type
 * @apiVersion 1.0.0
 * @apiName List All Property Type
 * @apiGroup Property Type
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
            "created_at": "2020-08-18 21:42:55",
            "translation": {
                "property_type_id": 2,
                "lang": "en",
                "name": "Property type name en",
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
 * @api {get} /api/admin/property_type/show/:property_type_id 2. Show Property Type
 * @apiVersion 1.0.0
 * @apiName Show Property Type
 * @apiGroup Property Type
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
        "created_at": "2020-08-18 21:42:55",
        "translations": [
            {
                "property_type_id": 2,
                "lang": "en",
                "name": "Property type name en",
                "description": "description en"
            },
            {
                "property_type_id": 2,
                "lang": "jp",
                "name": "Property type name jp",
                "description": "description jp"
            },
            {
                "property_type_id": 2,
                "lang": "km",
                "name": "Property type name km",
                "description": "description km"
            },
            {
                "property_type_id": 2,
                "lang": "zh",
                "name": "Property type name zh",
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
 * @api {post} /api/admin/property_type/create 3. Create Property Type
 * @apiVersion 1.0.0
 * @apiName Create Property Type
 * @apiGroup Property Type
 *
 * @apiUse PostHeader
 * @apiParam {array}  translations                  Transaltions
 * @apiParam {string} translations.name             Name of property type
 * @apiParam {string} translations.lang             Language: `en`, `km`, `zh`, `jp`
 * @apiParam {string} [translations.description]    Description of property type
 * @apiParam {integer} order                        Sequence order
 * @apiParam {string} is_enable                     Enable status. Default is `true`
 *
 * @apiExample {curl} Example usage:
{
	"translations" : [{
		"lang" : "en",
		"name" : "Property type name en",
		"description": "description en"
	},{
		"lang" : "km",
		"name" : "Property type name km",
		"description": "description km"
	},{
		"lang" : "zh",
		"name" : "Property type name zh",
		"description": "description zh"
	},{
		"lang" : "jp",
		"name" : "Property type name jp",
		"description": "description jp"
	}],
	"order": "1",
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
 * @api {post} /api/admin/property_type/update/:property_type_id 4. Update Property Type
 * @apiVersion 1.0.0
 * @apiName Update Property Type
 * @apiGroup Property Type
 *
 * @apiUse PostHeader
 * @apiParam {array}  translations                  Transaltions
 * @apiParam {string} translations.name             Name of property type
 * @apiParam {string} translations.lang             Language: `en`, `km`, `zh`, `jp`
 * @apiParam {string} [translations.description]    Description of property type
 * @apiParam {integer} order                        Sequence order
 * @apiParam {string} is_enable                     Enable status. Default is `true`
 *
 * @apiExample {curl} Example usage:
{
	"translations" : [{
		"lang" : "en",
		"name" : "Property type name en update",
		"description": "description en"
	},{
		"lang" : "km",
		"name" : "Property type name km",
		"description": "description km"
	},{
		"lang" : "zh",
		"name" : "Property type name zh",
		"description": "description zh"
	},{
		"lang" : "jp",
		"name" : "Property type name jp",
		"description": "description jp"
	}],
	"order": "1",
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
 * @api {post} /api/admin/property_type/status/:property_type_id 5. Update Property Type Status
 * @apiVersion 1.0.0
 * @apiName Update Property Type Status
 * @apiGroup Property Type
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
 * @api {post} /api/admin/property_type/delete/:property_type_id 6. Delete Property Type
 * @apiVersion 1.0.0
 * @apiName Delete Property Type
 * @apiGroup Property Type
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
