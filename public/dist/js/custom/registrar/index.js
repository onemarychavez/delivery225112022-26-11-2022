const btncreate = document.getElementById('btnCreate')
const nombres = document.getElementById('nombre')
const apellidos = document.getElementById('apellido')
const usuario = document.getElementById('usuario')
const clave = document.getElementById('clave')
const rol = document.getElementById('rol')
const dui = document.getElementById('dui')
const nit = document.getElementById('nit')
let idempresa= 0
toastr.options.closeMethod = 'fadeOut';
toastr.options.closeDuration = 4000;
toastr.options.closeEasing = 'swing';

const listarRoles = async ()=>{
    try {
        let url = `/rol/list`
        const request = await fetch(url)
        const data = await request.json()
        if(request.ok){
            
            let html =''
            data.forEach(element => {
                html+=`<option value="${element.key}">${element.nombre}</option>`
            });
            rol.innerHTML=html
        }else{
            toastr.error(data.message)
        }
    } catch (error) {
        console.log(error)
        toastr.error(error)
    }
}

const clean =()=>{
    nombres.value = null 
    apellidos.value = null
    usuario.value=null
    clave.value = null
    dui.value= null
    nit.value = null
    rol.selectedIndex= 0
    idempresa=0
}



const validateForm = ()=>{
    const campos = [
        'nombre',
        'apellido',
        'usuario',
        'clave',
        'dui',
        'nit'
    ]
    let ok = true
    campos.forEach(campo =>{
        console.log()
        let item = document.getElementById(campo)
        if(item.value.trim().length > 0){
            item.classList.remove("is-invalid")
        }else{
            item.classList.add("is-invalid")
            ok= false
        }
    })
    return ok
}


const create = async()=>{
    try {

        if(!validateForm()){
            toastr.error('Debes llenar los campos obligatorios')
            return
        }

        const request = await fetch('/registrar',{
            method:'POST',
            body:JSON.stringify({
                nombres:nombres.value.trim().toUpperCase(),
                apellidos:apellidos.value.trim().toUpperCase(),
                clave:clave.value.trim(),
                dui:dui.value.trim(),
                nit:nit.value.trim(),
                usuario:usuario.value.trim(),
                rol:rol.value
            })
        })

        if(request.ok){
            toastr.success('Usuario Creado')
            clean()
            
        }else{
            const msn = await request.json()
            toastr.error(msn.message)
        }
    } catch (error) {
        toastr.error(error)
    }
}






document.addEventListener("DOMContentLoaded", (event)=> {
    listarRoles()
    btncreate.onclick = e =>{
            e.preventDefault()
            create()
    }
});