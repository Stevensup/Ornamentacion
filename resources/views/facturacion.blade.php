<!DOCTYPE html>
<html>

<head>
    <br>
    <br>
    @extends('includes.header')
    <title>Facturación y Carrito de Compra</title>
    <style>
        /* Agregar la fuente de Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');

        /* Estilos CSS para la vista */
        body {
            font-family: 'Poppins', serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .invoice-container {
            display: flex;
            align-items: flex-start;
        }

        .image-container {
            padding-right: 20px;
        }

        .image-container img {
            width: 100%;
            height: auto;
            margin-left: 40%;
        }

        .invoice {
            flex: 2;
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            max-width: 400px;
            background-color: #f9f9f9;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            margin-left: 25%;
            margin-top: 5%;
        }

        .invoice .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice .header h2 {
            margin: 0;
            color: #333;
        }

        .invoice .content {
            margin-bottom: 20px;
        }

        .invoice .content .info {
            margin-bottom: 10px;
        }

        .invoice .content .info strong {
            display: inline-block;
            width: 100px;
            font-weight: bold;
            color: #666;
        }

        .invoice .content .info span {
            margin-left: 10px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        table th {
            background-color: #f0f0f0;
            color: #333;
        }

        table td {
            color: #666;
        }

        .info-total {
            margin-top: 10px;
            text-align: right;
        }

        .info-total strong {
            display: inline-block;
            width: 100px;
            font-weight: bold;
            color: #333;
        }

        .info-total span {
            color: #333;
        }

        .pdf-button {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Facturación</h1>

    <div class="invoice-container">
        <div class="image-container">
            <img src="{{ asset('images/prin/shop.jpg') }}" alt="Quiénes Somos">
        </div>

        <div class="invoice">
            <div class="header">
                <h2>Factura Electrónica</h2>
            </div>
            <div class="content">
                <div class="info">
                    <strong>Cliente:</strong>
                    <span>{{Auth::user()->name}}</span>
                </div>
                <div class="info">
                    <strong>Fecha:</strong>
                    <span>{{ now()}}</span>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                        <tr>
                            <td>{{$producto->nombre}}</td>
                            <td>{{$producto->cantidad_despacho}}</td>
                            <td>${{number_format($producto->precio_unitario, 0, ',', '.')}}</td>
                            <td>${{ number_format($producto->total_producto, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                        {{-- <tr>
                            <td>Producto 2</td>
                            <td>1</td>
                            <td>$15</td>
                            <td>$15</td>
                        </tr> --}}
                    </tbody>
                </table>
                <div class="info-total">
                    <strong>Total:</strong>
                    <span>${{ number_format($total_productos, 0, ',', '.')}}</span>
                    <div class="pdf-button">
                        <button onclick="generatePDF()">Generar PDF</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script>
        function generatePDF() {
            const doc = new jsPDF();

            // Agregar contenido al PDF
            doc.text('Factura Electrónica', 10, 10);
            doc.text('Cliente: Nombre completo del cliente', 10, 20);
            doc.text('Fecha: 01 de Julio de 2023', 10, 30);

            const table = document.querySelector('table');
            const rows = table.rows;

            let startY = 40;
            for (let i = 0; i < rows.length; i++) {
                const cells = rows[i].cells;
                let text = '';
                for (let j = 0; j < cells.length; j++) {
                    text += cells[j].innerText + ' ';
                }
                doc.text(text, 10, startY);
                startY += 10;
            }

            doc.save('factura.pdf');
        }
    </script>

    @extends('includes.redes')
    @extends('includes.footer')
</body>

</html>
