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

        .contenedor {
            min-height: 100vh;
            /*importante*/
            position: relative;
            /*importante*/
            padding-bottom: 70px; /* Ajusta el espacio inferior del contenido para evitar que se solape con el footer */
        }

        footer {
            background-color: white;
            color: #455c86;
            padding: 10px 15px;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            font-family: 'Poppins', serif; /* Aplica la fuente 'Lora' al footer */
            font-size: 16px;
            text-align: center;
            transition: background-color 0.3s;
        }

    </style>
</head>

<body>
    <footer class="footer">
        &copy; <span id="year"></span> Lilian Pire y Gabriela Portela
    </footer>

    <script>
        var year = new Date().getFullYear();
        document.getElementById('year').textContent = year;

        window.addEventListener('scroll', function() {
            const footer = document.querySelector('.footer');
            footer.classList.toggle('scrolled', window.scrollY > 0);
        });
    </script>
</body>

</html>
