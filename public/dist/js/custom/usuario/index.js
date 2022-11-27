const table = document.getElementById('tabla')
const modal = $('#modal')
const nombres = document.getElementById('nombre')
const apellidos = document.getElementById('apellido')
const usuario = document.getElementById('usuario')
const clave = document.getElementById('clave')
const rol = document.getElementById('rol')
const dui = document.getElementById('dui')
const nit = document.getElementById('nit')
const btncreate = document.getElementById('btnCreate')
const btnupdate = document.getElementById('btnUpdate')
const btnNew = document.getElementById('btnNew')
let idusuario= 0
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
    idusuario=0
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

        const request = await fetch('/usuario',{
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
            listarUsuarios()
            modal.modal('hide')
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

const update = async ()=>{
    try {
        if(!validateForm()){
            toastr.error('Debes llenar los campos obligatorios')
            return
        }
        const url = `/usuario/${idusuario}`
        const request = await fetch(url,{
            method:'PUT',
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
        const data = await request.json()
        if(request.ok){
            listarUsuarios()
            modal.modal('hide')
            toastr.success('Usuario Modificado')
            clean()
           
        }else{
         toastr.error(data.message)
        }
    } catch (error) {
        console.error(error)
        toastr.error(error)
    }
}



const detalleUsuario = async (keyusuario)=>{
    try {
        let url = `/usuario/${keyusuario}`
        const request = await fetch(url)
        const  data = await request.json()
        if(request.ok){
            
            idusuario= keyusuario
            nombres.value = data.nombres 
            apellidos.value = data.apellidos 
            usuario.value=data.usuario
            clave.value = data.password
            nit.value = data.nit 
            dui.value = data.dui
            rol.value = data.rol 
            btncreate.style.display='none'
            btnupdate.style.display=''
            modal.modal('show')
        }else{
           toastr.error(data.message)
        }
    } catch (error) {
        console.log(error)
        toastr.error(error)
    }
}

const eliminar = async (idusuario) => {
    try {
        let url = `/usuario/${idusuario}`
        const request = await fetch(url,{
            method:'DELETE'
        })
        if(request.ok){
            listarUsuarios()
        }else{
            console.log('erroro al ELIMINAR usuario')
        }
    } catch (error) {
        console.log(error)
    }
}





const listarUsuarios =  async ()=>{
    try {
        
        const request = await fetch('/usuario/list')

        if(request.ok){
            let datos = await request.json()
            let html =''
            datos.forEach((e,i)=> {
                html+=`<tr>
                <td>${i+1}</td>
                <td>${e.nombres+' '+e.apellidos}</td>
                <td>${e.usuario}</td>
                <td><div class="btn-group"><button type="button" class="btn btn-warning"
                onClick="detalleUsuario(${e.key})"
                >editar</button><button type="button" class="btn btn-danger ml-2"
                onClick="eliminar(${e.key})"
                >eliminar</button></div></td>
                </tr>`
            });

            table.innerHTML = html

        }else{
            console.log('erroro al obtener')
        }


    } catch (error) {
        console.error(error)
    }
}










document.addEventListener("DOMContentLoaded", (event)=> {
    listarRoles()
   listarUsuarios()
   btnNew.onclick =(e)=>{
        e.preventDefault()
        btnupdate.style.display='none'
        btncreate.style.display=''
        clean()
        modal.modal('show')
   }
   btncreate.onclick = e =>{
        e.preventDefault()
        create()
   }
});