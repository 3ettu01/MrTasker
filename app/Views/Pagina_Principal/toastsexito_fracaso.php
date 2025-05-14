<?php if (session()->getFlashdata('success')): ?>
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div class="toast text-bg-success show" role="alert">
        <div class="d-flex">
            <div class="toast-body">
                <?= session()->getFlashdata('success') ?>
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div class="toast text-bg-danger show" role="alert">
        <div class="d-flex">
            <div class="toast-body">
                <?= session()->getFlashdata('error') ?>
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<?php endif; ?>