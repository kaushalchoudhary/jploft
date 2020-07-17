<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

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
                font-size: 84px;
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

            <div class="top-right links">


            </div>
            <div class="container">
                <div class="row">
                    <div class="form-group">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="alert alert-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        </div>
                    {{ Form::open(["files" => true]) }}
                    <div class="form-group">
                        <label>Name</label>
                        {{ Form::text("name", null, ["class" => "form-control", "required" => true]) }}
                    </div>
                    <div class="form-group">
                        <label> Email</label>'
                        {{ Form::text("email", null, ["class" => "form-control", 'onblur'=>"duplicateEmail(this)","required" => true]) }}
                    <div class="email_check"></div>
                    </div>
                    <div class="form-group">
                        <label> Password</label>
                        {{ Form::password("password", null, ["class" => "form-control", "required" => true]) }}
                    </div>

                    {{ Form::submit("Submit", ["class" => "btn btn-primary"]) }}
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script type="text/javascript">
    function duplicateEmail(element){
        var email = $(element).val();
        $.ajax({
            type: "POST",
            url: '{{url('checkemail')}}',
            data: {email:email,"_token": "{{ csrf_token() }}"},
            dataType: "json",
            success: function(res) {
                if(res.exists){
                    $('.email_check').html('Email Id Already Exist');
                }else{
                    $('.email_check').html('');
                }
            },
            error: function (jqXHR, exception) {

            }
        });
    }
</script>
    </body>
</html>
