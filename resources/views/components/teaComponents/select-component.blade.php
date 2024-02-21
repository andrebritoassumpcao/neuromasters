@props(['inputName', 'placeholder', 'inputClass', 'inputId', 'options'])

<style>
    .campo-container {
        display: flex;
        flex-direction: column;
        margin-top: 20px;
    }


    select {

        border-radius: 8px;
        border: 1px solid #DBDCD6;
        color: #1b1b1b;
        font-size: 18px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        padding: 8px;

    }

    select::placeholder {
        color: #737576;
        font-size: 18px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;

    }

    label {
        color: #000;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        margin-bottom: 8px;
    }
</style>
<div class="campo-container">
    <label for="{{ $inputName }}">
        {{ $labelSlot }}
    </label>
    <select class="{{ $inputClass }}" name="{{ $inputName }}" placeholder="{{ $placeholder }}"
        id="{{ $inputId }}">>
        @foreach ($options as $option)
            <option value="{{ $option['value'] }}">{{ $option['text'] }}</option>
        @endforeach
    </select>
</div>
