const lienzo = document.getElementById('categorias');
const modal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
const cantidad = document.getElementById('cantidad');
const itempedido = document.getElementById('pedido');
let menus = null;
toastr.options.closeMethod = 'fadeOut';
toastr.options.closeDuration = 4000;
toastr.options.closeEasing = 'swing';
const btnagregarPedido = document.getElementById('btnAgregarPedido');

const AgregarItem = async()=>{
    try {
        
        const cantid = parseInt(cantidad.innerText);
        const pedido =  {
            idpedido: pedidoglobal,
            idmenudetalle:selecCombo.combo,
            cantidad:cantid,
            total:Number((selecCombo.precio*cantid))
        };

        const request = await fetch('/pedido/detalle',{
            method:'POST',
            body:JSON.stringify(pedido)
        });

        const response = await request.json();
        if(request.ok){
            modal.hide();
            pedidoglobal = parseInt(response.message);
            selecCombo=null
            cantidad.innerText=1;
            document.getElementById('nombreProducto').innerText='';
        }else{
            toastr.error(response.message);
        }


    } catch (error) {
        console.error(error);
        toastr.error(error)
    }

}

const CrearPedido = async ()=>{
    try {
        
        const cantid = parseInt(cantidad.innerText);

        const pedido ={
            subtotal: Number((selecCombo.precio*cantid)),
            total: Number((selecCombo.precio*cantid)),
            descuento:0,
            idempresa:parseInt(selecCombo.empresa),
            detalle:[
                {
                    idmenudetalle:selecCombo.combo,
                    cantidad:cantid,
                    total:Number((selecCombo.precio*cantid))
                }
            ]
        }

        const request = await fetch('/pedido',{
            method:'POST',
            body:JSON.stringify(pedido)
        });

        const response = await request.json();
        if(request.ok){
            modal.hide();
            pedidoglobal = parseInt(response.message);
            selecCombo=null
            cantidad.innerText=1;
            document.getElementById('nombreProducto').innerText='';
        }else{
            toastr.error(response.message);
        }


    } catch (error) {
        console.error(error);
        toastr.error(error)
    }
}

let selecCombo=null;
let pedidoglobal = 0;

const extras =(combo,menu,precio,nombre,empresa)=>{
    console.log(combo)
    document.getElementById('nombreProducto').innerText=nombre;
    selecCombo ={
        combo:combo,
        menu:menu,
        precio:precio,
        empresa:empresa
    };
    console.log(selecCombo);
    cantidad.innerText=1;
    modal.show();
}

const cantidades =(numero)=>{
    
    let  total = Number(cantidad.innerText);
    total= total+Number(numero);
    cantidad.innerText = total < 0 ? 1 : parseInt(total);
    
    
}

const GetMenu = async(categoria,empresa)=>{
    try {
        const request = await fetch(`/menu/list/${empresa}/${categoria}`);
        if(request.ok){
            const data = await request.json();
            console.log(data);
            menus=data;
            let html =''
            data.forEach(element => {
                const empresa =element.keyempresa;
                let menu =`<div class="row mt-2">
                <h4 class="float-start">${element.nombre.trim()}</h4>
                <div class="row">`;
                element.menu.forEach(item=>{
                    menu+=`<div class="col-xxl-3 col-xl-3 col-md-4 col-sm-12 ">
                    <div class="card shadow">
                        <img src="${item.foto.trim()}" class="card-img-top " alt="...">
                        <div class="card-body">
                            <h5 class="card-title">${item.nombre.trim()}</h5>
                            <p class="card-text">${item.descripcion.trim()}</p>
                            <h4 class="text-bold">$${(item.precio)}</h4>
                            <button type="button" class="btn btn-primary float-end"  onClick="extras(${item.key},${item.keymenu},${Number(item.precio)},'${item.nombre.trim()}',${empresa})" >Agregar</button>
                        </div>
                        </div>
                    </div>`;
                });

                menu+=`</div></div>`;
                html+=menu;
            });
            lienzo.innerHTML = html;
        }
    } catch (error) {
        console.error(error);
    }
}




document.addEventListener("DOMContentLoaded", (event)=> {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const categoria = urlParams.get('categoria')
    const empresa = urlParams.get('empresa')
    GetMenu(categoria,empresa);

    btnagregarPedido.onclick = (e)=>{
        e.preventDefault();

        if(pedidoglobal>0){
            AgregarItem();
        }else{
            CrearPedido();
        }
    }
});