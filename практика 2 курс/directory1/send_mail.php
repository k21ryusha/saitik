<?php
require '/Applications/MAMP/htdocs/PHPMailer-master/src/Exception.php';
require '/Applications/MAMP/htdocs/PHPMailer-master/src/PHPMailer.php';
require '/Applications/MAMP/htdocs/PHPMailer-master/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $service = htmlspecialchars($_POST['service']);
    $message = htmlspecialchars($_POST['message']);


    $mail = new PHPMailer(true);

    try {
        // Настройки сервера
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // SMTP сервер Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'androp1406@@gmail.com'; // Ваш Gmail адрес
        $mail->Password = 'sfxk ewqk fuiy gjaq'; // Ваш пароль или приложение Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Шифрование TLS
        $mail->Port = 587;

        // Настройки отправителя и получателя
        $mail->setFrom('androp1406@gmail.com', 'Имя отправителя');
        $mail->addAddress('andropov2005@inbox.ru'); // Email получателя

        // Содержание письма
        $mail->isHTML(true); // Формат письма: HTML
        $mail->Subject = 'Новое сообщение с сайта';
        $mail->Body = "<p><strong>Имя:</strong> $name</p>
                       <p><strong>Email:</strong> $email</p>
                       <p><strong>Сообщение:</strong></p>
                       <p>$message</p>";

        // Отправляем письмо
        $mail->send();
        echo "Сообщение успешно отправлено! Вернитесь на <a href='son.html'>главную страницу</a>.";
    } catch (Exception $e) {
        echo "Ошибка при отправке сообщения: {$mail->ErrorInfo}";
    }
} else {
    echo "Неверный метод запроса.";
}
?>