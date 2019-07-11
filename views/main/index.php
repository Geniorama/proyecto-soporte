<?php

$theClass = "page-main";
$theTitle = "Bienvenido";
require_once 'views/header.php';
?>
   <div class="main">
       <section class="py-5">
           <div class="container">
               <div class="row">
                   <div class="col-12 text-center">
                       <h1>Bienvenido a la aplicación</h1>
                       <a href="<?php echo constant('URL'); ?>login" class="btn btn-primary">Iniciar sesión</a>
                   </div>
               </div>
           </div>
       </section>
   </div>
<?php
require_once 'views/footer.php';