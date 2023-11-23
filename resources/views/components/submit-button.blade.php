<!-- x-submit-button.blade.php -->

@props(['nextStep', 'style'])

<style>
    .submit-button {
        display: flex;
        padding: 12px 28px;
        justify-content: center;
        align-items: center;
        gap: 10px;
        border-radius: 8px;
        background: #1E67FF;
        box-shadow: 4px 2px 20px 0px rgba(0, 0, 0, 0.25);
        color: #FFF;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        transition: all 450ms ease-in-out;
        cursor: pointer;
        border: none;
        text-decoration: none;
    }

    .submit-button:hover {
        transform: translateY(-2px);
        background: #1452c6;
    }
</style>

<button type="submit" class="submit-button" style="{{ $style }}" onclick="{{ $nextStep }}">
    {{ $slot }}
</button>
