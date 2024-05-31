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
