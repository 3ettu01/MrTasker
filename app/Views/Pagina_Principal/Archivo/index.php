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
            <div class="d-flex justify-content-center"> <span class="task-title">ARCHIVO DE TAREAS COMPLETADAS</span> </div>

            <div class="pt-5" id="taskslist">

                <!-- vista cargar tareas -->
                <?= view('Pagina_Principal/Archivo/cargar_tareas_a') ?>

            </div>

        </div> <!-- FIN CONTENEDOR TAREAS -->

    </div>

    <?= view('Pagina_Principal/toastsexito_fracaso.php') ?>
</body>
</html>