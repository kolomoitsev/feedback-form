<?php
	header('Location: /requests.php');
	session_start();
	date_default_timezone_set("Europe/Moscow");
	//header('Content-type: text/html; charset=utf-8');
	class validate_input_info
	{
		public function validate_user_name(){
			$user_name = '';
			if(isset($_POST['user_name'])){
				if(strlen($_POST['user_name']) > 0){
					$user_name = $_POST['user_name'];
				}
				else {
					$user_name = false;
				}
			}
			else {
				$user_name = false;
			}
		return $user_name;
		}

		public function validate_user_email(){
			$email = '';
			$validate_email = '';
			if(isset($_POST['email'])){
				$validate_email = $_POST['email'];
				if(filter_var($validate_email, FILTER_VALIDATE_EMAIL)){
					$email = $validate_email;
				}
				else $email = false;
			}
			else {
				$email = false;
			}
		return $email;
		}

		public function validate_url(){
			$url = '';
			//$validate_url = '';
			if(isset($_POST['url'])){
				//$validate_url = $_POST['url'];
				if(filter_var($_POST['url'], FILTER_VALIDATE_URL)){
					$url = $_POST['url'];
				}
				else $url = false;
			}
			else {
				$url = false;
			}
		return $url;
		}

		public function validate_user_message(){
			$user_message = '';
			if(isset($_POST['user_message'])){
				//$user_message = $_POST['user_message'];
				if(strlen($_POST['user_message']) > 0 && strlen($_POST['user_message']) < 250){
					$user_message = trim($_POST['user_message']);
				}
				else {
					$user_message = false;
				}
			}
			else {
				$user_message = false;
			}
		return $user_message;
		}

		public function catch_captcha(){
			$captcha = '';
			if(isset($_POST['captcha'])){
				$captcha = $_POST['captcha'];
			}
			else{
				$captcha = false;
			}
		return $captcha;
		}
	}
	class transliteration{
	public function replace($user_name, $gost=false){
		$replace = array(
 			"А"=>"A","а"=>"a",
  			"Б"=>"B","б"=>"b",
  			"В"=>"V","в"=>"v",
  			"Г"=>"G","г"=>"g",
  			"Д"=>"D","д"=>"d",
 			"Е"=>"E","е"=>"e",
 			"Ё"=>"E","ё"=>"e",
  			"Ж"=>"Zh","ж"=>"zh",
 			"З"=>"Z","з"=>"z",
  			"И"=>"I","и"=>"i",
  			"Й"=>"I","й"=>"i",
  			"К"=>"K","к"=>"k",
  			"Л"=>"L","л"=>"l",
  			"М"=>"M","м"=>"m",
  			"Н"=>"N","н"=>"n",
  			"О"=>"O","о"=>"o",
  			"П"=>"P","п"=>"p",
  			"Р"=>"R","р"=>"r",
  			"С"=>"S","с"=>"s",
  			"Т"=>"T","т"=>"t",
  			"У"=>"U","у"=>"u",
  			"Ф"=>"F","ф"=>"f",
  			"Х"=>"Kh","х"=>"kh",
  			"Ц"=>"Tc","ц"=>"tc",
  			"Ч"=>"Ch","ч"=>"ch",
  			"Ш"=>"Sh","ш"=>"sh",
  			"Щ"=>"Shch","щ"=>"shch",
  			"Ы"=>"Y","ы"=>"y",
  			"Э"=>"E","э"=>"e",
  			"Ю"=>"Iu","ю"=>"iu",
  			"Я"=>"Ia","я"=>"ia",
  			"ъ"=>"","ь"=>""
  		);

	if($gost)
		{
    		$replace = array("А"=>"A","а"=>"a","Б"=>"B","б"=>"b","В"=>"V","в"=>"v","Г"=>"G","г"=>"g","Д"=>"D","д"=>"d",
                "Е"=>"E","е"=>"e","Ё"=>"E","ё"=>"e","Ж"=>"Zh","ж"=>"zh","З"=>"Z","з"=>"z","И"=>"I","и"=>"i",
                "Й"=>"I","й"=>"i","К"=>"K","к"=>"k","Л"=>"L","л"=>"l","М"=>"M","м"=>"m","Н"=>"N","н"=>"n","О"=>"O","о"=>"o",
                "П"=>"P","п"=>"p","Р"=>"R","р"=>"r","С"=>"S","с"=>"s","Т"=>"T","т"=>"t","У"=>"U","у"=>"u","Ф"=>"F","ф"=>"f",
                "Х"=>"Kh","х"=>"kh","Ц"=>"Tc","ц"=>"tc","Ч"=>"Ch","ч"=>"ch","Ш"=>"Sh","ш"=>"sh","Щ"=>"Shch","щ"=>"shch",
                "Ы"=>"Y","ы"=>"y","Э"=>"E","э"=>"e","Ю"=>"Iu","ю"=>"iu","Я"=>"Ia","я"=>"ia","ъ"=>"","ь"=>"");
  }
  else
  {
    $arStrES = array("ае","уе","ое","ые","ие","эе","яе","юе","ёе","ее","ье","ъе","ый","ий");
    $arStrOS = array("аё","уё","оё","ыё","иё","эё","яё","юё","ёё","её","ьё","ъё","ый","ий");        
    $arStrRS = array("а$","у$","о$","ы$","и$","э$","я$","ю$","ё$","е$","ь$","ъ$","@","@");
                    
    $replace = array("А"=>"A","а"=>"a","Б"=>"B","б"=>"b","В"=>"V","в"=>"v","Г"=>"G","г"=>"g","Д"=>"D","д"=>"d",
                "Е"=>"Ye","е"=>"e","Ё"=>"Ye","ё"=>"e","Ж"=>"Zh","ж"=>"zh","З"=>"Z","з"=>"z","И"=>"I","и"=>"i",
                "Й"=>"Y","й"=>"y","К"=>"K","к"=>"k","Л"=>"L","л"=>"l","М"=>"M","м"=>"m","Н"=>"N","н"=>"n",
                "О"=>"O","о"=>"o","П"=>"P","п"=>"p","Р"=>"R","р"=>"r","С"=>"S","с"=>"s","Т"=>"T","т"=>"t",
                "У"=>"U","у"=>"u","Ф"=>"F","ф"=>"f","Х"=>"Kh","х"=>"kh","Ц"=>"Ts","ц"=>"ts","Ч"=>"Ch","ч"=>"ch",
                "Ш"=>"Sh","ш"=>"sh","Щ"=>"Shch","щ"=>"shch","Ъ"=>"","ъ"=>"","Ы"=>"Y","ы"=>"y","Ь"=>"","ь"=>"",
                "Э"=>"E","э"=>"e","Ю"=>"Yu","ю"=>"yu","Я"=>"Ya","я"=>"ya","@"=>"y","$"=>"ye");
                
    	$user_name = str_replace($arStrES, $arStrRS, $user_name);
    	$user_name = str_replace($arStrOS, $arStrRS, $user_name);
  	}
        
  			return iconv("UTF-8","UTF-8//IGNORE",strtr($user_name,$replace));
		}
	}
	class agent{
		public function get_agent(){
		$user_agent = $_SERVER["HTTP_USER_AGENT"];
  		if (strpos($user_agent, "Firefox") !== false) $browser = "Firefox";
  		elseif (strpos($user_agent, "Opera") !== false) $browser = "Opera";
  		elseif (strpos($user_agent, "Chrome") !== false) $browser = "Chrome";
  		elseif (strpos($user_agent, "MSIE") !== false) $browser = "Internet Explorer";
  		elseif (strpos($user_agent, "Safari") !== false) $browser = "Safari";
  		else $browser = "Неизвестный";
  	return $browser;
	}
}
	class ip{
		public function get_ip(){
			$user_ip = $_SERVER["REMOTE_ADDR"];
			return $user_ip;
		}
	}
	class date{
		public function get_date(){
			$date = '';
			$date = date("Y-m-d H:i:s"); 
			return $date;
		}
	}
	class DB{
		function __construct(){
			/*$host = '127.0.0.1';
			$db   = 'feedback';
			$user = 'root';
			$pass = '';
			$charset = 'utf8';

			$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
			$opt = [
				PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::ATTR_EMULATE_PREPARES   => false,
			];
			$pdo = new PDO($dsn, $user, $pass, $opt);
			return $pdo;*/
		}
		function add_data($eng_name, $email, $url, $user_message, $browser, $user_ip){

		}
	}


	$validate_data = new validate_input_info;
	$user_name = $validate_data->validate_user_name();
	$email = $validate_data->validate_user_email();
	$url = $validate_data->validate_url();
	$user_message = $validate_data->validate_user_message();
	$captcha = $validate_data->catch_captcha();
	echo 'Имя: ' . $user_name .'<br/>';
	echo 'Почта: ' . $email .'<br/>';
	echo 'Url: ' . $url . '<br/>';
	echo 'Сообщение: '. $user_message . '<br/>';
	echo 'Captcha: ' . $captcha . '<br/>';
	echo $_SESSION['capcha_code'];
	echo '<hr>';
	$transliteration = new transliteration;
	echo 'Логин после транслитерации: ' . $transliteration->replace($user_name);
	$eng_name = $transliteration->replace($user_name);
	$agent = new agent;
	$browser = $agent->get_agent();
	echo '<br/>Браузер - '. $browser;
	$ip = new ip;
	$user_ip = $ip -> get_ip();
	echo '<br/>Айпи - ' . $user_ip;
	$date = new date;
	$current_date = $date->get_date();
	echo '<br/>Сегодня '.$date->get_date();
	$connect = new DB;
	try{
		$pdo = new PDO('mysql:host=127.0.0.1;dbname=feedback','root', '');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		exit($e->getMessage());
	}
	$pdo->exec("set names utf8");

$statement = $pdo->prepare("INSERT INTO feedbacks(`user_name`,`e-mail`,`message`,`date`,`user_ip`,`user_agent`,`user_url`)
        VALUES(:user_name,:email,:message,:date,:user_ip,:user_agent,:user_url)");
$statement->bindParam(':user_name', $eng_name,PDO::PARAM_STR);
$statement->bindParam(':email', $email,PDO::PARAM_STR);
$statement->bindParam(':message', $user_message,PDO::PARAM_STR);
$statement->bindParam(':date', $current_date,PDO::PARAM_STR);
$statement->bindParam(':user_ip', $user_ip,PDO::PARAM_STR);
$statement->bindParam(':user_agent', $browser,PDO::PARAM_STR);
$statement->bindParam(':user_url', $url,PDO::PARAM_STR);
$statement->execute();
?>



