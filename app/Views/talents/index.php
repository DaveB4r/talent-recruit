<div class="container mx-auto text-center">
<?php

if(session()->getFlashdata('status') != '') {

    echo '<div class="alert alert-info">'.session()->getFlashdata('status').'</div>';
}

?>
<h1>Ofertas Disponibles</h1>
<?php foreach($ofertas as $key=>$oferta):?>
<div class="card mx-auto text-start" style="width: 28rem;">
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><b class="text-uppercase text-danger"><?= $oferta->nombre ?></b></li>
        <li class="list-group-item"><b class="text-uppercase text-primary"><?= $oferta->stack ?></b></li>
        <li class="list-group-item"><b class="text-capitalize"><?= $oferta->descripcion ?></b></li>
        <button class="btn btn-primary">Aplicar</button>
    </ul>
</div>    
<?php endforeach ?>
</div>