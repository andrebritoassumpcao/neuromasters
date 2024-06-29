@props([
    'inputType' => 'text',
    'inputName',
    'placeholder',
    'class' => '',
    'options' => [],
    'value' => '',
    'attributes' => [],
])

<style>
    .campo-container {
        display: flex;
        flex-direction: column;
        margin-top: 20px;
    }

    input,
    select {
        flex-shrink: 0;
        border-radius: 8px;
        border: 1px solid #DBDCD6;
        color: #1b1b1b;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        padding: 8px;
    }

    input::placeholder,
    select::placeholder {
        color: #737576;
    }

    .input-s {
        height: 30px;
    }

    .input-m {
        height: 40px;
    }

    .input-g {
        height: 50px;
    }

    .quatro-col {
        width: 140px;
    }

    .seis-col {
        width: 210px;
    }

    .oito-col {
        width: 280px;
    }

    .dez-col {
        width: 350px;
    }

    .doze-col {
        width: 420px;
    }

    .max-col {
        width: 100%;
    }

    label {
        color: #000;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        margin-bottom: 8px;
        white-space: nowrap;

    }

    textarea {
        border-radius: 8px;
        border: 1px solid #DBDCD6;
        color: #1b1b1b;
        font-size: 18px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        padding: 8px;
        resize: none;
        margin-top: 8px;
        height: auto;
        min-height: 400px;
    }

    .txtarea textarea {
        height: 200px;
    }
</style>


@php
    $class = $class ?? 'doze-col';
    $componentClasses = 'campo-container ' . $class;
@endphp

<div class="{{ $componentClasses }}">
    <label for="{{ $inputName }}">
        {{ $labelSlot }}
    </label>
    @if ($inputType === 'select')
        <select name="{{ $inputName }}" {{ $attributes }}>
            @foreach ($options as $option)
                <option value="{{ $option['value'] }}" {{ $option['value'] === $value ? 'selected' : '' }}>
                    {{ $option['label'] }}
                </option>
            @endforeach
        </select>
    @elseif ($inputType === 'textarea')
        <textarea name="{{ $inputName }}" placeholder="{{ $placeholder }}" {{ $attributes }}>{{ $value }}</textarea>
    @else
        <input type="{{ $inputType }}" name="{{ $inputName }}" placeholder="{{ $placeholder }}"
            value="{{ $value }}" {{ $attributes }}>
    @endif

</div>
