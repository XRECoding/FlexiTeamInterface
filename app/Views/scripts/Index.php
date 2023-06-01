<script>
    $("tbody").sortable({connectWith:"tbody"});

    // Get the modal
    var modal = document.getElementById("myModal");

    // Adding closing functionality to modal close button
    document.getElementById("modalClose").onclick = function () {
        modal.style.display = "none";
    }

    // // Sidebar tab logic
    // const triggerTabList = document.querySelectorAll('#myTab button')
    // triggerTabList.forEach(triggerEl => {
    //     const tabTrigger = new bootstrap.Tab(triggerEl)
    //
    //     triggerEl.addEventListener('click', event => {
    //         event.preventDefault()
    //         tabTrigger.show()
    //     })
    // })

    // Sidebar Search for Staff
    document.getElementById("staffInput").onkeyup = function resourceSearch () {
        // Declare variables
        var input, filter, table, tr, td, i, j, txtValue;
        input = document.getElementById("staffInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("staffTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            for (j = 0; j < tr[i].getElementsByTagName("td").length; j++) {
                td = tr[i].getElementsByTagName("td")[j];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break;
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    }

    // Sidebar Search for Resources
    document.getElementById("resourceInput").onkeyup = function resourceSearch () {
        // Declare variables
        var input, filter, table, tr, td, i, j, txtValue;
        input = document.getElementById("resourceInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("resourceTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            for (j = 0; j < tr[i].getElementsByTagName("td").length; j++) {
                td = tr[i].getElementsByTagName("td")[j];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break;
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    }

    window.onload = function () {
        // document.getElementById("resource-tab-pane-2").classList.add("active");
        // Adding procedures to the Dropdown
        const procedures = ["C-Section", "2", "3", "4"];
        const critical = ["false", "true", "false", "true"];
        var select = document.getElementById("procedureDropdown");
        procedures.forEach(function (item) {
            var option = document.createElement('option');
            option.text = item;
            select.add(option);
        })

        var option2 = document.createElement('option');
        option2.text = "test";
        option2.classList.add("critical");
        select.add(option2);


        // Adding resources to the Sidebar
        const resources = ["Stretcher", "Stethoscope", "Needle", "Tape", "Scissors"];
        const resourceNumbers = ["1", "2", "3", "4", "5"];

        var table = document.getElementById("resourceTable");
        for (let i = 0; i < resources.length; i++) {
            var row = table.insertRow();
            var cellFirst = row.insertCell(0);
            var cellSecond = row.insertCell(1);
            cellFirst.innerText = resources[i];
            cellSecond.innerText = resourceNumbers[i];
        }

        // Adding resources to the Main Pane
        const resourcesMain = ["Stethoscope", "Tape", "Scissors"];
        const resourceNumbersMain = ["1", "2", "3"];

        var table = document.getElementById("main-resourceTable");
        for (let i = 0; i < resourcesMain.length; i++) {
            var row = table.insertRow();
            var cellFirst = row.insertCell(0);
            var cellSecond = row.insertCell(1);
            cellFirst.innerText = resourcesMain[i];
            cellSecond.innerText = resourceNumbersMain[i];
        }

        // Adding staff to the Sidebar
        const staff = ["Octavianus Vladimir", "Pellam Bozena", "Nadia Fallon", "Afzal Columban", "Shyama Ludmilla", "Viktoria Long", "Pearlie Kari", "Eloise Dina"
            // ,"Octavianus Vladimir", "Pellam Bozena", "Nadia Fallon", "Afzal Columban", "Shyama Ludmilla", "Viktoria Long", "Pearlie Kari", "Eloise Dina"
            // ,"Octavianus Vladimir", "Pellam Bozena", "Nadia Fallon", "Afzal Columban", "Shyama Ludmilla", "Viktoria Long", "Pearlie Kari", "Eloise Dina"
            // ,"Octavianus Vladimir", "Pellam Bozena", "Nadia Fallon", "Afzal Columban", "Shyama Ludmilla", "Viktoria Long", "Pearlie Kari", "Eloise Dina"
            // ,"Octavianus Vladimir", "Pellam Bozena", "Nadia Fallon", "Afzal Columban", "Shyama Ludmilla", "Viktoria Long", "Pearlie Kari", "Eloise Dina"
            //     ,"Octavianus Vladimir", "Pellam Bozena", "Nadia Fallon", "Afzal Columban", "Shyama Ludmilla", "Viktoria Long", "Pearlie Kari", "Eloise Dina"
        ];
        const jobs = ["Doctor", "Doctor", "Doctor", "Nurse", "Nurse", "Nurse", "Nurse", "Technician"
            // ,"Doctor", "Doctor", "Doctor", "Nurse", "Nurse", "Nurse", "Nurse", "Technician",
            // "Doctor", "Doctor", "Doctor", "Nurse", "Nurse", "Nurse", "Nurse", "Technician",
            // "Doctor", "Doctor", "Doctor", "Nurse", "Nurse", "Nurse", "Nurse", "Technician",
            // "Doctor", "Doctor", "Doctor", "Nurse", "Nurse", "Nurse", "Nurse", "Technician",
            // "Doctor", "Doctor", "Doctor", "Nurse", "Nurse", "Nurse", "Nurse", "Technician"
        ];

        table = document.getElementById("staffTable");
        for (let i = 0; i < staff.length; i++) {
            var row = table.insertRow();
            var cellFirst = row.insertCell(0);
            var cellSecond = row.insertCell(1);
            cellFirst.innerText = jobs[i];
            cellSecond.innerText = staff[i];
        }

        // Adding staff to the Main Pane
        const staffMain = ["Evert Irmengard", "Sneha Lea", "Spartak Xochiquetzal", "Addie Alberto", "Maxim Cassarah", "Karl Barbara"];
        const jobsMain = ["Doctor", "Doctor", "Doctor", "Nurse", "Nurse", "Nurse"];
        const replace = [true, false, false, false, true, false];

        table = document.getElementById("main-staffTable");
        for (let i = 0; i < staffMain.length; i++) {
            var row = table.insertRow();
            var cellFirst = row.insertCell(0);
            var cellSecond = row.insertCell(1);
            if (replace[i]){ cellSecond.setAttribute("style", "text-decoration: line-through; text-decoration-thickness: 3px");}
            cellFirst.innerText = jobsMain[i];
            cellSecond.innerText = staffMain[i];
        }
    };

    // Adding Sidebar tabbing logic to main content
    document.getElementById("staff-tab").onclick = function () {
        document.getElementById("staff-tab-pane-2").classList.add("active");
        document.getElementById("staff-tab-pane-2").classList.add("show");

        document.getElementById("resource-tab-pane-2").classList.remove("active");
        document.getElementById("resource-tab-pane-2").classList.remove("show");
    }

    document.getElementById("resource-tab").onclick = function () {
        document.getElementById("staff-tab-pane-2").classList.remove("active");
        document.getElementById("staff-tab-pane-2").classList.remove("show");

        document.getElementById("resource-tab-pane-2").classList.add("active");
        document.getElementById("resource-tab-pane-2").classList.add("show");
    }





    // ---------------------------------------------------------------------------------------------------------------------------


    var $ = go.GraphObject.make;

    // Definiere das Layout für das Diagramm
    var myDiagram = 
        $(go.Diagram, "myDiagramDiv", {
            // Definiere verschiedene Eigenschaften für das Diagramm-Modell
            isReadOnly: true,
            // Generiere das Diagramm als Horizontaler Baum.
            layout: $(go.TreeLayout, { angle: 0, layerSpacing: 40 }),
            // Setze das Padding für das Diagramm
            padding: new go.Margin(20) // Beispielwert für das Padding
        }
    );
    


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
            $(go.Shape, shape, {
                fill: "white", // Die Hintergrundfarbe des Knotens ist weiß.
                strokeWidth: 2 // Die Linienstärke der Form beträgt 2 Pixel.
            }),
            $(go.TextBlock, {
                margin: 10,
                wrap: go.TextBlock.WrapFit
            },
            // Der Knoten-Text wird an das "text"-Attribut gebunden.
            new go.Binding("text", "text"))
        );
    }

    // Definiere die Knoten-Templates für verschiedene Kategorien
    myDiagram.nodeTemplateMap.add("Rectangle", createNodeTemplate("Rectangle"));
    myDiagram.nodeTemplateMap.add("Ellipse", createNodeTemplate("Ellipse"));



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
                console.log("Gruppe wurde geklickt: " + group.data.key);

                modal.style.display = "block";
            }
        },
        $(go.Panel, "Auto",
            $(go.Shape, "RoundedRectangle", {
                fill: "red", // Die Farbe der Ellipse wird durch den Parameter "color" festgelegt.
                
            }),
            $(go.Placeholder, {
                padding: 3
            })
        ));


    // Definiere die Gruppen-Templates
    
    myDiagram.groupTemplateMap.add("Gruppe1", gruppe1);
    myDiagram.groupTemplateMap.add("Gruppe2", gruppe2);


    // Hierbei handelt es sich um Testdaten. Die tatsächlichen Daten müssen zu einem späteren Zeitpunkt
    // aus einer XML-Datei ausgelesen werden. Falls die Daten nicht bereits in einer Baumstruktur vorliegen,
    // müssen sie zuerst in eine Baumstruktur umgewandelt werden.

    const nodes = [ // Erstelle Knotendaten für das Diagramm-Modell
        { id: 1, data:"a", staff:"1", next: [2], task:"Patient preparation", problem:false},
        { id: 2, data:"b", staff:"2", next: [3], task:"Surgery room preparation",problem:false},
        { id: 3, data:"c", staff:"3", next: [4], task:"Transport to OT",problem:false}, 
        { id: 4, data:"d", staff:"4", next: [5], task:"Anesthesia",problem:false},
        { id: 5, data:"e", staff:"5", next: [6, 7], task:"Surgery",problem:false},
        { id: 6, data:"f", staff:"6", next: [8], task:"Transport to post-surgery room",problem:false},
        { id: 7, data:"g", staff:"7", next: [9], task:"Cleaning surgery room",problem:false},
        { id: 8, data:"h", staff:"8", next: [10, 11, 13], task:"Transport to postpartum room",problem:true},
        { id: 9, data:"i", staff:"9", next: [12, 14], task:"Test Data 1",problem:false}, 
        { id: 10, data:"j", staff:"10", next: [], task:"Test Data 2",problem:false},
        { id: 11, data:"k", staff:"11", next: [], task:"Test Data 3",problem:false},
        { id: 12, data:"l", staff:"12", next: [], task:"Test Data 4",problem:false},
        { id: 13, data:"m", staff:"13", next: [15], task:"Test Data 5",problem:false},  
        { id: 14, data:"n", staff:"14", next: [], task:"Test Data 6",problem:false},  
        { id: 15, data:"o", staff:"15", next: [], task:"Test Data 7",problem:false},  
    ];

    dfs(nodes, 1);


    // Rekursive Funktion zur Generierung des Diagramms. Zuerst gehen wir in die Tiefe, um die Knoten zu platzieren.
    // Wir prüfen auch, ob ein Logik-Gatter platziert werden muss. Sobald ein Knoten für die Tiefe platziert wurde,
    // kehren wir in der Rekursion zurück und erstellen die Verbindungen zu den zuvor platzierten Knoten.


    function dfs(nodes, currentNodeId) {
        const currentNode = nodes[currentNodeId-1];
        const nextNodes = currentNode.next;
        
        // Setze die Knoten auf das Diagramm-Modell innerhalb einer Gruppe.
        myDiagram.model.addNodeData({key: currentNodeId + "group", isGroup: true, category: (currentNode.problem) ? "Gruppe2" : "Gruppe1"});
        
        // Erstelle den Diagramm-Knoten für Task, Data und Staff
        myDiagram.model.addNodeData({key: (currentNodeId + "data"), text: currentNode.data, category: "Ellipse", group: currentNodeId + "group"});
        myDiagram.model.addNodeData({key: currentNodeId, text: currentNode.task, category: "Rectangle", group: currentNodeId + "group"});
        myDiagram.model.addNodeData({key: (currentNodeId + "staff"), text: currentNode.staff, category: "Ellipse", group: currentNodeId + "group"});
        // Fügen Sie einen Link mit individuellen Eigenschaften zum Diagramm hinzu, einschließlich "isLayoutPositioned"
        
        myDiagram.model.addLinkData({from: (currentNodeId + "data"), to: currentNodeId, color: "red", category: "template1"});
        myDiagram.model.addLinkData({from: (currentNodeId + "staff"), to: currentNodeId, color: "red", category: "template1"});



        if (nextNodes.length > 1) {
            myDiagram.model.addNodeData({key: (currentNodeId + "gate"), text: "AND", category: "Circle"});
            myDiagram.model.addLinkData({from: currentNodeId, to: (currentNodeId + "gate")});
        }

        for (let i = 0; i < nextNodes.length; i++) {
            dfs(nodes, nextNodes[i]);

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


</script>