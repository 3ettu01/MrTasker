<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MR. TASKER - Ingreso</title>

    <?= view('links_scripts') ?>

</head>
<body>
    <div class="container-fluid p-0" id="contenedorP">
        
        <div class="row p-0" id="header"> 

            <div class="col-12 col-md-10 pt-3 px-5" id="logo"> <!-- LOGO -->
                <img src="<?= base_url('public/recursos/img/logo.png') ?>" alt="" width="250" id="imglogo">
            </div>
            <div class="col-12 col-md-2 pt-4 px-5"> <!-- INICIO SESION boton -->
                <button type="button" class="Btn float-end btnposition" data-bs-toggle="modal" data-bs-target="#authModal">
                    <div class="sign">
                        <i class="bi bi-box-arrow-in-right iconlogin"></i>
                    </div>
                    <div class="text">Entrar</div>
                </button>
            </div>

        </div>

        <div class="row my-4 card-design d-flex justify-content-center mx-auto">
            hi
        </div>

    </div>

    <?php echo view('Login_Registro/modal') ?>

</body>
</html>