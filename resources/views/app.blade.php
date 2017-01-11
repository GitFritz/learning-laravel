<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>l5todo</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>

<div id="container" class="content">

    @include('flash::message')

    @yield('content')

</div>

<div id="footer">
    @yield('footer')
</div>

<script src="//code.jquery.com/jquery.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


<script>
$('div.alert').not('.alert-important').delay(3000).slideUp();
</script>
</body>
</html>