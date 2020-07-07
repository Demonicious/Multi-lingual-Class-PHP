<?php
    require_once "language/manager.php";

    $Language->SetLanguage('spanish');
    $Language->LoadVariables('greetings');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $Language->Var('hello_word') ?> Dev.to</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }

        body {
            background: rgb(100,74,171);
            background: linear-gradient(135deg, rgba(100,74,171,1) 30%, rgba(19,64,98,1) 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100vw;
            color: black;
            font-family: Sen;
        }

        .main {
            background: #e4e4e4;
            padding: 15px 30px;
            border-radius: 5px;
        }

        .title {
            font-size: 1.5rem;
            font-weight: 600;
        }

        p { margin-top: 15px; }
    </style>
</head>
<body>
    <div class="main">
        <span class="title"><?php echo $Language->Var('hello_word') ?> Dev.to</span>
        <p><?php echo $Language->Var('how_are_you_sentence') ?></p>
    </div>
</body>
</html>