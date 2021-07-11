<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@tailwindcss">
<meta name="twitter:title" content="{{ $setting && $setting->site_title ? $setting->site_title : "Simple Blog For Personal Use"  }}">
<meta name="twitter:description" content="{{ $setting && $setting->site_description ? $setting->site_description : "Simple Blog For Personal Use"  }}">
<meta name="twitter:image" content="{{ $setting && $setting->logoUrl() ? $setting->logoUrl() : '#' }}">
<meta name="twitter:creator" content="@">

<meta property="og:url" content="{{ route('home') }}">
<meta property="og:type" content="blog">
<meta property="og:title" content="{{ $setting && $setting->site_title ? $setting->site_title : "Simple Blog For Personal Use"  }}">
<meta property="og:description" content="{{ $setting && $setting->site_description ? $setting->site_description : "Simple Blog For Personal Use"  }}">
<meta property="og:image" content="{{ $setting && $setting->logoUrl() ? $setting->logoUrl() : '#' }}">

<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="google-site-verification" content="{{ $setting && $setting->google_site_verification_code ? $setting->google_site_verification_code : "" }}" />

<meta property="description" content="{{ $setting && $setting->site_description ? $setting->site_description : "Simple Blog For Personal Use"  }}">
<title>
    {{ $setting && $setting->site_title ? $setting->site_title : "Simple Blog"  }}
</title>
