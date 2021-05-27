###
@api {post} /api/auth/inspectors/login Start login
@apiName Login
@apiDescription Start login. Send SMS
@apiGroup Auth
@apiVersion 0.1.0

@apiParam {String} email Required
@apiParam {String} password Required

@apiSuccessExample Success-Response:
HTTP/1.1 200 OK
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9hdXRoXC9jdXN0b21lcnNcL3ZlcmlmeS1hbmQtbG9naW4iLCJpYXQiOjE2MDg4NzcxNTYsImV4cCI6MTYwODg4MDc1NiwibmJmIjoxNjA4ODc3MTU2LCJqdGkiOiI4bWJOMGM0QVdYT2MxRjhtIiwic3ViIjo1LCJwcnYiOiIxZDBhMDIwYWNmNWM0YjZjNDk3OTg5ZGYxYWJmMGZiZDRlOGM4ZDYzIn0.y6nzB_bOmtwFFnEBTJjCP9-4WwtTiUp9qe3LvaWH788",
    "token_type": "bearer",
    "expires_in": "30 minutes"
}

@apiErrorExample Invalid data:
HTTP/1.1 401 Error
{
    "error": "Wrong email or password"
}


@apiErrorExample Invalid data:
HTTP/1.1 422 Error
{
    "message": "The given data was invalid.",
    "errors": {
        "password": [
            "The password must be at least 6 characters."
        ]
    }
}

###

###
@api {get} /api/inspector/get-profile Get info inspectors
@apiName Get info inspectors
@apiDescription Get info inspectors. Send inspectors profile
@apiGroup Auth
@apiVersion 0.1.0

@apiHeader {String} Authorization Bearer token

@apiSuccessExample Success-Response:
HTTP/1.1 200 OK
{
    "id": 2,
    "first_name": "Serg11",
    "last_name": "Zoer",
    "email": "zoer210@gmail.com",
    "status": false,
    "phone": "380973614352",
    "avatar": "uploads/3t13B4YGEH620fo2TEV4HPAUQS6pf69RVquhAoIT.jpg",
    "company": "123",
    "membership": "dfsdf",
    "address": "Vinnitsya"
}
###


###
@api {post} /api/inspector/edit-profile Edit profile inspector
@apiName Edit profile inspector
@apiDescription Edit profile inspector.
@apiGroup Auth
@apiVersion 0.1.0

@apiParam {string} first_name
@apiParam {string} last_name
@apiParam {string} email
@apiParam {boolean} status
@apiParam {string} phone
@apiParam {File} avatar
@apiParam {string} company
@apiParam {string} membership
@apiParam {string} address
@apiHeader {string} Authorization Bearer token

@apiSuccessExample Success-Response:
HTTP/1.1 200 OK
{
    "id": 2,
    "first_name": "Serg11",
    "last_name": "Zoer",
    "email": "zoer210@gmail.com",
    "status": false,
    "phone": "380973614352",
    "avatar": "uploads/3t13B4YGEH620fo2TEV4HPAUQS6pf69RVquhAoIT.jpg",
    "company": "123",
    "membership": "dfsdf",
    "address": "Vinnitsya"
}
###

###
@api {post} /api/inspector/refresh-token Refresh inspector token
@apiName Refresh inspector token
@apiDescription Refresh inspector token
@apiGroup Auth
@apiVersion 0.1.0
@apiHeader {String} Authorization Bearer token
@apiSuccessExample Success-Response:
HTTP/1.1 200 OK
{
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9jdXN0b21lclwvcmVmcmVzaC10b2tlbiIsImlhdCI6MTYwODkwNTg0OCwiZXhwIjoxNjE2Nzg5ODY2LCJuYmYiOjE2MDg5MDU4NjYsImp0aSI6IjRCbTNnOGNGS0ZIM1JyeWQiLCJzdWIiOjEsInBydiI6IjFkMGEwMjBhY2Y1YzRiNmM0OTc5ODlkZjFhYmYwZmJkNGU4YzhkNjMifQ.Lcih9OYTQ5c0dxhpiWgOXrcfp1_rE9CZUWGdklJOhhE",
  "token_type": "bearer",
  "expires_in": "30 minutes"
}

###
###
@api {post} /api/auth/inspectors/reset Forgot password
@apiName Forgot password
@apiDescription Forgot password
@apiGroup Auth
@apiVersion 0.1.0

@apiParam {String} email Required

@apiSuccessExample Success-Response:
HTTP/1.1 200 OK
{
    "message": "Reset password link sent on your email id"
}

@apiErrorExample Invalid data:
HTTP/1.1 200 ok
{
    "error": "This email does not exist"
}


@apiErrorExample Invalid data:
HTTP/1.1 422 Error
{
    "message": "The given data was invalid.",
    "errors": {
        "email": [
            "The email must be a valid email address."
        ]
    }
}

###