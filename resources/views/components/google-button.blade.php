<style>
    .google-button {
        display: inline-flex;
        color: #000;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        line-height: 31.68px;
        /* 144% */
        padding: 12px 65px;
        align-items: center;
        gap: 12px;
        border-radius: 8px;
        border: 1px solid var(--gray, #DBDCD6);
        margin-top: 20px;
    }

    .google-button:hover {
        background-color: #eaebe7
    }
</style>

@props(['url'])

<a href="{{ $url }}" class="google-button">
    <img src="{{ asset('images/google logo.svg') }}" alt="">
    {{ $slot }}
</a>
