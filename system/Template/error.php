<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>错误</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        html,
        body {
            height: 100%;
        }

        body {
            color: #eeece0;
            background-color: #003333;
            font-size: 1em;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .error h1 {
            font-size: 1.4em;
            line-height: 2em;
        }
    </style>
</head>

<body>
    <div class="error">
        <h1>错误</h1>
        <p><?php echo $info; ?></p>
    </div>
</body>

</html>
