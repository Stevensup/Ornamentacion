<!DOCTYPE html>
<html>
<head>
<title>Ornamentación Anyi</title>
<link rel="icon" type="image/png" href="images\Logo.png">
  <style>
    /* Estilos generales */
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
    list-style: none;
}

body{
  margin: 0 0 0 0;
}

    /* Estilos de la sección "Servicios" */
    .services-section {
      background-color: #ffffff;
      padding-top: 100%;
      padding: 100px;
      text-align: justify;
      margin: 90px 0;
    }

    .services-section h2 {
      font-size: 24px;
      color: #071E63;
      margin-bottom: 20px;
    }

    .services-section p {
      font-size: 18px;
      font-weight: 500;
      color: #071E63;
      line-height: 1.5;
      margin-bottom: 30px;
    }

    /*Estilos del los servicios en filas */
    .cajas {
    display: grid;
    grid-template-columns: repeat(3,1fr);
    grid-auto-rows: auto;
    grid-gap: 3rem;
    }

    .services {
    padding: 35px;
    text-align: center;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
    border-radius: 25px;
    background: #86b8fc;
    }

    .services img {
    width: 200px;
    height: 250px;
    border-radius: 25px 25px 25px 25px;
    }

    .services h3 {
    font-size: 20px;
    color: #303030;
    margin-top: 15px;
    }

    .services p {
    font-size: 16px;
    padding: 30px;
    color: #545454;
    margin: 0;
    }

    .boton {
        margin: 0 auto;
    }

    .boton a {
    background-image: radial-gradient(circle at 43.84% 120.44%, #ec9e43 0, #ee923f 16.67%, #f1863d 33.33%, #f2793c 50%, #f36b3d 66.67%, #f35c40 83.33%, #f44d45 100%);
    padding: 10px;
    color: #ffffff;
    border-radius: 15px 500px;
    cursor: pointer;
    text-decoration: none;
    text-align: center;
    margin-top: 35px;
    width: 25%;
    }

    /* Estilos del encabezado */
   

    /* Estilos del pie de página */
    

  </style>
</head>
<body>
  <div id="container">
    @include('includes.header')

    <div class="services-section">
      <center>
      <h1>Servicios de Ornamentación y Soldadura</h1>
      </center>
      <br>
    <div class="cajas">  
      <div class="services">
            <img src="images/welding.webp" alt="FABRICACIÓN DE PRODUCTOS">
            <h3>FABRICACIÓN DE PRODUCTOS</h3>
            <p> Se fabrica todo tipo de productos solicitados como puertas, bordes de las ventanas, rejas, entre otros; en cualquier material como hierro, acero, entre otros </p>
      </div>
      <div class="services">
          
            <img src="images/prensa.jpg"  alt="PRENSA HIDRÁULICA">
            <h3>PRENSA HIDRÁULICA</h3>
            <p> Se presta servicio de prensa hidrulica para: doblar, enderezar, aplastar, prensar, formar, empujar, tirar o extender algun producto solicitado </p>
      </div>
      <div class="services">
            <img src="{{ asset('images/prin/GifDeSoldadura.gif') }}" alt="SOLDADURAS ESPECIALIZADAS">
            <h3>SOLDADURAS ESPECIALIZADAS</h3>
            <p> Se prestan servicios de soldadura blandas, con fundentes, oxiacetilenica y por arco eléctrico </p>
      </div>
      <div class="services">
            <img src="https://www.cursosluzdia.com.ar/wp-content/uploads/2020/01/blogs-705x-528-2-1.jpg" alt="PRODUCTOS PERSONALIZADOS">
            <h3>PRODUCTOS PERSONALIZADOS</h3>
            <p> Se elaboran productos personalizados como Bocallave toyota, punta de lanza, petalos ornamentales, perrillas, riso de hierros, proteccion medianera, entre otros </p>
      </div>
      <div class="services">
            <img src="{{ asset('images/prin/Instalacion2.jpg') }}" alt="INSTALACIONES">
            <h3>INSTALACIONES</h3>
            <p> Se hacen domicilios para instalar puertas, ventanas, rejas, arreglos ornamentales, entre otros. </p>
      </div>
      <div class="services">
            <img src="https://www.cerrajeriakeymar.com/wp-content/uploads/2017/02/maquinaria-lacado-al-horno-cerrajeria-keymar-300x225.jpg" alt="LACADO">
            <h3>LACADO</h3>
            <p> Se presta el servicio de lacado para cualquier tipo de producto como puertas, rejas, chapas, entre otros. </p>
      </div>

      </div>
      <br>
      <div class="boton">
            <a  href="https://docs.google.com/forms/d/1ohEwm3wt_3fuL4E2FvM1-Fa57dT8WgqXB1xOlHl-yic/prefill">Enviar novedades de algún servicio</a>
        </div>

      <!--<p>1. DISEÑO DE INTERIORES: La empresa puede ayudar a diseñar y planificar la distribución de los espacios interiores, teniendo en cuenta aspectos como la funcionalidad, estética, iluminación, colores y materiales.</p>
      <p>2. SELECCIÓN DE MOBILIARIO Y ACCESORIOS: Pueden asesorar en la elección de muebles, cortinas, alfombras, iluminación, obras de arte y otros accesorios decorativos que complementen el estilo y la temática deseada para el espacio.</p>
      <p>3. PERSONALIZACIÓN Y ADAPTACIÓN DE ESPACIOS: Pueden adaptar y personalizar los espacios de acuerdo con las necesidades y preferencias del cliente, ya sea en hogares, oficinas, tiendas u otros entornos.</p>
      <p>4. SELECCIÓN Y COLOCACIÓN DE REVESTIMIENTOS: Pueden asesorar sobre la selección de revestimientos de paredes, suelos y techos, como pintura, papel tapiz, azulejos, suelos laminados o alfombras.</p>
      <p>5. INSTALACIÓN DE ELEMENTOS DECORATIVOS: Pueden encargarse de la instalación de cuadros, espejos, estanterías, cortinas, lámparas y otros elementos decorativos para embellecer el espacio.</p>
      <p>6. PROYECTOS LLAVE EN MANO: Pueden encargarse de gestionar todo el proceso de decoración, desde el diseño inicial hasta la implementación y finalización del proyecto, proporcionando un servicio completo y sin complicaciones.</p>
    </div>-->
    
    @include('includes.footer')

  <script>
    // Puedes agregar código JavaScript aquí si lo necesitas
  </script>
</body>
</html>