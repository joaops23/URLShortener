# URLShortener API

Encurtador de URL

### Link do desafio
<a href='https://github.com/backend-br/desafios/blob/master/01-Easy/EncurtadorDeURL/README.md' target='_blank'>Encurtador de URLs</a>

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

## /listAll [GET]

Rota para listagem de todas todos os link encurtados, trazendo o link encurtado seguido do original.


~~~HTTP
[
    {
        "backendbrasil.com.br": "localhost:8000/api/61495bd46004db239cd0"
    }
    ...
]
~~~
<br>

## /{$url} [GET]

Rota para acessar URL encurtada

o Retorno é o redirecionamento para a URL original.

~~~PHP
    return redirect("http://" . <URLOriginalComBaseNoEncurtador>);
~~~
