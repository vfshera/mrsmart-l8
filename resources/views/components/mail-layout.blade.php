<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MrSmart Email</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        p {
            font-size: 28px;
        }

    </style>
</head>

<body>

    <p>MrSmart Cleaning Services</p>

    <br>

    {{ $slot }}

    <br>
    <br>
    &copy; MrSmart Cleaning Services {{ date('Y', time()) }}
</body>

</html>
