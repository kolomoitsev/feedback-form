<?php echo 'Форма обратной связи<br/>';?><br/>
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
<form action="forma-controller.php" method="POST">
Введите ваше имя: <input type="text" name="user_name" required /><br/><br/>
Введите вашу почту: <input type="text" name="email" required /><br/><br/>
Введите Homepage: <input type="text" name="url"  /><br/><br/>
Введите ваше сообщение: <textarea name = "user_message"></textarea><br/><br/>
Введите символы, указанные на картинке:  
<img src = "captcha.php" /><br/>
<input type="text" name="captcha" /><br/><br/>
<input type="submit" value = "Отправить данные">
</form>

