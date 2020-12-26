/**
 * @api {get} /api/admin/menu/list 1. List Menu
 * @apiVersion 1.0.0
 * @apiName List Menu
 * @apiGroup Permission
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
            "url": "admin",
            "is_label": 0,
            "sub": [],
            "access_rights": [
                "read"
            ]
        },
        {
            "id": 2,
            "name": "Menu",
            "code": null,
            "icon": null,
            "url": null,
            "is_label": 1,
            "sub": [],
            "access_rights": []
        },
        {
            "id": 3,
            "name": "Agency",
            "code": "customer",
            "icon": "fa fa-users",
            "url": "admin/customer",
            "is_label": 0,
            "sub": [],
            "access_rights": [
                "read"
            ]
        },
        {
            "id": 4,
            "name": "Announcements",
            "code": null,
            "icon": "fa fa-bullhorn",
            "url": null,
            "is_label": 0,
            "sub": [
                {
                    "id": 5,
                    "name": "Announcement Categories",
                    "code": "announcement-category",
                    "icon": null,
                    "url": "admin/announcement_category",
                    "is_label": 0,
                    "sub": null,
                    "access_rights": [
                        "read",
                        "create",
                        "update",
                        "delete",
                        "publish"
                    ]
                },
                {
                    "id": 6,
                    "name": "Announcement",
                    "code": "announcement",
                    "icon": null,
                    "url": "admin/announcement",
                    "is_label": 0,
                    "sub": null,
                    "access_rights": [
                        "create",
                        "update",
                        "delete",
                        "publish",
                        "set-feature",
                        "send-notification",
                        "read"
                    ]
                }
            ],
            "access_rights": []
        },
        {
            "id": 7,
            "name": "Contacts",
            "code": "contact",
            "icon": "fa fa-address-book-o",
            "url": "admin/announcement",
            "is_label": 0,
            "sub": [],
            "access_rights": [
                "read"
            ]
        },
        {
            "id": 20,
            "name": "Configuration",
            "code": null,
            "icon": null,
            "url": null,
            "is_label": 1,
            "sub": [],
            "access_rights": []
        },
        {
            "id": 27,
            "name": "Setting",
            "code": "setting",
            "icon": "fa fa-cogs",
            "url": "admin/setting",
            "is_label": 0,
            "sub": [],
            "access_rights": [
                "read",
                "update"
            ]
        },
        {
            "id": 28,
            "name": "Users",
            "code": null,
            "icon": "fa fa-user-o",
            "url": null,
            "is_label": 0,
            "sub": [
                {
                    "id": 29,
                    "name": "Roles",
                    "code": "role",
                    "icon": null,
                    "url": "admin/role",
                    "is_label": 0,
                    "sub": null,
                    "access_rights": [
                        "read",
                        "create",
                        "update",
                        "delete",
                        "publish"
                    ]
                },
                {
                    "id": 30,
                    "name": "Users",
                    "code": "user",
                    "icon": null,
                    "url": "admin/role",
                    "is_label": 0,
                    "sub": null,
                    "access_rights": [
                        "read",
                        "create",
                        "update",
                        "delete",
                        "publish"
                    ]
                }
            ],
            "access_rights": []
        }
    ]
 }
 *
 * @apiUse AuthorizationInvalid
 * @apiUse AuthInvalid
 * @apiUse ServerServerError
 */
