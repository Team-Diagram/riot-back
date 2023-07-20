# <p align="center">RioT</p>
RioT is an end-of-year project by students at HETIC. The aim of this project is to provide a data capture, storage and analysis solution to make our environment, here in Building A at our school, less energy-intensive and more comfortable.
        
## 🛠️ Tech Stack

| Front | Back | 
| -------- | -------- | 
| <img src="https://img.shields.io/badge/React-61DAFB.svg?style=for-the-badge&logo=React&logoColor=black">   | <img src="https://img.shields.io/badge/Symfony-000000.svg?style=for-the-badge&logo=Symfony&logoColor=white">|
| <img src="https://img.shields.io/badge/ESLint-4B32C3.svg?style=for-the-badge&logo=ESLint&logoColor=white">   | <img src="https://img.shields.io/badge/Docker-2496ED.svg?style=for-the-badge&logo=Docker&logoColor=white"> |
| <img src="https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white">    | 

## Prerequisites
  
- Docker
- Php 8.1.2
- Composer
- Symfony 5 
- Make

## 🛠️ Run docker run  
```bash
make init
```
```bash
make migrate
```
```bash
make insert-data
```
#### Before starting you need JWT keys
```bash
make bash
```
```bash
php bin/console lexik:jwt:generate-keypair
```
#### If there are authorization problems, use these commands to give right to var/www in container
```
chown -R www-data:www-data /var/www
chmod -R 775 /var/www
```
## 🛠️ Env  
```bash
cp .env .env.local
```

In .env.local change the variable 'API_MQTT' to

- For Mac chip M1, and other: ```http://host.docker.internal:8585/sensor```
- For Mac chip Intel  : ```http://localhost:8585/sensor```   
## 🛠️ Environment Variables
`API_MQTT`
`APP_ENV`
`APP_SECRET`
`DATABASE_URL`

## ➤ API Reference
## Methods GET
### User
#### Get all users
```http
GET /api/user/all
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `token` | `string` | **Required**. Your auth token |
---

#### Get user by id
```http
GET /api/users/:userId
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `token` | `string` | **Required**. Your auth token |
| `userId` | `string` | **Required**. User target id |       
---
#### Get user by params
```http
GET /api/user/by?key=value
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `token` | `string` | **Required**. Your auth token |
| `key` | `string` | **Required**. A key
| `value` | `string` | **Required**. A value |
---
### DATA
Get  states of the whole building
```http 
GET /states 
```
Get state of place by Id
```http 
GET /states /:placeId
```
#### Necessary

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `placeId` | `string` | **Required**. Place Id taget|

Get voltage of the whole building
```http 
GET /voltage
```
---
Get voltage of place by Id
```http 
GET /voltage/:placeId
```
#### Necessary

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `placeId` | `string` | **Required**. Place Id taget|

---
Get notification
```http 
GET /notification
```
---
Get sensor
```http 
GET /sensor
```

Methods POST

### USER
#### Login
```http
POST /api/login_check
```
| Body | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `email`   | `string` | **Required**. Your email|
| `password`  | `string` | **Required**. Your password|

---
#### Create user
```http
POST /api/user
```

#### Necessary :
``ROLE_ADMIN``

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `Bearer token` | `string` | **Required**. Your auth token|


#### Content :
| Body | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `first_name`   | `string` | **Required**. First Name|
| `last_Name`  | `string` | **Required**. Last Name|
| `email`   | `string` | **Required**. Email|
| `password`  | `string` | **Required**. Password|
| `admin`   | `bool` | **Required**. True or False

---
### Switch
#### Edit value state vent, heater, ac
```http
POST /api/switch/vent
```
```http
POST /api/switch/heater
```
```http
POST /api/switch/climatisation
```
#### Necessary :
`` ROLE_ADMIN``
| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `Bearer token` | `string` | **Required**. Your auth token|


#### Content :
| Body | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `place_id`   | `string` | **Required**. Place Id|
| `value`  | `int` | **Required**. Value we want to set |
---

#### Edit state light
```http
POST /switch/light
```
#### Necessary :
`` ROLE_ADMIN``
| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `Bearer token` | `string` | **Required**. Your auth token|


#### Content :
| Body | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `place_id`   | `string` | **Required**. Place Id|

---
ShutDown all device or TurnOn all device
```http
POST /api/switchAll/:action
```
#### Necessary :
`` ROLE_ADMIN``
| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `Bearer token` | `string` | **Required**. Your auth token|


#### Content :
| Body | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `action`   | `string` | **Required**. For shutdown all  : shutdown; For TurOn all : turnOn|
---

## Methods PUT
### USER
#### Update User
```http
PUT /api/user/update/:userId
```
#### Necessary :
``ROLE_ADMIN``

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `Bearer token` | `string` | **Required**. Your auth token|
| `userId` | `string` | **Required**.User target id|


#### Content :
| Body | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `first_name`   | `string` | **Optionnal**. First Name|
| `last_Name`  | `string` | **Optionnal**. Last Name|
| `email`   | `string` | **Optionnal**. Email|
| `password`  | `string` | **Optionnal**. Password|

---
## Methods DELETE
### Delete User
```http
DELETE /api/user/delete/:userId
```
#### Necessary :
``ROLE_ADMIN``

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `Bearer token` | `string` | **Required**. Your auth token |
| `userId` | `string` | **Required**. User target id |

---
## 🙇 Authors
#### Dimitri CHAUVEL
- Github: [@DimitriChauvel](https://github.com/DimitriChauvel)
#### Romain LHUILLIER
- Github: [@TisoOfficiel](https://github.com/TisoOfficiel)
#### Pauline Miranda       
- Github: [@polinzz](https://github.com/polinzz)
#### Herby NÉRILUS
- Github: [@Nerilus](https://github.com/Nerilus)
#### Adrien QUIMBRE
- Github: [@Doud75](https://github.com/Doud75)
#### Anthony RINGRESSI
- Github: [@anthony-rgs](https://github.com/anthony-rgs)
