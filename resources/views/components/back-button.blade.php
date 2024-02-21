@props(['backLink'])
<style>
    #back-link {
        font-weight: 400;
        font-size: 16px;
        margin: 0 20px;
        padding: 8px 12px;
        transition: all .2s ease;
        border-radius: 28px;
    }

    #back-link:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        display: block;
        border-radius: 28px;
        width: 56px;
        height: 56px;
        transition: all 0.3s ease;
    }

    #back-link span {
        position: relative;
        font-size: 16px;
        line-height: 18px;
        font-weight: 900;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        vertical-align: middle;
    }

    #back-link svg {
        position: relative;
        top: 0;
        margin-left: 10px;
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke: #111;
        stroke-width: 2;
        transform: translateX(-5px) scaleX(-1);
        transition: all 0.3s ease;
    }

    #back-link:hover {
        background-color: #4B85FF;
    }
</style>
<a id="back-link" href="{{ $backLink }}">
    <svg width="13px" height="10px" viewBox="0 0 13 10">
        <path d="M1,5 L11,5"></path>
        <polyline points="8 1 12 5 8 9"></polyline>
    </svg>
    <span>Voltar</span>
</a>
