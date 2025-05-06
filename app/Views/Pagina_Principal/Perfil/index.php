<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MR. TASKER</title>

    <?= view('links_scripts') ?>
    <?php $sesion = session(); ?>
</head>
<body>
    <div class="container-fluid p-0">
        <div class="row">
            <?= view('Pagina_Principal/menu_lateral') ?>

            <div class="col d-flex flex-column align-items-center mt-5">
                <img src="<?= base_url('public/recursos/img/iconsuser/cat'.$sesion->get('usericon').'.png') ?>" alt="" width="100" class="mb-2">
                
                <span class="card-title mb-0"> <?= $sesion->get('usernombre') ?> </span>
                
                <div class="card-design p-3 w-50">
                    <li class="my-1 mx-3">Nombre: <?= $sesion->get('usernombre') ?> </li>
                    <li class="my-1 mx-3">Email: <?= $sesion->get('useremail') ?> </li>
                    <div class="m-0 p-0 d-flex justify-content-end">
                        <a href="#" role="button" class="card-subtext-btn" data-bs-toggle="modal" data-bs-target="#Modaleditp"> 
                            <i class="bi bi-pencil-square"></i> Modificar datos 
                        </a>
                    </div>
                    <hr>
                    <span class="card-subtext">Tareas creadas: 0</span> <br>
                    <span class="card-subtext">Tareas terminadas: 0</span>
                </div>
            </div>
        </div>
    </div>
    <?php echo view('Pagina_Principal/Perfil/form_modal_edit.php') ?>
</body>
</html>