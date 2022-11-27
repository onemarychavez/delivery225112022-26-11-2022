const grid = document.getElementById('categorias')
const imagen =(id)=>{
    let img = ''
    switch(id){
        case 1:
            img="/images/categoria/carne.jpeg"
            break;
        case 2:
            img="/images/categoria/alohol.jpg"
            break;    
        case 3:
            img="/images/categoria/ensalada.jpg"
            break;
        case 4:
            img="/images/categoria/dona.jpg"
            break;
        case 5:
            img="/images/categoria/pizza.jpeg"
            break;
        case 6:
            img="/images/categoria/hamburguesa.jpg"
            break;
        case 7:
            img="/images/categoria/bebida.jpg"
            break;
        case 8:
            img="/images/categoria/pescado.jpg"
            break;
        default:
            img=''
            break;            
    }
    return img
}

const restaurante = (categoria)=>{
    window.location.assign(`/restaurante?categoria=${categoria}`);
}


const listarCategoria = async ()=>{
    try {
        const request = await fetch('/categoria')
        if(request.ok){
            const data = await request.json()
            let html =''
            data.forEach(menu=>{
                html+=` <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12 pt-3">
                <div class="card shadow" style="width: 18rem;" onClick="restaurante(${menu.key})" >
                    <img src="${imagen(menu.key)}" width="286" height="190" class="card-img-top" alt="...">
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
   listarCategoria()
});