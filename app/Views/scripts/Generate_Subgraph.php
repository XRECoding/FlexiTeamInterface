<script>

    function addForms(clickedNode, workflow) {
        const nodeColore = clickedNode.data.color;
        const nodeText = clickedNode.data.text;

        var ovalElement = document.querySelector('.oval');
        ovalElement.style.backgroundColor = nodeColore;
        var ovalElement = document.querySelector('.shape');
        ovalElement.style.backgroundColor = nodeColore;
        var ovalElement = document.querySelector('.octagon');
        
        ovalElement.style.backgroundColor = nodeColore;

        // Get the reference to the div element
        var progressBar = document.getElementById("progressBar");

        // Change the background color
        progressBar.style.backgroundColor = nodeColore;


        // Ist für das CSS Diagramm
        var meinDiv = document.getElementById("kreis");
        meinDiv.textContent = nodeText;

        addLines(parseInt(clickedNodeId), workflow);
    }

    
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