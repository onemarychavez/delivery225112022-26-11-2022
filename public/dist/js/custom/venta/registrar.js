const nombre = document.getElementById("nombres");
const apellido = document.getElementById('apellidos');
const usuario = document.getElementById('usuario');
const clave = document.getElementById('clave');
const telefono = document.getElementById('telefono');
const correo = document.getElementById('correo');
const direccion = document.getElementById("direccion");

const btnGuardar = document.getElementById('btnguardar');


toastr.options.closeMethod = 'fadeOut';
toastr.options.closeDuration = 4000;
toastr.options.closeEasing = 'swing';

const validarFormulario = ()=>{
    const campos = [nombre,apellido,usuario,clave,telefono,correo];
    let esValido = true;
    campos.forEach(e=>{
        const value = e.value.trim().length;
        if(value <=0){
            e.classList.add('is-invalid');
        }else{
            e.classList.remove('is-invalid');
        }
    })
    return esValido;
}//valida el formulario de registro

const  registrarUsuario = async ()=>{
    try {
        if(!validarFormulario()){
            return toastr.error("Debes Completar los campos obligatorios");
        }
        const request = await fetch('/registrar',{
            method:'POST',
            body:JSON.stringify({
                nombres:nombre.value.trim().toUpperCase(),
                apellidos:apellido.value.trim().toUpperCase(),
                telefono:telefono.value.trim(),
                correo:correo.value.trim(),
                usuario:usuario.value.trim(),
                clave:clave.value.trim(),
                direccion:direccion.value.trim()
            })
        })

        const response = await request.json();
        if(request.ok){
            window.location.href = '/';
            
            
        }else{
            toastr.error(response.message);
        }
        
    } catch (error) {
        console.log(error);
        toastr.error(error);
    }
}

document.addEventListener("DOMContentLoaded", (event)=> {
    btnGuardar.onclick = (e)=>{
        e.preventDefault();
        registrarUsuario();
    }
});