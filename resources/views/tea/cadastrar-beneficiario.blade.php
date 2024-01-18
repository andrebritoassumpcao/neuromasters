<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css\tea-style.css') }}">
    <title>Neuromasters TEA</title>
</head>



<body>
    <style>
        #beneficiarios span {
            color: #6D25B9;
        }

        #beneficiarios svg circle,
        #beneficiarios svg path {
            stroke: #6D25B9;
        }

        .left-container {
            background-color: #EBF1FF;
            border-radius: 8px 0 0 8px;
            height: 76svh;
            padding-top: 20px;
            min-width: 260px;
        }

        .registro-container {
            display: flex;
            margin: 0;
            flex-direction: row;
            justify-content: flex-start;
            border-radius: 14px;
            background: #FFF;

        }

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

        .right-container {}
    </style>
    <x-main.header-app></x-main.header-app>
    <main>
        <x-menu-lateral>
        </x-menu-lateral>

        <section class="tea-container">
            <div class="registro-container">

                <div class="left-container">

                    <a id="back-link" href="{{ route('beneficiarios') }}">
                        <svg width="13px" height="10px" viewBox="0 0 13 10">
                            <path d="M1,5 L11,5"></path>
                            <polyline points="8 1 12 5 8 9"></polyline>
                        </svg>
                        <span>Voltar</span>
                    </a>
                    <x-teaComponents.menubenef-component />
                </div>
                <div class="right-container">

                    <x-teaComponents.dadospessoais-component />


                </div>

            </div>
            </div>

        </section>
    </main>

</body>

</html>
