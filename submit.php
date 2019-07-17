<h1>Response</h1>
<?php
$html = file_get_contents("response.html");
foreach ($_POST as $key => $value) {
    $html = str_replace("@@" . $key . "@@", $value, $html);
}

// Forward the response!
$headers = "From: Wikikonference 2019 <wikikonference@wikimedia.cz>\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
mail("martin.urbanec@wikimedia.cz", "[Wikikonference 2019] Nominace témat a řečníků", $html, $headers);