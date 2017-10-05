<!DOCTYPE html>

<html>  
    <head>
        <meta charset="UTF-8">
        <title></title>
       <!-- <link href="./deps/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css"/> -->
        <script src="deps/jquery/jquery-3.1.1.js" type="text/javascript"></script>
        <script src="js/main.js" type="text/javascript"></script>
         <style>
            .eis-team-container{
                width: 90%;
                margin-left: auto;
                margin-right: auto;
                text-align: center;
            }
            h1{
                text-align: center;
            }

            .eis-team-profile{
                width: 25%;
                position: relative;
                display: inline-block;
                /*float: left;*/
                /* background-color: darkgray; */
                /* height: 600px; */
                color: #8a0b0b;
                border: 1px black solid;
                text-align: center;
                padding: 12px;
                margin: 10px;
                box-sizing: border-box;
                margin-left: auto;
                margin-right: auto;
                padding: 25px;
                box-sizing: border-box;
            }
            .eis-team-profile img{
                border-radius:50%;
                position: relative;
                display: block;
                /*text-align:center;*/
                width : 160px;
                height: 160px;
                margin-left: auto;
                margin-right: auto;
            }
            
            @media screen and (max-width:760px){
                .eis-team-profile{
                    width : 50%;
                    text-align: center;
                    margin-left: auto;
                    margin-right: auto;
                }

            }

            @media screen and (max-width:480px){
                .eis-team-profile{
                    width : 90%;
                    text-align: center;
                    margin-left: auto;
                    margin-right: auto;
                }

            }          
        </style>
    </head>
    <body onload="LoadMembers()">
        <h1> EIS Team </h1>
        <?php
          include_once './upload-pic.php';
          ?>
        <div id='output'>

        </div>
<!--Bilal Wani-->
<!--Baramulla -->

        <script>
            DisplayMembers();
        </script>
    </body>
</html>
