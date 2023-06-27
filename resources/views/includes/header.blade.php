<!DOCTYPE html>
<html>

<head>
    <style>
        /* Estilos del encabezado */
        header {
            background-color: #CA0202;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo img {
            max-width: 120px;
            max-height: 80px;
        }

        .logo h3 {
            color: #ffffff;
            font-size: 25px;
            font-weight: 800;
            padding-right: 8px;
            align-items: center;
        }

        nav ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            margin-right: 10px;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: #555;
        }

        .mobile-menu {
            display: none;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        /* Estilos para dispositivos móviles */
        @media (max-width: 480px) {
            header {
                flex-direction: column;
                align-items: flex-start;
                padding: 10px 20px;
            }

            .logo {
                margin-bottom: 10px;
            }

            nav ul {
                flex-direction: column;
            }

            nav ul li {
                margin-bottom: 5px;
            }

            .mobile-menu {
                display: block;
            }
        }
    </style>
     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>

     <!-- Styles -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        <div class="logo">
            <img src="{{ asset('images/LogoOrnamentador.png') }}" alt="LOGO ORNAMENT">
        </div>
        <div class="logo">
            <h3>Ornamentadores SAS</h3>
        </div>
        <nav>
            <ul>
                <li><a href="/" class="white-text">Inicio</a></li>
                {{-- <li><a href="/QuienesSomos" class="white-text">Quiénes somos</a></li> --}}
                {{-- <li><a href="/Servicios" class="white-text">Servicios</a></li> --}}
                <li><a href="/productos" class="white-text">Productos</a></li>
                {{-- <li><a href="/Contacto" class="white-text">Contacto</a></li> --}}
                <li><a href="/login" class="white-text">Iniciar Sesion</a></li>
            </ul>
        </nav>
        <div class="mobile-menu">Menú</div>
    </header>
</body>

</html>
