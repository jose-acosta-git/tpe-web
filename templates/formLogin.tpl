{include 'head.tpl'}
{include 'header.tpl'}

<form method="POST" action="verify">
  <div class="form-group">
    <label for="exampleInputEmail1">Correo electrónico</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

{include 'footer.tpl'}