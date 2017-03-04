<?php
class PushController extends BaseController {
    function getIndex(){
        // Это пример обработки приходящих данных,
        // нельзя его использовать "как есть" на рабочем сервере,
        // он небезопасен и не проверяет данные от пользователя
        // и не обрабатывает ошибки
        // НЕ НАДО ТАК ;)

        $type = $_POST['type'];
        $endpoint = $_POST['url'];
        $endpoint_parsed = parse_url($endpoint);
        $subscriber_id = end(explode('/', $endpoint_parsed['path']));

        switch($type) {
            // Добавляем нового подписчика
            case 'add':
                $find_browser = false;
                $urls = [
                    'chrome' => 'https://android.googleapis.com/gcm/send/',
                    'firefox' => 'https://updates.push.services.mozilla.com/push/'
                ];
                foreach ($urls as $browser => $url) {
                    if(strpos($endpoint, $url) !== false) {
                        $find_browser = $browser;
                        break;
                    }
                }
            if($find_browser) {
                $subscribers = json_decode(file_get_contents('subscribers.json'), true);
                if(!in_array($subscriber_id, $subscribers[$find_browser])) {
                    $subscribers[$find_browser][] = $subscriber_id;
                    $json = json_encode($subscribers);
                    if($fh = fopen('subscribers.json', 'w+')) {
                        fwrite($fh, $json);
                        fclose($fh);
                        echo '{"response": "OK", "id": "'.$subscriber_id.'"}';
                    }
                }
            }
            break;

            // Сообщение для подписчика
            case 'push':
            $data['notification'] = [
                "title" => "У вас новое сообщение!",
                "message" => "19:00 от Push-Test\nНу и как работают эти уведомления?",
                "tag" => "some-tag",
                "icon" => "/icon-192x192.png",
                "data" => "/?utm_source=push-api"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);

            break;
        }
    }
    
}
