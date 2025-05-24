<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="bg-brand-900 flex justify-between items-center space-x-4 p-4">
        <div class="text-brand-500 flex items-center">
            <img src="logo.png" alt="logo" class="size-16">
            <div>WHY?</div>
        </div>
        <div class="flex-1 h-full">
            <form action="#">
                <input type="text" class="bg-white rounded-full w-full">
            </form>
        </div>
        <div>
            profile
        </div>
    </nav>
</body>
</html>
