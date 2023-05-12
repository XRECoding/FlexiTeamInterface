<script>
    var $ = go.GraphObject.make;
    var myDiagram = 
        $(go.Diagram, "myDiagramDiv", {
            // Definiere verschiedene Eigenschaften für das Diagramm-Modell
            isReadOnly: true,
            // Generiere das Diagramm als Horizontaler Baum.
            layout: $(go.TreeLayout, { angle: 0, layerSpacing: 40 })
        }
    );

    // Definiere ein Gruppen-Template
    myDiagram.groupTemplate =
        $(go.Group, "Vertical",
            { layout: $(go.LayeredDigraphLayout, { direction: 0 }) },
        $(go.Panel, "Auto",
            $(go.Shape, "RoundedRectangle", {   // surrounds the Placeholder
                parameter1: 14,
                fill: "rgba(128,128,128,0.33)" 
            }),
            $(go.Placeholder,   // represents the area of all member parts,
                { padding: 5}   // with some extra padding around them
            )  
        )
    );

    // Definiere ein Link-Template
    myDiagram.linkTemplate =
        $(go.Link, {
            routing: go.Link.Orthogonal,      // Links sollen Orthogonal dargestellt werden.
            corner: 10                        // Runde die Link-Kanten ab so das 
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
                fromSpot: go.Spot.Right,    // definiert die Position des ausgehenden Links relativ zum Knoten
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
            { id: 6, data:"f", staff:"6", next: [8], task:"Transport to post-surgery room" },
            { id: 7, data:"g", staff:"7", next: [9], task:"Cleaning surgery room" },
            { id: 8, data:"h", staff:"8", next: [10, 11, 13], task:"Transport to postpartum room" },
            { id: 9, data:"i", staff:"9", next: [12, 14], task:"Test Data 1" }, 
            { id: 10, data:"j", staff:"10", next: [], task:"Test Data 2" },
            { id: 11, data:"k", staff:"11", next: [], task:"Test Data 3" },
            { id: 12, data:"l", staff:"12", next: [], task:"Test Data 4" },
            { id: 13, data:"m", staff:"13", next: [15], task:"Test Data 5" },  
            { id: 14, data:"n", staff:"14", next: [], task:"Test Data 6" },  
            { id: 15, data:"o", staff:"15", next: [], task:"Test Data 7" },  
        ];

        dfs(nodes, 1);
    }

    function dfs(nodes, currentNodeId) {
        const currentNode = nodes[currentNodeId-1];
        const nextNodes = currentNode.next;
        
        // Setze die Knoten auf das Diagramm-Modell innerhalb einer Gruppe.
        myDiagram.model.addNodeData({key: currentNodeId + "group", isGroup: true, category: "Auto"});

        // Erstelle den Diagramm-Knoten für Task, Data und Staff
        myDiagram.model.addNodeData({key: (currentNodeId + "data"), text: currentNode.data, category: "Ellipse", group: currentNodeId + "group"});
        myDiagram.model.addNodeData({key: currentNodeId, text: currentNode.task, category: "Rectangle", group: currentNodeId + "group"});
        myDiagram.model.addNodeData({key: (currentNodeId + "staff"), text: currentNode.staff, category: "Ellipse", group: currentNodeId + "group"});

        if (nextNodes.length > 1) {
            myDiagram.model.addNodeData({key: (currentNodeId + "gate"), text: "AND", category: "Circle"});
            myDiagram.model.addLinkData({from: currentNodeId, to: (currentNodeId + "gate")});
        }

        for (let i = 0; i < nextNodes.length; i++) {
            dfs(nodes, nextNodes[i]);

            // Setze die Verbindungen für die Diagramm-Knoten 
            if (nextNodes.length > 1) {
                // Setze die Verbindungen ausgehend zum Logic-Gate
                myDiagram.model.addLinkData({from: (currentNodeId + "gate"), to: nextNodes[i]});
            } else {
                // Setze die Verbindungen ausgehend vom Diagramm-Knoten 
                myDiagram.model.addLinkData({from: currentNodeId, to: nextNodes[i]});
            }
        }
    }


</script>