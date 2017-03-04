var isPushEnabled = false;

window.addEventListener('load', function() {
  var pushButton = document.querySelector('.js-push-button');
  pushButton.addEventListener('click', function() {
    if (isPushEnabled) {
      unsubscribe();
    } else {
      subscribe();
    }
  });

  // Проверяем поддержку Service Worker API 
  // и регистрируем наш сервис-воркер
  if ('serviceWorker' in navigator) {  
    navigator.serviceWorker.register('/service-worker.js')
    .then(initialiseState);  
  }
});

function initialiseState() {
  // Проверяем создание уведомлений при помощи Service Worker API
  if (!('showNotification' in ServiceWorkerRegistration.prototype)) {
    console.warn('Уведомления не поддерживаются браузером.');
    return;
  }

  // Проверяем не запретил ли пользователь прием уведомлений
  if (Notification.permission === 'denied') {  
    console.warn('Пользователь запретил прием уведомлений.');  
    return;  
  }

  // Проверяем поддержку Push API
  if (!('PushManager' in window)) {  
    console.warn('Push-сообщения не поддерживаются браузером.');  
    return;
  }

  // Проверяем зарегистрирован ли наш сервис-воркер
  navigator.serviceWorker.ready.then(function(serviceWorkerRegistration) {  
    // Проверяем наличие подписки  
    serviceWorkerRegistration.pushManager.getSubscription()
      .then(function(subscription) {  
        // Делаем нашу кнопку активной
        var pushButton = document.querySelector('.js-push-button');
        pushButton.disabled = false;

        if (!subscription) {  
          // Если пользователь не подписан
          return;
        }

        // Отсылаем серверу данные о подписчике
        sendSubscriptionToServer(subscription);

        // Меняем состояние кнопки
        pushButton.textContent = 'Отписаться от уведомлений';  
        isPushEnabled = true;  
      })  
      .catch(function(err) {  
        console.warn('Ошибка при получении данных о подписчике.', err);
      });
  });  
};

function subscribe() {
  // Блокируем кнопку на время запроса 
  // разрешения отправки уведомлений
  var pushButton = document.querySelector('.js-push-button');
  pushButton.disabled = true;

  navigator.serviceWorker.ready.then(function(serviceWorkerRegistration) {  
    serviceWorkerRegistration.pushManager.subscribe({userVisibleOnly: true})  
      .then(function(subscription) {  
        // Подписка осуществлена
        isPushEnabled = true;  
        pushButton.textContent = 'Отписаться от уведомлений';
        pushButton.disabled = false;

        // В этой функции необходимо регистрировать подписчиков
        // на стороне сервера, используя subscription.endpoint
        return sendSubscriptionToServer(subscription);  
      })  
      .catch(function(err) {  
        if (Notification.permission === 'denied') {  
          // Если пользователь запретил присылать уведомления,
          // то изменить это он может лишь вручную 
          // в настройках браузера для сайта
          console.warn('Пользователь запретил присылать уведомления');  
          pushButton.disabled = true;  
        } else {  
          // Отлавливаем другие возможные проблемы -
          // потеря связи, отсутствие gcm_sender_id и прочее
          console.error('Невожможно подписаться, ошибка: ', err);  
          pushButton.disabled = false;  
          pushButton.textContent = 'Получать уведомления';  
        }  
      });  
  });  
};

function sendSubscriptionToServer(subscription) {
  fetch('/API/', {
      method: 'post',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },
      body: 'type=add&url=' + subscription.endpoint
    })
    .then(function(response) {
      if (response.status !== 200) {
        // TODO: Оповещаем пользователя, что что-то пошло не так
        console.error('Хьюстон, у нас проблемы с регистрацией подписчиков: ' + response.status);
        return;
      }

      response.json().then(function(data) {
        // TODO: Оповещаем пользователя об успешной подписке
        console.log(data); 
      });
    })
    .catch(function(err) {
      // TODO: Оповещаем пользователя, что что-то пошло не так
      console.error('Хьюстон, у нас проблемы с регистрацией подписчиков: ', err);
    });
};

function unsubscribe() {
  var pushButton = document.querySelector('.js-push-button');
  pushButton.disabled = true;

  navigator.serviceWorker.ready.then(function(serviceWorkerRegistration) {
    //  Для отмены подписки нужен объект subscription
    //  и его метод unsubscribe()
    serviceWorkerRegistration.pushManager.getSubscription().then(
      function(subscription) {
        // Проверяем есть ли подписка
        if (!subscription) {
          // Если нет, даем пользователю возможность
          // подписаться на уведомления
          isPushEnabled = false;
          pushButton.disabled = false;
          pushButton.textContent = 'Получать уведомления';
          return;  
        }  

        var endpoint = subscription.endpoint;
        // TODO: Отправить серверу данные о подписчике,
        // чтобы убрать его из списка рассылки

        subscription.unsubscribe().then(function(successful) { 
          pushButton.disabled = false;
          pushButton.textContent = 'Получать уведомления';
          isPushEnabled = false;
        }).catch(function(err) {
          // TODO: Если при отмене подписки возникла ошибка,
          // стоит как-то оповестить пользователя или админа

          console.log('Хьюстон, у нас проблемы с отменой подписки: ', err);
          pushButton.disabled = false;
          pushButton.textContent = 'Получать уведомления';
        });
      }).catch(function(err) { 
        console.error('Хьюстон, у нас проблемы с получением данных о подписчике: ', err);
      });
  });  
};