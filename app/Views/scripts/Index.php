<script>

   // Iniziere das Diagramm-Modell
    var $ = go.GraphObject.make;
    var myDiagram = 
        $(go.Diagram, "myDiagramDiv", {
            // Definiere verschiedene Eigenschaften für das Diagramm-Modell
            // isReadOnly: true
        }
    );    

    myDiagram.linkTemplate =
        $(go.Link, {
            // routing: go.Link.Orthogonal,      // set orthogonal routing
            corner: 10                        // set corner radius
        },
        $(go.Shape, {
            stroke: "black",
            strokeWidth: 2
        })
    );


    // Definiere ein Knoten-Template für die Kategorie "Rectangle"
    myDiagram.nodeTemplateMap.add("Rectangle",
        $(go.Node, "Auto",
            { 
                width: 120, height: 80,
                // fromSpot: go.Spot.Right,    // definiert die Position des ausgehenden Links relativ zum Knoten
                toSpot: go.Spot.Left        // definiert die Position des eingehenden Links relativ zum Knoten
            },
            $(go.Shape, "Rectangle", { 
                fill: "white", 
                strokeWidth: 2
            }),
            $(go.TextBlock, {
                margin: 10,
                wrap: go.TextBlock.WrapFit
            },
            // Bindet den Knoten-Text an das Attribut "Text"
            new go.Binding("text", "text"))
        )
    );

    // Definiere ein Knoten-Template für die Kategorie "Ellipse"
    myDiagram.nodeTemplateMap.add("Ellipse",
        $(go.Node, "Auto",
            { width: 120, height: 80 },
            $(go.Shape, "Ellipse", { 
                fill: "white", 
                strokeWidth: 2
            }),
            $(go.TextBlock, {
                margin: 10,
                wrap: go.TextBlock.WrapFit
            },
            // Bindet den Knoten-Text an das Attribut "Text"
            new go.Binding("text", "text"))     
        )
    );

    // Definiere ein Knoten-Template für die Kategorie "Rectangle"
    myDiagram.nodeTemplateMap.add("Diamond",
        $(go.Node, "Auto",
            { width: 120, height: 80 },
            $(go.Shape, "Diamond", { 
                fill: "white", 
                strokeWidth: 2
            }),
            $(go.TextBlock, {
                margin: 10,
                wrap: go.TextBlock.WrapFit
            },
            // Bindet den Knoten-Text an das Attribut "Text"
            new go.Binding("text", "text"))     
        )
    );

    // Definiere ein Knoten-Template für die Kategorie "Ellipse"
    myDiagram.nodeTemplateMap.add("Circle",
        $(go.Node, "Auto",
            { width: 80, height: 80 },
            $(go.Shape, "Circle", { 
                fill: "white", 
                strokeWidth: 2
            }),
            $(go.TextBlock, {
                margin: 10,
                wrap: go.TextBlock.WrapFit
            },
            // Bindet den Knoten-Text an das Attribut "Text"
            new go.Binding("text", "text"))     
        )
    );

    getNode();

    function getNode() {
        const nodes = [ // Erstelle Knotendaten für das Diagramm-Modell
            { id: 1, data:"a", staff:"1", next: [2], task:"Patient preparation" },
            { id: 2, data:"b", staff:"2", next: [3], task:"Surgery room preparation" },
            { id: 3, data:"c", staff:"3", next: [4], task:"Transport to OT" }, 
            { id: 4, data:"d", staff:"4", next: [5], task:"Anesthesia" },
            { id: 5, data:"e", staff:"5", next: [6, 7], task:"Surgery" },
            { id: 6, data:"f", staff:"6", next: [], task:"Transport to post-surgery room" },
            { id: 7, data:"g", staff:"7", next: [8], task:"Cleaning surgery room" },
            { id: 8, data:"h", staff:"8", next: [9, 10, 11], task:"Transport to postpartum room" },
            { id: 9, data:"i", staff:"9", next: [], task:"Test Data 1" }, 
            { id: 10, data:"j", staff:"10", next: [], task:"Test Data 2" },
            { id: 11, data:"j", staff:"11", next: [12], task:"Test Data 3" },
            { id: 12, data:"k", staff:"12", next: [], task:"Test Data 4" }, 
        ];

        dfs(nodes, 1, 1);
    }

    function dfs(nodes, currentNodeId, position) {
        const currentNode = nodes[currentNodeId-1];
        const task = currentNode.task;
        const nextNodes = currentNode.next;
        const nodePositon = (nextNodes.length / -2) + 0.5;


        // Setze die Knoten auf das Diagramm-Modell. Die höhe kann noch nicht bestimmt werden.
        myDiagram.model.addNodeData({key: currentNodeId, text: task, category: "Rectangle"});
        myDiagram.findNodeForKey(currentNodeId).location = new go.Point(150 * position, 0);

        // Setze die Knoten auf das Diagramm-Modell.
        myDiagram.model.addNodeData({key: (currentNodeId + "data"), text: currentNode.data, category: "Ellipse"});
        myDiagram.findNodeForKey((currentNodeId + "data")).location = new go.Point(150 * position, 100);

        // Setze die Knoten auf das Diagramm-Modell.
        myDiagram.model.addNodeData({key: (currentNodeId + "staff"), text: currentNode.staff, category: "Diamond"});
        myDiagram.findNodeForKey((currentNodeId + "staff")).location = new go.Point(150 * position, -100);


        if (nextNodes.length > 1) {
            myDiagram.model.addNodeData({key: (currentNodeId + "gate"), text: "AND", category: "Circle"});
            myDiagram.findNodeForKey((currentNodeId + "gate")).location = new go.Point(150 * ++position, 0);
            myDiagram.model.addLinkData({from: currentNodeId, to: (currentNodeId + "gate")});

        }

        myDiagram.model.addLinkData({from: currentNodeId, to: currentNodeId + "staff"});
        myDiagram.model.addLinkData({from: currentNodeId, to: currentNodeId + "data"});


        // Iteriere rekursiv über die 'Next-Verweise'
        for (let i = 0; i < nextNodes.length; i++) {
            dfs(nodes, nextNodes[i], position + 1);

            // Setze die Verbindungen für die Diagramm-Knoten 
            if (nextNodes.length > 1) {
                // Setze die Verbindungen ausgehend zum Logic-Gate
                myDiagram.model.addLinkData({from: (currentNodeId + "gate"), to: nextNodes[i]});
            } else {
                // Setze die Verbindungen ausgehend vom Diagramm-Knoten 
                myDiagram.model.addLinkData({from: currentNodeId, to: nextNodes[i]});
            }

            // Korrigiere die höhe der Diagramm-Knoten  
            if (nextNodes.length > 1) {
                var node = myDiagram.findNodeForKey(nextNodes[i]);
                node.location = new go.Point(150 * (position+1), (nodePositon+i) * 300);

                var node = myDiagram.findNodeForKey(nextNodes[i] + "data");
                node.location = new go.Point(150 * (position+1), (nodePositon+i) * 300 + 100);

                var node = myDiagram.findNodeForKey(nextNodes[i] + "staff");
                node.location = new go.Point(150 * (position+1), (nodePositon+i) * 300 + -100);
            }            
        }
    }

</script>