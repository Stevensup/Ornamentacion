<!DOCTYPE html>
<html>

<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lora&display=swap');

        /* Estilos generales */
        html,
        body {
            margin: 0;
            padding: 0;
            font-family: 'Lora', serif;
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
            background-color: #fff; /* Cambiado a color blanco */
            z-index: 999;
            transition: background-color 0.3s;
            font-family: 'Lora', serif; /* Aplica la fuente 'Lora' al header */
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
        }

        .header .menu a:hover {
            background-color: #455c86; /* Cambiado a azul oscuro */
            color: #fff; /* Cambiado a color blanco */
        }

        .header .menu .right {
            position: relative;
            right: -407px; /* Ajusta el valor en píxeles según tus necesidades */
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
            <a href="/login.blade.php" class="right"><b>| Ingresar |</b></a>  
        </div>
    </header>

    <script>
       
    </script>
</body>

</html>
