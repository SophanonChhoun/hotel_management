/**
 * @api {get} /api/admin/faq/list 1. List Faq
 * @apiVersion 1.0.0
 * @apiName List Faq
 * @apiGroup Faq
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
                "id": 3,
                "order": 1,
                "is_enable": true,
                "created_at": "2020-08-18 11:40:01",
                "translation": {
                    "faq_id": 3,
                    "lang": "en",
                    "question": "Question en?",
                    "answer": "Answer en"
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
 * @api {get} /api/admin/faq/show/:faq_id 2. Show Faq
 * @apiVersion 1.0.0
 * @apiName Show Faq
 * @apiGroup Faq
 *
 * @apiUse GetHeader
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": {
        "id": 3,
        "order": 1,
        "is_enable": true,
        "created_at": "2020-08-18 11:40:01",
        "translations": [
            {
                "faq_id": 3,
                "lang": "en",
                "question": "Question en?",
                "answer": "Answer en"
            },
            {
                "faq_id": 3,
                "lang": "jp",
                "question": "Question jp?",
                "answer": "Answer jp"
            },
            {
                "faq_id": 3,
                "lang": "km",
                "question": "Question km?",
                "answer": "Answer km"
            },
            {
                "faq_id": 3,
                "lang": "zh",
                "question": "Question zh?",
                "answer": "Answer zh"
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
 * @api {post} /api/admin/faq/create 3. Create Faq
 * @apiVersion 1.0.0
 * @apiName Create Faq
 * @apiGroup Faq
 *
 * @apiUse PostHeader
 * @apiParam {array}  translations                  Transaltions
 * @apiParam {string} translations.lang             Language: `en`, `km`, `zh`, `jp`
 * @apiParam {string} translations.question         FAQ question 
 * @apiParam {string} translations.answer           FAQ answer
 * @apiParam {integer} order                        Sequence order
 * @apiParam {string} is_enable                     Enable status. Default is `true`
 *
 * @apiExample {curl} Example usage:
{
	"translations" : [{
		"lang" : "en",
		"question" : "Question en?",
		"answer": "Answer en"
	},{
		"lang" : "km",
		"question" : "Question km?",
		"answer": "Answer km"
	},{
		"lang" : "zh",
		"question" : "Question zh?",
		"answer": "Answer zh"
	},{
		"lang" : "jp",
		"question" : "Question jp?",
		"answer": "Answer jp"
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
 * @api {post} /api/admin/faq/update/:faq_id 4. Update Faq
 * @apiVersion 1.0.0
 * @apiName Update Faq
 * @apiGroup Faq
 *
 * @apiUse PostHeader
 * @apiParam {integer}  faq_id                      FAQ id
 * @apiParam {array}  translations                  Transaltions
 * @apiParam {string} translations.lang             Language: `en`, `km`, `zh`, `jp`
 * @apiParam {string} translations.question         FAQ question 
 * @apiParam {string} translations.answer           FAQ answer
 * @apiParam {integer} order                        Sequence order
 * @apiParam {string} is_enable                     Enable status. Default is `true`
 *
 * @apiExample {curl} Example usage:
{
	"translations" : [{
		"lang" : "en",
		"question" : "Question en updated?",
		"answer": "Answer en"
	},{
		"lang" : "km",
		"question" : "Question km?",
		"answer": "Answer km"
	},{
		"lang" : "zh",
		"question" : "Question zh?",
		"answer": "Answer zh"
	},{
		"lang" : "jp",
		"question" : "Question jp?",
		"answer": "Answer jp"
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
 * @api {post} /api/admin/faq/status/:faq_id 5. Update Faq Status
 * @apiVersion 1.0.0
 * @apiName Update Faq Status
 * @apiGroup Faq
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
 * @api {post} /api/admin/faq/delete/:faq_id 6. Delete Faq
 * @apiVersion 1.0.0
 * @apiName Delete Faq
 * @apiGroup Faq
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
