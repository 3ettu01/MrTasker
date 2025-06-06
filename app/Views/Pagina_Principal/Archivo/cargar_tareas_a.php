<?php if ($tareas == []): ?>
    <div class="d-flex flex-column justify-content-center align-items-center text-center">
        <img src="<?= base_url('public/recursos/img/catgif.gif'); ?>" alt="" width="200" class="rounded-circle border border-dark"> <br>
        <div class="card-subtext-btn p-0 m-0">No hay tareas.. aun</div>
    </div>
<?php endif; ?>


<?php foreach ($tareas as $tarea): ?>

    <div class="card-design p-3 mb-3" style="background-color: <?= $tarea['colorcod'] ?>;"> 

    <div class="d-flex justify-content-between align-items-start">
        <div class="d-flex align-items-center">
            <h4 class="me-1">
                <?php if ($tarea['prioridad']=='a'): ?>
                    <i class="bi bi-chevron-right"></i> <b> <?= $tarea['tema'] ?> </b> <i class="bi bi-exclamation-diamond"></i>
                <?php else: ?>
                    <i class="bi bi-chevron-right"></i> <?= $tarea['tema'] ?>
                <?php endif; ?>
            </h4>
        </div>
        <a href="<?= base_url('tareas/ver/' . $tarea['id']) ?>" class="card-title p-0 m-0">
            <i class="bi bi-caret-right-fill"></i>
        </a>
    </div>

    <div class="row w-100 mt-2">
        <div class="col-10">
            <div class="card-subtext mt-0">Prioridad <?= $tarea['prioridadtxt'] ?></div>
            <p class="mt-1 mb-1 text-dark"><?= $tarea['descripcion'] ?></p>
        </div>

        <div class="col-2 d-flex flex-column justify-content-end align-items-end p-0" style="min-height: 100%;">
            <?php if (!empty($tarea['frecordatorio'])): ?>
                <span class="card-subtext mb-1">
                    <i class="bi bi-bell-fill"></i> <?= $tarea['frecordatorio'] ?>
                </span>
            <?php endif; ?>
            <span class="card-subtext">Vence el <?= $tarea['fvencimiento'] ?></span>
        </div>
    </div>

</div>
 

<?php endforeach; ?>