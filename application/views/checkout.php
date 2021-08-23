<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Venta</title>
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
    <script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    
  </head>
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
        <form action="#" class="searchform order-lg-last">
          <div class="form-group d-flex">
            <input type="text" class="form-control pl-3" placeholder="Search">
            <button type="submit" placeholder="" class="form-control search"><span class="ion-ios-search"></span></button>
          </div>
        </form>
        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav mr-auto">
          <li class="nav-item active"><a href="<?php echo base_url();?>index.php/usuario/" class="nav-link pl-0 btn">Inicio</a></li>
          </ul>
        </div>
      </div>
    </nav>
<div class="site-wrap">
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Tu pedido</h2>
            <div class="p-3 p-lg-5 border">
               <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Productos</th>
                      <th>Total</th>
                    </thead>
                    <tbody>
                       <?php
                    foreach ($carrito->result() as $row) {
                      ?>
                      <tr>
                        <td><?php echo $row->nombre; ?><strong class="mx-2">x</strong> <?php echo $row->cantidad; ?></td>
                        <td><?php echo ( $row->precio *  $row->cantidad)?> .Bs</td>
                      </tr>
                      <?php

                    }
                    ?>  
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Subtotal</strong></td>
                        <td class="text-black"><?php echo $_POST["subtotal"];?></td>
                      </tr>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Total de la orden</strong></td>
                        <td class="text-black font-weight-bold"><strong><?php echo $_POST["final"];?></strong></td>
                      </tr>
                    </tbody>
                  </table>

            </div>
          </div>




          <div class="col-md-6">            
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Tu Pedido</h2>
                <div class="p-3 p-lg-5 border">
                  <div class="border p-3 mb-3">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Transferencia bancaria directa</a></h3>

                    <div class="collapse" id="collapsebank">
                      <div class="py-2">
                        <div class="container">
                            <form action="<?php echo base_url();?>index.php/producto/thankyou" method="POST" id="card-form">
                              <span class="card-errors"></span>
                            <div><br>
                            <label>
                           <span>Nombre del tarjeta habiente</span>
                            <input class="form-control" size="20" data-conekta="card[name]" type="text">
                            </label>
                        </div>
                     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
                      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

                      <div>
                       <label>
                      <span>Número de tarjeta de crédito</span>
                        <input class="form-control" size="20" data-conekta="card[number]" type="text">
                            </label>
                        </div>
                      <div>
                      <label>
                       <span>CVC</span>
                     <input class="form-control" size="4" data-conekta="card[cvc]" type="text">
                       </label>
                     </div>
                  <div>
                  <label>
                <span>Fecha de expiración (MM/AAAA)</span>
                <input size="2" data-conekta="card[exp_month]" type="text">
                  </label>
                    <span>/</span>
                          <input  size="4" data-conekta="card[exp_year]" type="text">
                            </div>
                              <button class="btn btn-primary" type="submit">Hacer el pedido</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="border p-3 mb-3">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Pago con Cheque/ Efectivo</a></h3>
                    <div class="collapse" id="collapsecheque">
                      <div class="py-2">
                        <p class="mb-0">Usted debera pagar cuando el pedido llegue a su puerta.</p>
                        <br>
                        <div class="form-group">
                <label for="Departamento" class="text-black">Departamento <span class="text-danger">*</span></label>
                <select id="Departamento" name="Departamento" class="form-control">
                  <option value="1">Selecciona un departamento</option>    
                  <option value="2">Cochabamba</option>    
                  <option value="3">La Paz</option>    
                  <option value="4">Santa Cruz</option>    
                  <option value="5">Oruro</option>    
                  <option value="6">Potosi</option>    
                  <option value="7">Chuquisaca</option>    
                  <option value="8">Tarija</option>    
                  <option value="9">Pando</option>  
                  <option value="10">Beni</option>  
                </select>
              </div>
                  
                        <br>
                         <div class="form-group row">
                           <div class="col-md-12">
                              <label for="Direccion" class="text-black">Direccion: <span class="text-danger">*</span></label>
                               <input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Ejm: Waldo Ballivian #1089">
                             </div>
                          </div>
                        <br>
                        <button class="btn btn-primary" onclick="window.location='<?php echo base_url();?>index.php/producto/thankyou'">Hacer el pedido</button>
                      </div>
                    </div>
                  </div>
                  

                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- </form> -->
      </div>
    </div>
  </div>



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
    
    <script type="text/javascript" >
  Conekta.setPublicKey('key_Cf6xwVgweFHiqVvzixk5VEQ');

  var conektaSuccessResponseHandler = function(token) {
    var $form = $("#card-form");
    //Inserta el token_id en la forma para que se envíe al servidor
     $form.append($('<input name="conektaTokenId" id="conektaTokenId" type="hidden">').val(token.id));
    $form.get(0).submit(); //Hace submit
  };
  var conektaErrorResponseHandler = function(response) {
    var $form = $("#card-form");
    $form.find(".card-errors").text(response.message_to_purchaser);
    $form.find("button").prop("disabled", false);
  };

  //jQuery para que genere el token después de dar click en submit
  $(function () {
    $("#card-form").submit(function(event) {
      var $form = $(this);
      // Previene hacer submit más de una vez
      $form.find("button").prop("disabled", true);
      Conekta.Token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler);
      return false;
    });
  });
</script>
  </body>
</html>