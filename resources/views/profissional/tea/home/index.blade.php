@php
    $user = Auth::user();
@endphp

<link rel="stylesheet" type="text/css" href="{{ asset('css/tea/style.css') }}">
<title>Neuromasters TEA</title>
<style>
    #meu-painel span {
        color: #6D25B9;
    }

    #meu-painel svg circle,
    #meu-painel svg path {
        stroke: #6D25B9;
    }
</style>

<x-layouts.app>
    {{-- {{ dd(session('user')) }} --}}
    <x-header-pro-app :user="session('user')"></x-header-pro-app>


</x-layouts.app>
