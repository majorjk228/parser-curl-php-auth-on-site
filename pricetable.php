
<?php
include_once 'simple_html_dom.php';
//include_once 'parser.php';
//include_once 'db.php';

/*function curlLogin($url,$login,$pass)
{
    $ch = curl_init();
    if(strtolower((substr($url,0,5))=='https')) { // если соединяемся с https
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    }
    curl_setopt($ch, CURLOPT_URL, $url);
    // откуда пришли на эту страницу
    curl_setopt($ch, CURLOPT_REFERER, $url);
    // cURL будет выводить подробные сообщения о всех производимых действиях
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,"key=login&mail=".$login."&pas=".$pass);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (Windows; U; Windows NT 5.0; En; rv:1.8.0.2) Gecko/20070306 Firefox/1.0.0.4");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
    //curl_setopt($ch, CURLOPT_PROXY,"91.238.98.62:8000");
    //curl_setopt($ch, CURLOPT_PROXYUSERPWD, "aEktnq:BSBB14");
    //сохранять полученные COOKIE в файл
    curl_setopt($ch, CURLOPT_COOKIEJAR, __DIR__ . '/cookieprice.txt');
    $result=curl_exec($ch);
 
    // Убеждаемся что произошло перенаправление после авторизации
    //if(strpos($result,"Location: https://tbankrot.ru/")===false) die('Login incorrect');
 
    curl_close($ch);
 
    return $result;
}

$url="https://tbankrot.ru/script/submit.php";
$login="89667842289@mail.ru";
$pass="89667842289@mail.ru";

echo curlLogin($url,$login,$pass);*/

function curlGetPrice($url, $id)
{

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_URL, $url);
    //curl_setopt($ch, CURLOPT_REFERER, $referer);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, true);
    //curl_setopt($ch, CURLOPT_POSTFIELDS, "key=get_price_down&id=4565146"); 
    //curl_setopt($ch, CURLOPT_POSTFIELDS, "key=get_price_down&id=4587505"); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, "key=get_price_down&id=" . $id); 
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (Windows; U; Windows NT 5.0; En; rv:1.8.0.2) Gecko/20070306 Firefox/1.0.0.4");
    curl_setopt($ch, CURLOPT_COOKIEFILE, __DIR__ . '/cookie.txt');
    //curl_setopt($ch, CURLOPT_PROXY,"91.238.98.62:8000");
    //curl_setopt($ch, CURLOPT_PROXYUSERPWD, "aEktnq:BSBB14");

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

//$page = curlGetPage('https://tbankrot.ru/?page=1&swp=any_word&debtor_cat=0&parent_cat=1&sub_cat=2%2C14%2C15%2C16%2C17%2C18&sort=created&sort_order=desc&show_period=all&place[]=109&place[]=119&place[]=120&place[]=121&place[]=122&place[]=123&place[]=124&place[]=125&place[]=126&place[]=127&place[]=128&place[]=129&place[]=131&place[]=132&place[]=133&place[]=135&place[]=136&place[]=137&place[]=138&place[]=139&place[]=140&place[]=141&place[]=142&place[]=145&place[]=146&place[]=149&place[]=151&place[]=152&place[]=153&place[]=154&place[]=157&place[]=158&place[]=159&place[]=160&place[]=161&place[]=162&place[]=165&place[]=166&place[]=168&place[]=170&place[]=179&place[]=180&place[]=181&place[]=182&place[]=183&place[]=184&place[]=185&place[]=186');
//$html = str_get_html($page);

//echo $html;

//$pagenavi = $html->find('.paginator_row', 0);
//$pageCount = ($pagenavi->find('li', 4)->plaintext);
//echo $pagenavi; 
//$pageCount = count($pagenavi->find('li'));
//$pageCount = ($pagenavi->find('li', 4)->plaintext);
//echo count($pagenavi->find('li'));
//echo $pageCount;  
//$posts = [];

//$elementprice = [];
for ($i = 1; $i <= 2; $i++) {


    $page = curlGetPrice('https://tbankrot.ru/?page='. $i . '&swp=any_word&debtor_cat=0&parent_cat=1&sub_cat=2%2C14%2C15%2C16%2C17%2C18&sort=created&sort_order=desc&show_period=all&place[]=109&place[]=119&place[]=120&place[]=121&place[]=122&place[]=123&place[]=124&place[]=125&place[]=126&place[]=127&place[]=128&place[]=129&place[]=131&place[]=132&place[]=133&place[]=135&place[]=136&place[]=137&place[]=138&place[]=139&place[]=140&place[]=141&place[]=142&place[]=145&place[]=146&place[]=149&place[]=151&place[]=152&place[]=153&place[]=154&place[]=157&place[]=158&place[]=159&place[]=160&place[]=161&place[]=162&place[]=165&place[]=166&place[]=168&place[]=170&place[]=179&place[]=180&place[]=181&place[]=182&place[]=183&place[]=184&place[]=185&place[]=186', $id);
    //$page = curlGetPage('https://tbankrot.ru/?page='. $i . '&swp=any_word&debtor_cat=0&parent_cat=1&sub_cat=2%2C14%2C15%2C16%2C17%2C18&sort=created&sort_order=desc&show_period=all&place[]=109&place[]=119&place[]=120&place[]=121&place[]=122&place[]=123&place[]=124&place[]=125&place[]=126&place[]=127&place[]=128&place[]=129&place[]=131&place[]=132&place[]=133&place[]=135&place[]=136&place[]=137&place[]=138&place[]=139&place[]=140&place[]=141&place[]=142&place[]=145&place[]=146&place[]=149&place[]=151&place[]=152&place[]=153&place[]=154&place[]=157&place[]=158&place[]=159&place[]=160&place[]=161&place[]=162&place[]=165&place[]=166&place[]=168&place[]=170&place[]=179&place[]=180&place[]=181&place[]=182&place[]=183&place[]=184&place[]=185&place[]=186');
    $html = str_get_html($page);
    
//}
$posts2 = [];

$urls = 'https://tbankrot.ru';   
foreach ($html->find('.info_head') as $element){
      //$link = $element->find('a.visited', 0);
      $link = $element->find('a', 1);
        $posts2[] = [
         //$posts = [
        'ID' => $id = trim($link->attr['href']),
        //$id = trim($link->attr['href']),
        //'ID' => trim($link->attr['href']), 
        'ID' => mb_strcut($id, 9, 7)
        ]; 
        usleep(180000);        
    } 

//$elementprice = [];*/
foreach ($posts2 as $link) //Инфа по всем лотам на странице
{
        global $id;
         //$link = $link['link'];
        $id = $link['ID'];   
        echo $id . "<br>";

    
        //echo $link, "<br>";
        //$ajax = curlGetPrice('https://tbankrot.ru/item?id=' . $id, $id);
        $ajax = curlGetPrice('https://tbankrot.ru/script/ajax.php', $id);  
        usleep(180000);
        // echo $id. "<br>";
   
       //$id = curlGetPrice($id);
        //$html = str_get_html($page); 
        $priceTable = str_get_html($ajax);
        //echo $priceTable;

         if (!empty($priceTable)) { //Проверка на активную табличку цен
 
      
//$elementprice[] = [
   $elementprice = [

'ID_Lot' => $link['ID'],
'dateprice №1' => trim($tableprice = $priceTable->find('td.date', 0)->plaintext),
'tableprice №1' => $tableprice = trim($tableprice = $priceTable->find('td.price', 0)->plaintext),//таблица с ценами 

'dateprice №2' => trim($tableprice = $priceTable->find('td.date', 1)->plaintext),
'tableprice №2' => trim($tableprice = $priceTable->find('td.price', 1)->plaintext),//таблица с ценами 

'dateprice №3' => trim($tableprice = $priceTable->find('td.date', 2)->plaintext),
'tableprice №3' => trim($tableprice = $priceTable->find('td.price', 2)->plaintext),//таблица с ценами 

'dateprice №4' => trim($tableprice = $priceTable->find('td.date', 3)->plaintext),
'tableprice №4' => trim($tableprice = $priceTable->find('td.price', 3)->plaintext),//таблица с ценами 

'dateprice №5' => trim($tableprice = $priceTable->find('td.date', 0)->plaintext),
'tableprice №5' => trim($tableprice = $priceTable->find('td.price', 4)->plaintext),//таблица с ценами 

'dateprice №6' => trim($tableprice = $priceTable->find('td.date', 5)->plaintext),
'tableprice №6' => trim($tableprice = $priceTable->find('td.price', 5)->plaintext),//таблица с ценами 

'dateprice №7' => trim($tableprice = $priceTable->find('td.date', 6)->plaintext),
'tableprice №7' => trim($tableprice = $priceTable->find('td.price', 6)->plaintext),//таблица с ценами 

'dateprice №8' => trim($tableprice = $priceTable->find('td.date', 7)->plaintext),
'tableprice №8' => trim($tableprice = $priceTable->find('td.price', 7)->plaintext),//таблица с ценами 

'dateprice №9' => trim($tableprice = $priceTable->find('td.date', 8)->plaintext),
'tableprice №9' => trim($tableprice = $priceTable->find('td.price', 8)->plaintext),//таблица с ценами 

'dateprice №10' => trim($tableprice = $priceTable->find('td.date', 9)->plaintext),
'tableprice №10' => trim($tableprice = $priceTable->find('td.price', 9)->plaintext),//таблица с ценами 

'dateprice №11' => trim($tableprice = $priceTable->find('td.date', 10)->plaintext),
'tableprice №11' => trim($tableprice = $priceTable->find('td.price', 10)->plaintext),//таблица с ценами 

'dateprice №12' => trim($tableprice = $priceTable->find('td.date', 11)->plaintext),
'tableprice №12' => trim($tableprice = $priceTable->find('td.price', 11)->plaintext),//таблица с ценами 

'dateprice №13' => trim($tableprice = $priceTable->find('td.date', 12)->plaintext),
'tableprice №13' => trim($tableprice = $priceTable->find('td.price', 12)->plaintext),//таблица с ценами 

'dateprice №14' => trim($tableprice = $priceTable->find('td.date', 13)->plaintext),
'tableprice №14' => trim($tableprice = $priceTable->find('td.price', 13)->plaintext),//таблица с ценами 

'dateprice №15' => trim($tableprice = $priceTable->find('td.date', 14)->plaintext),

'dateprice №16' => trim($tableprice = $priceTable->find('td.date', 15)->plaintext),
'tableprice №16' => trim($tableprice = $priceTable->find('td.price', 15)->plaintext),//таблица с ценами 

'dateprice №17' => trim($tableprice = $priceTable->find('td.date', 16)->plaintext),
'tableprice №17' => trim($tableprice = $priceTable->find('td.price', 16)->plaintext),//таблица с ценами 

'dateprice №18' => trim($tableprice = $priceTable->find('td.date', 17)->plaintext),
'tableprice №18' => trim($tableprice = $priceTable->find('td.price', 17)->plaintext),//таблица с ценами 

'dateprice №19' => trim($tableprice = $priceTable->find('td.date', 18)->plaintext),
'tableprice №19' => trim($tableprice = $priceTable->find('td.price', 18)->plaintext),//таблица с ценами 

'dateprice №20' => trim($tableprice = $priceTable->find('td.date', 19)->plaintext),
'tableprice №20' => trim($tableprice = $priceTable->find('td.price', 19)->plaintext),//таблица с ценами 
];
}//Конец проверки на empt
$elementprice = array_unique($elementprice);
usleep(180000);   
$conn = mysqli_connect("localhost", "root", "", "parset");
//$sql = ("INSERT IGNORE INTO `pricetable2` (`id`, `id_lot`, `datetime`, `price`) VALUES (NULL, '{$elementprice[count($elementprice) - 1]['ID_Lot']}', '{$elementprice[count($elementprice) - 1]['dateprice №1']}', '{$elementprice[count($elementprice) - 1]['tableprice №1']}')");
$sql = ("INSERT IGNORE INTO `pricetable2` (`id`, `id_lot`, `datetime`, `price`) VALUES (NULL, '{$elementprice['ID_Lot']}', '{$elementprice['dateprice №1']}', '{$elementprice['tableprice №1']}'), 
(NULL, '{$elementprice['ID_Lot']}', '{$elementprice['dateprice №2']}', '{$elementprice['tableprice №2']}'), 
(NULL, '{$elementprice['ID_Lot']}', '{$elementprice['dateprice №3']}', '{$elementprice['tableprice №3']}'),
(NULL, '{$elementprice['ID_Lot']}', '{$elementprice['dateprice №4']}', '{$elementprice['tableprice №4']}'), 
(NULL, '{$elementprice['ID_Lot']}', '{$elementprice['dateprice №5']}', '{$elementprice['tableprice №5']}'),
(NULL, '{$elementprice['ID_Lot']}', '{$elementprice['dateprice №6']}', '{$elementprice['tableprice №6']}'),
(NULL, '{$elementprice['ID_Lot']}', '{$elementprice['dateprice №7']}', '{$elementprice['tableprice №7']}'), 
(NULL, '{$elementprice['ID_Lot']}', '{$elementprice['dateprice №8']}', '{$elementprice['tableprice №8']}'),
(NULL, '{$elementprice['ID_Lot']}', '{$elementprice['dateprice №9']}', '{$elementprice['tableprice №9']}'),
(NULL, '{$elementprice['ID_Lot']}', '{$elementprice['dateprice №10']}', '{$elementprice['tableprice №10']}'),
(NULL, '{$elementprice['ID_Lot']}', '{$elementprice['dateprice №11']}', '{$elementprice['tableprice №11']}'),
(NULL, '{$elementprice['ID_Lot']}', '{$elementprice['dateprice №12']}', '{$elementprice['tableprice №12']}'),
(NULL, '{$elementprice['ID_Lot']}', '{$elementprice['dateprice №13']}', '{$elementprice['tableprice №13']}'),
(NULL, '{$elementprice['ID_Lot']}', '{$elementprice['dateprice №14']}', '{$elementprice['tableprice №14']}'),
(NULL, '{$elementprice['ID_Lot']}', '{$elementprice['dateprice №15']}', '{$elementprice['tableprice №15']}'),
(NULL, '{$elementprice['ID_Lot']}', '{$elementprice['dateprice №16']}', '{$elementprice['tableprice №16']}'),
(NULL, '{$elementprice['ID_Lot']}', '{$elementprice['dateprice №17']}', '{$elementprice['tableprice №17']}'),
(NULL, '{$elementprice['ID_Lot']}', '{$elementprice['dateprice №18']}', '{$elementprice['tableprice №18']}'),
(NULL, '{$elementprice['ID_Lot']}', '{$elementprice['dateprice №19']}', '{$elementprice['tableprice №19']}'),
(NULL, '{$elementprice['ID_Lot']}', '{$elementprice['dateprice №20']}', '{$elementprice['tableprice №20']}')");
//$sql = ("INSERT IGNORE INTO `pricetable2` (`id`, `id_lot`, `datetime`, `price`) VALUES (NULL, '{$elementprice['ID_Lot']}', '{$elementprice['dateprice №2']}', '{$elementprice['tableprice №2']}')");
if($conn->query($sql)){   
echo "Данные успешно добавлены";
} else{
echo "Ошибка: " . $conn->error;
}
$conn->close();


$conn = mysqli_connect("localhost", "root", "", "parset");
$sql = ("DELETE FROM `pricetable2` WHERE `datetime` = \"\" or `price` = \"\""); //удаляем пустые записи
if($conn->query($sql)){   
    echo "Данные успешно удалены";
    } else{
    echo "Ошибка: " . $conn->error;
    }
    $conn->close();

print_r ($elementprice);       
} //Конец последнего forech

if ($i > 0) // +1 страница если >1  то возбмет 2 стр
{
    echo 'Закончился парсинг на стр: ' . $i ;
    break;
}   
usleep(180000);   
}