<script>

    function initSub(staff, resources) {

        console.log(staff);

        // Wähle das vorhandene Div-Element aus
        // var existingDiv = document.getElementById("help");

        // // Erstelle ein neues Div-Element
        // var newDiv = document.createElement("div");
        // newDiv.id = "help";
        // newDiv.className = "h-100 w-100";

        // // Ersetze das vorhandene Div-Element mit dem neuen Div-Element
        // existingDiv.replaceWith(newDiv);


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


        var $ = go.GraphObject.make;
        // Create a new diagram and associate it with the div

        // var myDiagram2 = $(go.Diagram, "help");

        var myDiagram2 =
            $(go.Diagram, "help", {
                    // Definiere verschiedene Eigenschaften für das Diagramm-Modell
                    isReadOnly: true,
                    // Generiere das Diagramm als Horizontaler Baum.
                    // layout: $(go.TreeLayout, { angle: 0, layerSpacing: 40 }),
                    // Setze das Padding für das Diagramm
                    padding: new go.Margin(20), // Beispielwert für das Padding
                    // autoScale: go.Diagram.Uniform
                }
            );


    
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

        myDiagram2.nodeTemplateMap.add("Rectangle", createNodeTemplate("Rectangle"));
        myDiagram2.nodeTemplateMap.add("Ellipse", createNodeTemplate("Ellipse"));
        myDiagram2.nodeTemplateMap.add("Diamond", createNodeTemplate("Octagon"));


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


            myDiagram2.linkTemplateMap.add("template1", template1);

  

        myDiagram2.groupTemplateMap.add("Gruppe1", gruppe1);

        myDiagram2.model.addNodeData({key: "group", isGroup: true, category: "Gruppe1" });
        myDiagram2.model.addNodeData({key: "1", text: resources.toString(), category: "Rectangle", group: "group"});

        myDiagram2.model.addNodeData({key: "2", text: "2", category: "Ellipse", group: "group"});
        myDiagram2.model.addNodeData({key: "3", text: staff.toString(), category: "Diamond", group: "group"});

        myDiagram2.model.addLinkData({ from: "1", to: "2" , category: "template1"});
        myDiagram2.model.addLinkData({ from: "2", to: "3" , category: "template1"});


        // Hinzufügen eines Event Listeners für das "InitialLayoutCompleted"-Ereignis.
        // Das Diagramm ist zu groß, um es standardmäßig vollständig anzuzeigen. Daher
        // wird das Diagramm nach dem Initialisieren herausgezoomt und zentriert, um
        // einen Überblick zu ermöglichen.
        myDiagram2.addDiagramListener("InitialLayoutCompleted", function(event) {
            // Überprüfen die Größe des Diagramms
            var diagramWidth = myDiagram2.documentBounds.width;
            var diagramHeight = myDiagram2.documentBounds.height;

            // Überprüfen die Größe des sichtbaren Bereichs des Diagramms
            var viewportWidth = myDiagram2.viewportBounds.width;
            var viewportHeight = myDiagram2.viewportBounds.height;

            // Überprüfen, ob das Diagramm größer ist als der sichtbare Bereich
            if (diagramWidth > viewportWidth || diagramHeight > viewportHeight) {
                // Berechnen den Zoomfaktor basierend auf der Größenverhältnis des Diagramms zum sichtbaren Bereich
                var widthFactor = viewportWidth / diagramWidth;
                var heightFactor = viewportHeight / diagramHeight;

                // Wählen den kleineren Zoomfaktor, um sicherzustellen, dass das gesamte Diagramm sichtbar ist
                var zoomFactor = Math.min(widthFactor, heightFactor);

                // Setzen den Zoom des Diagramms auf den berechneten Faktor
                myDiagram2.scale = zoomFactor;

                // Zentrieren das Diagramm horizontal und vertikal
                var diagramBounds = myDiagram2.documentBounds;
                var diagramCenterX = diagramBounds.width / 2;
                var diagramCenterY = diagramBounds.height / 2;
                myDiagram2.scrollToRect(new go.Rect(
                    diagramCenterX - viewportWidth / (2 * zoomFactor),
                    diagramCenterY - viewportHeight / (2 * zoomFactor),
                    viewportWidth / zoomFactor,
                    viewportHeight / zoomFactor
                ));
            }
        });


    }




</script>