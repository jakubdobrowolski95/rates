<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Kursy walut</title>

        <!-- Scripts -->
        <script src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <script type="text/javascript">

          google.charts.load('current', {'packages':['corechart']});

          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
            var jsonData = $.ajax({
                url: "http://85.255.5.9:8000/get_usd/1",
                dataType: "array",
                async: false
                }).responseText;

            console.log(jsonData);

            var data = new google.visualization.arrayToDataTable(jsonData);
            data.addColumn('string', 'data');
            data.addColumn('number', 'kurs');

            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, {width: 800, height: 400});
          }

        </script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 28px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Kursy EUR za wybrany okres
                </div>

                <div id="chart_div"></div>

                <div class="links">
                    <a href="/show_eur/1">1 miesiąc</a>
                    <a href="/show_eur/2">2 miesiące</a>
                    <a href="/show_eur/3">3 miesiące</a>
                </div>
                <br/>
                <div class="links">
                    <a href="/">Powrót</a>
                </div>
            </div>
        </div>
    </body>
</html>
