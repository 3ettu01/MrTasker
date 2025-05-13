<?php
    $sesion = session();
?>
<div class="row align-items-start w-100">
    <div class="col-10">

        <div class="w-100 d-flex text-align-center">
            <?php if ($tarea['prioridad']=='a'): ?>
                <h4 class="me-1"><i class="bi bi-chevron-right"></i> <b> <?= $tarea['tema'] ?> </b> <i class="bi bi-exclamation-diamond"></i> </h4>
            <?php else: ?>
                <h4 class="me-1"><i class="bi bi-chevron-right"></i> <?= $tarea['tema'] ?> </h4>
            <?php endif; ?>

        <span class="card-subtext-btn pt-2"> - <?= $tarea['estadotxt'] ?> </span>

        <?php if ($tarea['archivo']=='1'): ?>
            <span class="card-subtext-btn pt-2">, Y ARCHIVADA </span>
        <?php endif; ?>
        </div>

        <div class="card-subtext mt-0">prioridad <?= $tarea['prioridadtxt'] ?> </div>
        <p class="mt-1 mb-1 text-dark">
            <?= $tarea['descripcion'] ?>
        </p>

    </div>
    <div class="col-2 d-flex flex-column align-items-end p-0">
        <?php if($tipocolaboracion == 'e' && $tarea['estado'] != 'c'): ?>
        <a href="<?= base_url('tareas/editar/' . $tarea['id']) ?>" class="card-subtext-btn">Editar</a>
        <?php endif; ?>
    </div>
</div>

<div class="d-flex justify-content-between">
    <?php if (!empty($tarea['frecordatorio'])): ?>
        <span class="card-subtext"><i class="bi bi-bell-fill"></i> <?= $tarea['frecordatorio'] ?> </span>
    <?php else: ?>
        <span> </span>
    <?php endif; ?>

    <span class="card-subtext">Vence el <?= $tarea['fvencimiento'] ?> </span>
</div>
