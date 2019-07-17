<?php
$response = file_get_contents("mail_response.html");
foreach ($_POST as $key => $value) {
    $response = str_replace("@@" . $key . "@@", $value, $response);
}

// Forward the response!
$headers = "From: Wikikonference 2019 <wikikonference@wikimedia.cz>\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
//mail("martin.urbanec@wikimedia.cz", "[Wikikonference 2019] Nominace témat a řečníků", $response, $headers);

// Store the response!
$html = str_replace("@@response@@", $response, file_get_contents('layout.html'));
file_put_contents('responses/' . uniqid("response", true) . ".html", $html);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        td, tr {
            text-align: center;
        }
    </style>

    <title>Hello, world!</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Wikikonference 2019</a>
    </nav>

    <h1>Vaše odpověď byla úspěšně zaznamenána.</h1>
</body>
</html>