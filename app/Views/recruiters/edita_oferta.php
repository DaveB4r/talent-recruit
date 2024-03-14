<div class="container mx-auto text-center">
<h1>Edita Oferta de trabajo</h1>
<div class="card mx-auto text-center" style="width: 38rem;">
<form action="/update_oferta" method="POST">
  <div class="mb-3 p-2">
    <label class="form-label"><h5>Nombre</h5></label>
    <input type="text" value="<?= $ofertadata->nombre ?>" class="form-control" name="nombre" required>
    <input type="hidden" value="<?= $ofertadata->id ?>" name="id" required>
  </div>
  <div class="mb-3 p-2">
  <label class="form-label"><h5>Stack</h5></label>
  <select class="form-select" name="stack[]" multiple aria-label="Multiple select example" required>
    <option <?= strpos(strtolower($ofertadata->stack), "php") !== false ? 'selected' : '' ?> value="PHP">PHP</option>
    <option <?= strpos(strtolower($ofertadata->stack), "javascript") !== false ? 'selected' : '' ?> value="JavaScript">JavaScript</option>
    <option <?= strpos(strtolower($ofertadata->stack), "css") !== false ? 'selected' : '' ?> value="CSS">CSS</option>
    <option <?= strpos(strtolower($ofertadata->stack), "html") !== false  ? 'selected' : '' ?> value="HTML">HTML</option>
    <option <?= strpos(strtolower($ofertadata->stack), "sql") !== false  ? 'selected' : '' ?> value="SQL">SQL</option>
    <option <?= strpos(strtolower($ofertadata->stack), "typescript") !== false  ? 'selected' : '' ?> value="TYPESCRIPT">TYPESCRIPT</option>
    <option <?= strpos(strtolower($ofertadata->stack), "c#") !== false  ? 'selected' : '' ?> value="C#">C#</option>
    <option <?= strpos(strtolower($ofertadata->stack), "mongo db") !== false  ? 'selected' : '' ?> value="MONGO DB">MONGO DB</option>
  </select>  
  </div>
  <div class="mb-3 p-2">
    <label class="form-label"><h5>Descripcion</h5></label>
    <textarea class="form-control" name="descripcion" rows="3"><?= $ofertadata->descripcion ?></textarea>
  </div>
  <a href="/recruiters" class="btn btn-light my-2">Cancelar</a>
  <button type="submit" class="btn btn-primary my-2">Editar Oferta</button>
</form>
</div>
</div>