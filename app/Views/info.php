<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<?php
/** 
 * @var object $detail
 */

 /**
  * <div class="d-flex justify-content-center w-100">
  *<img src="<?= base_url('img//' . $detail->flag_image); ?>" style="width: 100%; max-height: 400px; object-fit: contain;" alt="">
                *</div>


                *<span class="fi fi-<?= $detail->country; ?>"></span> (??? idk jak)
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
                    <div class="card-title mb-3 text-center">
                        <h3>Vítěz: <?= $detail->first_name . ' ' . $detail->last_name; ?></h3>
                    </div>
                    
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
                        <strong>Celkové pořadí:</strong> <?= $detail->rank; ?> 
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