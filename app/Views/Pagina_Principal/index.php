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

                
                <div class="card-design p-3"> <!-- modelo task -->
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="d-flex align-items-center">
                            <input class="form-check-input custom-checkbox" type="checkbox" id="task">
                            <div>
                                <span class="ms-3 task-title">Tarea de prueba</span>
                                <span class="card-subtext">- asignada a Tofi</span>
                            </div>
                        </div>
                        <i class="bi bi-pencil fs-5"></i> 
                    </div>

                    <div class="card-subtext mt-1">prioridad x</div>

                    <p class="mt-2 mb-3 text-dark">
                        Descripción 
                    </p>

                    <div class="d-flex justify-content-between">
                        <span class="card-subtext">Recordatorio para el xx/xx/xx</span>
                        <span class="card-subtext">Vence el xx/xx/xx</span>
                    </div>

                    <!-- subtareas -->
                    <hr>
                    <div class="ms-4 mt-2">
                        <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="d-flex align-items-center">
                                <input class="form-check-input custom-checkbox" type="checkbox" id="subtask1">
                                <div>
                                    <span class="ms-2 subtask-title">Subtarea x</span>
                                    <span class="card-subtext">- asignada a Milo</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-subtext mt-1">prioridad x</div>
                        <p class="mt-1 mb-1 text-dark">Descripción</p>
                        <div class="d-flex justify-content-between">
                            <span class="card-subtext">Recordatorio para el xx/xx/xx</span>
                            <span class="card-subtext">Vence el xx/xx/xx</span>
                        </div>
                    </div>

                </div> <!-- fin modelo task -->

                



            </div>

        </div> <!-- FIN CONTENEDOR TAREAS -->

    </div>

</body>
</html>