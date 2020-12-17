{include file="templates/header.tpl"}

    
    <button><a href="trends">Volver</a></button>
    <table>
        <thead>
            <th>Continente</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </thead>
        <tbody id="tablaTrends">
            {foreach from=$continentes item=continente}
                <tr>    
            <td>{$continente->nombre}</td>
            <td><button class="btnEditarCont" id="editCont/{$continente->id_continente}">Editar</button></td>
            <td><button class="btnEliminar"><a href="deleteCont/{$continente->id_continente}">Borrar</a></button></td>
            </tr>
            {/foreach}
        </tbody>
    </table>


    <form action="insert" method="POST" class="formTablaCont" id="formTablaCont">
        <label for="">Continente</label> <input type="text" name="id_continente" id="inputContinente" placeholder="Continente">
        <div class="botonesTabla">

            <button type="submit">Agregar</button>

        </div>
    </form>

{include file="templates/footer.tpl"}