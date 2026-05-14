<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    @inertiaHead
    @routes 
    @vite('resources/js/admin.js')

    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">
    <script src="{{ asset('admin/assets/js/config.js') }}"></script>
    <link href="{{ asset('admin/assets/css/vendor.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" id="app-style">
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet">
</head>
<body>

    @inertia

    <script src="{{ asset('admin/assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>

  
</body>
</html>