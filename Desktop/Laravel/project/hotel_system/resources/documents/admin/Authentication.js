/**
 * @api / Status Code
 * @apiVersion 1.0.0
 * @apiName StatusCode
 * @apiGroup Status Code
 *
 * @apiError 400 Bad request
 * @apiError 401 Authorization/Auth token is invalid
 * @apiError 403 No access rights to access
 * @apiError 404 Resource is not found
 * @apiError 412 Validation Error
 * @apiError 500 Server Error
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 401 Error Authorization & Authentication Request
 {
    "success": false,
    "message": "The authorized is required. The authorized is invalid"
 }

 HTTP/1.1 404 Not Found
 {
    "success": false,
    "message": "Wrong details."
 }

 HTTP/1.1 412 Error Validation Request
 {
    "success": false,
    "message": {
        "name": [
            "The name field is required."
        ],
    }
 }
 */

/**
 * @api {post} /api/login 1. Login
 * @apiVersion 1.0.0
 * @apiName Login
 * @apiGroup Authentication
 *
 * @apiUse PostHeaderWithoutAuth
 *
 * @apiParam {String} email         User email
 * @apiParam {String} password      User password
 *
 * @apiExample {curl} Example usage:
 {
    "email": "chhounsophanon14@gmail.com",
    "password": "password"
 }
 *
 * @apiUse DefaultResponse
 * @apiSuccess (200) {String}       data.access_token       auth token to authorize access private api for each user
 * @apiSuccess (200) {timestamp}    data.expired_at         auth token expiration time
 * @apiSuccess (200) {object}       data.customer               customer profile
 * @apiSuccess (200) {integer}      data.customer.id                 customer id
 * @apiSuccess (200) {string}       data.customer.first_name         customer first name
 * @apiSuccess (200) {string}       data.customer.last_name          customer last name
 * @apiSuccess (200) {string}       data.customer.email              customer email
 * @apiSuccess (200) {string}       data.customer.dob              customer date of birth
 * @apiSuccess (200) {string}       data.customer.gender             customer gender. can be `m` or `f`
 * @apiSuccess (200) {string}       data.customer.phone_number       customer phone number
 * @apiSuccess (200) {string}       data.customer.street_address            customer street address
 * @apiSuccess (200) {string}       data.customer.city            customer city
 * @apiSuccess (200) {string}       data.customer.country            customer country
 * @apiSuccess (200) {boolean}      data.customer.is_enable          customer active/inactive status
 * @apiSuccess (200) {datetime}     data.customer.created_at         created date
 * @apiSuccess (200) {datetime}     data.customer.updated_at         updated date
 * @apiSuccess (200) {string}       data.redirect            First module that user has access rights to read
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": {
        "access_token": "bfb23d7740c9cf1221007716d50e9c6d5cf221fa9aec8cd6d4a0e971ee05a42c",
        "expired_at": 1581947006,
        "user": {
            "id": 1,
            "first_name": "Codingate",
            "last_name": "Technology",
            "user_name": "Admin",
            "email": "admin@codingate.com",
            "gender": "male",
            "phone_number": "092 77 00 99",
            "address": Phnom Penh,
            "is_enable": true,
            "created_by": 1,
            "updated_by": 1,
            "created_at": "2020-02-11 16:42:47",
            "updated_at": "2020-02-16 13:32:20",
            "media": {
                "file_url": "http://api.aia.local/uploads/images/f428389783b4bb389934c3abe52834a7.png",
                "file_name": "f428389783b4bb389934c3abe52834a7.png",
                "file_type": "image",
                "size": "original"
            }
        },
        "redirect": "admin"
    }
 }
 *
 * @apiUse IncorrectUsernamePassword
 * @apiUse AuthorizationInvalid
 * @apiUse ErrorValidation
 * @apiUse ServerServerError
 */

/**
 * @api {post} /api/admin/auth/logout 3. Log Out
 * @apiVersion 1.0.0
 * @apiName Logout
 * @apiGroup Authentication
 *
 * @apiUse PostHeader
 *
 * @apiUse DefaultResponse
 * @apiSuccess (200) {String}       data.message            message of success
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": {
        "message": "You have logged out successfully."
    }
 }
 *
 * @apiUse AuthorizationInvalid
 * @apiUse ServerServerError
 */

/**
 * @api {post} /api/admin/auth/forget 4. Request Forgot Password Code
 * @apiVersion 1.0.0
 * @apiName Request Forgot Password Code
 * @apiGroup Authentication
 *
 * @apiUse PostHeaderWithoutAuth
 *
 * @apiParam {String} email         User email
 *
 * @apiExample {curl} Example usage:
 {
	"email" : "admin@codingate.com"
 }
 *
 * @apiUse DefaultResponse
 * @apiSuccess (200) {String}       data.email              user email
 * @apiSuccess (200) {String}       data.verify_code        verify code to reset password
 * @apiSuccess (200) {datetime}     data.expired_at         expiration time
 * @apiSuccess (200) {integer}      data.id                 verify code id
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": {
        "email": "admin@codingate.com",
        "verify_code": "dawI",
        "expired_at": "2020-01-11T03:16:59.505240Z",
        "id": 1
    }
 }
 *
 * @apiUse AuthorizationInvalid
 * @apiUse ErrorValidation
 * @apiUse ServerServerError
 *
 */

/**
 * @api {post} /api/admin/auth/forget/verify 5. Verify Forgot Password Code
 * @apiVersion 1.0.0
 * @apiName Verify Forgot Password Code
 * @apiGroup Authentication
 *
 * @apiUse PostHeaderWithoutAuth
 *
 * @apiParam {String} email        User email
 * @apiParam {String} code         Verify code which sent through email
 *
 @apiExample {curl} Example usage:
 {
	"email" : "admin@codingate.com",
	"code" : "dawI"
 }
 *
 * @apiUse DefaultResponse
 * @apiSuccess (200) {String}       data.token              reset password token
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": {
        "token": "6f4d5d3ce8ad8f80075a888f0968c28070df4ffd7d5e23fd1730f10330ca9165"
    }
 }
 *
 * @apiUse OtpIncorrect
 * @apiUse AuthorizationInvalid
 * @apiUse ErrorValidation
 * @apiUse ServerServerError
 */

/**
 * @api {post} /api/admin/auth/forget/reset 6. Reset Password
 * @apiVersion 1.0.0
 * @apiName Reset Password
 * @apiGroup Authentication
 *
 * @apiUse PostHeaderWithoutAuth
 *
 * @apiParam {String} email                 User email
 * @apiParam {String} token                 Token to reset password
 * @apiParam {String} password              New password
 * @apiParam {String} confirm_password      Confirm new password
 *
 @apiExample {curl} Example usage:
 {
	"email" : "admin@codingate.com",
	"token" : "e9ab3b1529b012a61cc59c25865ff235b6dd1e8999467d57ab72bd0b7d5b8341",
	"password" : "password",
	"confirm_password" : "password"
 }
 *
 * @apiUse DefaultResponse
 * @apiSuccess (200) {String}       data.message              response message
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": {
        "message": "You have reset password successfully."
    }
 }
 *
 * @apiUse TokenExpired
 * @apiUse AuthorizationInvalid
 * @apiUse ErrorValidation
 * @apiUse ServerServerError
 */
