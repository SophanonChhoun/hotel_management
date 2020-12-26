/**
 * @api {get} /api/admin/property_item/list 1. List Property Item
 * @apiVersion 1.0.0
 * @apiName List Property Item
 * @apiGroup Property Item
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
                "id": 4,
                "property_type_id": 2,
                "order": 1,
                "is_enable": true,
                "created_at": "2020-08-18 22:12:53",
                "translation": {
                    "property_item_id": 4,
                    "lang": "en",
                    "name": "Property item name en",
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
 * @api {get} /api/admin/property_item/show/:property_item_id 2. Show Property Item
 * @apiVersion 1.0.0
 * @apiName Show Property Item
 * @apiGroup Property Item
 *
 * @apiUse GetHeader
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": {
        "id": 4,
        "property_type_id": 2,
        "order": 1,
        "is_enable": true,
        "created_at": "2020-08-18 22:12:53",
        "translations": [
            {
                "property_item_id": 4,
                "lang": "en",
                "name": "Property item name en",
                "description": "description en"
            },
            {
                "property_item_id": 4,
                "lang": "jp",
                "name": "Property item name jp",
                "description": "description jp"
            },
            {
                "property_item_id": 4,
                "lang": "km",
                "name": "Property item name km",
                "description": "description km"
            },
            {
                "property_item_id": 4,
                "lang": "zh",
                "name": "Property item name zh",
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
 * @api {post} /api/admin/property_item/create 3. Create Property Item
 * @apiVersion 1.0.0
 * @apiName Create Property Item
 * @apiGroup Property Item
 *
 * @apiUse PostHeader
 * 
 * @apiParam {integer} property_type_id             Property type id
 * @apiParam {array}  translations                  Transaltions
 * @apiParam {string} translations.name             Name of property item
 * @apiParam {string} translations.lang             Language: `en`, `km`, `zh`, `jp`
 * @apiParam {string} [translations.description]    Description of property item
 * @apiParam {integer} order                        Sequence order
 * @apiParam {string} is_enable                     Enable status. Default is `true`
 *
 * @apiExample {curl} Example usage:
{
	"translations" : [{
		"lang" : "en",
		"name" : "Property item name en",
		"description": "description en"
	},{
		"lang" : "km",
		"name" : "Property item name km",
		"description": "description km"
	},{
		"lang" : "zh",
		"name" : "Property item name zh",
		"description": "description zh"
	},{
		"lang" : "jp",
		"name" : "Property item name jp",
		"description": "description jp"
	}],
	"property_type_id": 2,
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
 * @api {post} /api/admin/property_item/update/:property_item_id 4. Update Property Item
 * @apiVersion 1.0.0
 * @apiName Update Property Item
 * @apiGroup Property Item
 *
 * @apiUse PostHeader
 * 
 * @apiParam {integer} property_type_id             Property type id
 * @apiParam {array}  translations                  Transaltions
 * @apiParam {string} translations.name             Name of property item
 * @apiParam {string} translations.lang             Language: `en`, `km`, `zh`, `jp`
 * @apiParam {string} [translations.description]    Description of property item
 * @apiParam {integer} order                        Sequence order
 * @apiParam {string} is_enable                     Enable status. Default is `true`
 *
 * @apiExample {curl} Example usage:
{
	"translations" : [{
		"lang" : "en",
		"name" : "Property item name en update",
		"description": "description en"
	},{
		"lang" : "km",
		"name" : "Property item name km",
		"description": "description km"
	},{
		"lang" : "zh",
		"name" : "Property item name zh",
		"description": "description zh"
	},{
		"lang" : "jp",
		"name" : "Property item name jp",
		"description": "description jp"
	}],
	"property_type_id": 2,
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
 * @api {post} /api/admin/property_item/status/:property_item_id 5. Update Property Item Status
 * @apiVersion 1.0.0
 * @apiName Update Property Item Status
 * @apiGroup Property Item
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
 * @api {post} /api/admin/property_item/delete/:property_item_id 6. Delete Property Item
 * @apiVersion 1.0.0
 * @apiName Delete Property Item
 * @apiGroup Property Item
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
