<script>

   // Iniziere das Diagramm-Modell
    var $ = go.GraphObject.make;
    var myDiagram = 
        $(go.Diagram, "myDiagramDiv", {
            // Definiere verschiedene Eigenschaften für das Diagramm-Modell
            // isReadOnly: true
        }
    );    

    // myDiagram.linkTemplate =
    //     $(go.Link, {
    //         routing: go.Link.Orthogonal,      // set orthogonal routing
    //         corner: 10                        // set corner radius
    //     },
    //     $(go.Shape, {
    //         stroke: "black",
    //         strokeWidth: 2
    //     })
    // );


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

    // // Definiere ein Knoten-Template für die Kategorie "Ellipse"
    // myDiagram.nodeTemplateMap.add("Ellipse",
    //     $(go.Node, "Auto",
    //         { width: 120, height: 80 },
    //         $(go.Shape, "Ellipse", { 
    //             fill: "white", 
    //             strokeWidth: 2
    //         }),
    //         $(go.TextBlock, {
    //             margin: 10,
    //             wrap: go.TextBlock.WrapFit
    //         },
    //         // Bindet den Knoten-Text an das Attribut "Text"
    //         new go.Binding("text", "text"))     
    //     )
    // );

    // // Definiere ein Knoten-Template für die Kategorie "Rectangle"
    // myDiagram.nodeTemplateMap.add("Diamond",
    //     $(go.Node, "Auto",
    //         { width: 120, height: 80 },
    //         $(go.Shape, "Diamond", { 
    //             fill: "white", 
    //             strokeWidth: 2
    //         }),
    //         $(go.TextBlock, {
    //             margin: 10,
    //             wrap: go.TextBlock.WrapFit
    //         },
    //         // Bindet den Knoten-Text an das Attribut "Text"
    //         new go.Binding("text", "text"))     
    //     )
    // );

    // // Definiere ein Knoten-Template für die Kategorie "Ellipse"
    // myDiagram.nodeTemplateMap.add("Circle",
    //     $(go.Node, "Auto",
    //         { width: 80, height: 80 },
    //         $(go.Shape, "Circle", { 
    //             fill: "white", 
    //             strokeWidth: 2
    //         }),
    //         $(go.TextBlock, {
    //             margin: 10,
    //             wrap: go.TextBlock.WrapFit
    //         },
    //         // Bindet den Knoten-Text an das Attribut "Text"
    //         new go.Binding("text", "text"))     
    //     )
    // );

    getNode();

    function getNode() {
        const nodes = [ // Erstelle Knotendaten für das Diagramm-Modell
            { id: 1, data:"a", staff:"1", next: [2], task:"Patient preparation" },
            { id: 2, data:"b", staff:"2", next: [3], task:"Surgery room preparation" },
            { id: 3, data:"c", staff:"3", next: [4], task:"Transport to OT" }, 
            { id: 4, data:"d", staff:"4", next: [5], task:"Anesthesia" },
            { id: 5, data:"e", staff:"5", next: [6, 7], task:"Surgery" },
            { id: 6, data:"f", staff:"6", next: [8], task:"Transport to post-surgery room" },
            { id: 7, data:"g", staff:"7", next: [9], task:"Cleaning surgery room" },
            { id: 8, data:"h", staff:"8", next: [10, 11], task:"Transport to postpartum room" },
            { id: 9, data:"i", staff:"9", next: [12, 13], task:"Test Data 1" }, 
            { id: 10, data:"j", staff:"10", next: [], task:"Test Data 2" },
            { id: 11, data:"k", staff:"11", next: [], task:"Test Data 3" },
            { id: 12, data:"l", staff:"12", next: [], task:"Test Data 4" },
            { id: 13, data:"m", staff:"13", next: [], task:"Test Data 5" },  
        ];

        dfs(nodes, 1, 0, 0);
    }

    function dfs(nodes, currentNodeId, horPosition, verPosition) {
        const currentNode = nodes[currentNodeId-1];
        const task = currentNode.task;
        const nextNodes = currentNode.next;

        myDiagram.model.addNodeData({key: currentNodeId, text: task, category: "Rectangle"});
        myDiagram.findNodeForKey(currentNodeId).location = new go.Point(horPosition * 150, verPosition);
        verPosition += ((nextNodes.length > 1) ? (((nextNodes.length / -2) + 0.5) * 100) : 0);

        for (let i = 0; i < nextNodes.length; i++) {
            const position = verPosition + ((nextNodes.length > 1) ? (100 * i) : 0);
            dfs(nodes, nextNodes[i], horPosition + 1, position);

            myDiagram.model.addLinkData({from: currentNodeId, to: nextNodes[i]});
        }
    }


    // overlap();


    // function overlap() {
    //     const node1Bounds = myDiagram.findNodeForKey(10).location;
    //     const node2Bounds = myDiagram.findNodeForKey(10).location;

    //     var idk1 = myDiagram.findNodeForKey(11).actualBounds;
    //     var idk2 = myDiagram.findNodeForKey(13).actualBounds;

    //     if (node1Bounds.x < node2Bounds.x + idk2.width &&
    //         node1Bounds.x + idk1.width > node2Bounds.x &&
    //         node1Bounds.y < node2Bounds.y + idk2.height &&
    //         idk1.height + node1Bounds.y > node2Bounds.y) {
    //         console.log("Die Knoten überlappen sich!");
    //     } else {
    //         console.log("Die Knoten überlappen sich nicht.");
    //     }
    // }

</script>