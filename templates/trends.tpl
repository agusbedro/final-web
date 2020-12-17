{include file="templates/header.tpl"}

 <section class="cuerpo">
    <h2 class="sub-principal">Trends</h2>
    <article class="extremo">
      <div>
        <img class="decoracion" src="images/decoracion.png" alt="">
        <h3 class="subtitulo2">Pelo</h3>
        <p class="descrip-foto border-rounded">
          El pelo corto y rubio es sin duda el ganador de esta temporada. Es uno
          de los cortes de pelo que más se veran y que ya puedes
          empezar a llevar.
        </p>
      </div>
      <figure>
        <img class="imagen" src="images/pelo-cortito.jpg" alt="">
      </figure>
    </article>
    <article class="centro">
      <div>
          <img class="decoracion" src="images/decoracion.png" alt="">
        <h3 class="subtitulo2">Ropa</h3>
        <p class="descrip-foto border-rounded">
          Las plumas como decoración en varias prendas es furor. Podes usarlas
          tambien de hombreras, remeras, en aros, zapatos y mucho más.
        </p>
      </div>
      <figure>
        <img class="imagen" src="images/plumas.jpg" alt="" />
      </figure>
    </article>
    <article class="extremo">
      <div>
        <img class="decoracion" src="images/decoracion.png" alt="">
        <h3 class="subtitulo2">Make-up</h3>
        <p class="descrip-foto border-rounded">
          Lejos del acabado matte que fue sensación algunos años atrás, la dewy
          skin propone un cutis con efecto satinado muy sutil. Se logra con
          hidratación intensa y toques de brillo controlados. En los ojos los
          colores tierra y marrones seran los más usados este 2020.
        </p>
      </div>
      <figure>
        <img class="imagen" src="images/make-up.jpg" alt="" />
      </figure>
    </article>
    <article>

    
        <img class="decoracion-tabla" src="images/decoracion.png" alt="">
        <h2 class="subtitulo2">Trends internacionales</h2>
        <button><a href="continentes">Ver continentes</a></button>
        <aside class="tabla" id="tabla">
         
          <table>
            <thead>
              <th>Continente</th>
              <th>Zona</th>
              <th>Moda</th>
              <th>Make-up</th>
              <th>Pelo</th>
              <th>Imagen</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </thead>
            <tbody id="tablaTrends">
                {foreach from=$trends item=trend}
                    <tr>    
                <td><a href="continente/{$trend->id_continente}"> {$trend->nombre}</a></td>
                <td class="trend" id="{$trend->id}"><a href="trends/{$trend->id}">{$trend->zona}</a></td>
                <td>{$trend->moda}</td>
                <td>{$trend->makeup}</td>
                <td>{$trend->pelo}</td>
                {if $trend->imagen}
                  <td><img src="uploads/{$trend->imagen}" style="max-width:200px;max-height:200px"></td>
                {else}
                  <td>No hay imagen cargada</td> 
                {/if}
                <td><button class="btnEditar" id="edit/{$trend->id}">Editar</button></td>
                <td><button class="btnEliminar"><a href="delete/{$trend->id}">Borrar</a></button></td>
                </tr>
                {/foreach}
            </tbody>
          </table>
        </aside>

        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
            {for $i=0 to $cantidadIteraciones-1}
                <li class="page-item"><a class="page-link" href="trends?page={$i}">{$i}</a></li>
            {/for}
          </ul>
        </nav>
        
        <form action="insert" method="POST" class="formTabla" id="formTabla" enctype="multipart/form-data">

          <label for="">Continente</label> <input type="text" name="id_continente" id="inputContinente" placeholder="Continente">

          <label for="">Zona</label> <input type="text" name="zona" id="inputZona" placeholder="Zona">

          <label for="">Moda</label> <input type="text" name="moda" id="inputModa" placeholder="Moda">

          <label for="">Make-up</label><input type="text" name="makeup" id="inputMakeUp" placeholder="Make up">

          <label for="">Pelo</label><input type="text" name="pelo" id="inputPelo" placeholder="Pelo">   

          {if $usuario->administrador == 1}
            <label for="">Imagen</label><input type="file" name="imagen" id="imagen" placeholder="imagen">
          {/if}

          <div class="botonesTabla">

            <button type="submit" id="">Agregar</button>

          </div> 
        </form>

      </article>
  </section>

  {include file="templates/footer.tpl"}