/**
 * @api {get} /api/admin/province/list 1. List provinces
 * @apiVersion 1.0.0
 * @apiName List provinces
 * @apiGroup Province
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
                "latitude": "10.9366649",
                "longitude": "104.4728177",
                "is_enable": true,
                "created_at": "2020-08-18 08:12:51",
                "translation": {
                    "province_id": 2,
                    "lang": "en",
                    "name": "Takeo",
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
 * @api {get} /api/admin/province/show/:province_id 2. Show province
 * @apiVersion 1.0.0
 * @apiName Show province
 * @apiGroup Province
 *
 * @apiUse GetHeader
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": {
        "id": 2,
        "latitude": "10.9366649",
        "longitude": "104.4728177",
        "is_enable": true,
        "created_at": "2020-08-18 08:12:51",
        "translations": [
            {
                "province_id": 2,
                "lang": "en",
                "name": "Takeo",
                "description": "description en"
            },
            {
                "province_id": 2,
                "lang": "jp",
                "name": "Takeo jp",
                "description": "description jp"
            },
            {
                "province_id": 2,
                "lang": "km",
                "name": "Takeo km",
                "description": "description km"
            },
            {
                "province_id": 2,
                "lang": "zh",
                "name": "Takeo zh",
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
 * @api {post} /api/admin/province/create 3. Create province
 * @apiVersion 1.0.0
 * @apiName Create province
 * @apiGroup Province
 *
 * @apiUse PostHeader
 * @apiParam {array}  translations                  Transaltions
 * @apiParam {string} translations.name             Name of province
 * @apiParam {string} translations.lang             Language: `en`, `km`, `zh`, `jp`
 * @apiParam {string} [translations.description]    Description of province
 * @apiParam {string} [latitude]                    Latitude of province
 * @apiParam {string} [longitude]                   Longitude of province
 * @apiParam {string} is_enable                     Enable status. Default is `true`
 *
 * @apiExample {curl} Example usage:
 {
	"translations" : [{
		"lang" : "en",
		"name" : "Takeo",
		"description": "description en"
	},{
		"lang" : "km",
		"name" : "Takeo km",
		"description": "description km"
	},{
		"lang" : "zh",
		"name" : "Takeo zh",
		"description": "description zh"
	},{
		"lang" : "jp",
		"name" : "Takeo jp",
		"description": "description jp"
	}],
	"latitude": "10.9366649",
	"longitude": "104.4728177",
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
 * @api {post} /api/admin/province/update/:province_id 4. Update province
 * @apiVersion 1.0.0
 * @apiName Update province
 * @apiGroup Province
 *
 * @apiUse PostHeader
 * @apiParam {array}  translations                  Transaltions
 * @apiParam {string} translations.name             Name of province
 * @apiParam {string} translations.lang             Language: `en`, `km`, `zh`, `jp`
 * @apiParam {string} [translations.description]    Description of province
 * @apiParam {string} [latitude]                    Latitude of province
 * @apiParam {string} [longitude]                   Longitude of province
 * @apiParam {string} is_enable                     Enable status. Default is `true`
 *
 * @apiExample {curl} Example usage:
 {
	"translations" : [{
		"lang" : "en",
		"name" : "Takeo updated",
		"description": "description en"
	},{
		"lang" : "km",
		"name" : "Takeo km updated",
		"description": "description km"
	},{
		"lang" : "zh",
		"name" : "Takeo zh updated",
		"description": "description zh"
	},{
		"lang" : "jp",
		"name" : "Takeo jp updated",
		"description": "description jp updated"
	}],
	"latitude": "10.9366649",
	"longitude": "104.4728177",
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
 * @api {post} /api/admin/province/status/:province_id 5. Update province
 * @apiVersion 1.0.0
 * @apiName Update province
 * @apiGroup Province
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
 * @api {post} /api/admin/province/delete/:province_id 6. Delete province
 * @apiVersion 1.0.0
 * @apiName Delete province
 * @apiGroup Province
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

 /**
 * @api {get} /api/admin/province/list/all 1. List provinces no limit
 * @apiVersion 1.0.0
 * @apiName List provinces no limit
 * @apiGroup Province
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
            "latitude": "10.9366649",
            "longitude": "104.4728177",
            "is_enable": true,
            "created_at": "2020-08-18 08:12:51",
            "translation": {
                "province_id": 2,
                "lang": "en",
                "name": "Takeo",
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
