<!DOCTYPE html>
<html>
<head>
    <title>Inicio</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- Video presentación -->
    <div class="video-presentacion">
        <video autoplay muted loop>
            <source src="login/images/icons/videoejemplo.mp4" type="video/webm">
            Tu navegador no soporta el elemento de video.
        </video>
        <div class="carousel-text-container">
            <h2 class="carousel-text active">   HOLA,   BIENVENIDOS</h2>
            <h2 class="carousel-text">SOMOS UNA EMPRESA VIGENTE EN EL MERCADO DESDE EL 2020</h2>
            <h2 class="carousel-text">NOS DEDICAMOS A LA CONSTRUCCION Y ALQUILER DE GALPONES Y LOCALES COMERCIALES</h2>
            
            <!-- Agrega más textos aquí si es necesario -->
        </div>
        <div class="botones-superior">
            <a href=""><button class="ver-plano">VER PLANO 3D</button></a>
            <a href="#locales"><button class="ver-locales">VER LOCALES</button></a>
            </div>
        </div>
    </div>
    </div>

    <!-- Banner transparente -->
    <div class="banner">
        <div class="logo-left">
            <a href="inicio.php"><img src="Login/images/negro.png" alt="Logo Izquierdo"></a>
        </div>
        <div class="logo-right">
        <a class="" href="login/index.php"> <img src="Login/images/usuario-de-perfil.png" alt="Logo Derecho">  
            </a>
        </div>
    </div>
        

    <script>
        // Esperar a que se cargue el contenido de la página
        document.addEventListener("DOMContentLoaded", function() {
            // Mostrar el elemento de video-presentacion con la clase .show
            document.querySelector(".video-presentacion").classList.add("show");
            // Mostrar el elemento de botones-superior con la clase .show
            document.querySelector(".botones-superior").classList.add("show");

            // Carrusel de textos
            const carouselTexts = document.querySelectorAll(".carousel-text");
            let currentIndex = 2;

            function showNextText() {
                carouselTexts[currentIndex].classList.remove("active");
                currentIndex = (currentIndex + 1) % carouselTexts.length;
                carouselTexts[currentIndex].classList.add("active");
                setTimeout(showNextText, 3000); // Cambia cada 3 segundos
            }

            showNextText();
        });
    </script>


    <script>
        // Esperar a que se cargue el contenido de la página
        document.addEventListener("DOMContentLoaded", function() {
            // Mostrar el elemento de video-presentacion con la clase .show
            document.querySelector(".video-presentacion").classList.add("show");
            // Mostrar el elemento de botones-superior con la clase .show
            document.querySelector(".botones-superior").classList.add("show");
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".ver-locales").click(function() {
                $("html, body").animate({
                    scrollTop: $("#locales").offset().top
                }, 1000); // Ajusta la duración del desplazamiento aquí (en milisegundos)
            });
        });
    </script>
    <div class="locales-section" id="locales">
        
    <?php
include 'config.php';

// Obtener la lista de complejos de la base de datos
$sql = "SELECT DISTINCT complejo FROM locales";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $complejo = $row['complejo'];

        // Mostrar el nombre del complejo como título
        echo '<h3>' . $complejo . '</h3>';

        // Obtener los locales para este complejo
        $sqlLocales = "SELECT * FROM locales WHERE complejo = '$complejo'";
        $resultLocales = $conn->query($sqlLocales);

        if ($resultLocales->num_rows > 0) {
            echo '<div class="locales-grid">';
            while ($rowLocal = $resultLocales->fetch_assoc()) {
                $imagenesLocal = explode(',', $rowLocal['imagenes']);
                $primeraImagenLocal = $imagenesLocal[0];

                echo '<div class="local">';
                echo '<h4>' . $rowLocal['nombre'] . '</h4>';
                echo '<img src="' . $primeraImagenLocal . '" alt="' . $rowLocal['nombre'] . '">';
                echo '<a href="detalle_local.php?id=' . $rowLocal['id'] . '" class="ver-button">Ver</a>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo 'No hay locales disponibles para este complejo.';
        }
    }
} else {
    echo 'No se encontraron complejos.';
}
?>
</div>
</div>
</div>
    <!-- Pie de página y otros elementos -->
<?php include 'footer.php'; ?>
          
        </div>
    </div>
    <script>
        // Esperar a que se cargue el contenido de la página
        document.addEventListener("DOMContentLoaded", function() {
            // Mostrar el elemento de video-presentacion con la clase .show
            document.querySelector(".video-presentacion").classList.add("show");
            // Mostrar el elemento de botones-superior con la clase .show
            document.querySelector(".botones-superior").classList.add("show");
        });
    </script>

<script>
    $(document).ready(function() {
        $(".ver-locales").click(function() {
            $("html, body").animate({
                scrollTop: $("#locales").offset().top
            }, 1000); // Ajusta la duración del desplazamiento aquí (en milisegundos)
        });
    });
    </script>
    
</body>
</html>

