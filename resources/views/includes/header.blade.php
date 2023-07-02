<!DOCTYPE html>
<html>

<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');


        /* Estilos generales */
        html,
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', serif;
        }

        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50px;
            padding: 0 20px;
            background-color: #1d1792;
            /* Cambiado a color blanco */
            z-index: 999;
            transition: background-color 0.3s;
            font-family: 'Poppins', serif;
            /* Aplica la fuente 'Poppins' al header */
            font-size: 16px;
        }

        .header a {
            color: #333;
            text-decoration: none;
            margin-right: 20px;
        }

        .header .logo {
            margin-right: auto;
        }

        .header .menu {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
        }

        .header .menu a {
            margin: 0 10px;
            padding: 5px;
            transition: background-color 0.3s;
            color: #fff;
            /* Cambiado a color blanco */
        }

        .header .menu a:hover {
            background-color: #f67267;
            /* Cambiado a azul oscuro */
            color: #fff;
            /* Cambiado a color blanco */
        }

        .header .menu .right {
            position: relative;
            right: -380px;
            /* Ajusta el valor en píxeles según tus necesidades */
        }

        .logo img {
            max-height: 80%;
            max-width: 80%;
        }
    </style>
</head>

<body>
    <br>
    <br>
    <header class="header">
        <div class="logo">
            <img src="{{ asset('images/Logo.png') }}" alt="Logo">
        </div>
        <div class="menu">
            <a href="/">Inicio</a>
            <a href="/productos">Productos</a>
            <a href="/Contacto">Contacto</a>
            @if (Auth::user())
                <a href="usuarios">Usuarios</a>
                <a class="right" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('Cerrar Sesión') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @else
                <a href="/login" class="right">Iniciar Sesión</a>
            @endif
        </div>
    </header>

    <script></script>
</body>

</html>
