<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<?php
/** 
 * @var object $etapa 
 * @var array $cislaEtap
 */
?>

<div class="text-center my-5 pb-4 border-bottom">
    <h1 class="display-4 fw-bold text-dark mb-2">
        Edit etapy č. <?= esc($etapa->number) ?>
    </h1>
    <h2 class="h5 text-muted fw-normal text-uppercase tracking-wider">
        Uprav si to  kmo
    </h2>
</div>

<div class="card shadow-sm p-4 border-0 mx-auto" style="max-width: 600px;">
    <form action="<?= base_url('update/' . $etapa->id) ?>" method="post">

        <div class="mb-3">
            <label for="number" class="form-label fw-semibold text-secondary">Číslo etapy</label>
            <select class="form-select" name="number" id="number" required>
                <?php foreach ($cislaEtap as $cislo): ?>
                    <option value="<?= $cislo ?>" <?= $cislo == $etapa->number ? 'selected' : '' ?>>
                        <?= $cislo ?>. etapa
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="departure" class="form-label fw-semibold text-secondary">Start</label>
            <input type="text" class="form-control" name="departure" id="departure" value="<?= esc($etapa->departure) ?>" required>
        </div>

        <div class="mb-3">
            <label for="arrival" class="form-label fw-semibold text-secondary">Finito</label>
            <input type="text" class="form-control" name="arrival" id="arrival" value="<?= esc($etapa->arrival) ?>" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label fw-semibold text-secondary">Datum</label>
            <input type="date" class="form-control" name="date" id="date" value="<?= esc($etapa->date ?? '') ?>" required>
        </div>

        <div class="mb-3">
            <label for="distance" class="form-label fw-semibold text-secondary">Délka etapy (km)</label>
            <input type="number" step="0.1" class="form-control" name="distance" id="distance" value="<?= esc($etapa->distance) ?>" required>
        </div>

        <div class="mb-3">
            <label for="map" class="form-label fw-semibold text-secondary">Mapka</label>
            <input type="url" class="form-control" name="map" id="map" value="<?= esc($etapa->map ?? '') ?>" placeholder="https://odkazik">
        </div>

        <div class="d-flex gap-2 justify-content-end mt-4">
            <a href="<?= base_url('/') ?>" class="btn btn-outline-secondary px-4">Zrušit</a>
            <button type="submit" class="btn btn-primary px-4 shadow-sm">Uložit změny</button>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>