<!DOCTYPE html>
<html>

<head>
    <style>
        /* Estilos generales */
        html,
        .contenedor {
            min-height: 100vh;
            /*importante*/
            position: relative;
            /*importante*/
        }

        footer {
            background-color: red;
            color: white;
            padding: 15px;
            bottom: 0;
        }

        /*coloca esto si deseas eliminar el margen*/
        body {
            margin: 0;
        }


        .contact-info {
            font-size: 16px;
            background-color: #2C2C2E;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            margin-left: 5px;
        }

        .rights {
            text-align: center;
        }

        .vision-button,
        .mision-button {
            background-color: #2C2C2E;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 35px;
        }

        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            max-width: 500px;
        }

        .modal h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        .modal p {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }

        .modal button {
            background-color: #6b7070;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-- Contenido de la página -->
    <footer class="footer" style="height: 70px;">
    <div class="d-flex justify-content-between align-items-center">
        <div>Contacto: 3135770499</div>
        <div class="d-flex align-items-center">
        <p class="rights text-center" style="margin-right: 400px;">© 2023 Lilian Pire y Gabriela Portela -</p>
            <button class="vision-button" onclick="openModal('vision-modal')">Visión</button>
            <button class="mision-button" onclick="openModal('mision-modal')">Misión</button>
        </div>
    </div>
</footer>


     <div id="vision-modal" class="modal">
        <div class="modal-content">
            <h2>Visión</h2>
            <p>Ser una empresa líder a nivel nacional brindando soluciones en el mercado de los servicios que ofrecemos,
                garantizando la calidad de nuestros servicios y productos, actualizándonos constantemente de acuerdo a
                la tendencia en tecnología.</p>
            <button onclick="closeModal('vision-modal')">Cerrar</button>
        </div>
    </div>

    <div id="mision-modal" class="modal">
        <div class="modal-content">
            <h2>Misión</h2>
            <p>Ser una empresa líder a nivel nacional brindando soluciones en el mercado de los servicios que ofrecemos,
                garantizando la calidad de nuestros servicios y productos, actualizándonos constantemente de acuerdo a
                la tendencia en tecnología.</p>
            <button onclick="closeModal('mision-modal')">Cerrar</button>
        </div>
    </div>

    <script>
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.style.display = 'flex';
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.style.display = 'none';
        }
    </script>
 
</body>

</html>
