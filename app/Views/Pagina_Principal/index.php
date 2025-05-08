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
                    <a href="#" class="task-tab">DEFINIDO</a>
                    <a href="#" class="task-tab">EN PROCESO</a>
                    <a href="#" class="task-tab">FINALIZADO</a>
                    <?php
                    // href:  base_url('tareas/definido') 
                    // class:  ($estado_actual == 'definido') ? 'active' : '' 
                    ?>
                </div>
                <div class="task-filter">
                    <button class="btn btn-light">
                    <i class="bi bi-funnel-fill"></i>
                    </button>
                </div>
            </div>

            <div class="pt-5" id="taskslist">

                <?= view('Pagina_Principal/cargar_tareas.php') ?>

            </div>

        </div> <!-- FIN CONTENEDOR TAREAS -->

    </div>

</body>
</html>