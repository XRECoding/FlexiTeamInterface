<script>

    // The function "addForms" updates the color and text of form elements, such as oval, square,
    // octagon, and a progress bar, based on a clicked node and workflow. It retrieves the color
    // from the clicked node, applies it to the elements, adjusts the progress bar text accordingly,
    // and invokes the "addLines" function.
    function addForms(clickedNode, workflow) {
        const nodeColore = clickedNode.data.color;

        // Change color and text of the forms to reflect the status of the given node
        var ovalElement = document.getElementById('oval');
        ovalElement.style.backgroundColor = nodeColore;
        ovalElement.textContent = clickedNode.data.text;;

        var squareElement = document.getElementById('square');
        squareElement.style.backgroundColor = nodeColore;
        squareElement.textContent = "Resources";

        var octagonElement = document.getElementById('octagon');
        octagonElement.style.backgroundColor = nodeColore;
        octagonElement.textContent = "Staff";


        // Change color and text of the progressbar to reflect the status of the given node
        var progressBar = document.getElementById("progressBar");
        progressBar.style.backgroundColor = nodeColore;

        switch (nodeColore) {
            case "#DAE8FC":
                document.getElementById("progressBar").innerHTML = "Pre-Surgery"; break;
            case "pink":
                document.getElementById("progressBar").innerHTML = "Surgery"; break;
            default:
            document.getElementById("progressBar").innerHTML = "Post-Surgery";
        }

        addLines(parseInt(clickedNodeId), workflow);
    }

    
    // The function "addLines" adds lines and text to an HTML element based on a given ID and
    // workflow. It searches for a matching object in a data source and generates visual
    // connections between tasks. The code uses conditional statements to generate different
    // line styles and texts based on the presence of the previous and next nodes.
    function addLines(id, workflow) {
        var selectedOptionText = (typeof workflow === 'string') ? workflow : workflow.options[workflow.selectedIndex].text;
        var foundObject = data.find(function(obj) {
            return obj.workflowId === selectedOptionText;
        });


        var befor = foundObject.subTasks[id-2];
        var after = foundObject.subTasks[id-1];
        var divElement = document.getElementById("linesAndText");
        divElement.innerHTML = ''


        if (typeof befor !== 'undefined') {
            divElement.innerHTML += '<div class="lineLeftSmall"></div>';
            divElement.innerHTML += '<span class="text1">'+befor.tasks+'</span>';
        }
        
        if (typeof after !== 'undefined' & !isNaN(parseInt(after.nextTaskId[0]))) {
            if (after.nextTaskId.length === 1) {
                divElement.innerHTML += '<div class="lineRightLong"></div>';
                divElement.innerHTML += '<span class="text2">'+foundObject.subTasks[parseInt(after.nextTaskId[0])-1].tasks+'</span>';
            } else {
                divElement.innerHTML += '<div class="lineRightSmall"></div>';
                divElement.innerHTML += '<div class="lineVerticalRight"></div>';
                divElement.innerHTML += '<div class="lineTopRight"></div>';
                divElement.innerHTML += '<span class="text3">'+foundObject.subTasks[parseInt(after.nextTaskId[0])-1].tasks+'</span>';
                divElement.innerHTML += '<div class="lineBottemRight"></div>';
                divElement.innerHTML += '<span class="text4">'+foundObject.subTasks[parseInt(after.nextTaskId[1])-1].tasks+'</span>';
            }
        }
    }

</script>