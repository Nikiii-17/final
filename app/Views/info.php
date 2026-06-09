<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<?php
/** 
 * @var object $detail
 * @var array $celkove_poradi
 */
?>

<div class="row justify-content-center mt-5">
    <div class="col-lg-8"> <div class="card shadow-sm mb-4">
            <div class="p-3 text-center bg-light-subtle" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                <img src="<?= base_url('img/stages/profiles/profile-' . $detail->id . '.jpg'); ?>" 
                     class="img-fluid" 
                     style="max-height: 400px; object-fit: contain; width: 100%;" 
                     alt="Profil etapy">
            </div>
            
            <div class="card-body">
                <h3>
                    <span class="fi fi-<?= $detail->country; ?> me-2"></span> 
                    Vítěz etapy: <?= $detail->first_name . ' ' . $detail->last_name; ?>
                </h3>
                
                <div class="mb-2">
                    <strong>Etapa číslo:</strong> <?= $detail->number; ?>
                </div>
                
                <div class="mb-2">
                    <strong>Trasa:</strong> <?= $detail->departure; ?> -> <?= $detail->arrival; ?>
                </div>
                
                <div class="mb-2">
                    <strong>Délka etapy:</strong> <?= $detail->distance; ?> km
                </div>

                <div class="mb-2">
                    <strong>Typ etapy:</strong> <?= $detail->parcour_name; ?> 
                </div>

                <div class="mb-2">
                    <strong>Převýšení:</strong> <?= $detail->vertikal; ?> m
                </div>

                <div class="mb-2">
                    <strong>Čas vítěze v etapě:</strong> <?= $detail->cas; ?> 
                </div>
                
            </div>
        </div>
        <div class="text-center mt-4 mb-5">
            <a href="<?= base_url('/'); ?>" class="btn btn-outline-secondary">Zpět na seznam</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Celkové pořadí po etapě</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 80px;" class="text-center">Pořadí</th>
                            <th style="width: 80px;" class="text-center">Stát</th>
                            <th>Závodník</th>
                            <th>Celkový čas</th>
                            <th class="text-end" style="width: 150px;">Ztráta</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php foreach ($celkove_poradi as $zavodnik): ?>
        <tr>
            <td class="text-center fw-bold"><?= $zavodnik->celk; ?>.</td>
            <td class="text-center">
                <span class="fi fi-<?= $zavodnik->country; ?>"></span>
            </td>
            <td><?= $zavodnik->first_name . ' ' . $zavodnik->last_name; ?></td>
            <td><?= $zavodnik->celk_cas; ?></td>
            <td class="text-end">
                <?php if ($zavodnik->ztrata === 'Vede'): ?>
                    <span class="badge bg-success">Vede</span>
                <?php else: ?>
                    <span class="text-danger fw-medium">
                        + <?php 
                            if ($zavodnik->ztrata < 60) {
                                echo $zavodnik->ztrata . ' s';
                            } elseif ($zavodnik->ztrata >= 3600) {
                                echo ltrim(gmdate("H:i:s", $zavodnik->ztrata), '0:');
                            } else {
                                echo ltrim(gmdate("i:s", $zavodnik->ztrata), '0');
                            }
                        ?>
                    </span>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
        
        
    </div>
</div>

<?= $this->endSection(); ?>