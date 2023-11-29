function entrar(){
    let usuario = document.getElementById("usuario").value
    let password = document.getElementById("password").value

    if(usuario === 'admin' && password === 'admin'){
        localStorage.setItem("usuario", usuario)
        localStorage.setItem("password", password)
        location.replace("index.html")
    } else{
        let e = document.getElementById("error")
        e.innerHTML = "Usuario o contraseña incorrecta. Pruebe de nuevo."
    }
}

function salir(){
    if(localStorage.getItem("usuario") && localStorage.getItem("password")){
        localStorage.removeItem("usuario")
        localStorage.removeItem("clave")
        location.replace('login.html')
    }
}

function ingresarGente(rol){
    let cedula = document.getElementById("cedula").value
    let nombre = document.getElementById("nombre").value
    let correo = document.getElementById("correo").value

    $.ajax({
        url: 'assets/php/ingresarGente.php',
        type: 'POST',
        data: {cedula, nombre, correo, rol},
        success: function(){
            mostrarClientes()
            mostrarMecanicos()
        }
    })
}

function mostrarClientes(){
    let rol = 'C'

    $.ajax({
        url: 'assets/php/buscarGente.php',
        type: 'POST',
        data: {rol},
        success: function(response){
            let cls = JSON.parse(response)
            let html = ""
            if(cls.length === 0){
                html = `
                    <tr></tr>
                `
                $("#clientesBody").html(html)
            } else{
                cls.forEach(cl => {
                    html+=`
                        <tr>
                            <td class="center">${cl.cedula}</td>
                            <td class="center">${cl.nombre}</td>
                            <td class="center">${cl.correo}</td>
                            <td class="center"><button type="button" class="btn-floating waves-effect waves-light red" onclick="borrarGente(${cl.cedula})"><i class="material-icons">cancel</i></button></td>
                        </tr>
                    `
                    $("#clientesBody").html(html)
                })
            }
        }
    })
}

function mostrarMecanicos(){
    let rol = 'M'

    $.ajax({
        url: 'assets/php/buscarGente.php',
        type: 'POST',
        data: {rol},
        success: function(response){
            let mcs = JSON.parse(response)
            let html = ""
            if(mcs.length === 0){
                html = `
                    <tr></tr>
                `
                $("#mecanicosBody").html(html)
            } else{
                mcs.forEach(mc => {
                    html+=`
                        <tr>
                            <td class="center">${mc.cedula}</td>
                            <td class="center">${mc.nombre}</td>
                            <td class="center">${mc.correo}</td>
                            <td class="center"><button type="button" class="btn-floating waves-effect waves-light red" onclick="borrarGente(${mc.cedula})"><i class="material-icons">cancel</i></button></td>
                        </tr>
                    `
                    $("#mecanicosBody").html(html)
                })
            }
        }
    })
}

$("#vehiculosForm").on('submit', function(e){
    e.preventDefault()
    $.ajax({
        url: 'assets/php/ingresarVehiculo.php',
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(response){
            if(response.length > 20){
                alert("Todos los campos deben ser llenados.")
            } else{
                mostrarVehiculos()
            }
        }
    })
})

function mostrarVehiculos(){
    $.ajax({
        url: 'assets/php/buscarVehiculos.php',
        type: 'GET',
        success: function(response){
            let vhs = JSON.parse(response)
            let html = ""
            if(vhs.length === 0){
                html = `
                    <tr></tr>
                `
                $("#vehiculosBody").html(html)
            } else{
                vhs.forEach(vh => {
                    html+=`
                        <tr id=${vh.matricula}>
                            <td class="text-center">${vh.matricula}</td>
                            <td class="text-center">${vh.descripcion}</td>
                            <td class="text-center">${vh.marca}</td>
                            <td class="text-center">${vh.modelo}</td>
                            <td class="text-center">${vh.tipo}</td>
                            <td class="text-center">${vh.year}</td>
                            <td class="text-center">${vh.clasificacion}</td>
                            <td class="text-center">${vh.cliente}</td>
                            <td class="text-center"><img src="${vh.imagen}" width=80px height=auto></td>
                        </tr>
                    `
                })
                $("#vehiculosBody").html(html)
            }
        }
    })
}

function ingresarRegistros(){
    let vehiculo = document.getElementById("vehiculo").value
    let mecanico = document.getElementById("mecanico").value
    let repuestos = document.getElementById("repuestos").value
    let estado = document.getElementById("estado").value

    $.ajax({
        url: 'assets/php/ingresarRegistros.php',
        type: 'POST',
        data: {vehiculo, mecanico, repuestos, estado},
        success: function(response){
            mostrarRegistros()
        }
    })
}

function mostrarRegistros(){
    $.ajax({
        url: 'assets/php/buscarRegistros.php',
        type: 'GET',
        success: function(response){
            let vhs = JSON.parse(response)
            let html = ""
            if(vhs.length === 0){
                html = `
                    <tr></tr>
                `
                $("#registrosBody").html(html)
            } else{
                vhs.forEach(vh => {
                    html+=`
                        <tr>
                            <td class="text-center">${vh.id}</td>
                            <td class="text-center">${vh.vehiculo}</td>
                            <td class="text-center">${vh.mecanico}</td>
                            <td class="text-center">${vh.repuestos}</td>
                            <td class="text-center">${vh.estado}</td>
                        </tr>
                    `
                })
                $("#registrosBody").html(html)
            }
        }
    })
}

function borrarGente(cedula){
    $.ajax({
        url: 'assets/php/borrarGente.php',
        type: 'POST',
        data: {cedula},
        success: function(){
            mostrarClientes()
            mostrarMecanicos()
            mostrarVehiculos()
        }
    })
}

function pdfGente(){
    $.ajax({
        url: 'assets/php/pdfGente.php',
        type: 'GET',
        success: function(){
            window.open('assets/php/pdfGente.php')
        }
    })
}

function pdfVehiculos(){
    $.ajax({
        url: 'assets/php/pdfVehiculos.php',
        type: 'GET',
        success: function(){
            window.open('assets/php/pdfVehiculos.php')
        }
    })
}

function pdfRegistros(){
    $.ajax({
        url: 'assets/php/pdfRegistros.php',
        type: 'GET',
        success: function(){
            window.open('assets/php/pdfRegistros.php')
        }
    })
}