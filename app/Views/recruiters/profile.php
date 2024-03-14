<div class="container mx-auto text-center">
<?php

if(session()->getFlashdata('status') != '') {

    echo '<div class="alert alert-info">'.session()->getFlashdata('status').'</div>';
}

?>
<h1>Recruiter Registro</h1>
<div class="card mx-auto text-center" style="width: 18rem;">
<form action="/recruiters_update" method="POST">
  <div class="mb-3 p-2">
    <label for="exampleInputEmail1" class="form-label"><h3>Nombre de usuario</h3></label>
    <input type="text" class="form-control" name="username" value="<?= $userdata->username ?>" required>
    <input type="hidden" name="userid" value="<?= $userdata->id ?>" readonly>
  </div>
  <div class="mb-3 p-2">
    <label for="exampleInputPassword1" class="form-label"><h3>Nueva Contraseña</h3></label>
    <input type="password" class="form-control" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
</div>
</div>