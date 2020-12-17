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
            {foreach from=$usuarios item=usuario}
                <tr>
            <td>{$usuario->email}</td>
            <td>{$usuario->user}</td>
            {if $usuario->administrador == 0}
            <td>Usuario normal</td>
            {else}
            <td>Administrador</td>
            {/if}
            <td><button class="btnEliminar"><a href="userDelete/{$usuario->id}">Borrar</a></button></td>
            <td><button class="btnEditar"><a href="user/{$usuario->id}">Editar</a></button></td>
            </tr>
            
            {/foreach}
        </tbody>
    </table>


{include file="templates/footer.tpl"}