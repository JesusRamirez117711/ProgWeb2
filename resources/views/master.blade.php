<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Front-Back Laravel - @yield('titulo')</title>


    <!--CDN bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--CDN plantilla-->
   
    <!--CDN icons bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<!--Link de ckeditor -->
<script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    
</head>
<body>
    
@include('secciones.menu')

@yield('contenido')

@include('secciones.footer')
<!--CDN BOOTSTRAP-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
<!--CDN jQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>