<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <title>Pipesales</title>
    <style>
        .product-item {
            display: flex;
            justify-content: space-between;
        }

        .product-name {
            flex: 1;
        }

        .product-quantity {
            margin-left: 10px;
        }
    </style>
</head>

<body class="antialiased">
    <div id="app">
        <mainapp></mainapp>
    </div>
</body>
<script src="js/app.js" type="text/javascript"></script>

</html>
