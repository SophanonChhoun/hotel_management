/**
 * @api {get} /api/admin/privacy/show 1. Show privacy policy
 * @apiVersion 1.0.0
 * @apiName Show privacy policy
 * @apiGroup Privacy policy
 *
 * @apiUse GetHeader
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": {
        "id": 1,
        "translations": [
            {
                "id": 5,
                "privacy_id": 1,
                "description": "Privacy && policy en update",
                "lang": "en"
            },
            {
                "id": 6,
                "privacy_id": 1,
                "description": "Privacy && policy km",
                "lang": "km"
            },
            {
                "id": 7,
                "privacy_id": 1,
                "description": "Privacy && policy zh",
                "lang": "zh"
            },
            {
                "id": 8,
                "privacy_id": 1,
                "description": "Privacy && policy jp",
                "lang": "jp"
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
 * @api {post} /api/admin/privacy/update/:id 2. Update privacy policy
 * @apiVersion 1.0.0
 * @apiName Update privacy policy
 * @apiGroup Privacy policy
 *
 * @apiUse PostHeader
 * @apiParam {array}  translations                Transaltions
 * @apiParam {string} translations.description    Address of branch or location
 * @apiParam {string} translations.lang           Latitude of location
 *
 * @apiExample {curl} Example usage:
 {
	"translations" : [{
		"lang" : "en",
		"description" : "Privacy && policy en update"
	},{
		"lang" : "km",
		"description" : " Privacy && policy km"
	},
	{
		"lang" : "zh",
		"description" : "Privacy && policy zh"
	},
	{
		"lang" : "jp",
		"description" : "Privacy && policy jp"
	}]
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

