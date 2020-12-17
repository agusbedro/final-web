{include file="templates/header.tpl"}

       <button><a href="trends">Volver</a></button>
          <table >
            <thead>
              <th>Continente</th>
              <th>Zona</th>
              <th>Moda</th>
              <th>Make-up</th>
              <th>Pelo</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </thead>
            <tbody id="tablaTrends">
                    <tr>    
                <td><a href="continente/{$trend->id_continente}">{$trend->nombre}</td>
                <td id="{$trend->id}">{$trend->zona}</td>
                <td>{$trend->moda}</td>
                <td>{$trend->makeup}</td>
                <td>{$trend->pelo}</td>
                <td><button class="btnEditar"><a href="edit/{$trend->id}">Editar</button></td>
                <td><button class="btnEliminar"><a href="delete/{$trend->id}">Borrar</a></button></td>
                </tr>
            </tbody>

          </table>
        </aside>

        <aside>
          <table>
            <thead id="columnas">
              <th>Comentario</th>
              <th>Puntuacion</th>
              {if $usuario->administrador == 1}
              <th>Borrar</th>
              {/if}
            </thead>
            <tbody  id="tablaComentarios">
            </tbody>
          </table>
          {include file="templates/formComentarios.tpl"}
        </aside>

 {include file="templates/footer2.tpl"}