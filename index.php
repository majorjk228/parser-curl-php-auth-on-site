<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>


<?php include_once 'parser.php';
     //print_r($posts); 
     $url = 'https://tbankrot.ru';
    ?>
<? 
  $html = str_get_html($page);  
?>
<script>
document.getElementById("sum ajax").onclick()   
</script>'; 
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Торги</th>
      <th scope="col">Заголовок</th>
      <th scope="col">Текст лота</th>
      <th scope="col">Текущая цена</th>
      <th scope="col">Минимальная цена</th>
      <th scope="col">Регион</th>
      <th scope="col">Прием заявок</th>
      <th scope="col">Проведение торгов</th>
      <th scope="col">Доп инфа</th>
      <th scope="col">Доп инфа2</th>
      <th scope="col">Изображение</th>
      <th scope="col">Стрелка</th>
      <th scope="col">Регион</th>
      <th scope="col">Табличка с ценами</th>
      <th scope="col">Телефон</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($elements as $every) //Инфа по всем лотам на странице
            {
              $header = $every['header'];
              $header2 = $every['header2'];
              $body = $every['body'];
              $price = $every['price'];
              $priceminman = $every['priceminman'];
              $region = $every['region'];
              $dates = $every['dates'];
              $torgi = $every['torgi'];
              $dopinfo = $every['dopinfo'];
              $dopinfo2 = $every['dopinfo2'];
              $img = $every['img'];
              $arrow = $every['arrow'];
              $phone = $every['phone'];
              $email = $every['email'];

              //echo $header;
              $i = 1;
              echo "<tr>";
              echo "<th scope=\"row\">" . $i++ . " </th>";
              echo "<td>" . $header . "</td>";
              echo "<td>" . $header2 . "</td>";
              echo "<td>" . $body . "</td>";
              echo "<td>" . $price . "</td>";
              echo "<td>" . $priceminman . "</td>";
              echo "<td>" . $region . "</td>";
              echo "<td>" . $dates . "</td>";
              echo "<td>" . $torgi . "</td>";
              echo "<td>" . $dopinfo . "</td>";
              echo "<td>" . $dopinfo2 . "</td>";
              echo "<td>" . $img . "</td>";
              echo "<td>" . $arrow . "</td>";
              echo "<td>" . $phone . "</td>";
              echo "<td>" . $email . "</td>";
              echo "</tr>" ;
            }   

?>
    <tr>
      <th scope="row">2</th>

      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        
</body>

</html>