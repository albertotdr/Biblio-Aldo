<!doctype html>
<!--
	Author by FreeHTML5.co
	Twitter: https://twitter.com/fh5co
	Facebook: https://fb.com/fh5co
	URL: https://freehtml5.co
-->
<html lang="es">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/slick.css">
	<title>Author</title>
</head>
<body>

<?php
// Incluir el archivo de conexión
require_once "db/conexion.php";

// Obtener la conexión a la base de datos
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Consulta SQL
$sql = "SELECT * FROM libros";

// Enviar la consulta al servidor de la base de datos
$resultado = mysqli_query($conn, $sql);


?>


	<!-- Navigation -->
	<nav class="site-navigation">
		<div class="site-navigation-inner site-container">
			<img src="./images/site-logo.png" alt="site logo">
			<div class="main-navigation">
				<ul class="main-navigation__ul">
					<li><a href="index.html">Inicio</a></li>
					<li><a href="libros.html">Libros</a></li>
				</ul>
			</div>
			<div id="myBtn" class="burger-container" onclick="myFunction(this)">
				<div class="bar1"></div>
				<div class="bar2"></div>
				<div class="bar3"></div>
			</div>
			<script>
				function myFunction(x) {
					x.classList.toggle("change");
				}
			</script>

		</div>
	</nav>
	<!-- Navigation end -->

	<!-- Top banner -->
	<section class="fh5co-top-banner">
		<div class="top-banner__inner site-container">
			<div class="top-banner__image">
				<img src="./images/top-banner-author.jpg" alt="author image">
			</div>
			<div class="top-banner__text">
				<div class="top-banner__text-up">
					<span class="brand-span">Hola</span>
					<h2 class="top-banner__h2">Bienvenidos</h2>
				</div>
				<div class="top-banner__text-down">
					<h2 class="top-banner__h2">A Vita</h2>
				</div>
				<p>esta es una biblioteca virtual</p>
				<a href="#" class="brand-button">Read bio > </a>
			</div>
		</div>
	</section>
	<!-- Top banner end -->

	<!-- About me -->
	<section class="fh5co-about-me">
		<div class="about-me-inner site-container">
			<article class="portfolio-wrapper">
				<div class="portfolio__img">
					<img src="./images/about-me.jpg" class="about-me__profile" alt="about me profile picture">
				</div>
				<div class="portfolio__bottom">
					<div class="portfolio__name">
						<span>J</span>
						<h2 class="universal-h2">Mafu</h2>
					</div>
					<p>Encargado del taller de Jangas</p>
				</div>
			</article>
			<div class="about-me__text">
				<div class="about-me-slider">
					<div class="about-me-single-slide">
						<h2 class="universal-h2 universal-h2-bckg">Quien es el señor Mafu?</h2>
						<p><span>E</span> l señor mafu es el encargado del taller de Jangas, que brinda educacion y un oficio de carpinteria a los niños</p>
					</div>
				</div>
			</div>
		</div>
		<div class="about-me-bckg"></div>
	</section>
	<!-- About me end -->

	<!-- Books and CD -->
	<section class="fh5co-books">
		<div class="site-container">
			<h2 class="universal-h2 universal-h2-bckg">Los ultimos libros agregados a la biblioteca</h2>
			<div class="books">
				
				<?php 
									// Verificar si la consulta retornó resultados
					if (mysqli_num_rows($resultado) > 0) {
						// Recuperar cada fila de resultados de la consulta
						while ($fila = mysqli_fetch_assoc($resultado)) {
							// Crear los elementos HTML
							echo '<div class="single-book">';
							echo '<a href="#" class="single-book__img">';
							echo '<img src="data:image/jpeg;base64,' . base64_encode($fila["portada"]) . '" alt="' . $fila["nombreLibro"] . '">';
							echo '<div class="single-book_download">';
							echo '<img src="./images/download.svg" alt="' . $fila["nombreLibro"] . '">';
							echo '</div></a>';
							echo '<h4 class="single-book__title">' . $fila["nombreLibro"] . '</h4>';
							echo '<h5>Autor</h5>';
							echo '<span class="single-book__price">' . $fila["genero"] . '</span>';
							echo '</div>';
						}
					} else {
						echo "La consulta no retornó resultados";
					}

					// Cerrar la conexión a la base de datos
					mysqli_close($conn);
									?>
			</div>
			
		</div>
	</section>
	<!-- Books and CD end -->




	<!-- Footer -->
	<footer class="site-footer">
		<div class="site-container">
			<div class="footer-inner">
				<div class="footer-info">
					<div class="footer-info__left">
						<img src="./images/footer-img.jpg" alt="about me image">
						<p>Read more about me</p>
					</div>
					<div class="footer-info__right">
						<h5>Get In Touch</h5>
						<p class="footer-phone">Phone: +958734902847</p>
						<p>Email : Jhone@Example.com</p>
						<div class="social-icons">
							<a href="#" target="_blank"><img src="./images/social-twitter.png" alt="social icon"></a>
							<a href="#" target="_blank"><img src="./images/social-pinterest.png" alt="social icon"></a>
							<a href="#" target="_blank"><img src="./images/social-youtube.png" alt="social icon"></a>
							<a href="#" target="_blank"><img src="./images/social-twitter.png" alt="social icon"></a>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		
	</footer>
	<!-- Footer end -->

	<!-- Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/cargarLibros.js"></script>
</body>
</html>