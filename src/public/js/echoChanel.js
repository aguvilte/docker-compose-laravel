 // Echo is available via window.Echo, in app.js file
Echo.channel('actividad-patente')
    .listen('ActividadPatente', (e) => {;
        insertRow(e.patente);
        deleteRow();
    });


function insertRow(e) {
    modelo= defineModelo(e.patente.modelo);
    datos=[e.patente.numero, modelo, e.precision,e.created_at ];

    let refTable= document.getElementById("bodyTableMovimiento");

    let newRow = refTable.insertRow(0);

    for (let index=0; index < datos.length; index++) {
        let newCell = newRow.insertCell(index);
        let newText = document.createTextNode(datos[index]);
        newCell.appendChild(newText);
    }
}


function defineModelo(tipoModelo) {
    let tipo;
    if (tipoModelo === "1") {
        tipo= 'Viejo';
    }if (tipoModelo === "2") {
        tipo= 'Nuevo';
    }if (tipoModelo != "1" && tipoModelo != "2" ) {
        tipo='NS'
    }
    return tipo;
}
function deleteRow() {
    var table = document.getElementById("bodyTableMovimiento");
    var rowCount = table.rows.length;

    table.deleteRow(rowCount -1);
}