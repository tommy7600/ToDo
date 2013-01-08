# Sender

Sender to helper implementujący bibliotekę [Swiftmailer](http://github.com/swiftmailer/swiftmailer) służącą do wysyłania wiadomości email. Sender korzysta z wysyłania wiadomości email za pomocą smtp.

#### Konfiguracja

W pliku `config/sender.php` należy podać:

Parametr         | Opis
---------------- | ------------ | --------- | -------- | -----------
hostname             | nazwę serwer poczty smtp
username         | użytkownik/konto z którego będzie wysyłana poczta - najczęściej jest to pełen adres email
password             | hasło do konta w/w użytkownika
port   | port serwera smtp poczty
encryption | Dla ssl upwenij się, że odblokowałeś extension=php_openssl.dll w php.ini

#### Przykład użycia

Podstawowy przykład wykorzystania Sendera:

		$mailer = Kohana_Sender::connect();
                $message = Swift_Message::newInstance()
                    ->setSubject('Temat')
                    ->setFrom(array('nadawca@serwer.pl' => 'Nadawca'))
                    ->setTo(array('odbiorca@gmail.com'))
                    ->setBody('Treść wiadomości', 'text/html');
                $mailer->send($message);

Wszystkie opcje i możliwości opisane są na stronie [http://swiftmailer.org/docs/introduction.html](http://swiftmailer.org/docs/introduction.html).
