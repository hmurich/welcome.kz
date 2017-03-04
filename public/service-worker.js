self.addEventListener('push', function(event) {
  // Так как пока невозможно передавать данные от push-сервера,
  // то информацию для уведомлений получаем с нашего сервера
  event.waitUntil(
    self.registration.pushManager.getSubscription().then(function(subscription) {
      fetch('/push/', {
        // В данном случае отправляются данные о подписчике,
        // что позволит проверить или персонифицировать уведомление
        method: 'post',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        },
        body: 'type=push&url=' + subscription.endpoint
      })
      .then(function(response) {
        if (response.status !== 200) {
          // TODO: Если сервер отдал неверные данные,
          // нужно уведомить об этом пользователя или администратора
          console.log('Хьюстон, у нас проблемы с получением уведомлений: ' + response.status);
          throw new Error();
        }

        // Получаем ответ от сервера и проверяем его
        return response.json().then(function(data) {
          if (data.error || !data.notification) {
            console.error('Сервер вернул ошибку: ', data.error);
            throw new Error();
          }

          var title = data.notification.title;
          var message = data.notification.message;
          var icon = data.notification.icon;
          var notificationTag = data.notification.tag;
          var custom_data = data.notification.data;

          return self.registration.showNotification(title, {
            body: message,
            icon: icon,
            tag: notificationTag,
            data: custom_data
          });
        });
      })
      .catch(function(err) {
        // В случае ошибки отображаем уведомление
        // со статичными данными
        console.error('Невозможно получить данные с сервера: ', err);

        var title = 'Ошибочка вышла';
        var message = 'Мы хотели сообщить вам что-то важное, но у нас всё сломалось.';
        var icon = '/icon-192x192.png';
        var notificationTag = 'notification-error';
        return self.registration.showNotification(title, {
            body: message,
            icon: icon,
            tag: notificationTag
          });
      });
    })
  );
});

self.addEventListener('notificationclick', function(event) {
  console.log('Пользователь кликнул по уведомлению: ', event.notification.tag);
  // Закрываем уведомление
  event.notification.close();

  // Смотрим, открыта ли вкладка с данной ссылкой
  // и фокусируемся или открываем ссылку в новой вкладке
  event.waitUntil(
    clients.matchAll({
      type: 'window'
    })
    .then(function(clientList) {
      var url = event.notification.data;
      for (var i = 0; i < clientList.length; i++) {
        var client = clientList[i];
        if (client.url == url && 'focus' in client)
          return client.focus();
      }
      if (clients.openWindow) {
        return clients.openWindow(url);
      }
    })
  );
});
