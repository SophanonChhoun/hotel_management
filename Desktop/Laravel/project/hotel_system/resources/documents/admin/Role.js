/**
 * @api {get} /api/admin/role/list 1. List Role
 * @apiVersion 1.0.0
 * @apiName List Role
 * @apiGroup Role
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
                "name": "Editor",
                "description": "Manage Project",
                "is_enable": true,
                "created_by": 1,
                "updated_by": 1,
                "created_at": "2020-02-11 06:21:12",
                "updated_at": "2020-02-11 06:24:39",
                "users_count": 1
            }
        ],
        "total": 2
    }
 }
 *
 * @apiUse AuthorizationInvalid
 * @apiUse AuthInvalid
 * @apiUse ServerServerError
 */

/**
 * @api {get} /api/admin/role/list/all 2. List All Role
 * @apiVersion 1.0.0
 * @apiName List All Role
 * @apiGroup Role
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
            "name": "Admin"
        },
        {
            "id": 2,
            "name": "Editor"
        }
    ]
 }
 *
 * @apiUse AuthorizationInvalid
 * @apiUse AuthInvalid
 * @apiUse ServerServerError
 */

/**
 * @api {get} /api/admin/role/show/:role_id 3. Show Role
 * @apiVersion 1.0.0
 * @apiName Show Role
 * @apiGroup Role
 *
 * @apiUse GetHeader
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": {
        "id": 2,
        "name": "Editor",
        "description": "Manage Project",
        "is_enable": true,
        "created_by": 1,
        "updated_by": 1,
        "created_at": "2020-02-11 09:28:58",
        "updated_at": "2020-02-11 15:50:30",
        "role_permissions": [
            {
                "permission_id": 1,
                "actions": [
                    "read"
                ]
            },
            {
                "permission_id": 3,
                "actions": [
                    "read",
                    "clear-session"
                ]
            },
            {
                "permission_id": 5,
                "actions": [
                    "read",
                    "create",
                    "update",
                    "publish",
                    "delete"
                ]
            },
            {
                "permission_id": 6,
                "actions": [
                    "read",
                    "create",
                    "update",
                    "delete",
                    "publish",
                    "set-feature",
                    "send-notification"
                ]
            },
            {
                "permission_id": 7,
                "actions": [
                    "read"
                ]
            },
            {
                "permission_id": 9,
                "actions": [
                    "read",
                    "create",
                    "update",
                    "delete"
                ]
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
 * @api {post} /api/admin/role/create 4. Create Role
 * @apiVersion 1.0.0
 * @apiName Create Role
 * @apiGroup Role
 *
 * @apiUse PostHeader
 *
 * @apiExample {curl} Example usage:
 {
	"name" : "Editor",
	"description" : "Manage Project",
	"is_enable" : true,
	"permissions" : [
		{
			"permission_id" : 1,
			"actions": "read"
		},{
			"permission_id" : 3,
			"actions" : "read"
		}
	]
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
 * @api {post} /api/admin/role/update/:role_id 5. Update Role
 * @apiVersion 1.0.0
 * @apiName Update Role
 * @apiGroup Role
 *
 * @apiUse PostHeader
 *
 @apiExample {curl} Example usage:
 {
	"name" : "Editor",
	"description" : "Manage Project",
	"is_enable" : true,
	"permissions" : [
		{
			"permission_id" : 1,
			"actions": "read"
		},{
			"permission_id" : 3,
			"actions" : "read"
		}
	]
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
 * @api {post} /api/admin/role/status/{id} 6. Update Role Status
 * @apiVersion 1.0.0
 * @apiName Update Role Status
 * @apiGroup Role
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
 * @api {post} /api/admin/role/delete/{id} 7. Delete Role
 * @apiVersion 1.0.0
 * @apiName Delete Role
 * @apiGroup Role
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
 * @api {get} /api/admin/role/list/permissions 8. List All Permission
 * @apiVersion 1.0.0
 * @apiName List All Permission
 * @apiGroup Role
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
            "name": "Dashboard",
            "code": "dashboard",
            "icon": "icon-grid",
            "actions": [
                "read"
            ],
            "url": "admin",
            "is_menu": 1,
            "is_label": 0,
            "is_wrapper": 0,
            "permission_id": null,
            "sequence_order": 1
        },
        {
            "id": 3,
            "name": "Agency",
            "code": "customer",
            "icon": "fa fa-users",
            "actions": [
                "read",
                "clear-session"
            ],
            "url": "admin/customer",
            "is_menu": 1,
            "is_label": 0,
            "is_wrapper": 0,
            "permission_id": 2,
            "sequence_order": 3
        },
        {
            "id": 5,
            "name": "Announcement Categories",
            "code": "announcement-category",
            "icon": null,
            "actions": [
                "read",
                "create",
                "update",
                "delete",
                "publish"
            ],
            "url": "admin/announcement_category",
            "is_menu": 1,
            "is_label": 0,
            "is_wrapper": 0,
            "permission_id": 4,
            "sequence_order": 5
        },
        {
            "id": 6,
            "name": "Announcement",
            "code": "announcement",
            "icon": null,
            "actions": [
                "read",
                "create",
                "update",
                "delete",
                "publish",
                "set-feature",
                "send-notification"
            ],
            "url": "admin/announcement",
            "is_menu": 1,
            "is_label": 0,
            "is_wrapper": 0,
            "permission_id": 4,
            "sequence_order": 6
        },
        {
            "id": 7,
            "name": "Contacts",
            "code": "contact",
            "icon": "fa fa-address-book-o",
            "actions": [
                "read"
            ],
            "url": "admin/announcement",
            "is_menu": 1,
            "is_label": 0,
            "is_wrapper": 0,
            "permission_id": 2,
            "sequence_order": 7
        },
        {
            "id": 9,
            "name": "Document Categories",
            "code": "document-category",
            "icon": null,
            "actions": [
                "read",
                "create",
                "update",
                "delete",
                "publish"
            ],
            "url": "admin/document_category",
            "is_menu": 1,
            "is_label": 0,
            "is_wrapper": 0,
            "permission_id": 8,
            "sequence_order": 9
        },
        {
            "id": 10,
            "name": "Documents",
            "code": "document",
            "icon": null,
            "actions": [
                "read",
                "create",
                "update",
                "delete",
                "publish",
                "send-notification"
            ],
            "url": "admin/document",
            "is_menu": 1,
            "is_label": 0,
            "is_wrapper": 0,
            "permission_id": 8,
            "sequence_order": 10
        },
        {
            "id": 12,
            "name": "Event Categories",
            "code": "event-category",
            "icon": null,
            "actions": [
                "read",
                "create",
                "update",
                "delete",
                "publish"
            ],
            "url": "admin/event_category",
            "is_menu": 1,
            "is_label": 0,
            "is_wrapper": 0,
            "permission_id": 11,
            "sequence_order": 12
        },
        {
            "id": 13,
            "name": "Events",
            "code": "event",
            "icon": null,
            "actions": [
                "read",
                "create",
                "update",
                "delete",
                "publish",
                "duplicate",
                "download-qrcode",
                "send-notification",
                "read-attendee",
                "create-attendee",
                "update-attendee",
                "delete-attendee"
            ],
            "url": "admin/event",
            "is_menu": 1,
            "is_label": 0,
            "is_wrapper": 0,
            "permission_id": 11,
            "sequence_order": 13
        },
        {
            "id": 15,
            "name": "News Categories",
            "code": "news-category",
            "icon": null,
            "actions": [
                "read",
                "create",
                "update",
                "delete",
                "publish"
            ],
            "url": "admin/news_category",
            "is_menu": 1,
            "is_label": 0,
            "is_wrapper": 0,
            "permission_id": 14,
            "sequence_order": 15
        },
        {
            "id": 16,
            "name": "News",
            "code": "news",
            "icon": null,
            "actions": [
                "read",
                "create",
                "update",
                "delete",
                "publish",
                "set-feature",
                "send-notification"
            ],
            "url": "admin/news",
            "is_menu": 1,
            "is_label": 0,
            "is_wrapper": 0,
            "permission_id": 14,
            "sequence_order": 16
        },
        {
            "id": 18,
            "name": "Chat Groups",
            "code": "chat-groups",
            "icon": null,
            "actions": [
                "read",
                "create",
                "update",
                "delete",
                "publish"
            ],
            "url": "admin/chat_group",
            "is_menu": 1,
            "is_label": 0,
            "is_wrapper": 0,
            "permission_id": 17,
            "sequence_order": 18
        },
        {
            "id": 19,
            "name": "Chat",
            "code": "chat",
            "icon": null,
            "actions": [
                "read"
            ],
            "url": "admin/chat",
            "is_menu": 1,
            "is_label": 0,
            "is_wrapper": 0,
            "permission_id": 17,
            "sequence_order": 19
        },
        {
            "id": 22,
            "name": "FAQ Categories",
            "code": "faq-category",
            "icon": null,
            "actions": [
                "read",
                "create",
                "update",
                "delete",
                "publish"
            ],
            "url": "admin/faq_category",
            "is_menu": 1,
            "is_label": 0,
            "is_wrapper": 0,
            "permission_id": 21,
            "sequence_order": 22
        },
        {
            "id": 23,
            "name": "FAQs",
            "code": "faq",
            "icon": null,
            "actions": [
                "read",
                "create",
                "update",
                "delete",
                "publish"
            ],
            "url": "admin/faq",
            "is_menu": 1,
            "is_label": 0,
            "is_wrapper": 0,
            "permission_id": 21,
            "sequence_order": 23
        },
        {
            "id": 25,
            "name": "About Us",
            "code": "about-us",
            "icon": null,
            "actions": [
                "read",
                "update"
            ],
            "url": "admin/public_content/about_us",
            "is_menu": 1,
            "is_label": 0,
            "is_wrapper": 0,
            "permission_id": 24,
            "sequence_order": 25
        },
        {
            "id": 26,
            "name": "Term of Usage",
            "code": "term-of-usage",
            "icon": null,
            "actions": [
                "read",
                "update"
            ],
            "url": "admin/public_content/term_of_usage",
            "is_menu": 1,
            "is_label": 0,
            "is_wrapper": 0,
            "permission_id": 24,
            "sequence_order": 26
        },
        {
            "id": 27,
            "name": "Setting",
            "code": "setting",
            "icon": "fa fa-cogs",
            "actions": [
                "read",
                "update"
            ],
            "url": "admin/setting",
            "is_menu": 1,
            "is_label": 0,
            "is_wrapper": 0,
            "permission_id": 20,
            "sequence_order": 27
        },
        {
            "id": 29,
            "name": "Roles",
            "code": "role",
            "icon": null,
            "actions": [
                "read",
                "create",
                "update",
                "delete",
                "publish"
            ],
            "url": "admin/role",
            "is_menu": 1,
            "is_label": 0,
            "is_wrapper": 0,
            "permission_id": 28,
            "sequence_order": 29
        },
        {
            "id": 30,
            "name": "Users",
            "code": "user",
            "icon": null,
            "actions": [
                "read",
                "create",
                "update",
                "delete",
                "publish"
            ],
            "url": "admin/role",
            "is_menu": 1,
            "is_label": 0,
            "is_wrapper": 0,
            "permission_id": 28,
            "sequence_order": 30
        }
    ]
 }
 *
 * @apiUse AuthorizationInvalid
 * @apiUse AuthInvalid
 * @apiUse ServerServerError
 */
