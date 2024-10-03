<style>
    .sign-button {
        display: flex;
        padding: 8px 20px;
        justify-content: center;
        align-items: center;
        gap: 10px;
        font-size: 16px;
        border-radius: 8px;
        background: #1E67FF;
        box-shadow: 4px 2px 20px 0px rgba(0, 0, 0, 0.25);
        color: #FFF;
        font-style: medium;
        transition: all 450ms ease-in-out;
        cursor: pointer;
    }

    .sign-button:hover {
        transform: translateY(-2px);
        background: #1452c6;


    }
</style>

@props(['url', 'style'])

<a href="{{ $url }}" class="sign-button" style="{{ $style }}">
    {{ $slot }}
</a>
