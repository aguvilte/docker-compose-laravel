const createDivHead = (nodo) => {
 //creamos el primer div
   const nodoDiv = document.createElement('div');
   nodoDiv.setAttribute('class', 'mr-3');
   //creamos el div icon
   const nodoDivIcon = document.createElement('div');
   nodoDivIcon.setAttribute('class', 'icon-circle bg-warning');
   //creamos el icono
   const nodoIcono = document.createElement('i');
   nodoIcono.setAttribute('class', 'fas fa-exclamation-triangle text-white');
   //agregamos el icono al divIcon
   nodoDivIcon.appendChild(nodoIcono);
   //agregamos el nodo divicon al nodo div
   nodoDiv.appendChild(nodoDivIcon);
   //agreamos al nodoA el primer div 
   nodo.appendChild(nodoDiv);
}
const createDivBody = (nodo, notification) => {
   const firstDiv = document.createElement('div');
   const divSmall = document.createElement('div');
   divSmall.setAttribute('class', 'small text-gray-500');
   divSmall.innerText = notification.fecha;
   const span = document.createElement("span");
   span.setAttribute('class', 'font-weight-bold');
   span.innerText = 'La patatente ' + notification.numero_patente+ ' fue detectada por nuestras cámaras.';
   firstDiv.append(divSmall);
   firstDiv.append(span);
   nodo.append(firstDiv);
}
const createNodoA = (notification) => {
   //creamos el elemento que vamos a sumar 
   const nodo = document.createElement('a');
   nodo.href='/notificaciones/show/'+notification.id;
   nodo.setAttribute('class', 'dropdown-item d-flex align-items-center bg-gray-200');
   createDivHead(nodo);
   createDivBody(nodo, notification);
   // obtenemos el id del nodo
   const nodoNotificacion = document.getElementById("notificaciones");
   const nodoBefore = document.getElementById("notificacionA");
   //lo agreamos a la seccion de notificacion
   nodoNotificacion.insertBefore(nodo, nodoNotificacion.firstElementChild.nextSibling);
}
const addNumberIcon= () => {
   let elementos = parseInt(cantidad);
   if (elementos > 0 ) {
     elementos +=1 ; 
     cantidad = elementos;
     const spanIcon = document.getElementById("spanIcon");
     spanIcon.innerText= cantidad;
   }else {
      //definimos cantidad xq sino al volver a tomar sin actualizar no toma el nuevo valor
      cantidad = elementos + 1;
      //en caso que la cantidad de notificaciones sea igual a 0 
      const spanNew = document.createElement("span");
      spanNew.setAttribute('class', 'badge badge-danger badge-counter');
      spanNew.setAttribute('id', 'spanIcon');
      spanNew.innerText = cantidad;
      //traemos el elemento que contiene el icono de campana
      const iconBell = document.getElementById("alertsDropdown");
      // lo metos al nodo
      iconBell.insertBefore(spanNew, iconBell.firstElementChild.nextSibling);
   }
}
const addNotificationList = (notification) => {
   createNodoA(notification);
   addNumberIcon();
}

Echo.private(`App.User.${user}`)
   .notification((notification) => {
      addNotificationList(notification);
   });