document.addEventListener("DOMContentLoaded", function(){

    let categoria =
        document.getElementById("categoria");

    let marca =
        document.getElementById("marca");

    categoria.addEventListener("change", function(){

        marca.innerHTML = "";

        if(this.value === "pantalla"){

            marca.innerHTML = `
            <option value="LG">LG</option>
            <option value="Samsung">Samsung</option>
            <option value="ASUS">ASUS</option>
            <option value="AOC">AOC</option>
            `;
        }

        else if(this.value === "teclado"){

            marca.innerHTML = `
            <option value="Logitech">Logitech</option>
            <option value="Corsair">Corsair</option>
            <option value="Razer">Razer</option>
            `;
        }

        else if(this.value === "raton"){

            marca.innerHTML = `
            <option value="Logitech">Logitech</option>
            <option value="Razer">Razer</option>
            <option value="SteelSeries">SteelSeries</option>
            `;
        }

        else if(this.value === "portatil"){

            marca.innerHTML = `
            <option value="HP">HP</option>
            <option value="Lenovo">Lenovo</option>
            <option value="ASUS">ASUS</option>
            <option value="Acer">Acer</option>
            `;
        }

    });

    document.getElementById("formulari")
    .addEventListener("submit", function(event){

        let precio =
            parseFloat(document.getElementById("preu").value);

        let cantidad =
            parseInt(document.getElementById("quantitat").value);

        let error="";

        if(precio<=0){

            error="El precio debe ser mayor que 0";
        }

        else if(cantidad<0){

            error="La cantidad no puede ser negativa";
        }

        if(error!==""){

            event.preventDefault();

            document.getElementById("missatgeError")
            .textContent=error;
        }

    });

});