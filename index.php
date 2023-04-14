<?php
function fetchData($city, $lat, $lon){
    $url = "https://api.openweathermap.org/data/2.5/forecast?q=$city&units=metric&lat=$lat&lon=$lon&appid=39ad5b635b9242b471e1843295dd5fee";
    $contents = file_get_contents($url);
    return json_decode($contents);
}

$cityName="dhaka";

if(isset($_POST["search"])){
    if($_POST["city"]!=""){
        $cityName = $_POST["city"];
    }
}

$climate = fetchData($cityName, "", "");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEATHER APP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <!--header section-->
    <div class="header"> 
        <h1>Today's Weather</h1>
        <form method="post" action="index.php">
            <input type="text" name="city" id="input" placeholder="Enter city name">
            <input id="search" name="search" value="Search" type="submit">
        </form>
        </div>
    </div>

    <main>        
        <div class="weather">

            <h2 id="city"><?php echo($cityName)?></h2>
            <div class="temp-box">
                <img src="./weathericon.png" alt="" id="img">
                <p id="temperature"><?php
                            echo $climate->list[0]->main->temp . " °C";
                            ?></p>
            </div>
            <span id="clouds"><?php
                            echo $climate->list[0]->weather[0]->main;
                            ?></span>
        </div>
        
    </main>

    <div class="forecstD">
        <p class="cast-header"> Next 5 days forecast</p>
        <div class="weekF">

            <div class="dayF">
                <p class="date"><?php
                                echo date('D jS, F Y', strtotime($climate->list[7]->dt_txt),);
                                ?></p>
                <p><?php echo $climate->list[7]->main->temp . " °C"; ?></p>
                <p class="desc"><?php
                            echo $climate->list[0]->weather[0]->main;
                            ?></p>
            </div>

            <div class="dayF">
                <p class="date"><?php
                                echo date('D jS, F Y', strtotime($climate->list[15]->dt_txt),);
                                ?></p>
                <p><?php echo $climate->list[15]->main->temp . " °C"; ?></p>
                <p class="desc"><?php
                            echo $climate->list[0]->weather[0]->main;
                            ?></p>
            </div>

            <div class="dayF">
                <p class="date"><?php
                                echo date('D jS, F Y', strtotime($climate->list[23]->dt_txt),);
                                ?></p>
                <p><?php echo $climate->list[23]->main->temp . " °C"; ?></p>
                <p class="desc"><?php
                            echo $climate->list[0]->weather[0]->main;
                            ?></p>
            </div>

            <div class="dayF">
                <p class="date"><?php
                                echo date('D jS, F Y', strtotime($climate->list[31]->dt_txt),);
                                ?></p>
                <p><?php echo $climate->list[31]->main->temp . " °C"; ?></p>
                <p class="desc"><?php
                            echo $climate->list[0]->weather[0]->main;
                            ?></p>
            </div>
            
            <div class="dayF">
                <p class="date"><?php
                                echo date('D jS, F Y', strtotime($climate->list[39]->dt_txt),);
                                ?></p>
                <p><?php echo $climate->list[39]->main->temp . " °C"; ?></p>
                <p class="desc"><?php
                            echo $climate->list[0]->weather[0]->main;
                            ?></p>
            </div>
        </div>
    </div>
</body>
</html>
