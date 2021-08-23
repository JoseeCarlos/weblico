<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">Agregar un producto</a>
        </div>
        <div class="card">
            <div class="body"> 
                <form id="sign_up" action="<?php echo base_url(); ?>index.php/producto/agregar_productodb" method="POST">
                    <div class="msg">Registrar producto</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">Nombre</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="producto" placeholder="Nombre" required autofocus>
                        </div>                        
                    </div>                    
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">Precio</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="precio" placeholder="Precio" required autofocus>
                        </div>                        
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">Description</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="descripcion" placeholder="Descripcion" required autofocus>
                        </div>                        
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">Imagen</i>
                        </span>
                        <div class="form-line">
		                	<input type="file" name="foto" class="form-control-file">		                	
                        </div>                        
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">Stock</i>
                        </span>
                        <div class="form-line">
                            <input type="text" name="stock" class="form-control-file">                           
                        </div>                        
                    </div>
                    <div class="input-group">
                        <div class="form-line">
                        <select class="form-control show-tick" name="categoria">
                            <option>Seleccione una categoria</option>
                            <?php foreach ($categoria->result() as $row) { 
                                    ?>
		                    <option value="<?php echo $row->Id; ?>"><?php echo $row->nombreCategoria; ?></option>
                            <?php }                          
                        ?>    
                        </select>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">Fecha de vencimiento</i>
                        </span>
                        <div class="form-line">
                            <input type="date" name="fechaVencimiento" class="form-control-file">                           
                        </div>                        
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">Presentacion</i>
                        </span>
                        <div class="form-line">
                            <input type="text" name="presentacion" class="form-control-file">                           
                        </div>                        
                    </div>
                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Agregar producto</button>
                </form>
            </div>
        </div>
    </div>
