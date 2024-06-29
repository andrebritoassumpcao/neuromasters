<!DOCTYPE html>
<html lang="en">
@php
    $user = Auth::user();
@endphp


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css\tea-style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Neuromasters TEA</title>
</head>
<style>
    #meu-painel span {
        color: #6D25B9;
    }

    #meu-painel svg circle,
    #meu-painel svg path {
        stroke: #6D25B9;
    }
</style>

<body>
    {{-- {{ dd(session('user')) }} --}}
    <x-header-pro-app :user="session('user')"></x-header-pro-app>



</body>

</html>
