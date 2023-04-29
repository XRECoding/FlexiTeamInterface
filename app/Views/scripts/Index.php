<script>

    // Erstelle ein Diagramm
    var myDiagram = go.GraphObject.make(go.Diagram, "myDiagramDiv", {
        isReadOnly: true,               // Die Knoten des Diagramms können nicht bewegt werden
        padding: new go.Margin(-400)    // Set the padding to a negative value
    }); 

    // Definiere ein Template für die Knoten der Subtasks
    // TODO: Muss noch für die anderen Knoten gemacht werden
    myDiagram.nodeTemplateMap.add("RoundedRectangle",
        go.GraphObject.make(go.Node, "Auto",
        go.GraphObject.make(go.Shape, "RoundedRectangle", { width: 100, height: 50, fill: "white" }),
        go.GraphObject.make(go.TextBlock, { margin: 8 }, new go.Binding("text", "text")),
        new go.Binding("fill", "color"),
        {
            click: function(e, node) {
                alert("You clicked node " + node.data.key);
            }
        }
    ));  
 
    // Setze die Knotenpunkte an die zuvor angegebene Position
    myDiagram.addDiagramListener("InitialLayoutCompleted", function() {
        myDiagram.nodes.each(function(node) {
            var loc = node.data.loc;
            if (loc) {  // Wenn die "loc"-Eigenschaft vorhanden ist
                node.position = new go.Point(loc.x, loc.y);
            }
        });
    });

    function addNewNode(node, x, y) {
        // Generiere eine eindeutige ID für den neuen Knoten
        // var newKey = goLib.GoObject.makeUniqueId();
        
        // Erstelle eine neue Knotendaten-Objekt
        // TODO: Is multiline
        var newNodeData = { key: node, category: "RoundedRectangle", text: node, loc: new go.Point(x, y) };

        // Füge die neuen Knotendaten zum Diagramm-Modell hinzu
        myDiagram.model.addNodeData(newNodeData);
    }

    loadXMLDoc();


// /////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    var staff = -400; var subtask = -400; var resource = -400;

    function loadXMLDoc() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {

            // Request finished and response 
            // is ready and Status is "OK"
            if (this.readyState == 4 && this.status == 200) {
                readXMLDoc(this);
            }
        };

        // casebase.xml is the external xml file
        xmlhttp.open("GET", "casebase.xml", true);
        xmlhttp.send();
    }

    function readXMLDoc(xml) {
        var xmlDoc = xml.responseXML;
        var x = xmlDoc.getElementById("W02");

        // Iterate over all occurrences
        for (elem of x.querySelectorAll("[c=ResourceSemantic]")){
            addNewNode(elem.firstElementChild.getAttribute("v"), staff, 100, );
            staff += 150;
            // console.log(elem.firstElementChild.getAttribute("v"));
        }
        for (elem of x.querySelectorAll("[c=TaskSemantic]")){
            addNewNode(elem.firstElementChild.getAttribute("v"), subtask, 0);
            subtask += 150;
            // console.log(elem.firstElementChild.getAttribute("v"));
        }
        for (elem of x.querySelectorAll("[c=DataSemantic]")){
            addNewNode(elem.firstElementChild.getAttribute("v"), resource, -100);
            resource += 150;
            // console.log(elem.firstElementChild.getAttribute("v"));
        }
        
    }

</script>