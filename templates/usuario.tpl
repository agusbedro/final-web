{include file="templates/header.tpl"}

 <table>
        <thead>
            <th>Mail</th>
            <th>Usuario</th>
            <th>Permisos</th>
            <th>Eliminar</th>
            <th>Editar</th>
        </thead>
        <tbody id="tablaTrends">
                <tr>
            <td><a href="user/{$usuario->id}">{$usuario->email}</a></td>
            <td><a href="user/{$usuario->id}">{$usuario->user}</a></td>
            {if $usuario->administrador == 0}
            <td>Usuario normal</td>
            {else}
            <td>Administrador</td>
            {/if}
            <td><button class="btnEliminar"><a href="userDelete/{$usuario->id}">Borrar</a></button></td>
            <td><button class="btnEditar"><a href="userEdit/{$usuario->id}">Editar</a></button></td>
            </tr>
        </tbody>
    </table>

<h3>Cambiar permiso de usuario</h3>
    
    <form action="cambiarPermiso/{$usuario->id}" method="POST" id="formUsuario">
    <label for="administrador">Administrador: </label>
        <input type="checkbox" name="administrador" id="administrador"><br>
        <button id="cambiar" type="submit" style="margin:10px 30px">Cambiar</button>
    </form>

{include file="templates/footer.tpl"}