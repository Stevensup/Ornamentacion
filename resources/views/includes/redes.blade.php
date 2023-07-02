<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Social Media Buttons</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lora&display=swap');

        /* Aplicar la fuente a los elementos de texto */
        body {
            font-family: 'Lora', serif;
        }

        .social-buttons {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 9999;
        }

        .social-buttons .button {
            display: block;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #7492a1;
            color: #fff;
            text-align: center;
            line-height: 50px;
            margin-bottom: 10px;
            transition: background-color 0.3s;
        }

        .social-buttons .button:hover {
            background-color: #666;
        }
    </style>
</head>

<body>
    <div class="social-buttons">
        <a href="https://www.facebook.com" target="_blank" class="button">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://www.instagram.com" target="_blank" class="button">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="https://api.whatsapp.com/send?phone=3112347699" target="_blank" class="button">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>
</body>

</html>
