<script>

    var data = loadCSV();


    function init(workflow) {

        // Wähle das vorhandene Div-Element aus
        var existingDiv = document.getElementById("myDiagramDiv");

        // Erstelle ein neues Div-Element
        var newDiv = document.createElement("div");
        newDiv.id = "myDiagramDiv";
        newDiv.className = "h-100 w-100";

        // Ersetze das vorhandene Div-Element mit dem neuen Div-Element
        existingDiv.replaceWith(newDiv);


        var $ = go.GraphObject.make;
        // Create a new diagram and associate it with the div




        // Benutzerdefinierte Achteck-Figur
        go.Shape.defineFigureGenerator("Octagon", function(shape, w, h) {
            var geo = new go.Geometry();
            var fig = new go.PathFigure(w / 4, 0); // Startpunkt oben
            geo.add(fig);

            // Linien zu den Ecken
            fig.add(new go.PathSegment(go.PathSegment.Line, (w * 3) / 4, 0)); // rechts oben
            fig.add(new go.PathSegment(go.PathSegment.Line, w, h / 4)); // rechts oben mittig
            fig.add(new go.PathSegment(go.PathSegment.Line, w, (h * 3) / 4)); // rechts unten mittig
            fig.add(new go.PathSegment(go.PathSegment.Line, (w * 3) / 4, h)); // rechts unten
            fig.add(new go.PathSegment(go.PathSegment.Line, w / 4, h)); // links unten
            fig.add(new go.PathSegment(go.PathSegment.Line, 0, (h * 3) / 4)); // links unten mittig
            fig.add(new go.PathSegment(go.PathSegment.Line, 0, h / 4)); // links oben mittig
            fig.add(new go.PathSegment(go.PathSegment.Line, w / 4, 0)); // links oben
            
            // Schließe den Pfad
            fig.add(new go.PathSegment(go.PathSegment.Line, (w * 3) / 4, 0).close());
            
            return geo;
        });


        // Definiere das Layout für das Diagramm
        var myDiagram =
            $(go.Diagram, "myDiagramDiv", {
                    // Definiere verschiedene Eigenschaften für das Diagramm-Modell
                    isReadOnly: true,
                    // Generiere das Diagramm als Horizontaler Baum.
                    layout: $(go.TreeLayout, { angle: 0, layerSpacing: 40 }),
                    // Setze das Padding für das Diagramm
                    padding: new go.Margin(20), // Beispielwert für das Padding
                    // autoScale: go.Diagram.Uniform
                }
            );

        // Adding save functionality to modal save button
        document.getElementById("saveButton").onclick = function () {
            // saving resources
            var dropdown = document.getElementById("inputGroupSelect01");
            var workflowID = dropdown.options[dropdown.selectedIndex].value;
            console.log(workflowID);

            var table = document.getElementById("main-resourceTable");
            var writeString = "";
            for (var i = 0, row; row = table.rows[i]; i++) {
                writeString += row.cells[0].textContent + "/";
            }
            writeString =   writeString.substr(0, writeString.length-1);

            var clickedNode = myDiagram.findNodeForKey(clickedNodeId + "data");
            myDiagram.select(clickedNode);
            myDiagram.model.commit(m => {
                m.set(clickedNode.data, "text", writeString);
            }, "changed text");

            // also writing into the array to make a save state possible
            // nodes[clickedNodeId-1].data = writeString;
            // console.log(data[workflowID].subTasks[clickedNodeId-1].consumedData);
            // console.log(clickedNodeId);
            data[workflowID].subTasks[clickedNodeId-1].consumedData = writeString;


            // saving staff
            table = document.getElementById("main-staffTable");
            writeString = "";
            for (var i = 0, row; row = table.rows[i]; i++) {
                writeString += row.cells[1].textContent + "/";
            }
            writeString =   writeString.substr(0, writeString.length-1);

            clickedNode = myDiagram.findNodeForKey(clickedNodeId + "staff");
            myDiagram.select(clickedNode);
            myDiagram.model.commit(m => {
                m.set(clickedNode.data, "text", writeString);
            }, "changed text");

            // also writing into the array to make a save state possible
            // nodes[clickedNodeId-1].staff = writeString;
            data[workflowID].subTasks[clickedNodeId-1].resources = writeString;


            // var test = clickedNode.findSubGraphParts();
            // console.log(nodes);

            modal.style.display = "none";
        }

        // Definiere Link-Templates, um die Verbindungen des Diagramms optisch anzupassen.
        // Durch die Verwendung eines separaten Link-Templates können wir das Aussehen der
        // Links beeinflussen, z.B. indem wir sie orthogonal darstellen.

        var template1 =
            $(go.Link, {
                    routing: go.Link.Orthogonal, // Links sollen orthogonal dargestellt werden.
                    corner: 10 // Die Kanten der Links werden abgerundet.
                },
                $(go.Shape, {
                    stroke: "black", // Die Farbe der Linie des Links ist rot.
                    strokeWidth: 2 // Die Linienstärke des Links beträgt 2 Pixel.
                }),
                { isLayoutPositioned: false } // Link wird vom Tree-Layout-Algorithmus ausgeschlossen
            );

        var template2 =
            $(go.Link, {
                    routing: go.Link.Orthogonal, // Links sollen orthogonal dargestellt werden.
                    corner: 10 // Die Kanten der Links werden abgerundet.
                },
                $(go.Shape, {
                    stroke: "black", // Die Farbe der Linie des Links ist schwarz.
                    strokeWidth: 2 // Die Linienstärke des Links beträgt 2 Pixel.
                })
            );

        myDiagram.linkTemplateMap.add("template1", template1);
        myDiagram.linkTemplateMap.add("template2", template2);



        // Funktion zur Erstellung eines Knoten-Templates. Alle Knoten verhalten sich gleich,
        // der einzige Unterschied liegt in der Form. Daher wurde die Knoten-Templates in eine
        // Funktion umgewandelt, die die Form als Parameter erhält.

        function createNodeTemplate(shape) {
            return $(go.Node, "Auto",
                { width: 120, height: 80 },
                $(go.Shape, shape, 
                    {
                        fill: "white", // Die Hintergrundfarbe des Knotens ist weiß.
                        strokeWidth: 2 // Die Linienstärke der Form beträgt 2 Pixel.
                    },
                    new go.Binding("fill", "color") // Binden Sie die "fill"-Eigenschaft des Shapes an die "color"-Eigenschaft des Datenobjekts
                ),
                $(go.TextBlock, {
                        margin: 0,
                        font: "10pt Arial, sans-serif", // Hier wird die Schriftgröße auf 10pt festgelegt
                        wrap: go.TextBlock.WrapFit
                    },
                    // Der Knoten-Text wird an das "text"-Attribut gebunden.
                    new go.Binding("text", "text"))
            );
        }

        

        // Definiere die Knoten-Templates für verschiedene Kategorien
        myDiagram.nodeTemplateMap.add("Rectangle", createNodeTemplate("Rectangle"));
        myDiagram.nodeTemplateMap.add("Ellipse", createNodeTemplate("Ellipse"));
        myDiagram.nodeTemplateMap.add("Octagon", createNodeTemplate("Octagon"));




        // Zur Erstellung der Logikgatter muss eine separate Form definiert werden,
        // die sich etwas anders als die vorherigen Formen verhält. Die Form und Größe
        // der Logikgatter unterscheidet sich von den anderen Knoten. Außerdem besteht
        // eine hohe Wahrscheinlichkeit, dass die Logikgatter später noch angepasst werden.

        myDiagram.nodeTemplateMap.add("Circle",
            $(go.Node, "Auto",
                { width: 80, height: 80 },
                $(go.Shape, "Circle", {
                    fill: "white", // Die Hintergrundfarbe des Logikgatters ist weiß.
                    strokeWidth: 2 // Die Linienstärke der Form beträgt 2 Pixel.
                }),
                $(go.TextBlock, {
                        margin: 10,
                        wrap: go.TextBlock.WrapFit
                    },
                    // Der Knoten-Text wird an das "text"-Attribut gebunden.
                    new go.Binding("text", "text"))
            )
        );


        // Funktion zur Erstellung eines Gruppen-Templates. Alle Gruppen verhalten sich gleich,
        // der einzige Unterschied liegt in der Farbe. Daher wurden die Gruppen-Templates in eine
        // Funktion umgewandelt, die die Farbe als Parameter erhält.

        var gruppe1 =
            $(go.Group, "Vertical", {
                    layout: $(go.LayeredDigraphLayout, { direction: 0 }),
                    click: function(e, group) {
                        // Behandle den Klick auf die Gruppe hier
                        console.log("Gruppe wurde geklickt: " + group.data.key);
                    }
                },
                $(go.Panel, "Auto",
                    $(go.Shape, "RoundedRectangle", {
                        fill: "transparent", // Füllfarbe auf transparent setzen
                        opacity: 0 // Opazität auf 0 setzen
                    }),
                    $(go.Placeholder, {
                        padding: 3
                    })
                ));

        var gruppe2 =
            $(go.Group, "Vertical", {
                    layout: $(go.LayeredDigraphLayout, { direction: 0 }),
                    click: function(e, group) {
                        // Behandle den Klick auf die Gruppe hier
                        // console.log("Gruppe wurde geklickt: " + group.data.key);

                        // var clickedNode = myDiagram.findNodeForKey(group.data.key);

                        // console.log(nodes);

                        // set the id of the clicked node
                        clickedNodeId = group.data.key.replace("group", "");   // Todo find better solution. eg working with GoJS groups


                        // adding staff & resources to the sidebar table
                        sidebarFill();

                        // Adding resources to the Main Pane
                        var clickedNode = myDiagram.findNodeForKey(clickedNodeId + "data");
                        const resourcesMain = clickedNode.data.text.split("/");
                        const resourceNumbersMain = [];     // Todo

                        var table = document.getElementById("main-resourceTable");
                        while (table.hasChildNodes()) table.removeChild(table.firstChild);  // deleting the data from previous call
                        for (let i = 0; i < resourcesMain.length; i++) {
                            var row = table.insertRow();
                            var cellFirst = row.insertCell(0);
                            var cellSecond = row.insertCell(1);
                            cellFirst.innerText = resourcesMain[i];
                            cellSecond.innerText = resourceNumbersMain[i];
                        }

                        // Adding staff to the Main Pane
                        var clickedNode = myDiagram.findNodeForKey(clickedNodeId + "staff");
                        const staffMain = clickedNode.data.text.split("/");
                        const jobsMain = [];    // TODO
                        const replace = [true];     // TODO

                        table = document.getElementById("main-staffTable");
                        while (table.hasChildNodes()) table.removeChild(table.firstChild);  // deleting the data from previous call



                        for (let i = 0; i < staffMain.length; i++) {
                            var row = table.insertRow();
                            var cellFirst = row.insertCell(0);
                            var cellSecond = row.insertCell(1);
                            if (replace[i]){ cellSecond.setAttribute("style", "text-decoration: line-through; text-decoration-thickness: 3px");}
                            cellFirst.innerText = jobsMain[i];
                            cellSecond.innerText = staffMain[i];
                        }

                        // adding the selected option to the modal dropdown
                        var dropdown = document.getElementById("inputGroupSelect01");
                        var dropdownText = dropdown.options[dropdown.selectedIndex].text;
                        var option = document.createElement('option');
                        option.text = dropdownText;
                        dropdown = document.getElementById("disabledDropdown");
                        dropdown.add(option);
                        dropdown.disabled = true;

                        var clickedNode = myDiagram.findNodeForKey(clickedNodeId);
                        addForms(clickedNode, workflow);

                        modal.style.display = "block";
                    }
                },
                $(go.Panel, "Auto",
                    $(go.Shape, "RoundedRectangle", {
                        fill: "#ea3131", // Die Farbe der Ellipse wird durch den Parameter "color" festgelegt.

                    }),
                    $(go.Placeholder, {
                        padding: 3
                    })
                ));





        // Definiere die Gruppen-Templates

        myDiagram.groupTemplateMap.add("Gruppe1", gruppe1);
        myDiagram.groupTemplateMap.add("Gruppe2", gruppe2);




        dfsInit(workflow);

        function dfsInit(workflow) {
            var selectedOptionText = (typeof workflow === 'string') ? workflow : workflow.options[workflow.selectedIndex].id;
            var foundObject = data.find(function(obj) {
                return obj.workflowId === selectedOptionText;
            });

            dfs(foundObject.subTasks, 1, "#DAE8FC");


        }

        // Rekursive Funktion zur Generierung des Diagramms. Zuerst gehen wir in die Tiefe, um die Knoten zu platzieren.
        // Wir prüfen auch, ob ein Logik-Gatter platziert werden muss. Sobald ein Knoten für die Tiefe platziert wurde,
        // kehren wir in der Rekursion zurück und erstellen die Verbindungen zu den zuvor platzierten Knoten.

        function dfs(nodes, currentNodeId, nodeColore) {
            const currentNode = nodes[currentNodeId-1];
            const nextNodes = currentNode.nextTaskId;

            // Setze die Knoten auf das Diagramm-Modell innerhalb einer Gruppe.
            myDiagram.model.addNodeData({key: currentNodeId + "group", isGroup: true, category: (currentNode.problem === "yes") ? "Gruppe2" : "Gruppe1" });

            if (currentNode.tasks === "Surgery") {nodeColore = "pink"};

            // Erstelle den Diagramm-Knoten für Task, Data und Staff
            myDiagram.model.addNodeData({key: (currentNodeId + "data"), text: currentNode.consumedData, category: "Ellipse", group: currentNodeId + "group", color: nodeColore});
            myDiagram.model.addNodeData({key: currentNodeId, text: currentNode.tasks, category: "Rectangle", group: currentNodeId + "group", color: nodeColore});
            myDiagram.model.addNodeData({key: (currentNodeId + "staff"), text: currentNode.resources, category: "Octagon", group: currentNodeId + "group", color: nodeColore});
            // Fügen Sie einen Link mit individuellen Eigenschaften zum Diagramm hinzu, einschließlich "isLayoutPositioned"

            myDiagram.model.addLinkData({from: (currentNodeId + "data"), to: currentNodeId, category: "template1"});
            myDiagram.model.addLinkData({from: (currentNodeId + "staff"), to: currentNodeId, category: "template1"});

            if (currentNode.tasks === "Surgery") {nodeColore = "#D5E8D4"};

            if (nextNodes.length > 1) {
                myDiagram.model.addNodeData({key: (currentNodeId + "gate"), text: "AND", category: "Circle"});
                myDiagram.model.addLinkData({from: currentNodeId, to: (currentNodeId + "gate"), category: "template2"});
            }

            for (let i = 0; i < nextNodes.length; i++) {
                dfs(nodes, parseInt(nextNodes[i]), nodeColore);

                // Setze die Verbindungen für die Diagramm-Knoten
                if (nextNodes.length > 1) {
                    // Setze die Verbindungen ausgehend zum Logic-Gate
                    myDiagram.model.addLinkData({from: (currentNodeId + "gate"), to: nextNodes[i], category: "template2"});
                } else {
                    // Setze die Verbindungen ausgehend vom Diagramm-Knoten
                    myDiagram.model.addLinkData({from: currentNodeId, to: nextNodes[i], category: "template2"});
                }
            }
        }


        // Hinzufügen eines Event Listeners für das "InitialLayoutCompleted"-Ereignis.
        // Das Diagramm ist zu groß, um es standardmäßig vollständig anzuzeigen. Daher
        // wird das Diagramm nach dem Initialisieren herausgezoomt und zentriert, um
        // einen Überblick zu ermöglichen.
        myDiagram.addDiagramListener("InitialLayoutCompleted", function(event) {
            // Überprüfen die Größe des Diagramms
            var diagramWidth = myDiagram.documentBounds.width;
            var diagramHeight = myDiagram.documentBounds.height;

            // Überprüfen die Größe des sichtbaren Bereichs des Diagramms
            var viewportWidth = myDiagram.viewportBounds.width;
            var viewportHeight = myDiagram.viewportBounds.height;

            // Überprüfen, ob das Diagramm größer ist als der sichtbare Bereich
            if (diagramWidth > viewportWidth || diagramHeight > viewportHeight) {
                // Berechnen den Zoomfaktor basierend auf der Größenverhältnis des Diagramms zum sichtbaren Bereich
                var widthFactor = viewportWidth / diagramWidth;
                var heightFactor = viewportHeight / diagramHeight;

                // Wählen den kleineren Zoomfaktor, um sicherzustellen, dass das gesamte Diagramm sichtbar ist
                var zoomFactor = Math.min(widthFactor, heightFactor);

                // Setzen den Zoom des Diagramms auf den berechneten Faktor
                myDiagram.scale = zoomFactor;

                // Zentrieren das Diagramm horizontal und vertikal
                var diagramBounds = myDiagram.documentBounds;
                var diagramCenterX = diagramBounds.width / 2;
                var diagramCenterY = diagramBounds.height / 2;
                myDiagram.scrollToRect(new go.Rect(
                    diagramCenterX - viewportWidth / (2 * zoomFactor),
                    diagramCenterY - viewportHeight / (2 * zoomFactor),
                    viewportWidth / zoomFactor,
                    viewportHeight / zoomFactor
                ));
            }
        });
    }



    init("W01");



</script>