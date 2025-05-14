<!-- Los toasts notifican:
    - Recordatorios de tareas y subtareas
    - Proximo vencimiento de tareas y subtareas
    - Vencimiento de tareas y subtareas -->

<?php if (!empty($toasts)): ?>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1055;">
    <?php foreach ($toasts as $toast): ?>
        <div class="toast align-items-center mb-2" role="alert" aria-live="assertive" aria-atomic="true" style="background-color: #f1e7e1;">
            <div class="d-flex">
                <div class="toast-body">
                    <?= $toast['mensaje'] ?>
                    <a href="<?= esc($toast['enlace']) ?>" class="btn btn-sm btn-light ms-2">Ver</a>
                </div>
                <hr>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var toastElList = [].slice.call(document.querySelectorAll('.toast'));
        toastElList.forEach(function (toastEl) {
            new bootstrap.Toast(toastEl, { delay: 7000 }).show();
        });
    });
</script>

<?php endif; ?>