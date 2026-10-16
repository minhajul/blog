@props(['title' => null])

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@minahjcse">
<meta name="twitter:creator" content="@">
<meta property="og:url" content="{{ route('home') }}">
<meta property="og:type" content="blog">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ $title ? $title.' · '.config('app.name') : config('app.name').' · Thoughts, projects & ideas' }}</title>

<link rel="preconnect" href="https://fonts.bunny.net">
<link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
<link href="https://fonts.bunny.net/css?family=geist:400,500,600|geist-mono:400,500|instrument-serif:400i&display=swap" rel="stylesheet" />

@vite(['resources/css/app.css', 'resources/js/app.js'])
