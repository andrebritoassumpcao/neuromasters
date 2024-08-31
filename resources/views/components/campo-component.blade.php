@props([
    'inputType' => 'text',
    'inputId' => '',
    'inputOnBlur' => '',
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
        width: auto;

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
        min-height: 300px;
    }


    .txtarea textarea {
        height: 200px;
    }

    @media (max-width: 1200px) {
        .campo-container {
            margin-top: 16px;
            /* Reduz a margem superior para telas menores */
        }

        input,
        select {
            font-size: 14px;
            /* Reduz o tamanho da fonte para campos de entrada */
            padding: 6px;
            /* Reduz o padding para manter proporção */
        }

        .input-s {
            height: 25px;
            /* Reduz altura para pequenas entradas */
        }

        .input-m {
            height: 35px;
            /* Ajusta altura para entradas médias */
        }

        .input-g {
            height: 45px;
            /* Ajusta altura para entradas grandes */
        }

        .quatro-col {
            width: 100px;
            /* Ajusta largura para 4 colunas */
        }

        .seis-col {
            width: 150px;
            /* Ajusta largura para 6 colunas */
        }

        .oito-col {
            width: 200px;
            /* Ajusta largura para 8 colunas */
        }

        .dez-col {
            width: 250px;
            /* Ajusta largura para 10 colunas */
        }

        .doze-col {
            width: 300px;
            /* Ajusta largura para 12 colunas */
        }

        label {
            font-size: 16px;
            /* Reduz o tamanho da fonte dos labels */
            margin-bottom: 6px;
            white-space: normal;
            width: 200px;
        }

        textarea {
            font-size: 16px;
            padding: 6px;
            min-height: 200px;

        }

        .txtarea textarea {
            height: 150px;
            /* Ajusta altura específica para textarea dentro de .txtarea */
        }
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
        <input type="{{ $inputType }}" id="{{ $inputId }}" name="{{ $inputName }}"
            placeholder="{{ $placeholder }}" value="{{ $value }}" {{ $attributes }}
            onblur="{{ $inputOnBlur }}">
    @endif

</div>
