<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<?php
/** *
 * @var object $detail
 * @var object|null $dvojka
 * @var int|string $ztrata_sekundy
 */
?>

<div class="row justify-content-center mt-5">
    <div class="col-lg-6">
        <div class="card shadow-sm">
            <div class="p-3 text-center bg-light-subtle" style="border-bottom: 1px solid rgba(0,0,0,.125);">
                <img src="<?= base_url('img/stages/profiles/profile-' . $detail->id . '.jpg'); ?>" 
                     class="img-fluid" 
                     style="max-height: 400px; object-fit: contain; width: 100%;" 
                     alt="Profil etapy">
            </div>
            
            <div class="card-body">
                <h3>
                    <span class="fi fi-<?= $detail->country; ?> me-2"></span> 
                    Vítěz: <?= $detail->first_name . ' ' . $detail->last_name; ?>
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
                    <strong>Čas závodníka v etapě:</strong> <?= $detail->cas; ?> 
                </div>

                <hr>

                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="mb-2">
                            <strong>Celkové pořadí:</strong> 
                            <?php if ($dvojka): ?>
                                <?= $dvojka->celk; ?>. místo
                            <?php else: ?>
                                <span class="text-muted">Neklasifikován</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-2">
                            <strong>Ztráta na lídra:</strong> 
                            <?php if ($ztrata_sekundy === 'Vede'): ?>
                                <span class="badge bg-success">Vede celkové pořadí</span>
                            <?php elseif (!$dvojka || $ztrata_sekundy === 0): ?>
                                <span class="text-muted">--:--</span>
                            <?php else: ?>
                                <span class="text-danger">
                                    + <?php 
                                        if ($ztrata_sekundy < 60) {
                                            echo $ztrata_sekundy . ' s';
                                        } elseif ($ztrata_sekundy >= 3600) {
                                            echo ltrim(gmdate("H:i:s", $ztrata_sekundy), '0:');
                                        } else {
                                            echo ltrim(gmdate("i:s", $ztrata_sekundy), '0');
                                        }
                                    ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-2">
                            <strong>Umístění v etapě:</strong><br>
                            <?= $detail->rank; ?>. místo
                        </p>
                    </div>
                </div>

            </div>
        </div>
        
        <div class="text-center mt-3">
            <a href="<?= base_url('/'); ?>" class="btn btn-outline-secondary">Zpět na seznam</a>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>