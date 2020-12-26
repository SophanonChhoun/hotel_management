/**
 * @api {get} /api/admin/about_us/list 1. List about us
 * @apiVersion 1.0.0
 * @apiName Show about us
 * @apiGroup About us
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
            "media_id": 2,
            "slug": "banner",
            "created_at": "2020-08-17 07:46:56",
            "deleted_at": null,
            "languages": [
                {
                    "title": "English",
                    "code": "en",
                    "translations": {
                        "id": 5,
                        "about_us_id": 5,
                        "description": "description en update",
                        "lang": "en"
                    }
                },
                {
                    "title": "ខ្មែរ",
                    "code": "km",
                    "translations": {
                        "id": 6,
                        "about_us_id": 5,
                        "description": "description km update",
                        "lang": "km"
                    }
                },
                {
                    "title": "中文",
                    "code": "zh",
                    "translations": {
                        "id": 7,
                        "about_us_id": 5,
                        "description": "description zh update",
                        "lang": "zh"
                    }
                },
                {
                    "title": "日本人",
                    "code": "jp",
                    "translations": {
                        "id": 8,
                        "about_us_id": 5,
                        "description": "description jp update",
                        "lang": "jp"
                    }
                }
            ],
            "media": {
                "file_url": "http://127.0.0.1:8081/uploads/images/ec510b1b85b406c586eca3f63c40cdc8.png",
                "file_name": "ec510b1b85b406c586eca3f63c40cdc8.png",
                "file_type": "image",
                "size": "original"
            }
        },
        {
            "id": 5,
            "media_id": null,
            "slug": "who_we_are",
            "created_at": "2020-08-17 09:13:16",
            "deleted_at": null,
            "languages": [
                {
                    "title": "English",
                    "code": "en",
                    "translations": {
                        "id": 5,
                        "about_us_id": 5,
                        "description": "description en update",
                        "lang": "en"
                    }
                },
                {
                    "title": "ខ្មែរ",
                    "code": "km",
                    "translations": {
                        "id": 6,
                        "about_us_id": 5,
                        "description": "description km update",
                        "lang": "km"
                    }
                },
                {
                    "title": "中文",
                    "code": "zh",
                    "translations": {
                        "id": 7,
                        "about_us_id": 5,
                        "description": "description zh update",
                        "lang": "zh"
                    }
                },
                {
                    "title": "日本人",
                    "code": "jp",
                    "translations": {
                        "id": 8,
                        "about_us_id": 5,
                        "description": "description jp update",
                        "lang": "jp"
                    }
                }
            ],
            "media": null
        },
        {
            "id": 6,
            "media_id": 3,
            "slug": "vision",
            "created_at": "2020-08-17 09:16:50",
            "deleted_at": null,
            "languages": [
                {
                    "title": "English",
                    "code": "en",
                    "translations": {
                        "id": 5,
                        "about_us_id": 5,
                        "description": "description en update",
                        "lang": "en"
                    }
                },
                {
                    "title": "ខ្មែរ",
                    "code": "km",
                    "translations": {
                        "id": 6,
                        "about_us_id": 5,
                        "description": "description km update",
                        "lang": "km"
                    }
                },
                {
                    "title": "中文",
                    "code": "zh",
                    "translations": {
                        "id": 7,
                        "about_us_id": 5,
                        "description": "description zh update",
                        "lang": "zh"
                    }
                },
                {
                    "title": "日本人",
                    "code": "jp",
                    "translations": {
                        "id": 8,
                        "about_us_id": 5,
                        "description": "description jp update",
                        "lang": "jp"
                    }
                }
            ],
            "media": {
                "file_url": "http://127.0.0.1:8081/uploads/images/259b8debc060d7184f6688af6a7744f3.png",
                "file_name": "259b8debc060d7184f6688af6a7744f3.png",
                "file_type": "image",
                "size": "original"
            }
        },
        {
            "id": 7,
            "media_id": 5,
            "slug": "aspiration",
            "created_at": "2020-08-17 09:18:21",
            "deleted_at": null,
            "languages": [
                {
                    "title": "English",
                    "code": "en",
                    "translations": {
                        "id": 5,
                        "about_us_id": 5,
                        "description": "description en update",
                        "lang": "en"
                    }
                },
                {
                    "title": "ខ្មែរ",
                    "code": "km",
                    "translations": {
                        "id": 6,
                        "about_us_id": 5,
                        "description": "description km update",
                        "lang": "km"
                    }
                },
                {
                    "title": "中文",
                    "code": "zh",
                    "translations": {
                        "id": 7,
                        "about_us_id": 5,
                        "description": "description zh update",
                        "lang": "zh"
                    }
                },
                {
                    "title": "日本人",
                    "code": "jp",
                    "translations": {
                        "id": 8,
                        "about_us_id": 5,
                        "description": "description jp update",
                        "lang": "jp"
                    }
                }
            ],
            "media": {
                "file_url": "http://127.0.0.1:8081/uploads/images/e27a8543e460912e88004c9a5bae35cf.png",
                "file_name": "e27a8543e460912e88004c9a5bae35cf.png",
                "file_type": "image",
                "size": "original"
            }
        }
    ]
}
 *
 * @apiUse AuthorizationInvalid
 * @apiUse AuthInvalid
 * @apiUse NotFound
 * @apiUse ServerServerError
 */

 /**
 * @api {post} /api/admin/about_us/update/:slug 2. Update about us
 * @apiVersion 1.0.0
 * @apiName Update about us
 * @apiGroup About us
 *
 * @apiUse PostHeader
 * @apiParam {string} slug                          About us slug. Value are: `banner`, `who_we_are`, `vision`, `aspiration`, `core_value`, `philosophy`
 * @apiParam {array}  [translations]                Transaltions. This one required if slug is not `banner`
 * @apiParam {string} [translations.description]    Address of branch or location
 * @apiParam {string} [translations.lang]           Latitude of location
 * @apiParam {string} [image]                       Banner Image base64
 *
 * @apiExample {curl} Example usage:
 {
	"translations" : [{
		"lang" : "en",
		"description" : "aspiration description en update"
	},{
		"lang" : "km",
		"description" : " aspiration description km update"
	},
	{
		"lang" : "zh",
		"description" : "aspiration description zh"
	},
	{
		"lang" : "jp",
		"description" : "aspiration description jp"
	}],
	"image": "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAYGBgYHBgcICAcKCwoLCg8ODAwODxYQERAREBYiFRkVFRkVIh4kHhweJB42KiYmKjY+NDI0PkxERExfWl98fKcBBgYGBgcGBwgIBwoLCgsKDw4MDA4PFhAREBEQFiIVGRUVGRUiHiQeHB4kHjYqJiYqNj40MjQ+TERETF9aX3x8p//CABEIAEAAQAMBIQACEQEDEQH/xAAbAAACAwEBAQAAAAAAAAAAAAACAwABBQQGCP/aAAgBAQAAAAD6pWsqszVdjGhQP87sc16Sqdm9uTy+jVH5vZEdFW3JiUb4GRSRUaAXVMP/xAAUAQEAAAAAAAAAAAAAAAAAAAAA/9oACAECEAAAAAAAAAD/xAAUAQEAAAAAAAAAAAAAAAAAAAAA/9oACAEDEAAAAAAAAAD/xAA7EAACAQMBBAUHCgcAAAAAAAABAgMABBEFEiExURATFEFxFSIjJDKRsjM0U2FiZHWSscEWIHJzdJOh/9oACAEBAAE/AKkmWPA3ljwUcTQSd97ybA5Jx99G1tsDzCx7yxJrstvg4XZ5bJIrq7lfk5OsHJ+P5qimR8g5DDip49EsnVruGWJwo5moo9jJJy7e01dfbgkNMgI7iwFdog+mj/MK7RB9NH+YUCCAQcg1LCHUMDh13q3Lx8aifbU5GHG5l5GkG1PI/cnmL+/Rpum6fcC/knsoJH7fcDbdAzbnoaBo/fp9r/qWpNG0nq3I0213A8IlrRCPIelj7uvQxK3UcndIdhv2q1Pq6faJY/WSejRz6DUfxK4+OrqRobS5mUAskTsAeG4Z34qH+IJ7OOXrLBVljDfJyZG0P6qMeuaVpRAlsnS1tyQCkm0Qg+phUTF4YmIGWQE+Jq6+bse9cN7jVqfV0GfZyv8A3o0c+g1H8SuPjq+A8nagfu0nwmrEjydp4+7R/CK11dnR9Q/xpfhNW/zeH+2n6VdD1Zs8WIUDmSaTK3MkXASHbUfr0NosCyTNFe3sfWSNIwSXZXLHJwBUlgYLO/CXF1MzwSALI+3vweFWeq9VZW0T6fqGUiRWAt34qK1HUu0adewx6ff7ckLoubd+JFQZFvCDxCD9Kc7U8adyHbbx7qljDqMHDqcq3I1DKHBVhh13MOXh4/yzSbGAN7n2VqGPYXecsxyx5noliR8EZDDgw41t3Cn0iGQc04+40Ly3A9oq32gRiu1W+D55Y9wUE0XnfckewOb8fdUcKx5O8seLHiej/8QAFBEBAAAAAAAAAAAAAAAAAAAAUP/aAAgBAgEBPwAD/8QAFBEBAAAAAAAAAAAAAAAAAAAAUP/aAAgBAwEBPwAD/9k="
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

