<h1>Response</h1>
<?php
$html = file_get_contents("response.html");
foreach ($_POST as $key => $value) {
    $html = str_replace("@@" . $key . "@@", $value, $html);
}
echo $html;