<html>
    <head>
        <title>HTML Calculator</title>
        <script type="text/javascript" src="jquery.js"></script>
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-3">
                <div id="display" class="row jumbotron">
                    <center>
                        <h3> 
                            <div id="history"></div>
                        </h3> 
                        <br>
                        <h1> 
                            <div id="content"></div>
                        </h1>    
                    </center> 
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <input type="button" id="number1" class="zein-button number" value="1">  
                    </div>
                    <div class="col-md-3">
                        <input type="button" id="number2" class="zein-button number" value="2">  
                    </div>
                    <div class="col-md-3">
                        <input type="button" id="number3" class="zein-button number" value="3">  
                    </div>
                    <div class="col-md-3">
                        <input type="button" id="addition" class="zein-button operation" value="+">   
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <input type="button" id="number4" class="zein-button number" value="4">  
                    </div>
                    <div class="col-md-3">
                        <input type="button" id="number5" class="zein-button number" value="5">  
                    </div>
                    <div class="col-md-3">
                        <input type="button" id="number6" class="zein-button number" value="6">  
                    </div>
                    <div class="col-md-3">
                        <input type="button" id="subtraction" class="zein-button operation" value="-">   
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <input type="button" id="number7" class="zein-button number" value="7">  
                    </div>
                    <div class="col-md-3">
                        <input type="button" id="number8" class="zein-button number" value="8">  
                    </div>
                    <div class="col-md-3">
                        <input type="button" id="number9" class="zein-button number" value="9">  
                    </div>
                    <div class="col-md-3">
                        <input type="button" id="multiplication" class="zein-button operation" value="x">   
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <input type="button" id="number0" class="zein-button number" value="0">  
                    </div>
                    <div class="col-md-3">
                        <input type="button" id="decimal" class="zein-button" value=".">
                    </div>
                    <div class="col-md-3">
                        <input type="button" id="equal" class="zein-button operation" value="="> 
                    </div>
                    <div class="col-md-3">
                        <input type="button" id="division" class="zein-button operation" value="&#247">   
                    </div>
                </div>
            </div>
            <div class="col-md-8"></div>
        </div>
    </body>
</html>
<script>
    var lastClicked = "";
    var initialState = true;
    var operands = [];
    var operations = [];
    jQuery("#content").text("0");
    jQuery(document).on("click", ".number", function () {
        if (initialState) {
            jQuery("#content").text("");
        }
        var clickedButton = jQuery(this).attr("value");
        var displayContent = jQuery("#content").text();
        if (lastClicked === "operation") {
            displayContent = "";
        }
        jQuery("#content").text(displayContent + clickedButton);
        lastClicked = "number";
        initialState = false;
    });
    jQuery(document).on("click", ".operation", function () {
        if (lastClicked !== "") {
            if (initialState) {
                jQuery("#content").text("");
            }
            var clickedButton = jQuery(this).attr("id");
            var displayContent = jQuery("#content").text();
            if (lastClicked !== "operation") {
                operands.push(displayContent);
                operations.push(clickedButton);
            } else {
                changeLastOperation(clickedButton);
            }
            computeResult();
            if (clickedButton === "equal") {
                //computeResult();
            }
            lastClicked = "operation";
            initialState = false;
        }
    });
    function displayHistory() {
        var historyContent = "";
        var operation;
        for (var i = 0; i < operands.length; i++) {
            if (operations[i] === "addition") {
                operation = "+";
            } else if (operations[i] === "subtraction") {
                operation = "-";
            } else if (operations[i] === "multiplication") {
                operation = "x";
            } else if (operations[i] === "division") {
                operation = "/";
            } else if (operations[i] === "equal") {
                operation = "=";
            }
            historyContent = historyContent + operands[i] + operation;
        }
        jQuery("#history").text(historyContent);
    }
    function computeResult() {
        var historyContent = "";
        var operation, result;
        for (var i = 0; i < operations.length; i++) {
            if (i === 0) {
                if (operations[i] === "addition") {
                    operation = "+";
                    result = Number(operands[i]) + Number(operands[i + 1]);
                }
                if (operations[i] === "subtraction") {
                    operation = "-";
                    result = Number(operands[i]) - Number(operands[i + 1]);
                }
                if (operations[i] === "multiplication") {
                    operation = "x";
                    result = Number(operands[i]) * Number(operands[i + 1]);
                }
                if (operations[i] === "division") {
                    operation = "/";
                    result = Number(operands[i]) / Number(operands[i + 1]);
                }
                historyContent = historyContent + operands[i];
            } else {
                if (operations[i] === "addition") {
                    operation = "+";
                    result = result + Number(operands[i + 1]);
                }
                if (operations[i] === "subtraction") {
                    operation = "-";
                    result = result - Number(operands[i + 1]);
                }
                if (operations[i] === "multiplication") {
                    operation = "x";
                    result = result * Number(operands[i + 1]);
                }
                if (operations[i] === "division") {
                    operation = "/";
                    result = result / Number(operands[i + 1]);
                }
                historyContent = historyContent + operation + operands[i];
            }
        }
        console.log(result);
        jQuery("#content").text(result);
        jQuery("#history").text(historyContent);
    }
    function changeLastOperation(operation) {
        if (operations.length > 0) {
            operations[operations.length - 1] = operation;
        }
    }
    function htmlEntities(str) {
        return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    }
</script>