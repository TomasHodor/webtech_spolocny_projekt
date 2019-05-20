<?php
/**
 * Vezme template mailu a zameni prislusne polia za hodnoty
 * @author Peter Kalanin
 * 
 * @param String $mailText
 * @param Array $data
 * 
 * @return String
 */
function updateMailWithValues($mailText, $data, $sender)
{
  $ip = $data["verejnaIP"];
  $login = $data["login"];
  $heslo = $data["heslo"];
  $http = $data["http"];

  $finalMail = $mailText;

  $finalMail = str_replace('{{verejnaIP}}', $ip, $finalMail);
  $finalMail = str_replace('{{login}}', $login, $finalMail);
  $finalMail = str_replace('{{heslo}}', $heslo, $finalMail);
  $finalMail = str_replace('{{http}}', $http, $finalMail);
  $finalMail = str_replace('{{sender}}', $sender, $finalMail);

  return $finalMail;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Text editor</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <?php require_once("links.php"); ?>

  <script src='main.js'></script>
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-sm">
        <textarea oninput="updateHtml(event)" style="width: 100%; height: 350px;"></textarea>
      </div>
      <div class="col-sm">
        <iframe id="iframe" style="width: 100%; height: 350px;"></iframe>
      </div>
    </div>
  </div>

  <script>
    function updateHtml(text) {
      var textarea = $("textarea")[0];

      var iframe = document.getElementById("iframe");
      var ifel = iframe.contentWindow.document.getElementsByTagName("html")[0];
      ifel.innerHTML = textarea.value;
    }
  </script>

  <?php
  $mailText = 'Dobrý deň,
  na predmete Webové technológie 2 budete mať k dispozícii vlastný virtuálny linux server, ktorý budete
  používať počas semestra, a na ktorom budete vypracovávať zadania. Prihlasovacie údaje k Vašemu serveru
  su uvedené nižšie.
  ip adresa: {{verejnaIP}}
  prihlasovacie meno: {{login}}
  heslo: {{heslo}}
  Vaše web stránky budú dostupné na: http:// {{verejnaIP}}:{{http}}
  S pozdravom,
  {{sender}}';
  $data = array(
    'verejnaIP' => '192.168.1.1',
    'login' => 'login',
    'heslo' => 'heslo',
    'http' => '4654'
  );
  echo updateMailWithValues($mailText, $data, "Peter");
  ?>
</body>

</html>