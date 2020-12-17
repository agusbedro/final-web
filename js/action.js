

    document.querySelectorAll(".btnEditar").forEach(element => element.addEventListener("click", function () {
        let idBoton = element.id;
        cambiarActionTrend(idBoton);
    }));  
    
    function cambiarActionTrend(loquellega){
        document.getElementById("formTabla").action = loquellega;
    }

    document.querySelectorAll(".btnEditarCont").forEach(element => element.addEventListener("click", function () {
        let idBoton = element.id;
        cambiarActionCont(idBoton);
        console.log(idBoton);
        
    }));  

    function cambiarActionCont(loquellega){
        document.getElementById("formTablaCont").action = loquellega;
    }

    

