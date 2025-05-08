<div class="row align-items-start">
    <div class="col-10 d-flex align-items-center">
        <h4 class="me-1"><i class="bi bi-chevron-right"></i> <?= $tarea['tema'] ?> </h4>
        <!-- <span class="card-subtext">- asignada a Tofi</span> -->
    </div>
    <div class="col-2 d-flex flex-column align-items-end">
        <a href="" class="card-subtext-btn">Editar</a>
        <a href="" class="card-subtext-btn">Eliminar</a>
    </div>
</div>
<div class="card-subtext mt-0">prioridad <?= $tarea['prioridadtxt'] ?> </div>
<p class="mt-1 mb-1 text-dark">
    <?= $tarea['descripcion'] ?>
</p>
<div class="d-flex justify-content-between">
    <?php if (!empty($tarea['frecordatorio'])): ?>
        <span class="card-subtext"><i class="bi bi-bell-fill"></i> <?= $tarea['frecordatorio'] ?> </span>
    <?php else: ?>
        <span> </span>
    <?php endif; ?>

    <span class="card-subtext">Vence el <?= $tarea['fvencimiento'] ?> </span>
</div>