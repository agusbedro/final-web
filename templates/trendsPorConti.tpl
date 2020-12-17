{include file="templates/header.tpl"}
          <button><a href="trends">Volver</a></button>

   <aside class="tabla" id="tabla">
          <table>
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
                {foreach from=$trends item=trend}
                    <tr>    
                <td><a href="continente/{$trend->id_continente}"> {$trend->nombre}</a></td>
                <td><a href="trends/{$trend->id}"> {$trend->zona}</a></td>
                <td>{$trend->moda}</td>
                <td>{$trend->makeup}</td>
                <td>{$trend->pelo}</td>
                <td><button class="btnEditar"><a href="edit/{$trend->id}">Editar</button></td>
                <td><button class="btnEliminar"><a href="delete/{$trend->id}">Borrar</a></button></td>
                </tr>
                {/foreach}
            </tbody>

          </table>
        </aside>


  {include file="templates/footer.tpl"}