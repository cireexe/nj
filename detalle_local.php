<!DOCTYPE html>
<html>
<head>
    <title>Detalles del Local</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="detalle_local.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
        
        $(document).ready(function() {
            $(".gallery-item img").click(function() {
                var imageUrl = $(this).attr("src");
                $("#lightboxImage").attr("src", imageUrl);
                $("#lightboxContainer").fadeIn();
            });

            $("#lightboxClose").click(function() {
                $("#lightboxContainer").fadeOut();
            });
        });
    </script>
</head>
<body>

<div class="banner">
    <div class="logo-left">
       <a href="inicio.php"><img src="Login/images/blanco.png" alt="Logo Izquierdo"></a>
    </div>
    <div><h1>Detalles del Local</h1></div>
    <div class="logo-right">
        <a href="inicio.php"><button class="btn-volver">Volver</button></a>
    </div>
</div>

<?php
include 'config.php';

if (isset($_GET['id'])) {
    $local_id = $_GET['id'];
    $sql = "SELECT * FROM locales WHERE id = $local_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imagenes = explode(',', $row['imagenes']);


?>

<div class="h2">
    <h1><?php echo $row['nombre']; ?></h1>
    </div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
        <div class="gallery-container">
            <div class="image-gallery" style="border-radius: 3rem; overflow: hidden;">
                <?php
                foreach ($imagenes as $index => $imagen) {
                    $activeClass = ($index === 0) ? 'active' : '';
                ?>
                <div class="gallery-item <?php echo $activeClass; ?>">
                    <img src="<?php echo $imagen; ?>" alt="Imagen del Local">
                    
                </div>
                
                <?php
                }
                ?>
                
            </div>
            </div>
        </div>
        <div id="mobileCarousel" class="carousel slide d-md-none" data-ride="carousel">
    <div class="carousel-inner">
        <?php
        foreach ($imagenes as $index => $imagen) {
            $activeClass = ($index === 0) ? 'active' : '';
        ?>
        <div class="carousel-item <?php echo $activeClass; ?>">
            <img src="<?php echo $imagen; ?>" alt="Imagen del Local">
        </div>
        <?php
        }
        ?>
    </div>
    <!-- Flechas de navegación -->
    <a class="carousel-control-prev" href="#mobileCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#mobileCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
    </a>

</div>

<div class="col-md-6">
    <?php
    if ($row['disponibilidad'] === 'Disponible') {
        // El local está disponible, mostrar el formulario de contacto
    ?>
    <form class="contact-form" action="send_whatsapp.php" method="post">
        <h2>Contacto</h2>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>
        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" required>
        <input type="hidden" name="nombreLocal" value="<?php echo $row['nombre']; ?>">
        <!-- Agregar un campo oculto con el nombre del local -->
        <textarea id="mensaje" name="mensaje" rows="4">Hola, me interesaría ir a ver el <?php echo $row['nombre']; ?>. Por favor, comuníquense conmigo.</textarea>
        <button type="submit" id="enviarBtn">Enviar por WhatsApp</button>
    </form>
    <?php
    } else {
        // El local no está disponible, mostrar el cartel de "Alquilado"
    ?>
    <div class="alquilado-cartel">
        <h2>Alquilado</h2>
        <p>Lo sentimos, este local se encuentra alquilado.</p><br>
        <p>Puede ver nuestros otros locales disponibles <br>
             o la informacion de esta mas abajo</p>
    </div>
    <?php
    }
    ?>
</div>
            
            
            </div>
            <div class="otros-locales">
    <h2>Otros Locales</h2>
    <div class="lista-locales">
        <?php
        $sql_otros = "SELECT id, nombre, imagenes FROM locales WHERE id <> $local_id ORDER BY RAND() LIMIT 2"; // Limita a 2 locales aleatorios
        $result_otros = $conn->query($sql_otros);

        if ($result_otros->num_rows > 0) {
            while ($row_otros = $result_otros->fetch_assoc()) {
                $imagenes_otros = explode(',', $row_otros['imagenes']);
        ?>
          <div class="local-item">
            <img src="<?php echo $imagenes_otros[0]; ?>" alt="Imagen del Local">
            <h3><?php echo $row_otros['nombre']; ?></h3>
            <a href="detalle_local.php?id=<?php echo $row_otros['id']; ?>">Ver</a>
        </div>
        <?php
            }
        }
        ?>
        </div>
      
        <?php
            } else {
                echo 'Local no encontrado.';
            }
        }
        ?>
        <a href="inicio.php#locales" class="ver-mas-button"><button>Ver Mas</button></a>
    </div>
</div>

<div class="col-md-6">
    <!-- Agregar aquí los datos del local -->
    <div class="datos-local">
        <div class="dato">
            <img src="Login/images/map.png" alt="calle">
            <p><?php echo $row['calle']; ?></p>
        </div>
        <div class="dato">
            <img src="Login/images/mts.png" alt="Icono Metros">
            <p><?php echo $row['metros_cuadrados']; ?> mts2</p>
        </div>
        <div class="dato">
            <img src="Login/images/reloj.png" alt="Icono Antigüedad"> <!-- Agregar icono de antigüedad -->
            <p><?php echo $row['antiguedad']; ?> </p> <!-- Mostrar la antigüedad -->
        </div><br>
        <div class="dato">
            <img src="Login/images/camion.png" alt="Icono Piso para Tránsito Pesado">
            <p>Tránsito pesado</p>
        </div>
        <div class="dato">
            <img src="Login/images/facil.png" alt="Icono Fácil Accesibilidad">
            <p>Fácil accesibilidad</p>
        </div>
         <div class="dato">
            <img src="Login/images/cortina.png" alt="Icono Cortina Metálica">
            <p>Cortina metálica: <?php echo $row['cortina_metalica']; ?></p>
        
    </div>
</div>

            

            <!-- Descripción del Local -->
            <div class="col-md-6">
    <div class="descripcion">
        <h2>Descripción</h2>
        <div class="descripcion-content">
            <div class="descripcion-text">
                <p><?php echo $row['descripcion']; ?></p>
            </div>
        </div>
    </div>
   
            </div>
    
</div>
</div>

<div class="lightbox-container" id="lightboxContainer">
    <div class="lightbox-content">
        <span class="lightbox-close" id="lightboxClose">&times;</span>
        <span class="lightbox-arrow prev" id="lightboxPrev">&#8249;</span>
        <span class="lightbox-arrow next" id="lightboxNext">&#8250;</span>
        <img src="" alt="Imagen Ampliada" id="lightboxImage">
    </div>
</div>


<script>
    $(document).ready(function() {
        var imagenes = <?php echo json_encode($imagenes); ?>;
        var currentIndex = 0;

        function updateLightboxImage(index) {
            if (index >= 0 && index < imagenes.length) {
                currentIndex = index;
                $("#lightboxImage").attr("src", imagenes[currentIndex]);
            }
        }

        $(".gallery-item img").click(function() {
            var imageUrl = $(this).attr("src");
            $("#lightboxImage").attr("src", imageUrl);
            currentIndex = imagenes.indexOf(imageUrl);
            $("#lightboxContainer").fadeIn();
        });

        $("#lightboxClose").click(function() {
            $("#lightboxContainer").fadeOut();
        });

        $("#lightboxPrev").click(function() {
            updateLightboxImage(currentIndex - 1);
        });

        $("#lightboxNext").click(function() {
            updateLightboxImage(currentIndex + 1);
        });
    });
</script>


<script>
$(document).ready(function() {
    // Función para comprobar el ancho de la pantalla y habilitar/deshabilitar el carrusel
    function toggleCarousel() {
        if ($(window).width() <= 700) {
            // Si la pantalla es de 700px o menos, habilita el carrusel
            $('.image-gallery').addClass('carousel');
            $('.image-gallery').removeClass('flex-wrap');
        } else {
            // Si la pantalla es más grande que 700px, deshabilita el carrusel
            $('.image-gallery').removeClass('carousel');
            $('.image-gallery').addClass('flex-wrap');
        }
    }

    // Ejecuta la función cuando la página se carga inicialmente
    toggleCarousel();

    // Ejecuta la función cuando la ventana cambia de tamaño
    $(window).resize(function() {
        toggleCarousel();
    });
});
</script>

<!-- Pie de página y otros elementos -->
<?php include 'footer.php'; ?>

</body>
</html>