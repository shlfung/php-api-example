Simple example of a REST API using pure php for future reference

To start, clone the repo, then start the php server in the main directory:

```
php -S localhost:8000
```

Making a request:

```
curl -X GET 'http://localhost:8000/api.php?endpoint=hello'
```
```
curl -X POST -H "Content-Type: application/json" -d '{"name":"John Doe","email":"john@example.com"}' http://localhost:8000/api.php
```