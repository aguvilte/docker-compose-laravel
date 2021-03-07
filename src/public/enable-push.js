initSW ();

function initSW() {

  if (!"serviceWorker" in navigator) {
    //service worker isn't supported
    return;
  }
  //don't use it here if you use service worker
  //for other stuff.
  if (!"PushManager" in window) {
    //push isn't supported
    return;
  }
  //register the service worker
  window.addEventListener('load', function () {
    navigator.serviceWorker.register('sw.js', {
      scope: '../'
    })
    .then(() => {
      initPush();
    })
    .catch((err) => {
      console.log(err)
    });    
  })

}


function initPush() {
  if (!navigator.serviceWorker.ready) {
      return;
  }

  new Promise(function (resolve, reject) {
    const permissionResult = Notification.requestPermission(function (result) {
      resolve(result);
    });
    if (permissionResult) {
      permissionResult.then(resolve, reject);
    }
  })
  .then((permissionResult) => {
    if (permissionResult !== 'granted') {
      throw new Error('We weren\'t granted permission.');
    }
    subscribeUser();
  });
}


function subscribeUser() {
  navigator.serviceWorker.ready
    .then((registration) => {
      const subscribeOptions = {
          userVisibleOnly: true,
          applicationServerKey: urlBase64ToUint8Array(
            'BPSqX7BdQ41Lg67enDD0lgGqTTveMhov4U_80VGmpfJoJQFRpNtNc3-BneQC26E-HEUg7Ew6whHBxyL3tDpYBZo'
          )
      };
        return registration.pushManager.subscribe(subscribeOptions);
    })
    .then((pushSubscription) => {
      //almacenamos la subscripcion
      storePushSubscription(pushSubscription);
    });
}


function urlBase64ToUint8Array(base64String) {
  let padding = '='.repeat((4 - base64String.length % 4) % 4);
  let base64 = (base64String + padding)
    .replace(/\-/g, '+')
    .replace(/_/g, '/');

  let rawData = window.atob(base64);
  let outputArray = new Uint8Array(rawData.length);

  for (let i = 0; i < rawData.length; ++i) {
      outputArray[i] = rawData.charCodeAt(i);
  }
  return outputArray;
}


function storePushSubscription(pushSubscription) {
  const token = document.querySelector('meta[name=csrf-token]').getAttribute('content');

  fetch('/push', {
    method: 'POST',
    body: JSON.stringify(pushSubscription),
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'application/json',
      'X-CSRF-Token': token
    }
  })
  .then((res) => {
    return res.json();
  })
  .catch((err) => {
    console.log(err)
  });
}
