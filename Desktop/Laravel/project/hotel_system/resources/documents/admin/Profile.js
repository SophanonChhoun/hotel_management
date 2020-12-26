/**
 * @api {get} /api/admin/profile 1. Profile
 * @apiVersion 1.0.0
 * @apiName Profile
 * @apiGroup Profile
 *
 * @apiHeader {String} Authorization    Authorize token for requesting API.
 * @apiHeader {String} Auth             Access token from user login.
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": {
        "id": 1,
        "first_name": "Codingate",
        "last_name": "Technology",
        "user_name": "Admin",
        "email": "admin@codingate.com",
        "gender": null,
        "phone_number": "092 77 00 99",
        "address": null,
        "media_id": null,
        "is_enable": true,
        "created_by": 1,
        "updated_by": null,
        "created_at": null,
        "updated_at": "2020-01-11 03:02:03",
        "media": null
    }
 }
 * @apiErrorExample  Response (example):
 HTTP/1.1 401 Unauthorized
 {
    "success": false,
    "message": "User is unauthorized. The Token is invalid."
 }
 *
 * @apiUse AuthorizationInvalid
 * @apiUse AuthInvalid
 * @apiUse ServerServerError
 */

/**
 * @api {post} /api/admin/profile/update 2. Update Profile
 * @apiVersion 1.0.0
 * @apiName Update Profile
 * @apiGroup Profile
 *
 * @apiHeader {String} Authorization    Authorize token for requesting API.
 * @apiHeader {String} Auth             Access token from user login.
 *
 *
 * @apiParam {String} first_name        First name of the User.
 * @apiParam {String} last_name         Last name of the User.
 * @apiParam {String} email             Email of the User.
 * @apiParam {String} user_name         User name of the User.
 * @apiParam {String} phone_number      Phone Number of the User.
 * @apiParam {String} [gender]          Gender of the User. in `male` or `female`
 * @apiParam {String} [address]         Address of the User.
 *
 @apiExample {curl} Example usage:
 {
	"first_name" : "Codingate",
	"last_name" : "Technology",
	"email" : "admin@codingate.com",
	"user_name" : "admin",
	"phone_number" : "012 123 123",
	"gender" : "male",
	"address" : "Phnom Penh"
 }
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": {
        "id": 1,
        "first_name": "Codingate",
        "last_name": "Technology",
        "user_name": "admin",
        "email": "admin@codingate.com",
        "gender": null,
        "phone_number": "086 457 447",
        "address": null,
        "media_id": null,
        "is_enable": true,
        "created_by": 1,
        "updated_by": 1,
        "created_at": "2020-01-11 03:46:54",,
        "updated_at": "2020-01-11 03:46:54",
        "media": {
            "file_url": "http://api.aia.local/uploads/images/e81abaf811c2128ff9511683c7e82d99.png",
            "file_name": "e81abaf811c2128ff9511683c7e82d99.png",
            "size": "Original"
        }
    }
 }
 * @apiErrorExample  Response (example):
 HTTP/1.1 404 Not Found
 {
    "success": false,
    "message": "The User is not found."
 }
 */

/**
 * @api {post} /api/admin/update/password 3. Update Password
 * @apiVersion 1.0.0
 * @apiName Update Password
 * @apiGroup Profile
 *
 * @apiHeader {String} Authorization    Authorize token for requesting API.
 * @apiHeader {String} Auth             Access token from user login.
 *
 * @apiParam {String} new_password        New Password of the User.
 * @apiParam {String} old_password        Old Password of the User.
 *
 @apiExample {curl} Example usage:
 {
	"new_password" : "newpassword",
	"old_password" : "password"
 }
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": {
        "id": 1,
        "first_name": "Codingate",
        "last_name": "Technology",
        "user_name": "admin",
        "email": "admin@codingate.com",
        "gender": null,
        "phone_number": "086 457 447",
        "address": null,
        "media_id": null,
        "is_enable": true,
        "created_by": 1,
        "updated_by": 1,
        "created_at": "2020-01-11 03:46:54",
        "updated_at": "2020-01-11 03:46:54",
        "media": {
            "file_url": "http://api.aia.local/uploads/images/e81abaf811c2128ff9511683c7e82d99.png",
            "file_name": "e81abaf811c2128ff9511683c7e82d99.png",
            "size": "Original"
        }
    }
 }
 */

/**
 * @api {post} /api/admin/update/picture 4. Update Profile Picture
 * @apiVersion 1.0.0
 * @apiName Update Profile Picture
 * @apiGroup Profile
 *
 * @apiHeader {String} Authorization    Authorize token for requesting API.
 * @apiHeader {String} Auth             Access token from user login.
 *
 * @apiParam {String} image         Base64 Image
 *
 @apiExample {curl} Example usage:
 {
	"image" : "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAYGBgYHBgcICAcKCwoLCg8ODAwODxYQERAREBYiFRkVFRkVIh4kHhweJB42KiYmKjY+NDI0PkxERExfWl98fKcBBgYGBgcGBwgIBwoLCgsKDw4MDA4PFhAREBEQFiIVGRUVGRUiHiQeHB4kHjYqJiYqNj40MjQ+TERETF9aX3x8p//CABEIAEAAQAMBIQACEQEDEQH/xAAbAAACAwEBAQAAAAAAAAAAAAACAwABBQQGCP/aAAgBAQAAAAD6pWsqszVdjGhQP87sc16Sqdm9uTy+jVH5vZEdFW3JiUb4GRSRUaAXVMP/xAAUAQEAAAAAAAAAAAAAAAAAAAAA/9oACAECEAAAAAAAAAD/xAAUAQEAAAAAAAAAAAAAAAAAAAAA/9oACAEDEAAAAAAAAAD/xAA7EAACAQMBBAUHCgcAAAAAAAABAgMABBEFEiExURATFEFxFSIjJDKRsjM0U2FiZHWSscEWIHJzdJOh/9oACAEBAAE/AKkmWPA3ljwUcTQSd97ybA5Jx99G1tsDzCx7yxJrstvg4XZ5bJIrq7lfk5OsHJ+P5qimR8g5DDip49EsnVruGWJwo5moo9jJJy7e01dfbgkNMgI7iwFdog+mj/MK7RB9NH+YUCCAQcg1LCHUMDh13q3Lx8aifbU5GHG5l5GkG1PI/cnmL+/Rpum6fcC/knsoJH7fcDbdAzbnoaBo/fp9r/qWpNG0nq3I0213A8IlrRCPIelj7uvQxK3UcndIdhv2q1Pq6faJY/WSejRz6DUfxK4+OrqRobS5mUAskTsAeG4Z34qH+IJ7OOXrLBVljDfJyZG0P6qMeuaVpRAlsnS1tyQCkm0Qg+phUTF4YmIGWQE+Jq6+bse9cN7jVqfV0GfZyv8A3o0c+g1H8SuPjq+A8nagfu0nwmrEjydp4+7R/CK11dnR9Q/xpfhNW/zeH+2n6VdD1Zs8WIUDmSaTK3MkXASHbUfr0NosCyTNFe3sfWSNIwSXZXLHJwBUlgYLO/CXF1MzwSALI+3vweFWeq9VZW0T6fqGUiRWAt34qK1HUu0adewx6ff7ckLoubd+JFQZFvCDxCD9Kc7U8adyHbbx7qljDqMHDqcq3I1DKHBVhh13MOXh4/yzSbGAN7n2VqGPYXecsxyx5noliR8EZDDgw41t3Cn0iGQc04+40Ly3A9oq32gRiu1W+D55Y9wUE0XnfckewOb8fdUcKx5O8seLHiej/8QAFBEBAAAAAAAAAAAAAAAAAAAAUP/aAAgBAgEBPwAD/8QAFBEBAAAAAAAAAAAAAAAAAAAAUP/aAAgBAwEBPwAD/9k="
 }
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": {
        "id": 1,
        "first_name": "Codingate",
        "last_name": "Technology",
        "user_name": "admin",
        "email": "admin@codingate.com",
        "gender": null,
        "phone_number": "086 457 447",
        "address": null,
        "media_id": 1,
        "is_enable": true,
        "created_by": 1,
        "updated_by": 1,
        "created_at": null,
        "updated_at": "2020-01-11 04:22:04",
        "media": {
            "file_url": "http://api.aia.local/uploads/images/e81abaf811c2128ff9511683c7e82d99.png",
            "file_name": "e81abaf811c2128ff9511683c7e82d99.png",
            "size": "Original"
        }
    }
 }
 */
