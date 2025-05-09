<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MR. TASKER</title>

    <?= view('links_scripts') ?>
    
</head>
<body>
    <!-- obtener sesion -->
    <?php $sesion = session(); ?>
    <?= $sesion->get('usernombre') ?>
    
    <div class="container-fluid p-0 row">

        <!-- MENU LATERAL -->
        <?= view('Pagina_Principal/menu_lateral') ?>

        <div class="col-9 float-end" id="taskscontainer"> <!-- CONTENEDOR TAREAS -->
            
            <div class="task-header d-flex align-items-center justify-content-between px-3 py-2">
                <div class="task-tabs d-flex align-items-center">
                    <a href="<?= base_url('tareas/estado/d') ?>" class="task-tab <?= ($estadoactual == 'd') ? 'active' : '' ?>">DEFINIDO</a>
                    <a href="<?= base_url('tareas/estado/p') ?>" class="task-tab <?= ($estadoactual == 'p') ? 'active' : '' ?>">EN PROCESO</a>
                    <a href="<?= base_url('tareas/estado/c') ?>" class="task-tab <?= ($estadoactual == 'c') ? 'active' : '' ?>">COMPLETADO</a>
                </div>

                <div class="task-filter">
                    <!-- <button class="btn btn-light">
                        <i class="bi bi-list-task"></i>
                    </button> -->
                    <a class="btn btn-light dropdown-toggle fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-list-task"></i>
                    </a>
                    
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url('tareas/ordenar/' . $estadoactual . '/recientes') ?>">Vencimiento lejano</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('tareas/ordenar/' . $estadoactual . '/antiguos') ?>">Vencimiento proximo</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?= base_url('tareas/ordenar/' . $estadoactual . '/prioridadalta') ?>">Mayor prioridad</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('tareas/ordenar/' . $estadoactual . '/prioridadbaja') ?>">Menor prioridad</a></li>
                    </ul>
                </div>
            </div>

            <div class="pt-5" id="taskslist">

                <?= view('Pagina_Principal/cargar_tareas.php') ?>

            </div>

        </div> <!-- FIN CONTENEDOR TAREAS -->

    </div>

</body>
</html>