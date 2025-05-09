<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MR. TASKER</title>

    <?= view('links_scripts') ?>

</head>
<body>
    <div class="row container-fluid d-flex align-items-center" style="min-height: 100vh;">
        <?= view('Pagina_Principal/menu_lateral') ?>


        <div class="col d-flex flex-column align-items-center">

            <!-- regresar -->
            <div class="w-100 mb-2 ms-5 d-flex justify-content-between">
                <a href="<?= base_url('/tareas/estado/'.$tarea['estado']) ?>" class="btn-simple fs-4 ms-1"> <i class="bi bi-arrow-left-circle"></i> </a>
                <!-- ICONOS COLABORADORES?? -->
            </div>

            <div class="card-design p-3" style="background-color: <?= $tarea['colorcod'] ?>;"> 

                <!-- view cargar tarea -->
                <?= view('Pagina_Principal/Tareas/ver_cargar_tarea.php') ?>

                <hr class="m-0 mt-2">
                <div class="text-center"> <span class="card-subtext p-0 m-0">Subtareas</span> </div>

                <!-- subtareas -->
                <div class="ms-3">
                    <!-- view cargar subtareas -->
                    <?= view('Pagina_Principal/Tareas/ver_cargar_subts.php') ?>
                </div>
                
                <div class="text-center"> 
                    <a href="#" class="card-title" data-bs-toggle="modal" data-bs-target="#Modalsubt"> 
                        <i class="bi bi-plus-circle"></i>
                    </a>
                </div>

            </div> 

        </div>
    </div>

    <!-- modal crear subtarea -->
    <?= view('Pagina_Principal/Tareas/form_crear_subt.php') ?>

</body>
</html>