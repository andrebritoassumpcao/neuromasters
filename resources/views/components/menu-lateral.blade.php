<style>
    .sidebar-container {
        position: absolute;
        top: 80px;
        left: 0;
        min-width: 312.375px;

        background-color: #ffffff;
        transition: width 600ms ease;
        background: #FFF;
        box-shadow: 4px 0px 20px 0px rgba(0, 0, 0, 0.05);

    }

    .sidebar {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 100svh;
    }

    .sidebar-item {
        width: 100%;

    }



    .sidebar-link {
        display: flex;
        align-items: center;
        height: 5rem;
        color: #0D0E01;
        text-decoration: none;
        filter: grayscale(0%) opacity(0.7);
        padding-right: 25px;

    }

    .sidebar-link:hover {
        filter: grayscale(0%) opacity(1);
        background: #ececec;
        color: #0D0E01;

    }

    .link-text {
        margin-left: 12px;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }

    .sidebar-link svg {
        width: 2rem;
        min-width: 2rem;
        margin: 0 1.5rem;
    }
</style>
<nav class="sidebar-container">
    <ul class="sidebar">
        <li class="sidebar-item" id="meu-painel">
            <a href="/tea-app" class="sidebar-link">

                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M22 22L2 22" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                        <path d="M2 11L10.1259 4.49931C11.2216 3.62279 12.7784 3.62279 13.8741 4.49931L22 11"
                            stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                        <path opacity="0.5"
                            d="M15.5 5.5V3.5C15.5 3.22386 15.7239 3 16 3H18.5C18.7761 3 19 3.22386 19 3.5V8.5"
                            stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                        <path d="M4 22V9.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                        <path d="M20 22V9.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                        <path opacity="0.5"
                            d="M15 22V17C15 15.5858 15 14.8787 14.5607 14.4393C14.1213 14 13.4142 14 12 14C10.5858 14 9.87868 14 9.43934 14.4393C9 14.8787 9 15.5858 9 17V22"
                            stroke="#1C274C" stroke-width="1.5"></path>
                        <path opacity="0.5"
                            d="M14 9.5C14 10.6046 13.1046 11.5 12 11.5C10.8954 11.5 10 10.6046 10 9.5C10 8.39543 10.8954 7.5 12 7.5C13.1046 7.5 14 8.39543 14 9.5Z"
                            stroke="#1C274C" stroke-width="1.5"></path>
                    </g>
                </svg>
                <span class="link-text">Meu painel</span>
            </a>
        </li>
        <li class="sidebar-item" id="beneficiarios">
            <a href="{{ route('beneficiarios') }}" class="sidebar-link">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <circle cx="10" cy="6" r="4" stroke="#1C274C" stroke-width="1.5"></circle>
                        <path
                            d="M18 17.5C18 19.9853 18 22 10 22C2 22 2 19.9853 2 17.5C2 15.0147 5.58172 13 10 13C14.4183 13 18 15.0147 18 17.5Z"
                            stroke="#1C274C" stroke-width="2"></path>
                        <path
                            d="M18.0885 12.5385L18.5435 11.9423L18.0885 12.5385ZM19 8.64354L18.4681 9.17232C18.6089 9.31392 18.8003 9.39354 19 9.39354C19.1997 9.39354 19.3911 9.31392 19.5319 9.17232L19 8.64354ZM19.9115 12.5385L19.4565 11.9423L19.9115 12.5385ZM18.5435 11.9423C18.0571 11.571 17.619 11.274 17.2659 10.8891C16.9387 10.5324 16.75 10.1638 16.75 9.69973H15.25C15.25 10.6481 15.6642 11.362 16.1606 11.9031C16.6311 12.4161 17.2372 12.8322 17.6335 13.1347L18.5435 11.9423ZM16.75 9.69973C16.75 9.28775 16.9898 8.95469 17.2973 8.81862C17.5635 8.7008 17.9874 8.68874 18.4681 9.17232L19.5319 8.11476C18.6627 7.24047 17.5865 7.0503 16.6903 7.44694C15.8352 7.82533 15.25 8.69929 15.25 9.69973H16.75ZM17.6335 13.1347C17.7825 13.2483 17.9756 13.3959 18.1793 13.5111C18.3832 13.6265 18.6656 13.75 19 13.75V12.25C19.0344 12.25 19.0168 12.2615 18.9179 12.2056C18.8187 12.1495 18.7061 12.0663 18.5435 11.9423L17.6335 13.1347ZM20.3665 13.1347C20.7628 12.8322 21.3689 12.4161 21.8394 11.9031C22.3358 11.362 22.75 10.6481 22.75 9.69973H21.25C21.25 10.1638 21.0613 10.5324 20.7341 10.8891C20.381 11.274 19.9429 11.571 19.4565 11.9423L20.3665 13.1347ZM22.75 9.69973C22.75 8.69929 22.1648 7.82533 21.3097 7.44694C20.4135 7.0503 19.3373 7.24047 18.4681 8.11476L19.5319 9.17232C20.0126 8.68874 20.4365 8.7008 20.7027 8.81862C21.0102 8.95469 21.25 9.28775 21.25 9.69973H22.75ZM19.4565 11.9423C19.2939 12.0663 19.1813 12.1495 19.0821 12.2056C18.9832 12.2615 18.9656 12.25 19 12.25V13.75C19.3344 13.75 19.6168 13.6265 19.8207 13.5111C20.0244 13.3959 20.2175 13.2483 20.3665 13.1347L19.4565 11.9423Z"
                            fill="#1C274C"></path>
                    </g>
                </svg>
                <span class="link-text">Meus Beneficiários</span>
            </a>
        </li>
        <li class="sidebar-item" id="atendimentos">
            <a href="{{ route('atendimentos') }}" class="sidebar-link">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path opacity="1" d="M18 10L13 10" stroke="#1C274C" stroke-width="1.5"
                            stroke-linecap="round"></path>
                        <path opacity="0.5"
                            d="M10 3H16.5C16.9644 3 17.1966 3 17.3916 3.02567C18.7378 3.2029 19.7971 4.26222 19.9743 5.60842C20 5.80337 20 6.03558 20 6.5"
                            stroke="#1C274C" stroke-width="1.5"></path>
                        <path
                            d="M2 6.94975C2 6.06722 2 5.62595 2.06935 5.25839C2.37464 3.64031 3.64031 2.37464 5.25839 2.06935C5.62595 2 6.06722 2 6.94975 2C7.33642 2 7.52976 2 7.71557 2.01738C8.51665 2.09229 9.27652 2.40704 9.89594 2.92051C10.0396 3.03961 10.1763 3.17633 10.4497 3.44975L11 4C11.8158 4.81578 12.2237 5.22367 12.7121 5.49543C12.9804 5.64471 13.2651 5.7626 13.5604 5.84678C14.0979 6 14.6747 6 15.8284 6H16.2021C18.8345 6 20.1506 6 21.0062 6.76946C21.0849 6.84024 21.1598 6.91514 21.2305 6.99383C22 7.84935 22 9.16554 22 11.7979V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V6.94975Z"
                            stroke="#1C274C" stroke-width="1.5"></path>
                    </g>
                </svg>
                <span class="link-text">Meus Atendimentos</span>
            </a>
        </li>
        <li class="sidebar-item" id="avaliacoes">
            <a href="{{ route('avaliacoes') }}" class="sidebar-link">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M20.082 3.01787L20.1081 3.76741L20.082 3.01787ZM16.5 3.48757L16.2849 2.76907V2.76907L16.5 3.48757ZM13.6738 4.80287L13.2982 4.15375L13.2982 4.15375L13.6738 4.80287ZM3.9824 3.07501L3.93639 3.8236L3.9824 3.07501ZM7 3.48757L7.19136 2.76239V2.76239L7 3.48757ZM10.2823 4.87558L9.93167 5.5386L10.2823 4.87558ZM13.6276 20.0694L13.9804 20.7312L13.6276 20.0694ZM17 18.6335L16.8086 17.9083H16.8086L17 18.6335ZM19.9851 18.2229L20.032 18.9715L19.9851 18.2229ZM10.3724 20.0694L10.0196 20.7312H10.0196L10.3724 20.0694ZM7 18.6335L7.19136 17.9083H7.19136L7 18.6335ZM4.01486 18.2229L3.96804 18.9715H3.96804L4.01486 18.2229ZM2.75 16.1437V4.99792H1.25V16.1437H2.75ZM22.75 16.1437V4.93332H21.25V16.1437H22.75ZM20.0559 2.26832C18.9175 2.30798 17.4296 2.42639 16.2849 2.76907L16.7151 4.20606C17.6643 3.92191 18.9892 3.80639 20.1081 3.76741L20.0559 2.26832ZM16.2849 2.76907C15.2899 3.06696 14.1706 3.6488 13.2982 4.15375L14.0495 5.452C14.9 4.95981 15.8949 4.45161 16.7151 4.20606L16.2849 2.76907ZM3.93639 3.8236C4.90238 3.88297 5.99643 3.99842 6.80864 4.21274L7.19136 2.76239C6.23055 2.50885 5.01517 2.38707 4.02841 2.32642L3.93639 3.8236ZM6.80864 4.21274C7.77076 4.46663 8.95486 5.02208 9.93167 5.5386L10.6328 4.21257C9.63736 3.68618 8.32766 3.06224 7.19136 2.76239L6.80864 4.21274ZM13.9804 20.7312C14.9714 20.2029 16.1988 19.6206 17.1914 19.3587L16.8086 17.9083C15.6383 18.2171 14.2827 18.8702 13.2748 19.4075L13.9804 20.7312ZM17.1914 19.3587C17.9943 19.1468 19.0732 19.0314 20.032 18.9715L19.9383 17.4744C18.9582 17.5357 17.7591 17.6575 16.8086 17.9083L17.1914 19.3587ZM10.7252 19.4075C9.71727 18.8702 8.3617 18.2171 7.19136 17.9083L6.80864 19.3587C7.8012 19.6206 9.0286 20.2029 10.0196 20.7312L10.7252 19.4075ZM7.19136 17.9083C6.24092 17.6575 5.04176 17.5357 4.06168 17.4744L3.96804 18.9715C4.9268 19.0314 6.00566 19.1468 6.80864 19.3587L7.19136 17.9083ZM21.25 16.1437C21.25 16.8295 20.6817 17.4279 19.9383 17.4744L20.032 18.9715C21.5062 18.8793 22.75 17.6799 22.75 16.1437H21.25ZM22.75 4.93332C22.75 3.47001 21.5847 2.21507 20.0559 2.26832L20.1081 3.76741C20.7229 3.746 21.25 4.25173 21.25 4.93332H22.75ZM1.25 16.1437C1.25 17.6799 2.49378 18.8793 3.96804 18.9715L4.06168 17.4744C3.31831 17.4279 2.75 16.8295 2.75 16.1437H1.25ZM13.2748 19.4075C12.4825 19.8299 11.5175 19.8299 10.7252 19.4075L10.0196 20.7312C11.2529 21.3886 12.7471 21.3886 13.9804 20.7312L13.2748 19.4075ZM13.2982 4.15375C12.4801 4.62721 11.4617 4.65083 10.6328 4.21257L9.93167 5.5386C11.2239 6.22189 12.791 6.18037 14.0495 5.452L13.2982 4.15375ZM2.75 4.99792C2.75 4.30074 3.30243 3.78463 3.93639 3.8236L4.02841 2.32642C2.47017 2.23065 1.25 3.49877 1.25 4.99792H2.75Z"
                            fill="#1C274D"></path>
                        <path opacity="0.5" d="M12 5.854V20.9999" stroke="#1C274D" stroke-width="1.5"></path>
                        <path opacity="0.5" d="M5 9L9 10" stroke="#1C274D" stroke-width="1.5"
                            stroke-linecap="round"></path>
                        <path opacity="0.5" d="M5 13L9 14" stroke="#1C274D" stroke-width="1.5"
                            stroke-linecap="round"></path>
                        <path opacity="0.5" d="M19 13L15 14" stroke="#1C274D" stroke-width="1.5"
                            stroke-linecap="round"></path>
                        <path
                            d="M19 5.5V9.51029C19 9.78587 19 9.92366 18.9051 9.97935C18.8103 10.035 18.6806 9.97343 18.4211 9.85018L17.1789 9.26011C17.0911 9.21842 17.0472 9.19757 17 9.19757C16.9528 9.19757 16.9089 9.21842 16.8211 9.26011L15.5789 9.85018C15.3194 9.97343 15.1897 10.035 15.0949 9.97935C15 9.92366 15 9.78587 15 9.51029V6.95002"
                            stroke="#1C274D" stroke-width="1.5" stroke-linecap="round"></path>
                    </g>
                </svg>
                <span class="link-text">Minhas Avaliações</span>
            </a>
        </li>
        <li class="sidebar-item" id="intervencao">
            <a href="{{ route('intervencao') }}" class="sidebar-link" id="estrategias">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M16 22C14.1144 22 13.1716 22 12.5858 21.4142C12 20.8284 12 19.8856 12 18L12 6C12 4.11438 12 3.17157 12.5858 2.58579C13.1716 2 14.1144 2 16 2L18 2C19.8856 2 20.8284 2 21.4142 2.58579C22 3.17157 22 4.11438 22 6V18C22 19.8856 22 20.8284 21.4142 21.4142C20.8284 22 19.8856 22 18 22H16Z"
                            stroke="#1C274C" stroke-width="1.5"></path>
                        <path opacity="0.5" d="M12 12H14M12 6L14 6M12 18H14M12 15L15 15M12 9L15 9" stroke="#1C274C"
                            stroke-width="1.5" stroke-linecap="round"></path>
                        <path
                            d="M6.01206 21.0271L5.72361 21.5751C5.58657 21.8355 5.30643 22 5 22C4.69357 22 4.41343 21.8355 4.27639 21.5751L3.98794 21.0271M6.01206 21.0271H3.98794M6.01206 21.0271L7.19209 18.785C7.47057 18.2559 7.60981 17.9914 7.71267 17.7157C7.834 17.3905 7.91768 17.0538 7.96223 16.7114C8 16.4211 8 16.1254 8 15.5338L8 5.8L8 4.85C8 3.27599 6.65685 2 5 2C3.34315 2 2 3.27599 2 4.85L2 5.8L2 15.5338C2 16.1254 2 16.4211 2.03777 16.7114C2.08232 17.0538 2.166 17.3905 2.28733 17.7157C2.39019 17.9914 2.52943 18.2559 2.8079 18.785L3.98794 21.0271"
                            stroke="#1C274C" stroke-width="1.5"></path>
                        <path opacity="0.5"
                            d="M2 5.7998C2 5.7998 3.125 6.7498 5 6.7498C6.875 6.7498 8 5.7998 8 5.7998"
                            stroke="#1C274C" stroke-width="1.5"></path>
                    </g>
                </svg>
                <span class="link-text">Estratégias de Intervenção</span>
            </a>
        </li>
        <li class="sidebar-item" id="indicacoes">
            <a href="{{ route('indicacoes') }}" class="sidebar-link">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <circle cx="12" cy="6" r="4" stroke="#1C274C" stroke-width="1.5"></circle>
                        <path opacity="0.5" d="M18 9C19.6569 9 21 7.88071 21 6.5C21 5.11929 19.6569 4 18 4"
                            stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                        <path opacity="0.5" d="M6 9C4.34315 9 3 7.88071 3 6.5C3 5.11929 4.34315 4 6 4"
                            stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                        <ellipse cx="12" cy="17" rx="6" ry="4" stroke="#1C274C"
                            stroke-width="1.5"></ellipse>
                        <path opacity="0.5"
                            d="M20 19C21.7542 18.6153 23 17.6411 23 16.5C23 15.3589 21.7542 14.3847 20 14"
                            stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                        <path opacity="0.5" d="M4 19C2.24575 18.6153 1 17.6411 1 16.5C1 15.3589 2.24575 14.3847 4 14"
                            stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                    </g>
                </svg>
                <span class="link-text">Minhas Indicações</span>
            </a>
        </li>
        <li class="sidebar-item" id="profissionais">
            <a href="{{ route('profissionais') }}" class="sidebar-link">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M2 14C2 10.2288 2 8.34315 3.17157 7.17157C4.34315 6 6.22876 6 10 6H14C17.7712 6 19.6569 6 20.8284 7.17157C22 8.34315 22 10.2288 22 14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14Z"
                            stroke="#1C274D" stroke-width="1.5"></path>
                        <path opacity="0.5"
                            d="M21.6618 8.71973C18.6519 10.6761 17.147 11.6543 15.5605 12.1472C13.2416 12.8677 10.7586 12.8677 8.43963 12.1472C6.85313 11.6543 5.34822 10.6761 2.33838 8.71973"
                            stroke="#1C274D" stroke-width="1.5" stroke-linecap="round"></path>
                        <path d="M8 11V13" stroke="#1C274D" stroke-width="1.5" stroke-linecap="round"></path>
                        <path d="M16 11V13" stroke="#1C274D" stroke-width="1.5" stroke-linecap="round"></path>
                        <path opacity="0.5"
                            d="M9.17065 4C9.58249 2.83481 10.6937 2 11.9999 2C13.3062 2 14.4174 2.83481 14.8292 4"
                            stroke="#1C274D" stroke-width="1.5" stroke-linecap="round"></path>
                    </g>
                </svg>
                <span class="link-text">Meus Profissionais</span>
            </a>
        </li>
    </ul>
</nav>
