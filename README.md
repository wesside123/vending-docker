# Vending API

A simple REST service which will support a beverage vending machine that is tested via HTTP.

## Requirements

Docker is required - https://www.docker.com/ 

## Installation

1. Clone the repo.

2. From the command line, navigate to the repo you just cloned and run the following command to start the service.

``` docker compose up -d```

3. In your browser, navigate to http://localhost:5000/ to access phpMyAdmin.

4. Click "Databases" from the top navigation.

5. In the "Database name" field enter "vending", select "utf8mb4_unicode_ci" from the dropdown then click "Create". 

6. Click "Import" from the top navigation.

7. Click "Choose File" and selec the vending.sql file from the cloned repo.

## Usage

With your favorite API client the following HTTP requests can be made:

### Requests

#### Coin accepted:

```PUT http://localhost:8080```

Request Body:

```
{
“coin”: 1 
}
```

Response Code:

```204 OK```

Response Header:

```X-Coins: $[# of coins accepted]```

#### Coins returned:

```DELETE http://localhost:8080/```

Response Code:

```204 OK```

Response Header:

```X-Coins: $[# of coins to be returned]```

#### Get an array of integers of remaining item quantities:

```GET http://localhost:8080/inventory```

Response Code:

```200 OK```

Response Body:

```[#,#,#]```

#### Get remaining item quantity (an integer) where ```id=#``` is a zero-based indexed list of three options:

```GET http://localhost:8080/inventory/?id=#```

Response Code:

```200 OK```

Response Body:

```[#]```

#### Vend an item:

```PUT http://localhost:8080/inventory/?id=#```

Response Code:

```200 OK```

Response Headers:

```X-Coins: $[# of coins to be returned] X-Inventory-R emaining: $[item quantity]```

Response Body:

```
{
“quantity”: $[number of items vended]
}
```

#### Attempt to vend an item out of stock:

```PUT http://localhost:8080/inventory/?id=#```

Response Code:

```404 OK```

Response Headers:

```X-Coins: $[# of coins accepted]```

#### Attempt to vend with insufficient coins:

```PUT http://localhost:8080/inventory/?id=#```

Response Code:

```403 OK```

Response Headers:

```X-Coins: $[0|1]```