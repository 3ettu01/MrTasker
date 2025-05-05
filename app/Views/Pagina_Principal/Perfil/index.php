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
                
                <div class="card-wrapper p-3" style="background-color: #ff9c9c">
                    <li>
                        <ul>  </ul>
                    </li>
                </div>
            </div>
        </div>
    </div>
</body>
</html>