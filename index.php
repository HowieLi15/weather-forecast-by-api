<?php
$weather = '';
$erroe = '';
if($_GET['city']) {

    $urlcontent = file_get_contents('https://samples.openweathermap.org/data/2.5/weather?q=' . $_GET['city'] . ',uk&appid=e957f1f7e4dc7d3ff4f8d4fec8605fbc');

    $weatherarray = json_decode($urlcontent, true);

    $weather = 'The weather in ' . $_GET['city'] . ' is ' . $weatherarray['weather'][0]['description'] . '. ';
    $tempincel = $weatherarray['main']['temp'] - 273;
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>weather</title>
    <style type="text/css">
        html {
            background: url(background.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        body{
            background: none;
        }
        .container{
            text-align: center;
            margin-top: 200px;
            width: 500px;
        }
        h1{
            color: azure;
        }

    </style>
</head>
<body>
<div class="container">

    <h1>What is weather?</h1>

    <form action="index.php">

        <div class="form-group">
            <label for="citytosearch"></label>
            <input type="text" class="form-control" name="city" id="citytosearch" placeholder="e.g. New York">
        </div>

        <div id="weather">
            <?php
                if($weather){
                    echo '<div class="alert alert-success" role="alert">
  '.$weather.'
</div>';
                }
            ?>

        </div>
        <button type="submit" class="btn btn-primary">search</button>
    </form>

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
