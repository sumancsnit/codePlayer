<!DOCTYPE html>
<!--sumancsnit@gmail.com-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Player</title>
    <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">

    <style type="text/css">
        body {
            font-family: 'Roboto', sans-serif;
            padding: 0;
            margin: 0;
        }
        
        #header {
            width: 100%;
            height: 30px;
            background-color: #eeeeee;
            padding: 5px;
        }
        
        #logo {
            float: left;
            font-weight: bold;
            font-size: 120%;
            padding: 3px 5px;
        }
        
        #buttonContainer {
            width: 237px;
            margin: 0 auto;
        }
        
        .toggleButton {
            float: left;
            border: 1px solid grey;
            padding: 7px;
            border-right: none;
            font-size: 90%;
        }
        
        #html {
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }
        
        #output {
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            border-right: 1px solid grey;
        }
        
        .active {
            background-color: #EBF2FB;
        }
        
        .highlightedButton {
            background-color: grey;
        }
        
        textarea {
            width: 50%;
            resize: none;
            border-top: none;
            border-bottom: none;
            border-color: gray;
        }
        
        .panel {
            float: left;
            border-left: none;
        }
        
        iframe {
            border: none;
        }
        
        .hidden {
            display: none;
        }
    </style>

</head>

<body>

    <div id="header">

        <div id="logo">
            SUMAN IT - Code Player
        </div>

        <div id="buttonContainer">
            <div class="toggleButton active" id="html">HTML</div>

            <div class="toggleButton" id="css">CSS</div>

            <div class="toggleButton" id="javascript">Javascript</div>

            <div class="toggleButton active" id="output">Output</div>


        </div>

    </div>

    <div id="bodyContainer">
        <textarea id="htmlPanel" class="panel"> <p> Hello Suman! </p> </textarea>
        <textarea id="cssPanel" class="panel hidden">p { color: green; }</textarea>
        <textarea id="javascriptPanel" class="panel hidden">alert</textarea>

        <iframe id="outputPanel" class="panel" src="" frameborder="1"></iframe>
    </div>



    <script type="text/javascript">
        function updateOutput() {
            $("iframe").contents().find("html").html("<html><head><style type='text/css'>" + $("#cssPanel").val() + "</style></head><body>" + $("#htmlPanel").val() + "</body></html>");

            document.getElementById("outputPanel").contentWindow.eval($("#javascriptPanel").val());
        }


        $(".toggleButton").hover(function() {
            $(this).addClass("highlightedButton");
        }, function() {
            $(this).removeClass("highlightedButton");
        });

        $(".toggleButton").click(function() {
            $(this).toggleClass("active");
            $(this).removeClass("highlightedButton");

            var panelId = $(this).attr("id") + "Panel";

            $("#" + panelId).toggleClass("hidden");

            var numberOfActivePanels = 4 - $('.hidden').length;

            $(".panel").width(($(window).width() / numberOfActivePanels) - 5);


        })

        $(".panel").height($(window).height() - $("#header").height() - 16);

        $(".panel").width(($(window).width() / 2) - 5);

        updateOutput();

        $("textarea").on('change keyup paste', function() {
            updateOutput();
        });
    </script>

</body>

</html>