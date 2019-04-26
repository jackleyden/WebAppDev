<!DOCTYPE html>
<html>
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name = "viewport" content="width=device-width, initial-scale=1">
  <link rel = "stylesheet" href = https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css>
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/style3.css">

</head>

<body>
    <div class="container">
        <div class= "row" id="nav">
            <div id= "Ndiv" class="col-sm-2"><a id= "NLink" href="/">Home</a></div>
            <div id= "Ndiv" class="col-sm-2"><a id= "NLink" href="/manufacturers">Manufacturers</a></div>
            <div id= "Ndiv" class="col-sm-2"><a id= "NLink" href="/average">Average ratings</a></div>
            <div id= "Ndiv" class="col-sm-2"><a id= "NLink" href="/documentation">Docs</a></div>
            <div class="col-sm-4">
                <form method="post" action="/search">
                    {{csrf_field()}}
                    <p>
                        <label> Search: </label>
                        <input type="text" name = "name"> <input id = "Search_btn" type="submit" value = "Submit">
                    </p>
                </form>
            </div>
        </div>
        @yield('content')
    </div>
</body>
</html>
