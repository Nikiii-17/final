<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="text-center mb-5">
    <h1 class="p-2" style="font-style: italic; font-size: 60px;">
        Seznam etap
    </h1>
    <p>Přehled etap, tras, vítězů</p>
</div>

<div class="table-responsive table-striped mt-5">
    <?php
    $table = new \CodeIgniter\View\Table();

    $template = array(
        'table_open'         => '<table class="table table-bordered table-hover align-middle">',
        'thead_open'         => '<thead class="table-dark">',
        'thead_close'        => '</thead>',
        'heading_row_start'  => '<tr>',
        'heading_row_end'    => '</tr>',
        'heading_cell_start' => '<th>',
        'heading_cell_end'   => '</th>',
        'tbody_open'         => '<tbody>',
        'tbody_close'        => '</tbody>',
        'row_start'          => '<tr>',
        'row_end'            => '</tr>',
        'cell_start'         => '<td>',
        'cell_end'           => '</td>',
        'row_alt_start'      => '<tr>',
        'row_alt_end'        => '</tr>',
        'cell_alt_start'     => '<td>',
        'cell_alt_end'       => '</td>',
        'table_close'        => '</table>'
    );

    $table->setTemplate($template);

    $table->setHeading(
        'Číslo etapy', 
        'Start', 
        'Cíl', 
        'Délka etapy (km)', 
        'Vítěz etapy'
    );

    
    echo $table->generate();
    ?>
</div>

<?= $this->endSection(); ?>