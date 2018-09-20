<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Rest</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            padding-top: 25px;
        }
        .form-control {
            border-color: blue;
        }

        label {
            font-weight: bolder;
        }
    </style>
</head>

<body>
    <div class="container" id="app">
        <div class="col-md-12">
            <form action="{{ route('dialogflow') }}" method="post" id="requestForm" autocomplete="off">
                <div class="form-group">
                    <label for="_request">Petición:</label>
                    <input type="text" name="_request" class="form-control">

                </div>

                <div class="form-group">
                    <label for="_response">Respuesta:</label>
                    <textarea type="text" rows="15" class="form-control responseText" disabled></textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-submit">Enviar</button>
                <button data-url="{{ route('ironio') }}" class="btn btn-dark btn-iron">Iron.io</button>
                <button type="reset" class="btn btn-secondary">Restablecer</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btn-submit').click(function (e) {
                e.preventDefault();
                var action = $('#requestForm').attr('action');
                var data = $('#requestForm').serialize();

                $.post(action, data, function (response) {
                    var response = response.result.fulfillment.speech;
                    $('.responseText').val(response);
                });
            });

            $('.btn-iron').click(function (e) {
                e.preventDefault();
                var action = $(this).attr('data-url');
                var msg = $('.responseText').val();

                $.post(action, {
                    message: msg
                }, function (response) {
                    console.log(response);
                });
            });
        })

    </script>
</body>

</html>
