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
    if(strpos($result,"Location: https://tbankrot.ru/")===false) die('Login incorrect');
 
    curl_close($ch);
 
    return $result;
}

$url="https://tbankrot.ru/script/submit.php";
$login="89667842289@mail.ru";
$pass="89667842289@mail.ru";

//echo curlLogin($url,$login,$pass); //проходим один раз сохраняем куки выходим */

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


/*$page = curlGetPage('https://tbankrot.ru/?page=1&swp=any_word&debtor_cat=0&parent_cat=1&sub_cat=2%2C14%2C15%2C16%2C17%2C18&sort=created&sort_order=desc&show_period=all&place[]=109&place[]=119&place[]=120&place[]=121&place[]=122&place[]=123&place[]=124&place[]=125&place[]=126&place[]=127&place[]=128&place[]=129&place[]=131&place[]=132&place[]=133&place[]=135&place[]=136&place[]=137&place[]=138&place[]=139&place[]=140&place[]=141&place[]=142&place[]=145&place[]=146&place[]=149&place[]=151&place[]=152&place[]=153&place[]=154&place[]=157&place[]=158&place[]=159&place[]=160&place[]=161&place[]=162&place[]=165&place[]=166&place[]=168&place[]=170&place[]=179&place[]=180&place[]=181&place[]=182&place[]=183&place[]=184&place[]=185&place[]=186');
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

for ($i = 2; $i <= $pageCount; $i++) {
    if ($i > 3)
    {
        echo 'end';
        break;
    }
    $page = curlGetPage('https://tbankrot.ru/?page='. $i . '&swp=any_word&debtor_cat=0&parent_cat=1&sub_cat=2%2C14%2C15%2C16%2C17%2C18&sort=created&sort_order=desc&show_period=all&place[]=109&place[]=119&place[]=120&place[]=121&place[]=122&place[]=123&place[]=124&place[]=125&place[]=126&place[]=127&place[]=128&place[]=129&place[]=131&place[]=132&place[]=133&place[]=135&place[]=136&place[]=137&place[]=138&place[]=139&place[]=140&place[]=141&place[]=142&place[]=145&place[]=146&place[]=149&place[]=151&place[]=152&place[]=153&place[]=154&place[]=157&place[]=158&place[]=159&place[]=160&place[]=161&place[]=162&place[]=165&place[]=166&place[]=168&place[]=170&place[]=179&place[]=180&place[]=181&place[]=182&place[]=183&place[]=184&place[]=185&place[]=186');
    $html = str_get_html($page);
//}
//$posts = [];
$urls = 'https://tbankrot.ru';   
foreach ($html->find('.info_head') as $element){
      //$link = $element->find('a.visited', 0);
      $link = $element->find('a', 1);
        $posts[] = [
        'link' => $urls . trim($link->attr['href'])
        ]; 
        usleep(120000);
} 


            foreach ($posts as $link ) //Инфа по всем лотам на странице
            {
                    $link = $link['link'];
                   // echo $link, "<br>";
                    //$page = curlGetPage('https://tbankrot.ru/item?id=4574500');
                    usleep(120000);
                    $page = curlGetPage($link);
                    $html = str_get_html($page);      
 */
$page = curlGetPage('https://tbankrot.ru/item?id=4583924');    
$html = str_get_html($page);                      
$url = 'https://tbankrot.ru';


    $header = $html->find('.lot_head', 0)->find('h1', 0)->plaintext; //загловок
    echo trim($header);
    echo  "\n";

    $header2 = $html->find('.info_head', 0)->find('b', 0)->plaintext; //загловок
    echo trim($header2);
    echo  "\n";

    $body = $html->find('.lot_text', 0)->plaintext; //Текст лота start_price
    echo trim($body);
    echo  "\n";

    $price = $html->find('.start_price', 0)->plaintext;// Прайс макс
    echo 'Текущая цена: ' . trim($price) . ' руб';
    echo  "\n";

    $priceminman = $html->find('.cur_price', 0)->find('p', 3)->plaintext;  //прайс мин 
    echo 'Минимальная цена: ' . trim($priceminman);
    echo  "\n";

    $region = $html->find('.row', 4)->plaintext;
    echo trim($region);
    echo  "\n";

    $dates = $html->find('.dates', 0)->find('td', 0)->plaintext; //Проведение заявок
    echo trim($dates);
    echo  "\n";

    $torgi = $html->find('.dates', 0)->find('td', 1)->plaintext; //Проведение торгов
    echo trim($torgi);
    echo  "\n";

    $dopinfo = $html->find('#dop_info_4', 0)->find('td', 0)->plaintext; //Проведение торгов
    echo trim($dopinfo);
    echo  "\n";

    $dopinfo2 = $html->find('#dop_info_4', 0)->find('td', 1)->plaintext; //Проведение торгов
    echo trim($dopinfo2);
    echo  "\n";

    /*$img = $html->find('.lot_photo', 0)->attr['style']; //Фото
    echo trim($img);
    echo  "\n";*/
    
    $img = $html->find('.lot_photo', 0)->attr['style']; //Фото
    echo mb_strcut($img, 23, 82); //распарсиваем строку с изображением 
    echo  "\n";
    
    $arrow = $html->find('span.arrow', 0)->find('img', 0)->attr['src'];
    echo $url . trim($arrow);
    echo  "\n";

    $phone= $html->find('.trade_block', 1)->find('.row', 1)->plaintext;//иелефон
    echo trim($phone);
    echo  "\n";

    $email = $html->find('.trade_block', 1)->find('.row', 2)->plaintext;//емаил
    echo trim($email);
    echo  "\n";
   
   

