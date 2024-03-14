<div class="container mx-auto text-center">
<?php

if(session()->getFlashdata('status') != '') {

    echo '<div class="alert alert-info">'.session()->getFlashdata('status').'</div>';
}

?>
<h1>Administrar ofertas</h1>
<a href="/add_oferta" class="btn btn-primary my-4">Añadir oferta</a>

<div class="card mx-auto text-start" style="width: 100%;">
    <table class="table table-striped">
        <thead>
            <th>Id</th>
            <th>Nombre</th>
            <th>Stack</th>
            <th>Descipcion</th>
            <th>Acciones</th>
        </thead>
        <tbody>
        <?php foreach($ofertas as $key=>$oferta):?>
            <tr>
                <td><?= $oferta->id ?></td>
                <td><?= $oferta->nombre ?></td>
                <td><?= $oferta->stack ?></td>
                <td><?= $oferta->descripcion ?></td>
                <td>
                    <a href="/editar_oferta/<?= $oferta->id ?>" class="btn btn-warning">Editar</a>
                    <a href="/eliminar_oferta/<?= $oferta->id ?>" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>    
</div>