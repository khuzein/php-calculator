<html>
    <head>
        <title>HTML Calculator</title>
        <script type="text/javascript" src="jquery.js"></script>
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div  class="row" id="inputs">
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-1">
                        <input type="button" id="number1" class="zein-button number" value="1">  
                    </div>
                    <div class="col-md-1">
                        <input type="button" id="number2" class="zein-button number" value="2">  
                    </div>
                    <div class="col-md-1">
                        <input type="button" id="number3" class="zein-button number" value="3">  
                    </div>
                    <div class="col-md-1">
                        <input type="button" id="addition" class="zein-button operation" value="+">   
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1">
                        <input type="button" id="number4" class="zein-button number" value="4">  
                    </div>
                    <div class="col-md-1">
                        <input type="button" id="number5" class="zein-button number" value="5">  
                    </div>
                    <div class="col-md-1">
                        <input type="button" id="number6" class="zein-button number" value="6">  
                    </div>
                    <div class="col-md-1">
                        <input type="button" id="subtraction" class="zein-button operation" value="-">   
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1">
                        <input type="button" id="number7" class="zein-button number" value="7">  
                    </div>
                    <div class="col-md-1">
                        <input type="button" id="number8" class="zein-button number" value="8">  
                    </div>
                    <div class="col-md-1">
                        <input type="button" id="number9" class="zein-button number" value="9">  
                    </div>
                    <div class="col-md-1">
                        <input type="button" id="multiplication" class="zein-button operation" value="x">   
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1">
                        <input type="button" id="number0" class="zein-button number" value="0">  
                    </div>
                    <div class="col-md-1">
                        <input type="button" id="decimal" class="zein-button" value=".">
                    </div>
                    <div class="col-md-1">
                        <input type="button" id="equal" class="zein-button operation" value="="> 
                    </div>
                    <div class="col-md-1">
                        <input type="button" id="division" class="zein-button operation" value="&#247">   
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="output">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div id="display" class="jumbotron">
                    <center>
                        <h1> 
                            <div id="content"></div>
                        </h1>    
                    </center> 
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </body>
</html>
<script>
    var result = 0;
    jQuery(document).on("click", ".number", function () {
        var clickedButton = jQuery(this).attr("value");
        var displayContent = jQuery("#content").text();
        jQuery("#content").text(displayContent + clickedButton);
    });
    jQuery(document).on("click", ".operation", function () {
        var clickedButton = jQuery(this).attr("id");
        var displayContent = jQuery("#content").text();
        if (clickedButton === "addition") {
            result = parseInt(result) + parseInt(displayContent);
            jQuery("#content").text(result);
        } else if (clickedButton === "subtraction") {

        } else if (clickedButton === "multiplication") {

        } else if (clickedButton === "division") {

        } else if (clickedButton === "equal") {

        } else {

        }
    });
</script>