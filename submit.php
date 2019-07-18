<?php
$response = file_get_contents("mail_response.html");
foreach ($_POST as $key => $value) {
    $response = str_replace("@@" . $key . "@@", htmlspecialchars($value), $response);
}

// Forward the response!
$headers = "From: Wikikonference 2019 <wikikonference@wikimedia.cz>\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
//mail("martin.urbanec@wikimedia.cz", "[Wikikonference 2019] Nominace témat a řečníků", $response, $headers);

// Store the response!
$html = str_replace("@@response@@", $response, file_get_contents('layout.html'));
$id = uniqid("response", true);
file_put_contents('responses/' . $id . ".html", $html);

// Link the response!
$config = yaml_parse('config.yaml');
$token = md5($config['secret'] . $id);
$link = "view.php?id=$id&token=$token";
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

    <title>Nominace řečníků na Wikikonferenci 2019</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Wikikonference 2019</a>
    </nav>

    <div class="container">
        <h1>Vaše odpověď byla úspěšně zaznamenána.</h1>
        <p>Můžete si ji <a href="<? $link ?>">zobrazit</a>.</p>
    </div>

    <footer class="container-fluid">
        <hr>
        <div class="row">
            <div class="col-md-4">
                <p>&copy; Wikimedia Česká republika, z.s.</p>
            </div>
            <div class="col-md-4 text-center"><a href="mailto:wikikonference@wikimedia.cz">wikikonference@wikimedia.cz</a></div>
            <div class="col-md-4 text-right"><a href="https://github.com/urbanecm/wikikonference-2019-nominace">Zdrojový kód</a> (<a href="LICENSE">GNU GPL</a>)</div>
        </div>
    </footer>
</body>
</html>