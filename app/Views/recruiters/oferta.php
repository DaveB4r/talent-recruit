<div class="container mx-auto text-center">
<h1>Crear Oferta de trabajo</h1>
<div class="card mx-auto text-center" style="width: 38rem;">
<form action="/save_oferta" method="POST">
  <div class="mb-3 p-2">
    <label class="form-label"><h5>Nombre</h5></label>
    <input type="text" class="form-control" name="nombre" required>
  </div>
  <div class="mb-3 p-2">
  <label class="form-label"><h5>Stack</h5></label>
  <select class="form-select" name="stack[]" multiple aria-label="Multiple select example" required>
    <option value="PHP">PHP</option>
    <option value="JavaScript">JavaScript</option>
    <option value="CSS">CSS</option>
    <option value="HTML">HTML</option>
    <option value="SQL">SQL</option>
    <option value="TYPESCRIPT">TYPESCRIPT</option>
    <option value="C#">C#</option>
    <option value="MONGO DB">MONGO DB</option>
  </select>  
  </div>
  <div class="mb-3 p-2">
    <label class="form-label"><h5>Descripcion</h5></label>
    <textarea class="form-control" name="descripcion" rows="3"></textarea>
  </div>
  <a href="/recruiters" class="btn btn-light my-2">Cancelar</a>
  <button type="submit" class="btn btn-primary my-2">Crear Oferta</button>
</form>
</div>
</div>