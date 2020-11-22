{include 'head.tpl'}
{include 'header.tpl'}

<section class="container justify-content-center">
  {if $accion == 'login'}
  <form method="POST" action="login" class="col form-translucent">
  {else}
  <form method="POST" action="register" class="col form-translucent">
  {/if}
    <div class="form-group">
      <label for="exampleInputEmail1" class="texto-blanco">Correo electrónico</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1" class="texto-blanco">Password</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>
    {if $error}
      <div class="alert alert-danger">
          {$error}
      </div>
    {/if}
    {if $accion == 'login'}
    <button type="submit" class="btn btn-primary">Login</button>
    {else}
    <button type="submit" class="btn btn-primary">Registrarse</button>
    {/if}
  </form>
</section>

{include 'footer.tpl'}