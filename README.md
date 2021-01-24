

## Requirements PHP >= 7.3

## Install

composer install

cp .env.example .env (+update config variables)

php artisan key:generate


php artisan migrate

php artisan db:seed

# Test user
Email - admin@admin.com

Password - admin

# API

API url - http://project-name/api/

Methods:

- POST register - Registration in the application

Request - http://project-name/api/register

Response - user data
#

- POST login - Login in the application and get access token

Request - http://project-name/api/login

Response - access token for bearer authorization
#
- GET companies - get companies list

Request - http://project-name/api/companies

Response - companies list
#
GET clients/{company_id} - get company's clients

Request - http://project-name/api/clients/{company_id}

Response - company's clients list
#
GET client_companies/{client_id} - get client's company

Request - http://project-name/api/client_companies/{client_id}

Response - client's company
