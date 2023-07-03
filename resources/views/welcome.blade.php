<!DOCTYPE html>
<html>
@extends('includes.header')
<head>
    <title>Ornamentacion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/css/bootstrap.min.css">
    <style>
        /* Estilos del carrusel */
        #carouselExampleIndicators {
            max-width: 600px;
            /* Ajusta el ancho máximo del carrusel según tus necesidades */
            margin: 0 auto;
            /* Centra el carrusel horizontalmente */
        }

         /* Establece un tamaño fijo para el contenedor del mapa */
         #map {
            height: 400px;
            width: 100%;
        }

        .carousel-item img {
            height: 300px;
            /* Ajusta la altura de las imágenes del carrusel según tus necesidades */
            /* object-fit: cover; Quitar esta línea */
            /* Ajusta cómo se ajusta la imagen dentro del contenedor */
        }

        .mission-vision {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-top: 20px;
            /* Agregamos margen superior para evitar superposición con el encabezado */
        }

        .mission-vision .mission {
            flex-basis: 50%;
            padding-right: 20px;
        }

        .mission-vision .vision {
            flex-basis: 50%;
            padding-left: 20px;
        }

        .mission-vision img {
            max-width: 100%;
            height: auto;
            float: right;
            margin-left: 20px;
        }

        /* Añadir el estilo para justificar los textos */
        p {
            text-align: justify;
        }
    </style>
    <style>
        /* Agregar la fuente de Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');


        /* Aplicar la fuente a los elementos de texto */
        body {
            font-family: 'Poppins', serif;
        }

    </style>
    <style>
        /* Ajustar el tamaño del mapa de Google Maps */
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container">      
        <br>
        <br>
        <br>
        <center>
            <h2>Galería de Imágenes</h2>
        </center>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/prin/Fabricando.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/prin/forjado al rojo vivo.webp') }}" class="d-block w-100"
                        alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/prin/herreria.jpg') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="mission" style="background-color: #98b6f8 ; padding: 20px;">
                    <center>
                        <h1>Misión</h1>
                    </center>
                    <p>Ser una empresa líder a nivel nacional brindando soluciones en el mercado de los servicios que ofrecemos,
                        garantizando la calidad de nuestros servicios y productos, actualizándonos constantemente de acuerdo a la
                        tendencia en tecnología.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="vision" style="background-color: #98b6f8 ; padding: 20px;">
                    <center>
                        <h1>Visión</h1>
                    </center>
                    <p>Ser una empresa líder a nivel nacional brindando soluciones en el mercado de los servicios que ofrecemos,
                        garantizando la calidad de nuestros servicios y productos, actualizándonos constantemente de acuerdo a
                        la tendencia en tecnología.</p>
                </div>
            </div>
        </div>
    </div>
   
    <div style="margin: 2cm;">
        <br>
        <center>
            <h1>Quiénes Somos</h1>
        </center>
        <div class="row">
            <div class="col-lg-6" style="center;">
                <br>
                <p>Somos una empresa de ornamentación dedicada a embellecer espacios y crear ambientes únicos. Nuestra pasión por el arte y el diseño nos impulsa a ofrecer soluciones personalizadas y creativas para satisfacer las necesidades de nuestros clientes. Con años de experiencia en el sector, contamos con un equipo de expertos en ornamentación que dominan diferentes técnicas y estilos, desde la elaboración de esculturas y murales hasta la selección de elementos decorativos y la creación de composiciones florales. Nos enorgullece convertir cada lugar en un rincón especial, lleno de belleza y armonía, transformando ideas en realidades visibles y emocionantes. Nuestro compromiso es brindar un servicio de alta calidad, con atención al detalle y un enfoque orientado al cliente, superando siempre las expectativas. Bienvenidos a nuestro mundo de ornamentos, donde la creatividad se convierte en arte.</p>
            </div>
            <div class="col-lg-6" style="text-align: right;">
                <br>
                <img src="{{ asset('images/prin/Hombre con protección.png') }}" alt="Quiénes Somos">
            </div>
        </div>
    </div>
    
    <div id="map"></div>
    
    </div>
    @extends('includes.redes')
    @extends('includes.footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/js/bootstrap.min.js"></script>
    <script>
        // Función para inicializar y cargar el mapa
        function initMap() {
            // Coordenadas del centro del mapa (puedes cambiarlas según tu preferencia)
           var center = { lat: 4.6097, lng: -74.0817 };


            // Crea un nuevo mapa en el elemento con el ID 'map'
            var map = new google.maps.Map(document.getElementById('map'), {
                center: center,
                zoom: 12 // Nivel de zoom inicial (puedes ajustarlo según tu preferencia)
            });

            // Puedes agregar marcadores u otras capas en el mapa si lo deseas

            // Ejemplo de marcador
            var marker = new google.maps.Marker({
                position: center,
                map: map,
                title: 'Ubicación'
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>
</body>
</html>
