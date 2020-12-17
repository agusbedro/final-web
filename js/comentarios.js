//document.addEventListener("DOMContentLoaded", function(){
    let mainURL = 'http://localhost/tpe/api/comentarios';
    let subURL = 'http://localhost/tpe/api/comentario/';
    let postURL = 'http://localhost/tpe/api/tendencia/';

    function mostrarComentariosDeTrend(id){
        fetch (mainURL,  {
            "method" : "GET",
            "mode" : "cors",
        }).then(function(r){
                if(!r.ok){
                console.log(r)
                }
                return r.json();
            })
            .then(function(json) {
                
                actualizarTabla(json, id);
            })
            .catch(function(e){
                console.log(e)
            })
    }

    function actualizarTabla(json, id){
        let tabla = document.querySelector("#tablaComentarios");
        let filas = document.querySelector("#columnas").rows[0].cells.length;
        tabla.innerHTML = " ";
        for (let index = 0; index<json.length; index++){
            let thingActual = json[index];
            let idJson = json[index].id;
            if(id == json[index].id_tendencia){
                if(filas == 3){
                    tabla.innerHTML +=                     
                    `<tr>
                    <td>${thingActual.comentario}</td>
                    <td>${thingActual.puntuacion}</td>
                    <td><button class="btn-delete" id="${idJson}">Eliminar</button></td>
                    </tr>`
                }
                else if(filas == 2){
                    tabla.innerHTML +=                     
                    `<tr>
                    <td>${thingActual.comentario}</td>
                    <td>${thingActual.puntuacion}</td>
                    </tr>`
                }
            }
        }
        inicializarBoton();
        setTimeout(idComentarios, 1);
    }

    
    function insertarComentario(data){
        fetch(postURL + data.id_tendencia + "/comentarios", {
            "method": "POST",
            "mode": "cors",
            "headers": { "Content-Type": "application/json" },
            "body": JSON.stringify(data)
        }).then(function (r) {
            return r.json();
        }).then(function (r) {
            console.log(r);
            actualizarTablaHTML();
        });
    }

    function deleteComentario(id){
        fetch(subURL + id, {
            "method": "DELETE",
            "mode": "cors",
        }).then(function(r) {
            if (!r.ok) {
                console.log(e);
            };
            return r.json();
        }).then(function () {
            llamadoPrincipal();
        });
    };

    function llamadoPrincipal(){
        let tabla = document.querySelector("#tablaTrends");
        let celda_id = tabla.rows.item(0).cells[1].id;
        
        mostrarComentariosDeTrend(celda_id);
    }

    function inicializarBoton(){
        document.querySelectorAll(".btn-delete").forEach(element => element.addEventListener("click", function(){ 
            deleteComentario(element.id);
        }));  
    }
    llamadoPrincipal();

    

    function validarInsert(){
        let comentario = document.querySelector("#comentario").value;
        let puntuacion = document.querySelector("#puntuacion").value;
        let tabla = document.querySelector("#tablaTrends");
        let id_tendencia =  tabla.rows.item(0).cells[1].id;
        if(comentario != "" && puntuacion != "" && (puntuacion <= 5) && (puntuacion >= 1)){
            return (comentario && puntuacion && id_tendencia);
        }
        else{
            return false;
        }
    }


    function idComentarios(){
        let tabla = document.querySelector("#tablaTrends");
        let celda_id = tabla.rows.item(0).cells[1].id;
        document.querySelector("#formComentarios").action = "tendencia/" + celda_id + "/comentarios";
    }

    
    
    
    


