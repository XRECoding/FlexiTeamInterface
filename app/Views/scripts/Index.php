<script>

   // Iniziere das Diagramm-Modell
    var $ = go.GraphObject.make;
    var myDiagram = 
        $(go.Diagram, "myDiagramDiv", {
            // Definiere verschiedene Eigenschaften für das Diagramm-Modell
            // isReadOnly: true
        }
    );

    // Definiere ein Knoten-Template für die Kategorie "Rectangle"
    myDiagram.nodeTemplateMap.add("Rectangle",
        $(go.Node, "Auto",
            { width: 120, height: 80 },
            $(go.Shape, "Rectangle", { 
                fill: "white", 
                strokeWidth: 2
            }),
            $(go.TextBlock, {
                margin: 10,
                wrap: go.TextBlock.WrapFit
            },
            new go.Binding("text", "text"))     // Gibt welches Attribut der Text im Knoten sein soll, z.B. "text", "id" dann wird die id angezeigt
        )
    );

    /*
    // Erstelle Knoten / Verbindungen und füge sie dem Diagramm-Modell hinzu
    myDiagram.model = new go.GraphLinksModel(
        [   // Erstelle Knotendaten für das Diagramm-Modell
            { key: "Node 1", category: "Rectangle", loc: new go.Point(0, 0) },
            { key: "Node 2", category: "Rectangle", loc: new go.Point(200, 100) },
            // weitere Knotendaten hier...
        ],
        [   // Erstelle Verbindungen für die Diagramm-Knoten
            { from: "Node 1", to: "Node 2" },
            // weitere Verbindungen hier...
        ]
    )
    */

    getNode();


    // Setze die Knotenpunkte an die zuvor angegebene Position
    // Es ist mir nicht klar wieso es nicht automatisch passiert, daher
    // muss es nochmal manuel gemacht werden... TODO: maybe fix later
    myDiagram.addDiagramListener("InitialLayoutCompleted", function() {
        myDiagram.nodes.each(function(node) {
            var loc = node.data.loc;
            if (loc) {  // Wenn die "loc"-Eigenschaft vorhanden ist
                node.position = new go.Point(loc.x, loc.y);
            }
        });
    });
    


    function getNode() {
        // const nodes = [ // Erstelle Knotendaten für das Diagramm-Modell
        //     { id: 1, data:"a", staff:"1", task:"Patient preparation" },
        //     { id: 2, data:"b", staff:"2", task:"Surgery room preparation" },
        //     { id: 3, data:"c", staff:"3", task:"Transport to OT" }, 
        //     { id: 4, data:"d", staff:"4", task:"Anesthesia" },
        //     { id: 5, data:"e", staff:"5", task:"Surgery" },
        //     { id: 6, data:"f", staff:"6", task:"Transport to post-surgery room" },
        //     { id: 7, data:"g", staff:"7", task:"Cleaning surgery room" },
        //     { id: 8, data:"h", staff:"8", task:"Transport to postpartum room" } 
        // ];

        const nodes = [ // Erstelle Knotendaten für das Diagramm-Modell
            { id: 1, data:"a", staff:"1", next: [2], task:"Patient preparation" },
            { id: 2, data:"b", staff:"2", next: [3], task:"Surgery room preparation" },
            { id: 3, data:"c", staff:"3", next: [4], task:"Transport to OT" }, 
            { id: 4, data:"d", staff:"4", next: [5], task:"Anesthesia" },
            { id: 5, data:"e", staff:"5", next: [6, 7], task:"Surgery" },
            { id: 6, data:"f", staff:"6", next: [], task:"Transport to post-surgery room" },
            { id: 7, data:"g", staff:"7", next: [8], task:"Cleaning surgery room" },
            { id: 8, data:"h", staff:"8", next: [], task:"Transport to postpartum room" } 
        ];

        const test = [];
        console.log(!test[1]);

        // BreadthFirstSearch(nodes);
        dfs(nodes, 1, 1);
        myDiagram.redraw();


        // const links = [ // Erstelle Verbindungen für die Diagramm-Knoten
        //     { id: 1, next: [2] },
        //     { id: 2, next: [3] },
        //     { id: 3, next: [4] },
        //     { id: 4, next: [5] },
        //     { id: 5, next: [6, 7] },
        //     { id: 7, next: [8] }
        // ];

        // for (let i = 0; i < nodes.length; i++) {
        //     const currentNode = nodes[i];
        //     const id = currentNode.id;
        //     const task = currentNode.task;
        //     const data = currentNode.data;
        //     const staff = currentNode.staff;

        //     myDiagram.model.addNodeData({key: id, text: task, category: "Rectangle", loc: new go.Point(150 * i, 0)});
        //     console.log('Data: ' + data + ', Staff: ' + staff + ' Knoten: ' + task);
        // }

        // for (let i = 0; i < links.length; i++) {
        //     const currentLink = links[i];
        //     const next = currentLink.next;

        //     for (let j = 0; j < next.length; j++) {
        //         const nextLink = next[j];

                
        //         myDiagram.model.addLinkData({from: currentLink.id, to: nextLink})
        //         console.log("currentLink: " + currentLink.id +  ", Next Link: " + nextLink );
        //     }
        // }
    }


    function dfs(nodes, currentNodeId, position) {
        const currentNode = nodes[currentNodeId-1];
        const task = currentNode.task;
        const nextNodes = currentNode.next;

        // Setze die Knoten auf das Diagramm-Modell. Die höhe kann noch nicht bestimmt werden.
        myDiagram.model.addNodeData({key: currentNodeId, text: task, category: "Rectangle"});
        myDiagram.findNodeForKey(currentNodeId).location = new go.Point(150 * position, 0);

        // Iteriere rekursiv über die 'Next-Verweise'
        for (let i = 0; i < nextNodes.length; i++) {
            dfs(nodes, nextNodes[i], position + 1);
            // Setze die Verbindungen für die Diagramm-Knoten 
            myDiagram.model.addLinkData({from: currentNodeId, to: nextNodes[i]});

            // Korrigiere die höhe der Diagramm-Knoten  
            if (nextNodes.length > 1) {
                var node = myDiagram.findNodeForKey(nextNodes[i]);
                node.location = new go.Point(150 * (position+1), (i - 1) * 100);
            }            
        }
    }



    // function BreadthFirstSearch(nodes) {
    //     const queue = [];           // Hat die länge 0 - n
    //     const visited = [];         // Hat die länge 0 - k

    //     visited[nodes[0].id] = true;
    //     myDiagram.model.addNodeData({key: nodes[0].id, text: nodes[0].task, category: "Rectangle", loc: new go.Point(0, 0)});
    //     BFSUtil(nodes, nodes[0], queue, visited, 1);
    // }

    // function BFSUtil(nodes, currentNode, queue, visited, position) {
    //     const nextNodes = currentNode.next;
    //     const currentNodeId = currentNode.id;
    //     const task = currentNode.task;

    //     var height = 0;

    //     for (let i = 0; i < nextNodes.length; i++) {
    //         if (!visited[nextNodes[i]]) {
    //             visited[nextNodes[i]] = true;
    //             myDiagram.model.addNodeData({key: nodes[nextNodes[i]-1].id, text: nodes[nextNodes[i]-1].task, category: "Rectangle", loc: new go.Point(150 * position, height)});
    //             myDiagram.model.addLinkData({from: currentNodeId, to: nodes[nextNodes[i]-1].id});
    //             height += 100;
    //             queue.push(nodes[nextNodes[i]-1]);
    //         }
    //     }
    //     if (nextNodes.length > 1) {
    //         position -= 1;
    //     }

    //     if (!queue.length == 0) {
    //         BFSUtil(nodes, queue.shift(), queue, visited, position + 1);
    //     }
    // }


</script>