# URLShortener API

Encurtador de URL

## Tecnologias utilizadas

> PHP 7.4.30

> Laravel  8.83.26

> PostgreSQL 4

# Rotas 

## /shortener [POST]

Rota para encurtar nova url

- Request 

Headers
~~~HTTP
Content-Type: application/json
~~~
Body
~~~Javascript
{
    urlComplete: "backendbrasil.com.br";
}
~~~

<br>

- <b>Response 201</b> (application/json)

Headers
~~~HTTP
Content-Type: application/json
~~~
Body
~~~Javascript
{
    urlComplete: "backendbrasil.com.br";
}
~~~

<br>

## /{$url} [GET]

Rota para acessar rota encurtada

- <b>Response 200 </b> (application/json)

Headers

~~~HTTP
Content-Type: application/json
~~~

Body
~~~Javascript
{
    newUrl: "https://localhost:8000/abcde123";
}
~~~

