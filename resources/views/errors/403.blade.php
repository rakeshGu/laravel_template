<!DOCTYPE html>
<html lang="en">


    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ $exception->getStatusCode() }} Error Page</title>
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
    </head>


    <body>
        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="text-center">
                <h1 class="display-1 fw-bold">{{ $exception->getStatusCode() }} </h1>
                <p class="fs-3"> <span class="text-danger">Opps!</span> Some error occured.</p>
                <p class="lead">
                    {{ $exception->getMessage() }}                   
                </p>
                <a href="/" class="btn btn-primary">Go Home</a>
            </div>
        </div>
    </body>
</html>