<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


<?php
/** 
 * @var object $detail
 * @var object $dvojka
 */
?>

<div class="row justify-content-center mt-5">
    <div class="col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header">
                <div class="card">
                <div class="d-flex justify-content-center w-100">
                    <img src="<?= base_url('img/stages/profiles/profile-' . $detail->id . '.jpg'); ?>" style="width: 100%; max-height: 400px; object-fit: contain;" alt="">
                </div>
                </div>
                <hr>
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
                        <strong>Převýšení:</strong> <?= $detail->vertikal; ?> 
                    </div>

                    <div class="mb-2">
                        <strong>Celkové pořadí:</strong> <?= $dvojka->celk; ?>
                    </div>

                    <div class="mb-2">
                        <strong>Čas závodníka:</strong> <?= $detail->cas; ?> 
                    </div>

                    <div class="mb-2">
                        <strong>Ztráta na prvního:</strong> <?= $detail->cas; ?> 
                    </div>
                    

                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <p class="mb-2">
                                <strong>Umístění</strong><br>
                                <?= $detail->rank; ?>. místo
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        
        <div class="text-center mt-3">
        <a href="<?= base_url('/'); ?>" class="btn btn-outline-secondary">Zpět na seznam</a>        </div>
    </div>
</div>

<?= $this->endSection(); ?>