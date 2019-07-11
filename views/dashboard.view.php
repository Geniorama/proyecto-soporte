
    <!-- Modal Create-->
    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="modalCreateLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="form-group">
                        <label for="nameClient">Nombre Empresa</label>
                        <input type="text" name="nombre-empresa" class="form-control" id="nameClient">
                    </div>
                    <div class="form-group">
                        <label for="nameClient">Dominio</label>
                        <input type="text" name="nombre-dominio" class="form-control" id="nameDomain" placeholder="domain@example.com">
                    </div>
                    <div class="form-group">
                        <label for="emailClient">Correo</label>
                        <input type="email" name="correo-empresa" class="form-control" id="emailClient" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="vencHosting">Venc. Hosting</label>
                        <input type="date" name="venc-hosting" class="form-control" id="nameClient">
                    </div>
                    <div class="form-group">
                        <label for="vencDomain">Venc. Dominio</label>
                        <input type="date" name="venc-dominio" class="form-control" id="nameClient">
                    </div>
                    <div class="form-group">
                        <label for="vencSupport">Venc. Soporte</label>
                        <input type="date" name="venc-soporte" class="form-control" id="vencSupport">
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                <button type="submit" class="btn btn-primary" name="form-create">Crear cliente</button>
            </div>
            </form>
            </div>
        </div>
    </div>
    
   

   <section class="p-5">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 mb-3 text-center">
                    <div class="heading-title">
                        <h2>CLIENTES</h2>
                    </div>
                </div>
                <div class="col-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Ordenar por
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Nombre</a>
                                    <a class="dropdown-item" href="#">Venc. Hosting</a>
                                    <a class="dropdown-item" href="#">Venc. Dominio</a>
                                    <a class="dropdown-item" href="#">Venc. Soporte</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                             <ul class="nav">
                                <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></a></li>
                                <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-4 text-right">
                    <a href="#" class="mr-4"><i class="fa fa-search" aria-hidden="true"></i></a>
                    <button type="button" class="btn btn-raised btn-primary"  data-toggle="modal" data-target="#modalCreate">+ Nuevo cliente</button>
                </div>
                <div class="col-12 mt-3">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre empresa</th>
                                <th scope="col">Dominio</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Venc. Hosting</th>
                                <th scope="col">Venc. Dominio</th>
                                <th scope="col">Venc. Soporte</th>
                                <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datos as $dato): ?>
                                <tr>
                                <th scope="row"><?php echo $dato['id_client']; ?></th>
                                <td><?php echo $dato['name_company']; ?></td>
                                <td><?php echo $dato['name_domain']; ?></td>
                                <td><?php echo $dato['email_client']; ?></td>
                                <td><?php echo $dato['date_hosting']; ?></td>
                                <td><?php echo $dato['date_domain']; ?></td>
                                <td><?php echo $dato['date_support']; ?></td>
                                <td>
                                    <ul class="nav">
                                        <li class="nav-item"><a href="#" class="nav-link" title="Editar" alt="Editar" data-toggle="modal" data-target="#modalEdit<?php echo $dato['id_client']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                        <li class="nav-item"><a href="#" class="nav-link" title="Eliminar" alt="Eliminar" data-toggle="modal" data-target="#exampleModal<?php echo $dato['id_client']; ?>"><i class="fa fa-times" aria-hidden="true"></i></a></li>
                                        <li class="nav-item"><a href="#" class="nav-link bolt-inactive" title="Automatizar" alt="Automatizar"><i class="fa fa-bolt <?php if ($dato['correo_enviado'] == 'si'): ?>bolt-active<?php endif ?>" aria-hidden="true"></i></a></li>
                                    </ul>
                                </td>
                                </tr>

                                 <!-- Modal Delete-->
                                <div class="modal fade" id="exampleModal<?php echo $dato['id_client']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Cliente</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Desea eliminar "<?php echo $dato['name_company']; ?>"?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                                            <a href="../borrar-cliente.php?id-cliente=<?php echo $dato['id_client']; ?>" class="btn btn-primary">Eliminar</a>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Edit-->
                                <div class="modal fade" id="modalEdit<?php echo $dato['id_client']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalCreateLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="../editar-cliente.php" method="POST" name="form">
                                                <div class="form-group">
                                                <input type="hidden" name="idEmpresa" class="form-control" id="idEmpresa" value="<?php echo $dato['id_client']; ?>">
                                                    <label for="nameClient">Nombre Empresa</label>
                                                    <input type="text" name="nombre-empresa" class="form-control" id="nameClient" value="<?php echo $dato['name_company']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nameClient">Dominio</label>
                                                    <input type="text" name="nombre-dominio" class="form-control" id="nameDomain" value="<?php echo $dato['name_domain']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="emailClient">Correo</label>
                                                    <input type="email" name="correo-empresa" class="form-control" id="emailClient" value="<?php echo $dato['email_client']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="vencHosting">Venc. Hosting</label>
                                                    <input type="date" name="venc-hosting" class="form-control" id="nameClient" value="<?php echo $dato['date_hosting']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="vencDomain">Venc. Dominio</label>
                                                    <input type="date" name="venc-dominio" class="form-control" id="nameClient" value="<?php echo $dato['date_domain']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="vencSupport">Venc. Soporte</label>
                                                    <input type="date" name="venc-soporte" class="form-control" id="vencSupport" value="<?php echo $dato['date_support']; ?>">
                                                </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                                            <button type="submit" class="btn btn-primary" name="form-edit">Editar cliente</button>
                                        </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
   </section>