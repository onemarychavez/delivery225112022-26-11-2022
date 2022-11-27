const lienzo = document.getElementById('categorias');
const modal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
const cantidad = document.getElementById('cantidad');
let menus = null;


const extras =(combo,menu)=>{
    console.log(combo)
    const menuSeleccionado = menus.filter(m=>m.key===menu);
    const filtromenu = menuSeleccionado.map(me=>{
        return me.menu;
    });

    const comboseleccionado = filtromenu.filter(c=>c.key===combo);
    let existenExtras=false;
    if(comboseleccionado.length >0){
        document.getElementById('staticBackdropLabel').innerText=comboseleccionado[0].nombre.trim();
        const item = comboseleccionado[0].extras;
        if(item.length>0){
            existenExtras=true;
        }
        if(!existenExtras){
            //logica de extras
        }

        
    }
    modal.show();
}

const cantidades =(numero)=>{
    
    let  total = Number(cantidad.innerText);
  
    
    total= total+Number(numero);
    cantidad.innerText = total < 0 ? 0 : parseInt(total);
    
    
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
                            <h4 class="text-bold">$${Number(item.precio)}</h4>
                            <button type="button" class="btn btn-primary float-end"  onClick="extras(${item.key},${item.keymenu})" >Agregar</button>
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
});