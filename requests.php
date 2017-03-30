<?php
    class data{
        public function get_data()
        {
            try {
                $pdo = new PDO('mysql:host=127.0.0.1;dbname=feedback', 'root', '');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
            $pdo->exec("set names utf8");
            $sentence = $pdo->prepare("SELECT * FROM feedbacks");
            $sentence->execute();
            while($result = $sentence->fetchAll(PDO::FETCH_ASSOC)){
                echo '<pre>';
                //print_r($result);
                echo '</pre>';
                $table = '';
                $table .= '<table border="1">';
                $table .= '<tr>
                     <th>Имя</th>
                     <th>Почта</th>
                     <th>Текст</th>
                     <th>Дата</th>
                     <th>Айпи</th>
                     <th>Браузер</th>
                     <th>Ссылка</th></tr>';
                foreach($result as $key => $value) {

                    $table .= '<tr>';
                    $table .= '<td>'.$value['user_name'].'</td>';
                    $table .= '<td>'.$value['e-mail'].'</td>';
                    $table .= '<td>'.$value['message'].'</td>';
                    $table .= '<td>'.$value['date'].'</td>';
                    $table .= '<td>'.$value['user_ip'].'</td>';
                    $table .= '<td>'.$value['user_agent'].'</td>';
                    $table .= '<td>'.$value['user_url'].'</td>';
                    $table .= '</tr>';
                }
                $table .= '</table>';
            }
            return $table;
        }
    }
$res = new data;
echo $res->get_data();

?>

