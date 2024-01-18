<style>
    .card-create {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        height: 210px;
        width: 190px;
        border: 0ch;
        padding-top: 30px;
        border-radius: 20px;
        background: #D9E5FF;
        margin: 20px;
        transition: transform 0.3s ease-in-out;
        cursor: pointer;
    }

    .card-create span {
        color: #FFF;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        background: linear-gradient(180deg, rgba(48, 156, 255, 0.00) 0%, rgba(12, 134, 246, 0.80) 70.01%);
        padding: 10px;
        backdrop-filter: blur(20px);
        border-radius: 0 0 20px 20px;
        transition: background 0.3s ease-in-out;
        text-align: center;

    }

    .card-create:hover {
        transform: scale(1.1);
    }

    .card-create:hover span {
        background: linear-gradient(180deg, rgba(48, 156, 255, 0.00) 0%, rgba(12, 134, 246, 0.50) 70.01%);
    }

    .card-create:hover svg {
        fill: #0C86F6;
        transition: fill 0.3s ease-in-out;
    }

    .card-create:hover .path-cruz {
        fill: #ffffff;
        transition: fill 0.3s ease-in-out;
    }
</style>
<a class="card-create" href="{{ route('cadastrar-beneficiario') }}">
    <svg width="86" height="85" viewBox="0 0 126 125" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g filter="url(#filter0_d_262_985)">
            <path
                d="M119.5 59.4727C119.5 90.9336 93.7607 116.445 62 116.445C30.2393 116.445 4.5 90.9336 4.5 59.4727C4.5 28.0119 30.2393 2.5 62 2.5C93.7607 2.5 119.5 28.0119 119.5 59.4727Z"
                stroke="#0C86F6" />
        </g>
        <path class="path-cruz"
            d="M67.5 53.5V53.75H67.75H79.25C80.7122 53.75 82.1124 54.3057 83.1431 55.2916C84.1734 56.2771 84.75 57.6113 84.75 59C84.75 60.3887 84.1734 61.7229 83.1431 62.7084C82.1124 63.6943 80.7122 64.25 79.25 64.25H67.75H67.5V64.5V75.5C67.5 76.8887 66.9234 78.2229 65.8931 79.2084C64.8624 80.1943 63.4622 80.75 62 80.75C60.5378 80.75 59.1376 80.1943 58.1069 79.2084C57.0766 78.2229 56.5 76.8887 56.5 75.5V64.5V64.25H56.25H44.75C43.2878 64.25 41.8876 63.6943 40.8569 62.7084C39.8266 61.7229 39.25 60.3887 39.25 59C39.25 57.6113 39.8266 56.2771 40.8569 55.2916C41.8876 54.3057 43.2878 53.75 44.75 53.75H56.25H56.5V53.5V42.5C56.5 41.1113 57.0766 39.7771 58.1069 38.7916C59.1376 37.8057 60.5378 37.25 62 37.25C63.4622 37.25 64.8624 37.8057 65.8931 38.7916C66.9234 39.7771 67.5 41.1113 67.5 42.5V53.5Z"
            fill="#0C86F6" stroke="#0A58FF" stroke-width="0.5" />
        <defs>
            <filter id="filter0_d_262_985" x="0" y="0" width="126" height="124.945" filterUnits="userSpaceOnUse"
                color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                    result="hardAlpha" />
                <feOffset dx="1" dy="3" />
                <feGaussianBlur stdDeviation="2.5" />
                <feComposite in2="hardAlpha" operator="out" />
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_262_985" />
                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_262_985" result="shape" />
            </filter>
        </defs>
    </svg>
    <span>Cadastre um novo Beneficiário</span>
</a>
