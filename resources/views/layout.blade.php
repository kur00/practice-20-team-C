<!DOCTYPE htmly<html Lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.9"> 
    <title>@yield(section: 'title', default: 'Laravel App')</title>
    <style> 
        body {
            font-family: Arial, sans-serif; line-height: 1.6;
        }
        header, footer {
            background-color: #f4f4f4; 
            padding: 10px;
            text-align: center;
        }
        main {
            margin: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Laravel アプリケーション</h1>
    </header>

    <main>
        @yield (section: 'content')
    </main>

    <footer>
        <p>&copy; 2024 Laravel App</p>
    </footer>
    </body>
</html>
