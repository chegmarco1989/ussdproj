# ussd-Personal-example
A sample project created with laravel-PHP-ussd

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

* [Composer](https://getcomposer.org/doc/00-intro.md)
* \>= PHP 7.2

### Installing

Please run the following commands to setup your development env up.

```bash
# clone this repository
git clone https://github.com/chegmarco1989/ussdproj.git

# change directory
cd ussdproj/

# install the project's dependencies using Composer
composer install

# make a copy of the .env.example to configure the application for your local environment
# linux/unix
cp .env.example .env

# windows
copy .env.example .env

# generate your application encryption key using 
php artisan key:generate
```

### Running the application

You can use the development server the ships with Laravel by running, from the project root:

```bash
php artisan serve
```
You can visit [http://localhost:8000](http://localhost:8000) to see the application in action.

### Testing the application

Browser

```bash
http://localhost:8000/?msisdn=0544909356&network=mtn&UserSessionID=12345&msg=1
```

cURL

```bash
curl -H "Content-Type: application/json" \
     -X GET \
     -d '{"msisdn":"0544909356", "network":"mtn", "UserSessionID":"12345", "msg":"1"}' \
     http://localhost:8000
```

Enjoy!!!

### Reseting the application

Run the following artisan command if you are using the default cache store

```bash
php artisan cache:clear
```


