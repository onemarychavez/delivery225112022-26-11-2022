const grid = document.getElementById('categorias')
let categoria = 0;




const MostrarMenu = (empresaKey)=>{

    window.location.assign(`/restaurante/menu?categoria=${categoria}&empresa=${empresaKey}`);
}





const listarRestaurante = async (categoria)=>{
    try {
        const request = await fetch(`/empresa/categoria/${categoria}`)
        if(request.ok){
            const data = await request.json()
            console.log(data)
            let html =''
            data.forEach(menu=>{
                html+=` <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12 pt-3">
                <div class="card shadow" style="width: 18rem;" onClick="MostrarMenu(${menu.key})"  >
                    <img src="${menu.logo}" width="286" height="190" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text h4">${menu.nombre.trim()}</p>
                    </div>
                </div>
            </div>`
            })
            grid.innerHTML = html
        }
    } catch (error) {
        console.log(error)
    }
}

document.addEventListener("DOMContentLoaded", (event)=> {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    categoria = urlParams.get('categoria')
    listarRestaurante(categoria)
});