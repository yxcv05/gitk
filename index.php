<?php
require_once ("include/DB.php");
require_once ("include/API.php");
$DB = new DB();
$dbh = DB::connect();

$postData = file_get_contents('php://input');
$data = json_decode($postData, true);


if(isset($data[0]["get_goods"])) {

    $drar = API::getInfo($dbh, $data[1]["category"]);
    exit(json_encode($drar));
}
if(isset($data[0]["compare"])) {
    $drar = API::compare($dbh, $data[1]["ids"]);
    exit(json_encode($drar));
}
if(isset($data[0]["search"])) {

    $drar = API::search($dbh, $data[1]["query"]);
    exit(json_encode($drar));
}
if(isset($data[0]["sort"])) {

    $drar = API::sort($dbh,$data[2]["category"], $data[1]["type"]);
    exit(json_encode($drar));
}
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="jquery-3.2.1.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
<header>
    <div class="logo"></div>
    <div class="r_block">
        <div>
            <input id="search"><a href="#" id="searchsubmit">Поиск</a>
        </div>
        <div>
                Сортировка цены по
                <select>
                    <option></option>
                    <option value="ASC">Возрастанию</option>
                    <option value="DESC">Убыванию</option>
                </select>
        </div>
        <a href="#" id="compare">Сравнение</a>
    </div>
</header>
<nav>
<ul>
    <li><a href="#" id="hardware" class="select">hardware</a></li>
    <li><a href="#" id="software">software</a></li>
    <li><a href="#" id="games">games</a></li>
    <li><a href="#" id="books">books</a></li>
    <li><a href="#" id="food">food</a></li>
</ul>
</nav>
<main>
    <section id="list">


    </section>
</main>
</body>
</html>