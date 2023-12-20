<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title inertia>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="https://i.pinimg.com/originals/ca/5b/a7/ca5ba7d121989a03a9e22518a3ccaab1.png" type="image/x-icon">
    @vite('resources/js/app.js') @inertiaHead
  </head>
  <body class="font-sans antialiased">
    @inertia
  </body>
</html>