<!DOCTYPE html>
<html lang="en">
@props(['title', 'description', 'keywords'])


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$company->name}} | {{ $title }}</title>
    <meta name="description" content="{{ $description ?? 'Default description' }}">
    <meta name="keywords" content="{{ $keywords ?? 'Default keywords' }}">

    <meta property="og:description" content="{{ $description ?? 'Default description' }}">
    <meta property="og:title" content="{{ $title ?? 'Default title' }}">
    <meta property="og:image" content="https://media.licdn.com/dms/image/v2/D5603AQE6ZxsWXzYadQ/profile-displayphoto-scale_100_100/B56ZgNDMMyG4Ao-/0/1752565598310?e=1759363200&v=beta&t=6_RYpWOY3YTYzQLYNsfydg1ReRNFofS8y2ImMuLnVKY">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('frontend/index.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
</head>
<body>

    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v23.0"></script>



    <x-frontend-header />

    <main>
        {{ $slot }}
    </main>

    <footer></footer>
</body>
</html>
