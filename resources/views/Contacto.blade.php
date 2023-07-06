<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ornamentadores Anyi</title>
    <link rel="icon" type="image/png" href="{{ asset('images/Logo.png') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');

        /* Estilos generales */
        html,
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', serif;
        }

        .logo img {
            max-width: 150px;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 10px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        /* Estilos del contenido */
        .content {
            padding: 20px;
            background-color: #ffffff;
            margin: 0 0 80px;
            background-image: url('{{ asset('images/prin/Contact.png') }}');
            background-repeat: no-repeat;
            background-position: right bottom;
            background-size: auto 110%;
            opacity: 0.6;
        }

        h1 {
            color: #fff;
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            color: #fff;
            font-size: 16px;
            line-height: 1.5;
        }

        .contact-info {
            font-size: 16px;
            background-color: #ffffff;
            color: #fff;
            padding: 10px;
        }

        .rights {
            text-align: center;
        }

        /* Estilos del formulario */
        .contactBody {
            background-color: #2C2C2E;
            background-size: cover;
            background-attachment: fixed;
            height: 100vh;
        }

        .wrapper {
            width: 80%;
            margin: 5% auto 0 auto;
        }

        .title {
            margin: 0 auto;
            width: 50%;
            text-align: center;
            padding-bottom: 10px;
            font-size: 42px;
            color: #000000;
        }

        .form {
            background: #F3F3F3;
            text-align: center;
            box-shadow: 0px 0px 20px 5px #aaa;
            border-radius: 10px;
            width: 45%;
            margin: 30px auto;
            padding: 10px;
            animation: bounce 1.5s infinite;
        }

        .entry {
            display: block;
            margin: 30px auto;
            padding: 10px;
            border-radius: 5px;
            border: none;
            transition: all 0.5s ease 0s;
            box-shadow: 0px 0px 25px 2px #aaa;
            color: #000;
        }

        .name {
            background-color: #fff;
            border-bottom: 5px solid #1d1792;
            color: #000;
            width: 200px;
        }

        .email {
            background-color: #fff;
            border-bottom: 5px solid #1d1792;
            height: 50px;
            width: 200px;
        }

        .message {
            background-color: #fff;
            border-bottom: 5px solid #1d1792;
            color: #000;
            overflow: hidden;
            height: 100px;
            width: 200px;
        }

        .submit {
            border-radius: 5px;
            padding: 10px;
            width: 150px;
            color: #fff;
            background-color: #1d1792;
            border: none;
            border-bottom: 5px solid #1d1792;
        }

        .shadow {
            box-shadow: 0px 0px 60px 5px #aaa;
            opacity: 0.5;
            border-radius: 100px;
            width: 50%;
            margin: 50px auto 0 auto;
            padding: 0 20px;
            animation: shadow 1.5s infinite;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            text-align: center;
            border-radius: 5px;
            box-shadow: 0px 0px 20px 5px #aaa;
            animation: bounce 1.5s infinite;
        }

        .checkmark {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            display: inline-block;
            stroke-width: 4;
            stroke: #fff;
            stroke-miterlimit: 10;
            box-shadow: inset 0px 0px 0px #7ac142;
            animation: fill 0.4s ease-in-out 0.4s forwards, scale 0.3s ease-in-out 0.9s both;
            position: relative;
            top: -10px;
        }

        .checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 4;
            stroke-miterlimit: 10;
            stroke: #7ac142;
            fill: none;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }

        .checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
        }

        @keyframes bounce {
            0% {}

            50% {
                transform: translate(0, 8px);
            }
        }

        @keyframes shadow {
            0% {}

            50% {
                opacity: 0.8;
                width: 50%;
            }
        }

        @keyframes fill {
            50% {
                box-shadow: inset 0px 0px 0px #7ac142;
            }

            100% {
                box-shadow: inset 0px 0px 50px #7ac142;
            }
        }

        @keyframes scale {

            0%,
            100% {
                transform: none;
            }

            50% {
                transform: scale3d(1.1, 1.1, 1);
            }
        }

        @keyframes stroke {
            100% {
                stroke-dashoffset: 0;
            }
        }
    </style>
</head>

<body>
    @include('includes.header')
    <link rel="icon" type="image/png" href="images\Logo.png">
    <div class="content">
        <div class="wrapper">
            <div class="title">
                Formulario de Órdenes
            </div>
            <form class="form" action="{{ route('safemessage') }}" method="POST">
                @csrf
                <input type="text" class="name entry" placeholder="Nombre" style="color: #000;" name="nombre">
                <input type="email" class="email entry" placeholder="Email" style="color: #000;" name="email">
                <textarea class="message entry" placeholder="Mensaje" style="color: #000;" name="descripcion"></textarea>
                <select class="entry" name="tipo_servicio">
                    <option value="">Seleccionar tipo de servicio</option>
                    <option value="Cotización">Cotización</option>
                    <option value="Reparación">Reparación</option>
                    <option value="Configuración">Configuración</option>
                    <option value="Instalación">Instalación</option>
                </select>
                <button class="submit entry" onclick="thanks()">Enviar</button>
            </form>
        </div>
    </div>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
            </svg>
            <p>Mensaje enviado correctamente</p>
        </div>
    </div>
    @include('includes.footer')

    <script>
        function thanks() {
            var modal = document.getElementById("myModal");
            modal.style.display = "block";

            setTimeout(function() {
                modal.style.display = "none";
            }, 6000); // Ocultar el modal después de 3 segundos (3000 milisegundos)
        }
    </script>
</body>
@include('includes.redes')

</html>
