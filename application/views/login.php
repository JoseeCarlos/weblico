<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Pagina Principar LicoTeam</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
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
  </head>
  <script type="text/javascript">
    function literal() { 
  var m = document.getElementById("matricula").value;
  var p = document.getElementById("matricula1").value;
  var s = document.getElementById("matricula2").value;
  var num = document.getElementById("correo").value;
  var expreg = /[A-Za-z ñ]+/;
  var expregemail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/;
  
  if(!expreg.test(m))
  {
    $("#ex").show();
    $("#ex1").hide();
  }
  else 
  {
     $("#ex").hide();
     $("#ex1").show();
  }

  if(!expreg.test(p))
  {
    $("#pr").show();
    $("#pr1").hide();
  }
  else 
  {
     $("#pr").hide();
     $("#pr1").show();
  }

  if(!expreg.test(s))
  {
    $("#sp").show();
    $("#sp1").hide();
  }
  else 
  {
     $("#sp").hide();
     $("#sp1").show();
  }
  
  
   

  
  
} 

function objeto() { 
  var m = document.getElementById("matricula").value;
  var expreg = new RegExp("^[A-Z]{1,2}\\s\\d{4}\\s([B-D]|[F-H]|[J-N]|[P-T]|[V-Z]){3}$");
  
  if(expreg.test(m))
    alert("La matrícula es correcta");
  else
    alert("La matrícula NO es correcta");
}
  </script>
  <body onchange="literal()">
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
					    		<button type="submit" class="btn py-2 px-3 btn-primary d-flex align-items-center justify-content-center" ><span>Iniciar Sesion</span></button>	
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
	      <form action="#" class="searchform order-lg-last">
          <div class="form-group d-flex">
            <input type="text" class="form-control pl-3" placeholder="Search">
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
                        <li class="nav-item"><a href="<?php echo base_url();?>index.php/producto/" class="nav-link pl-0 btn">Productos</a></li>
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

        <section class="ftco-section">
			<div class="container-fluid px-4">
				<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4"><span>Inicio de</span> Sesion</h2>
            <p>Por supuesto que no bebo todo el tiempo, también tengo que dormir. </p>
          </div>
        </div>
        <div class="container">
        <div class="row">
        <div class="col-md-6">
        <div class="container">
        <form action="<?php echo base_url();?>index.php/usuario/validarusuario" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre Usuario</label>
    <input type="text" name="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre de usuario" required >
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Contraseña</label>
    <input type="password" name="password" class="form-control" id="exampleInputEmail1" minlength="4" aria-describedby="emailHelp" placeholder="Contraseña" required>
   
  </div>
 
  
  <button type="submit" class="btn btn-primary ">Iniciar Sesion</button>
</form>
<a href="<?php echo base_url();?>index.php/usuario/codigo">Se ha olvidado su contraseña!!</a>

<hr>
                  <?php
      switch ($msg) {
        case '1':
        ?>
        <h5 style="text-align: center;"> <?php echo "Error de ingreso"; ?> </h5>
        <?php
          break;
        case '2':
        ?>
        <h5> <?php echo "Acceso no permitido"; ?> </h5>
        <?php
          break;
        case '3':
        ?>
        <h5> <?php echo "Gracias por usar el sistema"; ?> </h5>
        <?php
          break;
          case '4':
            ?>
            <h5> <?php echo "Las contraseñas no son iguales" ?> </h5>
            <?php
        
          break;
          case '6':
            ?>
            <h5> <?php echo "Fue registrado con exito Inicie Session" ?> </h5>
            <?php
        
          break;
        default:
        echo "";
          break;
      }
      ?>
        
        </div>
        </div>
        <div class="col-md-6">
        <div align="center" id="preview"><img width="80%" height="700px" src="<?php echo base_url();?>images/01.jpg" alt=""></div>
        </div>
        </div>
        
        </div>
			</div>
		</section>
   
			<div class="container-fluid px-4">
				<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4"><span>Creacion de</span> Cuenta</h2>
            <p>Por supuesto que no bebo todo el tiempo, también tengo que dormir. </p>
          </div>
        </div>
        <div class="container">
        <div class="row">
        <div class="col-md-6">
        <div class="container">
        <form action="<?php echo base_url();?>index.php/usuario/crearCliente" method="POST" enctype="multipart/form-data">
            <div class="form-group">
               <label for="exampleInputEmail1">Nombre </label>
               <input type="text" name="nombre" class="form-control" pattern="[a-z A-Z]+" aria-describedby="emailHelp" placeholder="Nombre de usuario" id="matricula" required >
                <p id="ex" name="ex" style="color: red;">El Nombre Solo puede tener letras </p>
               <p id="ex1" name="ex1" style="color: green;">Correcto </p>
            </div>
            <div class="form-group">
               <label for="exampleInputEmail1">Primer Apellido</label>
               <input type="text" name="primerApellido" class="form-control" pattern="[a-z A-Z]+" aria-describedby="emailHelp" placeholder="Primer Apellido" id="matricula1" required >
                <p id="pr" name="pr" style="color: red;">El Primer Apellido Solo puede tener letras </p>
                <p id="pr1" name="pr1" style="color: green;">Correcto </p>
            </div>
            <div class="form-group">
               <label for="exampleInputEmail1">Segundo Apellido</label>
               <input type="text" name="segundoApellido" class="form-control" pattern="[a-z A-Z]+" aria-describedby="emailHelp" placeholder="Segundo Apellido" id="matricula2" required >
                <p id="sp" name="sp" style="color: red;">El Segundo Apellido Solo puede tener letras </p>
                <p id="sp1" name="sp1" style="color: green;">Correcto </p>
            </div>
            <div class="form-group">
               <label for="exampleInputEmail1">Fecha Nacimiento</label>
               <input type="date" name="fechaNacimiento" class="form-control" max="2002-12-30" aria-describedby="emailHelp" placeholder="Fecha de Nacimiento" required >
            </div>
            <div class="form-group">
               <label for="exampleInputEmail1">Genero</label>
               <select name="genero" id="" class="form-control">
               <option value="M">M</option>
               <option value="F">F</option>
               </select>
            </div>
            <div class="form-group">
               <label for="exampleInputEmail1">Correo Electronico</label>
               <input type="email" name="email" class="form-control"  aria-describedby="emailHelp" placeholder="Correo Electronico" id="correo" required  >
               
            </div>
            <div class="form-group">
               <label for="exampleInputEmail1">Telefono</label>
               <input type="number" name="telefono" class="form-control"  aria-describedby="emailHelp" placeholder="Telefono" required >
            </div>
            
            <div class="form-group">
               <label for="exampleInputEmail1">Nombre de Usuario</label>
               <input type="text" name="nombreUsuario" class="form-control"  aria-describedby="emailHelp" placeholder="Nombre de usuario" required >
            </div>
            <div class="form-group">
               <label for="exampleInputEmail1">Contraseña</label>
               <input type="password" name="password" class="form-control"  aria-describedby="emailHelp" placeholder="Contraseña" required >
            </div>
            <div class="form-group">
               <label for="exampleInputEmail1">Repita la Contraseña</label>
               <input type="password" name="password2" class="form-control"  aria-describedby="emailHelp" placeholder="Repita su Contraseña" required >
            </div>
  
 
  
            <button type="submit" class="btn btn-primary" onclick="literal()">Crear Cuenta</button>
       </form>
          


        
        </div>
        </div>
        <div class="col-md-6">
        <div align="center" id="preview"><img width="100%" height="900px" src="<?php echo base_url();?>images/01.jpg" alt=""></div>
        </div>
        </div>
        
        </div>
			</div>
      <br>
      <?php
        if($msg=='5')
        {
          ?>
          <h5> <?php echo "las Contraseña no son iguales" ?> </h5>
          <?php
        }
      ?>
		
		
		

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
    
  

  
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script type="text/javascript">
	document.getElementById("file").onchange = function(e) {
 
  let reader = new FileReader();

 
  reader.readAsDataURL(e.target.files[0]);

  
  reader.onload = function(){
    let preview = document.getElementById('preview'),
            image = document.createElement('img');

    image.src = reader.result;

    preview.innerHTML = '';
    preview.append(image);
  };
}
 
</script>
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