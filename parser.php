<?php
include_once 'simple_html_dom.php';
include_once 'phpQuery.php';
//include_once 'db.php';
//print_r($_SERVER); // смотрим юзерагента

function curlLogin($url,$login,$pass)
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
    curl_setopt($ch, CURLOPT_COOKIEJAR, __DIR__ . '/cookie.txt');
    $result=curl_exec($ch);
 
    // Убеждаемся что произошло перенаправление после авторизации
    //if(strpos($result,"Location: https://tbankrot.ru/")===false) die('Login incorrect');
 
    curl_close($ch);
 
    return $result;
}

$url="https://tbankrot.ru/script/submit.php";
$login="89667842289@mail.ru";
$pass="89667842289@mail.ru";

echo curlLogin($url,$login,$pass); //проходим один раз сохраняем куки выходим */          


    function curlGetPage($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_COOKIEFILE, __DIR__ . '/cookie.txt');
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}



$page = curlGetPage('https://tbankrot.ru/?page=1&swp=any_word&debtor_cat=0&parent_cat=1&sub_cat=2%2C14%2C15%2C16%2C17%2C18&sort=created&sort_order=desc&show_period=all&place[]=109&place[]=119&place[]=120&place[]=121&place[]=122&place[]=123&place[]=124&place[]=125&place[]=126&place[]=127&place[]=128&place[]=129&place[]=131&place[]=132&place[]=133&place[]=135&place[]=136&place[]=137&place[]=138&place[]=139&place[]=140&place[]=141&place[]=142&place[]=145&place[]=146&place[]=149&place[]=151&place[]=152&place[]=153&place[]=154&place[]=157&place[]=158&place[]=159&place[]=160&place[]=161&place[]=162&place[]=165&place[]=166&place[]=168&place[]=170&place[]=179&place[]=180&place[]=181&place[]=182&place[]=183&place[]=184&place[]=185&place[]=186');
$html = str_get_html($page);

//echo $html;

$pagenavi = $html->find('.paginator_row', 0);
$pageCount = ($pagenavi->find('li', 4)->plaintext);
//echo $pagenavi;
//$pageCount = count($pagenavi->find('li'));
//$pageCount = ($pagenavi->find('li', 4)->plaintext);
//echo count($pagenavi->find('li'));
//echo $pageCount;  
$posts = [];
$postsprice = [];

for ($i = 1; $i <= $pageCount; $i++) {

    $page = curlGetPage('https://tbankrot.ru/?page='. $i . '&swp=any_word&debtor_cat=0&parent_cat=1&sub_cat=2%2C14%2C15%2C16%2C17%2C18&sort=created&sort_order=desc&show_period=all&place[]=109&place[]=119&place[]=120&place[]=121&place[]=122&place[]=123&place[]=124&place[]=125&place[]=126&place[]=127&place[]=128&place[]=129&place[]=131&place[]=132&place[]=133&place[]=135&place[]=136&place[]=137&place[]=138&place[]=139&place[]=140&place[]=141&place[]=142&place[]=145&place[]=146&place[]=149&place[]=151&place[]=152&place[]=153&place[]=154&place[]=157&place[]=158&place[]=159&place[]=160&place[]=161&place[]=162&place[]=165&place[]=166&place[]=168&place[]=170&place[]=179&place[]=180&place[]=181&place[]=182&place[]=183&place[]=184&place[]=185&place[]=186');
    $html = str_get_html($page);
//}
//$posts = [];
$urls = 'https://tbankrot.ru';   
foreach ($html->find('.info_head') as $element){
      //$link = $element->find('a.visited', 0);
      $link = $element->find('a', 1);
        $posts[] = [
        'link' => $urls . $id = trim($link->attr['href'])
        ]; 
        usleep(180000);
}  

//} //Конец цикла for
// echoprint_r($posts);

//$elements = [];
            foreach ($posts as $link ) //Инфа по всем лотам на странице
            {
                    $link = $link['link'];
                   // $link2= $link['ID'];
                    //echo $id, "<br>";
                    //$page = curlGetPage('https://tbankrot.ru/item?id=4574500');
                    usleep(180000);
                    $page = curlGetPage($link);
                    //$id = curlGetPrice($id);
                    $html = str_get_html($page); 
        
        //$page = curlGetPage('https://tbankrot.ru/item?id=4565146');
        //$html = str_get_html($page);   
        //echo $html;             
        $url = 'https://tbankrot.ru'; 
      

    //$elements[] = [  
     $elements = [        
   
    'ID_Lot' => $id = $link,
    'ID_Lot' => mb_strcut($id, 28, 7),

    'header' =>  trim($header = $html->find('.lot_head', 0)->find('h1', 0)->plaintext), //загловок
    //echo trim($header);
    //echo  "\n";

    'header2' => trim($header2 = $html->find('.info_head', 0)->find('b', 0)->plaintext), //загловок
    //echo trim($header2);
    //echo  "\n";

    'body' => trim($body = $html->find('.lot_text', 0)->plaintext), //Текст лота start_price
   // echo trim($body);
   // echo  "\n";

    'price' => trim($price = $html->find('.start_price', 0)->plaintext),// Прайс макс
   // echo 'Текущая цена: ' . trim($price) . ' руб';
   // echo  "\n";


   'pricemin' => $priceminman = trim($priceminman = $html->find('.cur_price', 0)->find('p', 3)->plaintext),  //прайс мин 
   //priceminman' => trim($priceminman = $html->find('.cur_price', 0)->find('p', 3)->plaintext),  //прайс мин 
   'pricemin' => ($priceminman != null) ? trim($priceminman = $html->find('.cur_price', 0)->find('p', 3)->plaintext) : null,
   // echo 'Минимальная цена: ' . trim($priceminman);
   // echo  "\n";

   'region' => trim($region = $html->find('.row', 4)->plaintext),
   // echo trim($region);

   'dates' => trim($dates = $html->find('.dates', 0)->find('td', 0)->plaintext), //Проведение заявок
   // echo trim($dates);
   // echo  "\n";

   'torgi' => trim($torgi = $html->find('.dates', 0)->find('td', 1)->plaintext), //Проведение торгов
  //  echo trim($torgi);
  //  echo  "\n";

  'dopinfo' =>  trim($dopinfo = $html->find('#dop_info_4', 0)->find('td', 0)->plaintext), //Проведение торгов
  //  echo trim($dopinfo);
  //  echo  "\n";

  'dopinfo2' =>  trim($dopinfo2 = $html->find('#dop_info_4', 0)->find('td', 1)->plaintext), //Проведение торгов
  //  echo trim($dopinfo2);
  //  echo  "\n";

    /*$img = $html->find('.lot_photo', 0)->attr['style']; //Фото
    echo trim($img);
    echo  "\n";*/
    
    'img' => $img = $html->find('.lot_photo', 0)->attr['style'], //Фото
    'img' => mb_strcut($img, 23, 87), //распарсиваем строку с изображением  последний элемент убирает с конца, 1 с начала

    //  echo  "\n";

   'arrow' => $url . trim($arrow = $html->find('span.arrow', 0)->find('img', 0)->attr['src']),
   // echo $url . trim($arrow);
   // echo  "\n";

   'phone' => trim($phone= $html->find('.trade_block', 1)->find('.row', 1)->plaintext),//иелефон
  //  echo trim($phone);
  //  echo  "\n";

  'email' => trim($email = $html->find('.trade_block', 1)->find('.row', 2)->plaintext),//емаил
   // echo trim($email);
   // echo  "\n";
   ];
   usleep(180000); 
  $conn = mysqli_connect("localhost", "root", "", "parset");
   
   $sql = ("INSERT IGNORE INTO `lots_all` (`id`, `id_lot`, `name_lot`, `header_lot`, `text_lot`, `price_lot`, `pricemin_lot`, `region_lot`, `dates_lot`, `torgi_lot`, `dopinfo_lot`, `dopinfo2_lot`, `img_lot`, `arrow_lot`, `phone_lot`, `email_lot`, `dateparsing`) 
   VALUES (NULL, '{$elements['ID_Lot']}', '{$elements['header']}', '{$elements['header2']}', '{$elements['body']}', '{$elements['price']}', '{$elements['pricemin']}', '{$elements['region']}', '{$elements['dates']}', '{$elements['torgi']}', '{$elements['dopinfo']}', '{$elements['dopinfo2']}', '{$elements['img']}', '{$elements['arrow']}', '{$elements['phone']}', '{$elements['email']}', CURRENT_TIMESTAMP)");
   if($conn->query($sql)){   
   echo "Данные успешно добавлены";
   } else{
   echo "Ошибка: " . $conn->error;
   }
   $conn->close();

   print_r ($elements);
  }

  if ($i > 0)
  {
      echo 'Закончился парсинг на стр: ' . $i;
      break;
  }
  //print_r ($posts);
  
}   
print_r ($postsprice);
?>


