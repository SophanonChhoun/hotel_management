/**
 * @api {get} /api/admin/facility/list 1. List facility
 * @apiVersion 1.0.0
 * @apiName List facility
 * @apiGroup Facility
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
                "facility_category_id": 2,
                "media_id": 17,
                "order": 1,
                "is_enable": true,
                "created_at": "2020-08-18 11:08:05",
                "translation": {
                    "facility_category_id": 2,
                    "lang": "en",
                    "name": "Facility category name en",
                    "description": "description en"
                },
                "media": {
                    "file_url": "http://127.0.0.1:8081/uploads/images/69a2cde49fbec1023695157fc45cc0df.png",
                    "file_name": "69a2cde49fbec1023695157fc45cc0df.png",
                    "file_type": "image",
                    "size": "original"
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
 * @api {get} /api/admin/facility/show/:facility_id 2. Show facility
 * @apiVersion 1.0.0
 * @apiName Show facility
 * @apiGroup Facility
 *
 * @apiUse GetHeader
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": {
        "id": 2,
        "facility_category_id": 2,
        "media_id": 17,
        "order": 1,
        "is_enable": true,
        "created_at": "2020-08-18 11:08:05",
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
        ],
        "media": {
            "file_url": "http://127.0.0.1:8081/uploads/images/69a2cde49fbec1023695157fc45cc0df.png",
            "file_name": "69a2cde49fbec1023695157fc45cc0df.png",
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
 * @api {post} /api/admin/facility/create 3. Create facility
 * @apiVersion 1.0.0
 * @apiName Create facility
 * @apiGroup Facility
 *
 * @apiUse PostHeader
 * @apiParam {array}  translations                  Transaltions
 * @apiParam {string} translations.name             Name of command
 * @apiParam {string} translations.lang             Language: `en`, `km`, `zh`, `jp`
 * @apiParam {string} [translations.description]    Description of command
 * @apiParam {integer} facility_category_id         Facility category id
 * @apiParam {string} image                         Image base64
 * @apiParam {integer} order                        Sequence order
 * @apiParam {string} is_enable                     Enable status. Default is `true`
 *
 * @apiExample {curl} Example usage:
{
	"translations" : [{
		"lang" : "en",
		"name" : "Facility name en",
		"description": "description en"
	},{
		"lang" : "km",
		"name" : "Facility name km",
		"description": "description km"
	},{
		"lang" : "zh",
		"name" : "Facility name zh",
		"description": "description zh"
	},{
		"lang" : "jp",
		"name" : "Facility name jp",
		"description": "description jp"
	}],
	"facility_category_id": 2,
	"image": "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAYGBgYHBgcICAcKCwoLCg8ODAwODxYQERAREBYiFRkVFRkVIh4kHhweJB42KiYmKjY+NDI0PkxERExfWl98fKcBBgYGBgcGBwgIBwoLCgsKDw4MDA4PFhAREBEQFiIVGRUVGRUiHiQeHB4kHjYqJiYqNj40MjQ+TERETF9aX3x8p//CABEIAEAAQAMBIQACEQEDEQH/xAAbAAACAwEBAQAAAAAAAAAAAAACAwABBQQGCP/aAAgBAQAAAAD6pWsqszVdjGhQP87sc16Sqdm9uTy+jVH5vZEdFW3JiUb4GRSRUaAXVMP/xAAUAQEAAAAAAAAAAAAAAAAAAAAA/9oACAECEAAAAAAAAAD/xAAUAQEAAAAAAAAAAAAAAAAAAAAA/9oACAEDEAAAAAAAAAD/xAA7EAACAQMBBAUHCgcAAAAAAAABAgMABBEFEiExURATFEFxFSIjJDKRsjM0U2FiZHWSscEWIHJzdJOh/9oACAEBAAE/AKkmWPA3ljwUcTQSd97ybA5Jx99G1tsDzCx7yxJrstvg4XZ5bJIrq7lfk5OsHJ+P5qimR8g5DDip49EsnVruGWJwo5moo9jJJy7e01dfbgkNMgI7iwFdog+mj/MK7RB9NH+YUCCAQcg1LCHUMDh13q3Lx8aifbU5GHG5l5GkG1PI/cnmL+/Rpum6fcC/knsoJH7fcDbdAzbnoaBo/fp9r/qWpNG0nq3I0213A8IlrRCPIelj7uvQxK3UcndIdhv2q1Pq6faJY/WSejRz6DUfxK4+OrqRobS5mUAskTsAeG4Z34qH+IJ7OOXrLBVljDfJyZG0P6qMeuaVpRAlsnS1tyQCkm0Qg+phUTF4YmIGWQE+Jq6+bse9cN7jVqfV0GfZyv8A3o0c+g1H8SuPjq+A8nagfu0nwmrEjydp4+7R/CK11dnR9Q/xpfhNW/zeH+2n6VdD1Zs8WIUDmSaTK3MkXASHbUfr0NosCyTNFe3sfWSNIwSXZXLHJwBUlgYLO/CXF1MzwSALI+3vweFWeq9VZW0T6fqGUiRWAt34qK1HUu0adewx6ff7ckLoubd+JFQZFvCDxCD9Kc7U8adyHbbx7qljDqMHDqcq3I1DKHBVhh13MOXh4/yzSbGAN7n2VqGPYXecsxyx5noliR8EZDDgw41t3Cn0iGQc04+40Ly3A9oq32gRiu1W+D55Y9wUE0XnfckewOb8fdUcKx5O8seLHiej/8QAFBEBAAAAAAAAAAAAAAAAAAAAUP/aAAgBAgEBPwAD/8QAFBEBAAAAAAAAAAAAAAAAAAAAUP/aAAgBAwEBPwAD/9k=",
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
 * @api {post} /api/admin/facility/update/:facility_id 4. Update facility
 * @apiVersion 1.0.0
 * @apiName Update facility
 * @apiGroup Facility
 *
 * @apiUse PostHeader
 * @apiParam {integer}  facility_id                 Facility id
 * @apiParam {array}  translations                  Transaltions
 * @apiParam {string} translations.name             Name of command
 * @apiParam {string} translations.lang             Language: `en`, `km`, `zh`, `jp`
 * @apiParam {string} [translations.description]    Description of command
 * @apiParam {integer} facility_category_id         Facility category id
 * @apiParam {string} [image]                       Image base64
 * @apiParam {integer} order                        Sequence order
 * @apiParam {string} is_enable                     Enable status. Default is `true`
 *
 * @apiExample {curl} Example usage:
{
	"translations" : [{
		"lang" : "en",
		"name" : "Facility name en update",
		"description": "description en"
	},{
		"lang" : "km",
		"name" : "Facility name km",
		"description": "description km"
	},{
		"lang" : "zh",
		"name" : "Facility name zh",
		"description": "description zh"
	},{
		"lang" : "jp",
		"name" : "Facility name jp",
		"description": "description jp"
	}],
	"facility_category_id": 2,
	"image": "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAYGBgYHBgcICAcKCwoLCg8ODAwODxYQERAREBYiFRkVFRkVIh4kHhweJB42KiYmKjY+NDI0PkxERExfWl98fKcBBgYGBgcGBwgIBwoLCgsKDw4MDA4PFhAREBEQFiIVGRUVGRUiHiQeHB4kHjYqJiYqNj40MjQ+TERETF9aX3x8p//CABEIAEAAQAMBIQACEQEDEQH/xAAbAAACAwEBAQAAAAAAAAAAAAACAwABBQQGCP/aAAgBAQAAAAD6pWsqszVdjGhQP87sc16Sqdm9uTy+jVH5vZEdFW3JiUb4GRSRUaAXVMP/xAAUAQEAAAAAAAAAAAAAAAAAAAAA/9oACAECEAAAAAAAAAD/xAAUAQEAAAAAAAAAAAAAAAAAAAAA/9oACAEDEAAAAAAAAAD/xAA7EAACAQMBBAUHCgcAAAAAAAABAgMABBEFEiExURATFEFxFSIjJDKRsjM0U2FiZHWSscEWIHJzdJOh/9oACAEBAAE/AKkmWPA3ljwUcTQSd97ybA5Jx99G1tsDzCx7yxJrstvg4XZ5bJIrq7lfk5OsHJ+P5qimR8g5DDip49EsnVruGWJwo5moo9jJJy7e01dfbgkNMgI7iwFdog+mj/MK7RB9NH+YUCCAQcg1LCHUMDh13q3Lx8aifbU5GHG5l5GkG1PI/cnmL+/Rpum6fcC/knsoJH7fcDbdAzbnoaBo/fp9r/qWpNG0nq3I0213A8IlrRCPIelj7uvQxK3UcndIdhv2q1Pq6faJY/WSejRz6DUfxK4+OrqRobS5mUAskTsAeG4Z34qH+IJ7OOXrLBVljDfJyZG0P6qMeuaVpRAlsnS1tyQCkm0Qg+phUTF4YmIGWQE+Jq6+bse9cN7jVqfV0GfZyv8A3o0c+g1H8SuPjq+A8nagfu0nwmrEjydp4+7R/CK11dnR9Q/xpfhNW/zeH+2n6VdD1Zs8WIUDmSaTK3MkXASHbUfr0NosCyTNFe3sfWSNIwSXZXLHJwBUlgYLO/CXF1MzwSALI+3vweFWeq9VZW0T6fqGUiRWAt34qK1HUu0adewx6ff7ckLoubd+JFQZFvCDxCD9Kc7U8adyHbbx7qljDqMHDqcq3I1DKHBVhh13MOXh4/yzSbGAN7n2VqGPYXecsxyx5noliR8EZDDgw41t3Cn0iGQc04+40Ly3A9oq32gRiu1W+D55Y9wUE0XnfckewOb8fdUcKx5O8seLHiej/8QAFBEBAAAAAAAAAAAAAAAAAAAAUP/aAAgBAgEBPwAD/8QAFBEBAAAAAAAAAAAAAAAAAAAAUP/aAAgBAwEBPwAD/9k=",
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
 * @api {post} /api/admin/facility/status/:facility_id 5. Update facility Status
 * @apiVersion 1.0.0
 * @apiName Update facility Status
 * @apiGroup Facility
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
 * @api {post} /api/admin/facility/delete/:facility_id 6. Delete facility
 * @apiVersion 1.0.0
 * @apiName Delete facility
 * @apiGroup Facility
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
 * @api {get} /api/admin/facility/list/all 7. List All Facilities
 * @apiVersion 1.0.0
 * @apiName List All Facilities
 * @apiGroup Facility
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
            "facility_category_id": 2,
            "media_id": 17,
            "order": 1,
            "is_enable": true,
            "created_at": "2020-08-18 11:08:05",
            "translation": {
                "facility_category_id": 2,
                "lang": "en",
                "name": "Facility category name en",
                "description": "description en"
            },
            "media": {
                "file_url": "http://127.0.0.1:8081/uploads/images/69a2cde49fbec1023695157fc45cc0df.png",
                "file_name": "69a2cde49fbec1023695157fc45cc0df.png",
                "file_type": "image",
                "size": "original"
            }
        }
    ]
}
 *
 * @apiUse AuthorizationInvalid
 * @apiUse AuthInvalid
 * @apiUse ServerServerError
 */

