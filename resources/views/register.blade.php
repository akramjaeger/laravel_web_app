<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarc</title>
    <style>
        /* Reset some default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            font-size: 14px;
            background: #f2f2f2;
        }

        .clearfix:after {
            content: "";
            display: block;
            clear: both;
            visibility: hidden;
            height: 0;
        }

        .form_wrapper {
            background: #fff;
            width: 400px;
            max-width: 100%;
            box-sizing: border-box;
            padding: 25px;
            margin: 8% auto 0;
            position: relative;
            z-index: 1;
            border-top: 5px solid #f5ba1a;
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
            transform-origin: 50% 0%;
            transform: scale3d(1, 1, 1);
            transition: none;
            animation: expand 0.8s 0.6s ease-out forwards;
            opacity: 0;
        }

        h2 {
            font-size: 1.5em;
            line-height: 1.5em;
            margin: 0;
        }

        .title_container {
            text-align: center;
            padding-bottom: 15px;
        }

        h3 {
            font-size: 1.1em;
            font-weight: normal;
            line-height: 1.5em;
            margin: 0;
        }

        label {
            font-size: 12px;
        }

        .row {
            margin: 10px -15px;
        }

        .col_half {
            width: 50%;
            float: left;
        }

        .input_field {
            position: relative;
            
            animation: bounce 0.6s ease-out;
        }

        .input_field > span {
            position: absolute;
            left: 0;
            top: 0;
            color: #333;
            height: 100%;
            border-right: 1px solid #cccccc;
            text-align: center;
            width: 30px;
        }
        .input_fieldt {
            margin-bottom: 20px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px 10px 9px 35px;
            height: 35px;
            border: 1px solid #cccccc;
            box-sizing: border-box;
            outline: none;
            transition: all 0.30s ease-in-out;
        }

        input[type="text"]:hover,
        input[type="email"]:hover,
        input[type="password"]:hover {
            background: #fafafa;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            box-shadow: 0 0 2px 1px rgba(255, 169, 0, 0.5);
            border: 1px solid #f5ba1a;
            background: #fafafa;
        }

        input[type="submit"] {
            background: #f5ba1a;
            height: 35px;
            line-height: 35px;
            width: 100%;
            border: none;
            outline: none;
            cursor: pointer;
            color: #fff;
            font-size: 1.1em;
            margin-bottom: 10px;
            transition: all 0.30s ease-in-out;
        }

        input[type="submit"]:hover {
            background: darken(#f5ba1a, 7%);
        }

        input[type="submit"]:focus {
            background: darken(#f5ba1a, 7%);
        }

        input[type="checkbox"],
        input[type="radio"] {
            border: 0;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        .checkbox_option label {
            margin-right: 1em;
            position: relative;
        }

        .checkbox_option label:before {
            content: "";
            display: inline-block;
            width: 0.5em;
            height: 0.5em;
            margin-right: 0.5em;
            vertical-align: -2px;
            border: 2px solid #cccccc;
            padding: 0.12em;
            background-color: transparent;
            background-clip: content-box;
            transition: all 0.2s ease;
        }

        .checkbox_option label:after {
            border-right: 2px solid #000000;
            border-top: 2px solid #000000;
            content: "";
            height: 20px;
            left: 2px;
            position: absolute;
            top: 7px;
            transform: scaleX(-1) rotate(135deg);
            transform-origin: left top;
            width: 7px;
            display: none;
        }

        .checkbox_option input:hover+label:before {
            border-color: #000000;
        }

        .checkbox_option input:checked+label:before {
            background-color: #000000;
            border-color: #000000;
        }



        .radio_option label {
            margin-right: 1em;
        }

        .radio_option label:before {
            content: "";
            display: inline-block;
            width: 0.5em;
            height: 0.5em;
            margin-right: 0.5em;
            border-radius: 100%;
            vertical-align: -3px;
            border: 2px solid #cccccc;
            padding: 0.15em;
            background-color: transparent;
            background-clip: content-box;
            transition: all 0.2s ease;
        }

        .radio_option input:hover+label:before {
            border-color: #000000;
        }

        .radio_option input:checked+label:before {
            background-color: #000000;
            border-color: #000000;
        }

        .select_option {
            position: relative;
            width: 100%;
        }

        .select_option select {
            display: inline-block;
            width: 100%;
            height: 35px;
            padding: 0px 15px;
            cursor: pointer;
            color: #7b7b7b;
            border: 1px solid #cccccc;
            border-radius: 0;
            background: #fff;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            transition: all 0.2s ease;
        }

        .select_option select:hover,
        .select_option select:focus {
            color: #000000;
            background: #fafafa;
            border-color: #000000;
            outline: none;
        }

        .select_arrow {
            position: absolute;
            top: calc(50% - 4px);
            right: 15px;
            width: 0;
            height: 0;
            pointer-events: none;
            border-width: 8px 5px 0 5px;
            border-style: solid;
            border-color: #7b7b7b transparent transparent transparent;
        }

        .select_option select:hover+.select_arrow,
        .select_option select:focus+.select_arrow {
            border-top-color: #000000;
        }




        @keyframes expand {
            0% {
                transform: scale3d(1, 0, 1);
                opacity: 0;
            }

            25% {
                transform: scale3d(1, 1.2, 1);
            }

            50% {
                transform: scale3d(1, 0.85, 1);
            }

            75% {
                transform: scale3d(1, 1.05, 1);
            }

            100% {
                transform: scale3d(1, 1, 1);
                opacity: 1;
            }
        }

        @keyframes bounce {
            0% {
                transform: translate3d(0, -25px, 0);
                opacity: 0;
            }

            25% {
                transform: translate3d(0, 10px, 0);
            }

            50% {
                transform: translate3d(0, -6px, 0);
            }

            75% {
                transform: translate3d(0, 2px, 0);
            }

            100% {
                transform: translate3d(0, 0, 0);
                opacity: 1;
            }
        }

        @media (max-width: 600px) {
            .form_wrapper .col_half {
                width: 100%;
                float: none;
            }

            .bottom_row .col_half {
                width: 50%;
                float: left;
            }

            .form_container .row .col_half.last {
                border-left: none;
            }

            .remember_me {
                padding-bottom: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="form_wrapper">
        <div class="form_container">
            <div class="title_container">
                <h2>Register Now</h2>
            </div>
            <div class="row clearfix">
                <div class="">
                    <form method="POST" action="{{ route('store') }}">
                        @csrf
                        <div class="input_fieldt">
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                            <input type="text" name="name" placeholder="Full name" />
                        </div>
                        <div style="color: red;">
                            @error('name')
                                {{$message}}
                            @enderror
                        </div>
                        </div>
                        <div class="input_fieldt">
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                            <input type="email" name="email" placeholder="Email"  />
                        </div>
                        <div style="color: red;">
                            @error('email')
                                {{$message}}
                            @enderror
                        </div>
                        </div>
                        <div class="input_fieldt">
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                            <input type="password" name="password" placeholder="Password"  />
                        </div>
                        <div style="color: red;">
                            @error('password')
                                {{$message}}
                            @enderror
                        </div>
                        </div>
                        <div class="input_fieldt">
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                            <input type="password" name="password_confirmation" placeholder="Re-type Password"  />
                        </div>
                        <div style="color: red;">
                            @error('password')
                                {{$message}}
                            @enderror
                        </div>
                        </div>
                        <input class="button" type="submit" value="Register" />
                        <p class="have-account">Already have an account? <a href="/login">Login here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
