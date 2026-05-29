<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<?php
/** 
 * @var object $vse
*/
 ?>
<div class="text-center my-5 pb-4 border-bottom">
    <h1 class="display-4 fw-bold text-dark mb-2">
        Seznam etap
    </h1>
    <h2 class="h5 text-muted fw-normal text-uppercase tracking-wider">
        Přehled etap, tras a vítězů
    </h2>
</div>

<div class="table-responsive card shadow-sm p-3 border-0 mt-4">
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
        'Vítěz etapy',
        'Proklik'
    );

    foreach($vse as $row){
        
        $detailOdkaz = '<a href="' . base_url('dva/') . $row->id . '" class="btn btn-outline-primary btn-sm px-3 shadow-sm fw-semibold">Proklik ;D</a>';
      
        $table->addRow(
            '<span class="fw-bold text-secondary">' . $row->number . '.</span>', 
            $row->departure, 
            $row->arrival, 
            $row->distance, 
            $row->first_name . " " . $row->last_name,
            $detailOdkaz
        );
    };
    
    echo $table->generate();
    ?>
</div>


<?= $this->endSection(); ?>




