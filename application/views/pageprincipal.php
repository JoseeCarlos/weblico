<!DOCTYPE html>
<html lang="es"> 
  <head>
    <title>Pagina Principar LicoTeam</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?php echo base_url();?>images/lico.png" type="image/ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url();?>css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/animate.css">
    
    <link rel="stylesheet" href="<?php echo base_url();?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo base_url();?>css/aos.css">

    <link rel="stylesheet" href="<?php echo base_url();?>css/ionicons.min.css">
    
    <link rel="stylesheet" href="<?php echo base_url();?>css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/icomoon.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    

    <link rel="stylesheet" href="<?php echo base_url();?>css/jquery-ui.css">
    
    <link rel="stylesheet" href="<?php echo base_url();?>dist/jquery.nice-number.css">
    <link rel="stylesheet" href="<?php echo base_url();?>dist/jquery.nice-number.min.css">
    
  </head>
  <style media="screen">
  .carousel-cell {
    width: 50%;
    }

    /* cell number */
    .carousel-cell:before {
      display: block;
    }
  </style>
  <body>
    
	  <div class="bg-top navbar-light">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-center align-items-stretch">
    			<div class="col-md-4 d-flex align-items-center py-4">
    				<a class="navbar-brand" href="index.html">Lico <span>Team</span></a>
    			</div>
	    		<div class="col-lg-8 d-block">
		    		<div class="row d-flex">
					    <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
					    	<div class="icon d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
					    	<div class="text">
					    		<span>Correo</span>
						    	<span>licoTeam@email.com</span>
						    </div>
					    </div>
					    <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
					    	<div class="icon d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <div class="text">
						    	<span>Telefono</span>
						    	<span>llamanos: + 1235 2355 98</span>
						    </div>
					    </div>
					    <div class="col-md topper d-flex align-items-center justify-content-end">
					    	<p class="mb-0">
                  
							<?php
							if ($this->session->userdata('nombreUsuario')=="") {
								?>
								<a href="<?php echo base_url();?>index.php/usuario/loginuser"  class="btn py-2 px-3 btn-primary d-flex align-items-center justify-content-center"><span>Iniciar Sesion</span></a>
							<?php
							}
							else{
								?>
                 <a href="<?php echo base_url();?>index.php/usuario/info"  class="btn py-2 px-3 btn-primary d-flex align-items-center justify-content-center"><span> Editar Informacion</span></a>

								 <a href="<?php echo base_url();?>index.php/usuario/logout"  class="btn py-2 px-3 btn-primary d-flex align-items-center justify-content-center"><span>Cerrar Sesion</span></a>

                 <?php 
                 if ($this->session->userdata('nombreUsuario')!='jose') {
                   ?>                 
                  <?php echo form_open_multipart('producto/carritoLista'); ?>                  
                  <input type="hidden" name="idUsuario" value="<?php echo $this->session->userdata('Id') ?>">
                  <button type="subtmit" class="btn btn-primary">Carrito</button>
                  <?php echo form_close(); ?>
                 <?php
                 }
                 else{
                  ?>
                  <a href="<?php echo base_url();?>index.php/producto/listaCarrito"  class="btn py-2 px-3 btn-primary d-flex align-items-center justify-content-center"><span>Lista de ventas</span></a>
                  
                            
								<?php
                   }

							}
							?>
							   
					    			
					    	</p>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div> 
    </div> 
	  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container d-flex align-items-center px-4">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	       <form  action="<?php echo base_url();?>index.php/producto/listalike" method="POST" class="searchform order-lg-last">
          <div class="form-group d-flex">
            <input type="text" class="form-control pl-3" name="txtlike" placeholder="Buscar Producto">
            <button type="submit" placeholder="" class="form-control search"><span class="ion-ios-search"></span></button>
          </div>
        </form>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav mr-auto">
	        	<li class="nav-item active"><a href="<?php echo base_url();?>index.php/usuario/" class="nav-link pl-0 btn">Inicio</a></li>
	        	<li class="nav-item"><a href="<?php echo base_url();?>index.php/producto/listaproductoscliente" class="nav-link pl-0 btn">lista de Productos</a></li>
            <?php
                 if ($this->session->userdata('nombreUsuario')!="") {
                 
                  if ($this->session->userdata('role')!='Cliente' ) {
                    ?>                 
                        <li class="nav-item"><a href="<?php echo base_url();?>index.php/usuario/listarusuarios" class="nav-link pl-0 btn">Usuarios</a></li>
                             
                        <li class="nav-item"><a href="<?php echo base_url();?>index.php/usuario/listarclientes" class="nav-link pl-0 btn">Clientes</a></li>
              
                        <li class="nav-item"><a href="<?php echo base_url();?>index.php/proveedor/listarproveedor" class="nav-link pl-0 btn">Proveedor</a></li>
                        <li class="nav-item"><a href="<?php echo base_url();?>index.php/producto/listaproductos" class="nav-link pl-0 btn">Productos</a></li>
                  <?php
                  }
                 else
                 {
                     ?>
                         <li class="nav-item"><a href="<?php echo base_url();?>index.php/producto/listapedidos" class="nav-link pl-0 btn">Mis Pedidos</a></li>
                     <?php
                 }
                }

               
               
            ?>
			    
           
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image:url(<?php echo base_url();?>images/whiskey.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate">
            <h1 class="mb-4">No bebas mañana lo que puedas beber hoy</h1>
            <p>Una buena sardina es mejor que una mala langosta</p>
            <p> <button href="#" class="btn btn-primary px-4 py-3 mt-3">Productos</button></p>
          </div>
        </div>
        </div>
      </div>

      <div class="slider-item" style="background-image:url(<?php echo base_url();?>images/vino.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate">
            <h1 class="mb-4">El trabajo nos da días prósperos, el vino nos da domingos felices.</h1>
            <p>ALCOHOL: Porque ninguna gran historia empezó jamás con alguien comiendo una ensalada</p>
            <p><button href="#" class="btn btn-primary px-4 py-3 mt-3">Productos</button></p>
          </div>
        </div>
        </div>
      </div>
    </section>

    <section class="ftco-services ftco-no-pb">
			<div class="container-wrap">
				<div class="row no-gutters">
          <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate bg-primary">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-teacher"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Asesoramiento experto</h3>
                <p>Si tiene cualquier duda o consulta, nuestros expertos están a su disposición. Contamos con más de 35 años de experiencia en el sector</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate bg-darken">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-reading"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Garantía de devolución</h3>
                <p>Si alguno de nuestros productos no está en condiciones o simplemente no le satisface, puede devolverlo. Consulte nuestra política de devoluciones</p>
              </div>
            </div>    
          </div>
          <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate bg-primary">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-books"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Pago seguro</h3>
                <p>Los pagos con tarjeta se realizan en un entorno seguro y se encriptan con el protocolo SSL para garantizar la máxima seguridad</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex services align-self-stretch py-5 px-4 ftco-animate bg-darken">
            <div class="media block-6 d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-diploma"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Plazos de entrega</h3>
                <p>Reciba su pedido en península entre 24/48h</p>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>
		<!-- Editar desde aqui -->
		
		<section class="ftco-section ftco-no-pt ftc-no-pb">
			<div class="container">
				<div class="row d-flex">
					<div class="col-md-5 order-md-last wrap-about wrap-about d-flex align-items-stretch">
						<div class="img" style="background-image: url(<?php echo base_url();?>images/fond1.jpg); border"></div>
					</div>
					<div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
          	<h2 class="mb-4">Lo que ofrecemos</h2>
						<p>Ofrecemos un sistema Web de compras de bebidas, snacks donde gestionamos los prdoductos, clientes, usuarios, y realizamos pedidos</p>
						<div class="row mt-5">
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-security"></span></div>
									<div class="text pl-3">
										<h3>Seguridad</h3>
										<p>Tenemos el mayor cuidado con la informacion de nuestros clientes y productos.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-reading"></span></div>
									<div class="text pl-3">
										<h3>Productos</h3>
										<p>Ofrecemos un amplico catalogo de productos</p>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="ftco-section">
      <div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4"><span>Nuestros</span> Productos</h2>
            <p>Todo hombre que se respete a si mismo debería de emborracharse tal y como dicta la vieja costumbre: a la menor provocación, y de preferencia en cualquier ceremonia pública. </p>
          </div>
        </div>
         
    <div class="carousel" data-flickity='{ "wrapAround": true, "autoPlay": true }'>
      
      <?php  
            foreach ($producto->result() as $row) 
                  {
               ?>
      <div class="carousel-cell">
        <img class="w3-image" height="90px" width="380px" src="<?php echo base_url();?>images/<?php echo $row->foto;?>">
         <div class="text pt-4">
              
              <h3><a href="#"><?php echo $row->nombre;?></a></h3>
              <p>Precio: <?php echo $row->precio;?> .Bs</p>

              <!--<p><a href="<?php //echo base_url(); ?>index.php/clientes/index3" class="buy-now btn btn-sm btn-primary">Add To Cart</a></p>-->
              <?php echo form_open_multipart('producto/carrito'); ?>
                   <input type="hidden" name="idproducto" value="<?php echo $row->Id; ?>">
                  <input type="hidden" name="nombre" value="<?php echo $row->nombre; ?>">
                  <input type="hidden" name="precio" value="<?php echo $row->precio; ?>">
                  <input type="hidden" name="stock"  value="<?php echo $row->stock; ?>">
                  <input type="hidden" name="idUsuario" value="<?php echo $this->session->userdata('Id') ?>">
                   <p><?php echo $row->descripcion; ?></p>
                   <br>
                   <br>
               <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 120px;">
                <div class="box">
                  <input type="number" value="1" style="width : 100px;" min="1" max="<?php echo $row->stock; ?>" name="cantidad" required>
                </div>
              <!--<input type="number" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="cantidad" min="1">-->
            </div>

            </div>
               <br>
                   <?php
              if ($this->session->userdata('nombreUsuario')=="") {
                ?>
                <input type="submit" class="buy-now btn btn-sm btn-primary" value="Agregar al carrito" disabled >
              <?php
              }
              else{
                ?>
              <input type="submit" class="buy-now btn btn-sm btn-primary" value="Agregar al carrito">
                <?php

              }
              ?>
              <?php echo form_close(); ?>
            </div>
      </div>
      <?php
                    }
                ?>
      </div>


    </section>

		<!-- Editar hasta aqui -->

		<section class="ftco-gallery">
    	<div class="container-wrap">
    		<div class="row no-gutters">
					<div class="col-md-3 ftco-animate">
						<a href="<?php echo base_url();?>images/footer1.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?php echo base_url();?>images/footer1.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="<?php echo base_url();?>images/footer2.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?php echo base_url();?>images/footer2.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="<?php echo base_url();?>images/footer3.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?php echo base_url();?>images/footer3.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="<?php echo base_url();?>images/fond1.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?php echo base_url();?>images/fond1.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
        </div>
    	</div>
    </section>

		
    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2">Tienes Alguna Pregunta?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Sout Park. Colorado,USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+123 123 123</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">licoteam@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
         
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5 ml-md-4">
              <h2 class="ftco-heading-2">Enlaces</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Inicio</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Productos</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Servicios</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Usuarios</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Clientes</a></li>
              </ul>
            </div>
          </div>
         
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2 mb-0">Redes Sociales</h2>
            	<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="https://twitter.com"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="https://facebook.com"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="https://instagram.com"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p>
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos lo derechos recervados | Proyecto desarollado  <i class="icon-heart" aria-hidden="true"></i> por <a href="https://youtube.com" target="_blank">LicoTeam</a>
           </p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="<?php echo base_url();?>dist/jquery.nice-number.js"></script>
  <script src="<?php echo base_url();?>dist/jjquery.nice-number.min.js"></script>
  <script src="<?php echo base_url();?>src/jquery.nice-number.js"></script>
  <script src="<?php echo base_url();?>js/jquery-3.3.1.min.js"></script>
  <script src="<?php echo base_url();?>js/jquery-ui.js"></script>
  <script src="<?php echo base_url();?>js/popper.min.js"></script>
  <script src="<?php echo base_url();?>js/main.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
  
  <script src="<?php echo base_url();?>js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo base_url();?>js/popper.min.js"></script>
  <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>js/jquery.easing.1.3.js"></script>
  <script src="<?php echo base_url();?>js/jquery.waypoints.min.js"></script>
  <script src="<?php echo base_url();?>js/jquery.stellar.min.js"></script>
  <script src="<?php echo base_url();?>js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url();?>js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo base_url();?>js/aos.js"></script>
  <script src="<?php echo base_url();?>js/jquery.animateNumber.min.js"></script>
  <script src="<?php echo base_url();?>js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?php echo base_url();?>js/google-map.js"></script>
  <script src="<?php echo base_url();?>js/main.js"></script>
    
  </body>
</html>