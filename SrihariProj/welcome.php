<html>

<head>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #121212;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        .main-container {
            display: grid;
            height: 100%;
            grid-template-rows: 50% 0 50%;
            justify-content: center;
        }

        #welcome {
            color: white;
            align-self: flex-end;
            padding-bottom: 10px;
            font-size: 75px;
            text-align: center;
            transition: all .5s;
        }


        .btns {
            padding-top: 10px;
            align-self: flex-start;
            text-align: center;
        }

        .btns button {
            padding: 12px 20px;
            border-radius: 30px;
            border: none;
            text-align: center;
            margin: 10px;
            color: #121212;
            background: none;
            transition: .5s;
        }

        .btns button:hover{
            padding: 12px 30px;
        }
        .form-container {
            height: 550px;
            width: 400px;
            background: white;
            display: none;
        }

        #signup,
        #login {
            display: none;
            width: 100%;
            background-color: white;
            color: black;
            font-size: 20px;
        }

        form {
            width: 50%;
            display: flex;
            margin: auto;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }

        input[type="text"],input[type="password"] {
            width: 200px;
            border-radius: 3px;
            border: 1px solid;
            margin-bottom: 15px;
            padding: 7px 10px;
        }

        .tag {
            align-self: center;
            margin-bottom: 20px;
        }

        .label {
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }

        .radio{
            display: flex;
            column-gap: 15px;
            margin-bottom: 15px;
        }

        .radio input{
            align-self: center;
        }
        button[type="submit"] {
            padding: 10px;
            color: white;
            background: #121212;
            margin: auto;
            border: none;
        }

        .btn{
            margin: auto;
        }

        .btn a{
            text-decoration: none;
            color: white;
        }
        
    </style>
    <script src="./jquery-3.4.1.js"></script>
</head>

<body>
    <div class="main-container">
        <div id="welcome">WELCOME TO DARKCHAT</div>
        <div class="form-container">
            <div id="signup">
                <form method="POST" action="signup.php">
                    <div class="tag">
                        <h1>SIGNUP</h1>
                    </div>
                    <div class="uname">
                        <div class="label">USERNAME</div>
                        <input type="text" name="user">
                    </div>
                    <div class="pass">
                        <div class="label">PASSWORD</div>
                        <input type="password" name="pass">
                    </div>
                    <div class="gender">
                        <div class="label">GENDER</div>
                        <div class="radio">
                            <span>MALE</span>
                            <input type="radio" name="gender" value="M">
                            <span>FEMALE</span>
                            <input type="radio" name="gender" value="F">
                        </div>
                    </div>
                    <div class="contact">
                        <div class="label">CONTACT</div>
                        <input type="text" name="contact">
                    </div>
                    <div class="btn">
                        <button type="submit">SIGNUP</button>
                        <button type="submit"><a href="welcome.php">CANCEL</a></button>
                    </div>
                </form>
            </div>
            <div id="login">
                    <form method="POST" action="login.php">
                        <div class="tag"><h1>LOGIN</h2></div>
                        <div class="uname">
                            <div class="label">USERNAME</div>
                            <input type="text" name="loginname">
                        </div>
                        <div class="pass">
                            <div class="label">PASSWORD</div>
                            <input type="password" name="loginpass">
                        </div>
                        <div class="btn">
                            <button type="submit">LOGIN</button>
                            <button type="submit"><a href="welcome.php">CANCEL</a></button>
                        </div>
                </form>
            </div>
        </div>
        <div class="btns">
            <button onclick="signup()" id="signbutton">SIGNUP</button>
            <button onclick="login()" id="loginbutton">LOGIN</button>
        </div>
    </div>
    <script>
        var sign = 0;
        var log = 0;

        function signup() {
            if (sign == 0) {
                $("#signup").css("display", "block");
                $("#welcome").css("display", "none");
                $("#login").css("display", "none");
                $(".btns").css("display", "none");
                $(".main-container").css({
                    "grid-template-rows": "100%",
                    "justify-content": "center",
                    "align-content": "center"
                });
                $(".form-container").css({
                    "display": "flex",
                    "justify-content": "center",
                    "align-items": "center",
                    "margin": "auto"
                });
                sign = 1;

                log = 0;

            } else {
                document.getElementById("signup").style.display = "none";
                document.getElementById("welcome").style.display = "block";

                sign = 0;
            }

        }

        function login() {
            if (log == 0) {
                document.getElementById("login").style.display = "block";
                document.getElementById("welcome").style.display = "none";
                document.getElementById("signup").style.display = "none";
                $(".btns").css("display", "none");
                $(".main-container").css({
                    "grid-template-rows": "100%",
                    "justify-content": "center",
                    "align-content": "center"
                });
                $(".form-container").css({
                    "display": "flex",
                    "justify-content": "center",
                    "align-items": "center",
                    "margin": "auto"
                });
                log = 1;
                sign = 0;
            } else {
                document.getElementById("login").style.display = "none";
                document.getElementById("welcome").style.display = "block";

                log = 0;
            }

        }

        $("#welcome").on("mouseover", () => {
            $("#welcome").css("letter-spacing", "10px");
            $(".btns button").css("background", "white");
        });

        $("#welcome").on("mouseout", () => {
            $("#welcome").css("letter-spacing", "0px");
        });
    </script>

</body>

</html>