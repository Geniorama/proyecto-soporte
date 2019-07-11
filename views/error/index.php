<?php

$theClass = "page-error";
$theTitle = "Error";
require_once 'views/header.php';
?>
   <section class="pt-5">
       <div class="container">
           <div class="row justify-content-center text-center">
               <div class="col-12 col-md-3">
                   <img src="public/img/computer.svg" alt="" class="img-fluid">
               </div>
               <div class="col-12 my-5">
                <h1>Error al cargar el recurso</h1>

                <a href="http://localhost/proyecto--soporte/" class="btn btn-primary">REGRESAR</a>
               </div>
           </div>
       </div>
   </section>

<?php
require_once 'views/footer.php';