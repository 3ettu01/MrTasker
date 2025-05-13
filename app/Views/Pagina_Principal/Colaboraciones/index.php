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
                    <a href="<?= base_url('Colaboraciones/d') ?>" class="task-tab <?= ($estadoactual == 'd') ? 'active' : '' ?>">DEFINIDO</a>
                    <a href="<?= base_url('Colaboraciones/p') ?>" class="task-tab <?= ($estadoactual == 'p') ? 'active' : '' ?>">EN PROCESO</a>
                    <a href="<?= base_url('Colaboraciones/c') ?>" class="task-tab <?= ($estadoactual == 'c') ? 'active' : '' ?>">COMPLETADO</a>
                </div>
                <h4>TAREAS COMPARTIDAS CONMIGO</h4>
            </div>

            <div class="pt-5" id="taskslist">

                <?= view('Pagina_Principal/Colaboraciones/cargar_colaboraciones.php') ?>

            </div>

        </div> <!-- FIN CONTENEDOR TAREAS -->

    </div>

</body>
</html>