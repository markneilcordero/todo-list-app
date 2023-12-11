<!Doctype html>
<html lang="en">
<head>
<title>{{ $title }}</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ asset('bootstrap-5.3.2-dist/css/bootstrap.min.css') }}">
<script src="{{ asset('bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('jquery-3.7.1.js') }}"></script>
<link rel="stylesheet" href="{{ asset('jquery-ui-1.13.2.custom/jquery-ui.css') }}">
<script src="{{ asset('jquery-ui-1.13.2.custom/jquery-ui.js') }}"></script>
@stack('scripts')
</head>
<body>

<div class="container">
    {{ $slot }}
</div>

</body>
</html>