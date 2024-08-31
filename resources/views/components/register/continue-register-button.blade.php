@props(['nextStep', 'style'])

<style>
    .continue-button {
        display: flex;
        padding: 10px 24px;
        justify-content: center;
        align-items: center;
        gap: 8px;
        border-radius: 6px;
        background: #1E67FF;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        color: #FFF;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        transition: background 250ms ease-in-out, transform 150ms ease-in-out;
        cursor: pointer;
        border: none;
        text-decoration: none;
    }

    .continue-button:hover {
        background: #1450c3;
        transform: translateY(-2px);
    }

    .continue-button:active {
        background: #123b9a;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);
        transform: translateY(0);
    }
</style>

<button type="button" class="continue-button" style="{{ $style }}" onclick="{{ $nextStep }}">
    {{ $slot }}
</button>
