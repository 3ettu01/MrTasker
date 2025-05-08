<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MR. TASKER</title>

    <?= view('links_scripts') ?>
</head>
<body>
    <?php
        $sesion = session();
    ?>

    <div class="col-12 d-flex justify-content-start align-items-center p-3 pb-0" id="logo"> <!-- LOGO -->
        <img src="<?= base_url('public/recursos/img/iconsuser/cat'.$sesion->get('usericon').'.png') ?>" alt="" width="50" class="me-3">
        <img src="<?= base_url('public/recursos/img/mrtasker.png') ?>" alt="Organizador de tareas" width="150">
    </div>
    <div class="container p-0">
        <div class = "card-btnback g-0 w-100 d-flex justify-content-start"> 
            <div class="row align-items-end">
                <div class="col-2">
                <!-- btn regresar -->
                    <a href="<?= base_url('/Tareas') ?>" class="btn-simple fs-4"> <i class="bi bi-arrow-left-circle"></i> </a>
                </div>
                <div class="col-10 d-flex justify-content-center">
                    <h5 class="w-100 text-center">Nueva tarea</h5>
                </div>
            </div>
            
        </div>
        <?php echo form_open('form/creart', ['id' => 'form_creart']); ?>
            <div class="row">
                <div class="col-9">
                    <!-- PRIMERA PARTE -->
                    <div class="g-0 card-wrapper w-100" style="max-width: 800px; background-color:#ff9c9c!important;" id="tarea">
                        
                        <div class="row">
                            <?php
                            echo form_input(array(
                                'name' => 'titulo', 
                                'class' => 'card-input2',
                                'type' => 'text',
                                'placeholder' => 'Titulo*',
                                'value' => old('titulo')
                            )); 
                            if (session('errors.titulo')){   ?>
                                <div class="form-text text-dark text-end"><?= session('errors.titulo') ?></div>
                            <?php } ?>
                        </div>
                        <div class="row form-floating">
                            <?php
                            echo form_textarea([
                                'name' => 'desc',
                                'class' => 'card-input2',
                                'placeholder' => 'Descripcion*',
                                'value' => old('desc'),
                                'style' => 'height:50px'
                            ]);
                            if (session('errors.desc')) { ?>
                                <div class="form-text text-dark text-end"><?= session('errors.desc') ?></div>
                            <?php } ?>
                        </div>
                        <div>
                            <div class="mt-3">Prioridad</div>
                            <?php
                            echo form_input([
                                'type' => 'radio',
                                'name' => 'priori',
                                'class' => 'btn-check',
                                'id' => 'b',
                                'value' => 'b',
                                'autocomplete' => 'off',
                                'checked'     => (old('priori') === 'b' || old('priori') === null)
                            ]);
                            echo form_label('Baja', 'b', ['class' => 'btn btn-textcheck']); ?>

                            <?php
                            echo form_input([
                                'type' => 'radio',
                                'name' => 'priori',
                                'class' => 'btn-check',
                                'id' => 'm',
                                'value' => 'm',
                                'autocomplete' => 'off'
                            ]);
                            echo form_label('Media', 'm', ['class' => 'btn btn-textcheck']); ?>

                            <?php
                            echo form_input([
                                'type' => 'radio',
                                'name' => 'priori',
                                'class' => 'btn-check',
                                'id' => 'a',
                                'value' => 'a',
                                'autocomplete' => 'off'
                            ]);
                            echo form_label('Alta', 'a', ['class' => 'btn btn-textcheck']); ?>
                        </div>
                        <div class="row p-0 mt-3">
                            <div class="col me-2">
                                <span class="mt-3">Fecha de vencimiento: *</span>
                                <?php
                                echo form_input(array(
                                    'name' => 'fvencimiento', 
                                    'class' => 'form-control card-input2',
                                    'type' => 'date',
                                    'style' => 'margin-top: 5px',
                                    'value' => old('fvencimiento')
                                )); 
                                if (session('errors.fvencimiento')){   ?>
                                    <div class="form-text text-dark text-end"><?= session('errors.fvencimiento') ?></div>
                                <?php } ?>
                            </div>
                            <div class="col ms-2">
                                <span class="mt-3">Fecha de recordatorio:</span>
                                <?php
                                echo form_input(array(
                                    'name' => 'frecordatorio', 
                                    'class' => 'form-control card-input2',
                                    'type' => 'date',
                                    'style' => 'margin-top: 5px',
                                    'value' => old('frecordatorio')
                                )); 
                                if (session('errors.frecordatorio')){   ?>
                                    <div class="form-text text-dark text-end"><?= session('errors.frecordatorio') ?></div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- <div>
                            <a href="#" role="button" class="btn-simple btn btn-link mt-3" data-bs-toggle="modal" data-bs-target="#Modalsubt">
                                <i class="bi bi-file-earmark-plus"></i> Añadir subtarea
                            </a>
                        </div> -->
                        
                    </div>
                </div>

                <div class="col-3">
                    <!-- SEGUNDA PARTE: barra lateral -->
                    <div class="menu-content" id="menu-crear" style="background-color: #f1e7e1; padding-top: 110px;">
                        <div class="mb-4">
                            <!-- color -->
                            <label class="form-label">Color de la tarea</label>
                            <div class="d-flex flex-wrap gap-2">
                                <?php
                                echo form_input([
                                    'type' => 'radio',
                                    'name' => 'color_tarea',
                                    'class' => 'btn-check',
                                    'id' => 'color1',
                                    'value' => '#9ac8ff',
                                    'autocomplete' => 'off'
                                ]);
                                echo form_label('', 'color1', [
                                    'class' => 'btn rounded-circle p-3',
                                    'style' => 'background-color: #9ac8ff;'
                                    ]); ?>

                                <?php
                                echo form_input([
                                    'type' => 'radio',
                                    'name' => 'color_tarea',
                                    'class' => 'btn-check',
                                    'id' => 'color2',
                                    'value' => '#96db9d',
                                    'autocomplete' => 'off'
                                ]);
                                echo form_label('', 'color2', [
                                    'class' => 'btn rounded-circle p-3',
                                    'style' => 'background-color: #96db9d;'
                                    ]); ?>

                                <?php
                                echo form_input([
                                    'type' => 'radio',
                                    'name' => 'color_tarea',
                                    'class' => 'btn-check',
                                    'id' => 'color3',
                                    'value' => '#ff9c9c',
                                    'autocomplete' => 'off',
                                    'checked' => 'true'
                                ]);
                                echo form_label('', 'color3', [
                                    'class' => 'btn rounded-circle p-3',
                                    'style' => 'background-color: #ff9c9c;'
                                    ]); ?>

                                <?php
                                echo form_input([
                                    'type' => 'radio',
                                    'name' => 'color_tarea',
                                    'class' => 'btn-check',
                                    'id' => 'color4',
                                    'value' => '#ffe885',
                                    'autocomplete' => 'off'
                                ]);
                                echo form_label('', 'color4', [
                                    'class' => 'btn rounded-circle p-3',
                                    'style' => 'background-color: #ffe885;'
                                    ]); ?>

                                <?php
                                echo form_input([
                                    'type' => 'radio',
                                    'name' => 'color_tarea',
                                    'class' => 'btn-check',
                                    'id' => 'color5',
                                    'value' => '#d29fd6',
                                    'autocomplete' => 'off'
                                ]);
                                echo form_label('', 'color5', [
                                    'class' => 'btn rounded-circle p-3',
                                    'style' => 'background-color: #d29fd6;'
                                    ]); ?>
                            </div>
                        </div>

                        <!-- colaboradores -->
                        <div class="mb-4">
                            <label class="form-label">Colaborar con otro usuario</label>
                            <div class="input-group mb-2">
                                <!-- <input type="email" class="form-control" placeholder="Agregar email" name="colaborador_email">
                                <button class="btn btn-outline-secondary" type="button" title="Agregar colaborador">
                                    <i class="bi bi-person-plus"></i>
                                </button> -->
                            </div>
                            <!-- <select class="form-select" name="rol_colaborador">
                                <option value="participante">Participante</option>
                                <option value="editor">Editor</option>
                            </select> -->
                        </div>

                        <!-- publicar -->
                        <div class="menu-footer mt-4">
                            <button type="submit" class="card-button w-100 text-white" style="background-color: #802b1a;"  onclick="document.getElementById('form_creart').submit();">
                                CREAR TAREA
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        <?php echo form_close(); ?>
    </div>

    <script>
    // Cambia el color de la tarjeta principal al seleccionar un color
    document.querySelectorAll('input[name="color_tarea"]').forEach(radio => {
        radio.addEventListener('change', function () {
            const color = this.value;
            const cardWrapper = document.getElementById('tarea');
            cardWrapper.style.backgroundColor = color;
        });
    });
</script>


</body>
</html>