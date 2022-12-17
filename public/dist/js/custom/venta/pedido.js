
const lienzo = document.getElementById('lienzo');
const modal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
const direccion = document.getElementById('direccion')
const telefono =document.getElementById('telefono');
const correo = document.getElementById('correo');
const forma = document.getElementById('forma');
const total = document.getElementById('ttotal');
const btnpro= document.getElementById('btnProcesarPedido')
const comentario = document.getElementById('comentario')

toastr.options.closeMethod = 'fadeOut';
toastr.options.closeDuration = 4000;
toastr.options.closeEasing = 'swing';

let procesarPedio=0;
const ProcesarPedido = (idpedido)=>{
    console.log(idpedido)
    procesarPedio=idpedido;
    console.log(procesarPedio);
    const p = dataGlobal.filter(pe=>pe.KeyPedido ==idpedido);
    direccion.value = p[0].Direccion;
    telefono.value=p[0].Telefono;
    correo.value=p[0].Correo;
    forma.value='EFECTIVO';
    total.innerText = `$${p[0].Total}`;
    modal.show();
}


const cerrarPedido = async ()=>{
    try {
        const data = {
            direccion:direccion.value.trim(),
            estado:1,
            comentario:comentario.value.trim()
        }

        const request = await fetch(`/pedido/${procesarPedio}`,{
            method:'PUT',
            body:JSON.stringify(data)
        })

        const response = await request.json();
        if(request.ok){
            console.log(response);
            window.location.href = '/home'
        }else{
            toastr.error(response.message);
        }
        
    } catch (error) {
        console.log(error)
        toastr.error(error)
    }
}


let dataGlobal = null;
const listarPedidos = async ()=>{
    try {
        const request = await fetch('/pedido/list');
        const data = await request.json();
        if(request.ok){
            console.log(data);
           dataGlobal =data;
            let html=''
            data.forEach(e => {
                let detalle = '';

                e.Detalle.forEach((d,i)=>{
                    detalle+=`<tr>
                    <th scope="row">${i+1}</th>
                    <td>${d.Nombre}</td>
                    <td class="text-center">${d.Cantidad}</td>
                    <td>$${d.Precio}</td>
                    <td class="text-center">$${Number(d.Total)}</td>
                  </tr>
                  `
                })
                detalle+=`<tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <th class="text-center">Total</th>
                    <th class="text-center">$${Number(e.Total)}</th>
                  </tr>`;

                html+=`<div class="row justify-content-center p-3">
                    <div class="col-xxl-6  col-xl-6  col-md-8 col-sm-12">
                        <div class="card shadow">
                            <div class="card-body">
                            <h5 class="card-title">PEDIDO #${e.KeyPedido}</h5>
                            <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Total</th>
                              </tr>
                            </thead>
                            <tbody>
                              ${detalle}
                            </tbody>
                          </table>
                            </div>
                            <div class="card-footer text-muted">
                           <button type="button" class="btn float-end btn-primary" onCLick="ProcesarPedido(${e.KeyPedido})" >Procesar</button>
                        </div>
                        </div>
                        
                    </div>
                </div>`
            });
            lienzo.innerHTML=html;
           
        }else{
            console.log(data);
        }
    } catch (error) {
        console.log(error)
        toastr.error(error)
    }
}


document.addEventListener("DOMContentLoaded", (event)=> {
    listarPedidos();

    btnpro.onclick = (e)=>{
        e.preventDefault();
        cerrarPedido();
    }
});