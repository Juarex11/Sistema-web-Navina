<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mi Proyecto</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="p-6">

    {{ $slot }}

</body>
</html>