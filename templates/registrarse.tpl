{include file="templates/header.tpl"}


<section class="cuerpo">
    <div class="formulario">
    <h2 class="sub-principal">Registrarse</h2>
      <form action="registrarse" method="POST">
        <div class="nombre">    
          <label for="">Email: *</label><input type="email" name="email" id="email" placeholder="Email" required>
          <label for="">Nombre completo: *</label><input type="text" name="user" id="nombre" placeholder="Nombre" required>
          <label for="">Contraseña: *</label><input type="password" name="password" id="password" placeholder="Contraseña" required>
          <label>Administracion: </label><input type="checkbox" name="administrador" id="administrador">
        </div>
       
        <div class="Enviar">
          
          <button id="buttonEnviar">Iniciar sesion</button>
        </div>
      </form>
    </div>
</section>



{include file="templates/footer.tpl"}