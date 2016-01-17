<?php

$imie = $_POST['imie'];
$okres = $_POST['okres'];
$dni = $_POST['dni'];


$q = mysql_connect('localhost', 'nick','password') or die ("Awaria serwera");
$q = mysql_select_db('trening') or die ("Baza nie odpowiada");

$wynik = mysql_query('select * from cwiczenia');

echo "Witaj ".$imie;

function zakres($okres)  //sprawdz okres
{
  $dni = $_POST['dni'];

  if ($okres==0){
    return true;
  } else {
   return false;
  }
}

if (zakres($okres)){
  echo ("<br> Cwiczenia wykonane przez Ciebie w ciagu ostatnich " . $dni ." dni. <br><br>");
  $k =mysql_query("select * from cwiczenia where data >= date_sub(current_date, interval $dni day)");
  while ($k1 = mysql_fetch_assoc($k))
  {
    echo ($k1 ['nazwa']. ' '. $k1 ['powtorzenia'].' '.$k1['data']. "<br>");
  }
}
  else
{
  $dni=7*$okres;
  echo ("<br> cwiczenia wykonane w ciagu ostatnich " . $okres ." tygodni <br><br>");
  $k =mysql_query("select * from cwiczenia where data >= date_sub(current_date, interval $dni day)");
  while ($k1 = mysql_fetch_assoc($k))
  {

  echo ($k1 ['nazwa']. ' '. $k1 ['powtorzenia'].' '.$k1['data']. "<br>");
  }
};

 ?>
