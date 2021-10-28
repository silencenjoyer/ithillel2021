<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once('bootstrap.php');

$page = 1;
$offset = 50;

$totalItems = (int) $container
    ->getBattleHistoryLoader()
    ->countHistory()['All'];

$buttons = ceil($totalItems / $offset);

    if (isset($_GET['page'])) {
        if (preg_match('/^\d+$/', $_GET['page'])) {
            if ($_GET['page'] < 0) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }
        } else {
            echo 'Некорректное значение';
        }
    }
if ($offset * $page > $totalItems) {
    $page = $buttons;
}

if ($totalItems - $offset >= 0) {
    $history = $container->getBattleHistoryLoader()
        ->loadHistory($offset * $page - $offset, $offset * $page);
} else if ($totalItems - $offset * $page <= 0) {
    $history = $container->getBattleHistoryLoader()
        ->loadHistory($offset * $page - $offset, $totalItems);
}
$itemsNumber = $offset * $page - $offset + 1;

?>

<html lang="ru">
    <head>
        <meta charset="utf-8">
           <meta http-equiv="X-UA-Compatible" content="IE=edge">
           <meta name="viewport" content="width=device-width, initial-scale=1">
           <title>Космическая битва1</title>

           <!-- Bootstrap -->
           <link href="css/bootstrap.min.css" rel="stylesheet">
           <link href="css/style.css" rel="stylesheet">
           <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

           <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
           <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
           <!--[if lt IE 9]>
             <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
             <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
           <![endif]-->
    </head>
    <body>
    <ul class="nav nav-tabs">
        <li role="presentation"><a href="index.php">К бою!</a></li>
        <li role="presentation" class="active"><a href="#">История боёв</a></li>
    </ul>
        <div class="container">
            <h1 class="text-center">История боёв</h1>
            <table class="table">
                <tr>
                    <td>№</td> 
                    <td>Сторона 1</td>
                    <td>Колличество</td>
                    <td>Осталось здоровья</td>
                    <td>Сторона 2</td>
                    <td>Колличество</td>
                    <td>Осталось здоровья</td>
                    <td>Победитель</td>
                    <td>Время</td>
                </tr>
                <?php 

                foreach ($history as $item) : ?>
                <tr>
                    <td class="info"><?php echo $itemsNumber++;?></td>
                    <td class="primary"><?php echo $item->getShip1()->getName();?></td>
                    <td class="info"><?php echo $item->getQuantShip1();?></td>
                    <td class="Primary"><?php echo $item->getWinnerHealth();?></td>
                    <td class="info"><?php echo $item->getShip2()->getName();?></td>
                    <td class="Primary"><?php echo $item->getQuantShip2();?></td>
                    <td class="info"><?php echo $item->getLooserHealth();?></td>
                    <td class="Primary"><?php echo $item->getWinningShip() !== null ? $item->getWinningShip()->getName() : 'Ничья';?></td>
                    <td class="info"><?php echo $item->getTime();?></td>
                </tr>
                <?php endforeach; ?>
            </table>

            <form action="" method="get" class="text-center">
                <?php
                for ($i = 1; $i <= $buttons; $i++) : ?>
                    <input class="btn btn-default" type="submit" name="page" value="<?php echo $i;?>">
                <?php endfor; ?>
                
            </form>
        </div>
    </body>