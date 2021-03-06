# Web 3 project: Awesome CMS

Jan Michalski, Aleksander Rurarz

## Installation

One additional step of installation is required!

    php artisan storage:link

Whole process:

    $ composer install
    Create .env file with DB_CONNECTION=iris-mysql
    $ php artisan migrate
    $ php artisan db:seed
    $ php artisan storage:link
    $ php artisan serve

## Accounts

    admin@admin.com
    qweasdzxc

    user@user.com
    qweasdzxc

## Features

* Listing all articles & search by title and content
* Showing specific article
* Registering users
* Login, logout
* Editing your profile + profile images
* Adding, editing, deleting own articles
* Attaching images to articles
* Downloading articles as PDF
* And many more... :)

## API specification

### Get all articles

    GET /api/articles

### Get specific article

    GET /api/artilces/[id]

### Create article

    POST /api/articles

    {"email": "user@user.com", "password": "qweasdzxc",
     "title": "Title", "content": "Lorem Ipsum"}

### Edit article

    PUT /api/articles/[id]

    {"email": "user@user.com", "password": "qweasdzxc",
     "title": "Title", "content": "Lorem Ipsum"}

### Delete article

    DELETE /api/articles/[id]

    {"email": "user@user.com", "password": "qweasdzxc"}
