<?php
class MailSend extends Eloquent {
	protected $table = 'mail_send';
    protected $fillable = array('title', 'note', 'to_email', 'to_name');

	static function send ($to_email, $title, $note, $to_name = null) {
		if (!$to_name)
			$to_name = 'Дорогой пользователь ';

		Mail::queue('emails.message', array('title' => $title, 'note'=>$note), function($message) use ($to_email, $title, $to_name){
			$message->to($to_email, $to_name)->subject($title);
		});

		$mail = new MailSend();
		$mail->title = $title;
		$mail->note = $note;
		$mail->to_email = $to_email;
		$mail->to_name = $to_name;

		if (!$mail->save())
			return false;

		return $mail;
	}

    static function sendToAdmin ($to, $title, $text, $from_name, $ar_file = null) {
        Mail::send('emails.message', array('title' => $title, 'note'=>$text), function($message) use ($to, $title, $from_name, $ar_file)
        {
            $message->to($to, 'Message from '.$from_name)->subject($title);
            if ($ar_file && count($ar_file) > 0){
                foreach ($ar_file as $file_name) {
                    $message->attach($file_name);
                }
            }
        });
    }

}
