<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    @include('backends.layouts.header')
    <!-- Section Hero -->
    @yield('content')

    @include('backends.layouts.footer')

    <form id="delete-form" action="" method="post">
        @csrf
        <input id="method" type="hidden" name="_method" value="DELETE">
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).on("click",".delete-row", function(e){
            e.preventDefault();
            // if(confirm("Are You Sure?")){
                let confirmStr = "Are You Sure?"
                if($(this).attr("data-confirm")){
                    confirmStr = $(this).attr("data-confirm");
                }
            if(confirm(confirmStr)){
                let href = $(this).attr("href");
                $("#delete-form").attr("action", href);
                $("#delete-form").submit();
            }
        })
    </script>
</body>

</html>
