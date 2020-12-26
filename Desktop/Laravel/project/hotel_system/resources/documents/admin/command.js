/**
 * @api {get} /api/admin/command/list 1. List commands
 * @apiVersion 1.0.0
 * @apiName List commands
 * @apiGroup Command
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
                "is_enable": true,
                "created_at": "2020-08-18 09:19:49",
                "translation": {
                    "command_id": 2,
                    "lang": "en",
                    "name": "Command name en",
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
 * @api {get} /api/admin/command/show/:command_id 2. Show command
 * @apiVersion 1.0.0
 * @apiName Show command
 * @apiGroup Command
 *
 * @apiUse GetHeader
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": {
        "id": 2,
        "is_enable": true,
        "created_at": "2020-08-18 09:19:49",
        "translations": [
            {
                "command_id": 2,
                "lang": "en",
                "name": "Command name en",
                "description": "description en"
            },
            {
                "command_id": 2,
                "lang": "jp",
                "name": "Command name jp",
                "description": "description jp"
            },
            {
                "command_id": 2,
                "lang": "km",
                "name": "Command name km",
                "description": "description km"
            },
            {
                "command_id": 2,
                "lang": "zh",
                "name": "Command name zh",
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
 * @api {post} /api/admin/command/create 3. Create command
 * @apiVersion 1.0.0
 * @apiName Create command
 * @apiGroup Command
 *
 * @apiUse PostHeader
 * @apiParam {array}  translations                  Transaltions
 * @apiParam {string} translations.name             Name of command
 * @apiParam {string} translations.lang             Language: `en`, `km`, `zh`, `jp`
 * @apiParam {string} [translations.description]    Description of command
 * @apiParam {string} is_enable                     Enable status. Default is `true`
 *
 * @apiExample {curl} Example usage:
 {
	"translations" : [{
		"lang" : "en",
		"name" : "Command name en",
		"description": "description en"
	},{
		"lang" : "km",
		"name" : "Command name km",
		"description": "description km"
	},{
		"lang" : "zh",
		"name" : "Command name zh",
		"description": "description zh"
	},{
		"lang" : "jp",
		"name" : "Command name jp",
		"description": "description jp"
	}],
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
 * @api {post} /api/admin/command/update/:command_id 4. Update command
 * @apiVersion 1.0.0
 * @apiName Update command
 * @apiGroup Command
 *
 * @apiUse PostHeader
 * @apiParam {array}  translations                  Transaltions
 * @apiParam {string} translations.name             Name of command
 * @apiParam {string} translations.lang             Language: `en`, `km`, `zh`, `jp`
 * @apiParam {string} [translations.description]    Description of command
 * @apiParam {string} is_enable                     Enable status. Default is `true`
 *
 * @apiExample {curl} Example usage:
 {
	"translations" : [{
		"lang" : "en",
		"name" : "Command name en updated",
		"description": "description en"
	},{
		"lang" : "km",
		"name" : "Command name km",
		"description": "description km"
	},{
		"lang" : "zh",
		"name" : "Command name zh",
		"description": "description zh"
	},{
		"lang" : "jp",
		"name" : "Command name jp",
		"description": "description jp"
	}],
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
 * @api {post} /api/admin/command/status/:command_id 5. Update command status
 * @apiVersion 1.0.0
 * @apiName Update command status
 * @apiGroup Command
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
 * @api {post} /api/admin/command/delete/:command_id 6. Delete command
 * @apiVersion 1.0.0
 * @apiName Delete command
 * @apiGroup Command
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
 * @api {get} /api/admin/command/list/all 7. List commands no limit
 * @apiVersion 1.0.0
 * @apiName List commands no limit
 * @apiGroup Command
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
            "is_enable": true,
            "created_at": "2020-08-18 09:19:49",
            "translation": {
                "command_id": 2,
                "lang": "en",
                "name": "Command name en",
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
