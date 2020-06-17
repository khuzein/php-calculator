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
            <div class="col-md-5 zein-column">
                <div class="row">
                    <div class="col-md-12 zein-column">
                        <input type="button" id="history" class="btn-block display">  
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 zein-column">
                        <input type="button" id="content" class="btn-block display">  
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 zein-column">
                        <input type="button" id="number1" class="zein-button btn-block number" value="1">  
                    </div>
                    <div class="col-md-3 zein-column">
                        <input type="button" id="number2" class="zein-button btn-block number" value="2">  
                    </div>
                    <div class="col-md-3 zein-column">
                        <input type="button" id="number3" class="zein-button btn-block number" value="3">  
                    </div>
                    <div class="col-md-3 zein-column">
                        <input type="button" id="addition" class="zein-button btn-block operation" value="+">   
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 zein-column">
                        <input type="button" id="number4" class="zein-button btn-block number" value="4">  
                    </div>
                    <div class="col-md-3 zein-column">
                        <input type="button" id="number5" class="zein-button btn-block number" value="5">  
                    </div>
                    <div class="col-md-3 zein-column">
                        <input type="button" id="number6" class="zein-button btn-block number" value="6">  
                    </div>
                    <div class="col-md-3 zein-column">
                        <input type="button" id="subtraction" class="zein-button btn-block operation" value="-">   
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 zein-column">
                        <input type="button" id="number7" class="zein-button btn-block number" value="7">  
                    </div>
                    <div class="col-md-3 zein-column">
                        <input type="button" id="number8" class="zein-button btn-block number" value="8">  
                    </div>
                    <div class="col-md-3 zein-column">
                        <input type="button" id="number9" class="zein-button btn-block number" value="9">  
                    </div>
                    <div class="col-md-3 zein-column">
                        <input type="button" id="multiplication" class="zein-button btn-block operation" value="x">   
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 zein-column">
                        <input type="button" id="number0" class="zein-button btn-block number" value="0">  
                    </div>
                    <div class="col-md-3 zein-column">
                        <input type="button" id="decimal" class="zein-button btn-block" value=".">
                    </div>
                    <div class="col-md-3 zein-column">
                        <input type="button" id="equal" class="zein-button btn-block operation" value="="> 
                    </div>
                    <div class="col-md-3 zein-column">
                        <input type="button" id="division" class="zein-button btn-block operation" value="&#247">   
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 zein-column">
                        <input type="button" id="reset" class="zein-button btn-block" value="C">  
                    </div>
                </div>
            </div>
            <div class="col-md-6"></div>
        </div>
    </body>
</html>
<script>
    var lastClicked = "";
    var initialState = true;
    var decimalMode = false;
    var operands = [];
    var operations = [];
    jQuery("#content").val("0");
    jQuery(document).on("click", "#reset", function () {
        jQuery("#content").val("0");
        jQuery("#history").val("");
        operands = [];
        operations = [];

    });
    jQuery(document).on("click", "#decimal", function () {
        if (lastClicked === "number" && !decimalMode) {
            var clickedButton = jQuery(this).attr("value");
            var displayContent = jQuery("#content").val();
            jQuery("#content").val(displayContent + clickedButton);
            lastClicked = "decimal";
            decimalMode = true;
        }
    });
    jQuery(document).on("click", ".number", function () {
        if (initialState) {
            jQuery("#content").val("");
        }
        var clickedButton = jQuery(this).attr("value");
        var displayContent = jQuery("#content").val();
        if (lastClicked === "operation") {
            displayContent = "";
        }
        jQuery("#content").val(displayContent + clickedButton);
        lastClicked = "number";
        initialState = false;
    });
    jQuery(document).on("click", ".operation", function () {
        if (lastClicked !== "") {
            if (initialState) {
                jQuery("#content").val("");
            }
            var clickedButton = jQuery(this).attr("id");
            var displayContent = jQuery("#content").val();
            if (lastClicked !== "operation") {
                operands.push(displayContent);
                operations.push(clickedButton);
            } else {
                changeLastOperation(clickedButton);
            }
            console.log(operations);
            console.log(operands);
            computeResult();
            lastClicked = "operation";
            initialState = false;
            decimalMode = false;
        }
    });
    function computeResult() {
        var historyContent = "";
        var operation, result;
        for (var i = 0; i < operations.length; i++) {
            if (i === 0) {
                if (operations[i] === "addition") {
                    operation = "+";
                    result = Number(operands[i]);
                }
                if (operations[i] === "subtraction") {
                    operation = "-";
                    result = Number(operands[i]);
                }
                if (operations[i] === "multiplication") {
                    operation = "x";
                    result = Number(operands[i]);
                }
                if (operations[i] === "division") {
                    operation = "/";
                    result = Number(operands[i]);
                }
                historyContent = operands[i];
            } else {
                if (operations[i - 1] === "addition") {
                    operation = "+";
                    result = result + Number(operands[i]);
                }
                if (operations[i - 1] === "subtraction") {
                    operation = "-";
                    result = result - Number(operands[i]);
                }
                if (operations[i - 1] === "multiplication") {
                    operation = "x";
                    result = result * Number(operands[i]);
                }
                if (operations[i - 1] === "division") {
                    operation = "/";
                    result = result / Number(operands[i]);
                }
                historyContent = historyContent + operation + operands[i];
            }
        }
        jQuery("#content").val(result);
        jQuery("#history").val(historyContent);
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