<?php declare(strict_types=1);

    namespace App;

    require __DIR__. '/../vendor/autoload.php';

    use App\Greeter;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Sandbox</title>
</head>
<body>
<?php
    $greeter = new Greeter();
?>
<h1><?php echo $greeter->greet('VonTrotta');?></h1>
</body>
</html>
