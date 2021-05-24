<html>

<head>
    <script src="jquery-3.4.1.js"></script>
    <style>
        body {
            background-color: #121212;
        }

        
    </style>
</head>

<body>
    <?php
    $friend2 = $_GET["friend2"];
    setcookie('friend', $friend2, time() + 86400);
    ?>

    <div id="messages"></div>

    <input id="chatbox" name="chat">
    <button onclick="send()" id="sendbtn">SEND</button>




    <script>
        var t = setInterval(show, 1000);

        function show() {
            $.ajax({
                url: 'show.php',
                type: 'post',
                success: function(data) {
                    $("#messages").html(data);
                }
            });
            document.getElementByTagName("body").scrollIntoView(false);

        }


        function send() {


            if ($("#chatbox").val() != "") {
                var txt = $("#chatbox").val();




                $.ajax({

                    url: 'send.php',
                    type: "post",
                    data: {
                        'chatbox': txt
                    }

                });
            }
        }
    </script>
</body>

</html>