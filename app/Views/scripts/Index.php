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



        // Since 2.2 you can also author concise templates with method chaining instead of GraphObject.make
        // For details, see https://gojs.net/latest/intro/buildingObjects.html
        const $ = go.GraphObject.make;  // for conciseness in defining templates

        myDiagram =
            $(go.Diagram, "myDiagramDiv",  // create a Diagram for the DIV HTML element
                {
                    // allow Ctrl-G to call groupSelection()
                    "commandHandler.archetypeGroupData": { text: "Group", isGroup: true, color: "blue" },

                    // enable undo & redo
                    "undoManager.isEnabled": true
                });


        // These nodes have text surrounded by a rounded rectangle
        // whose fill color is bound to the node data.
        // The user can drag a node by dragging its TextBlock label.
        // Dragging from the Shape will start drawing a new link.
        myDiagram.nodeTemplate =
            $(go.Node, "Auto",
                { locationSpot: go.Spot.Center },
                $(go.Shape, "RoundedRectangle",
                    {
                        fill: "white", // the default fill, if there is no data bound value
                        portId: "", cursor: "pointer",  // the Shape is the port, not the whole Node
                        // disallows all kinds of links from and to this port
                        fromLinkable: false, fromLinkableSelfNode: false, fromLinkableDuplicates: false,
                        toLinkable: false, toLinkableSelfNode: false, toLinkableDuplicates: false
                    },
                    new go.Binding("fill", "color")),
                $(go.TextBlock,
                    {
                        font: "bold 14px sans-serif",
                        stroke: '#333',
                        margin: 6,  // make some extra space for the shape around the text
                        isMultiline: true,  // don't allow newlines in text
                        editable: true  // allow in-place editing by user
                    },
                    new go.Binding("text", "text").makeTwoWay())  // the label shows the node data's text
            );

        // creating a node template for buttons
        const buttonTemplate = $(go.Node, "Auto",
            { locationSpot: go.Spot.Center },
            $(go.Shape, "Rectangle",
                { fill: "white" }),     // this defines the color surrounding
            $(go.Panel, "Vertical",
                { margin: -2 },
                $("Button",
                    { margin: 0,
                      padding: 0,
                        click: test },
                    $(go.TextBlock, "Click me"))
            )
        );


        // save the different templates in a map so they can be used when setting up nodes
        const templmap = new go.Map();
        templmap.add("button", buttonTemplate);
        templmap.add("", myDiagram.nodeTemplate);
        myDiagram.nodeTemplateMap = templmap;


        function test() {
            // alert("test");
            modal.style.display = "block";
        }


        // The link shape and arrowhead have their stroke brush data bound to the "color" property
        myDiagram.linkTemplate =
            $(go.Link,
                { toShortLength: 3, relinkableFrom: true, relinkableTo: true },  // allow the user to relink existing links
                $(go.Shape,
                    { strokeWidth: 2 },
                    new go.Binding("stroke", "color")),
                $(go.Shape,
                    { toArrow: "Standard", stroke: null },
                    new go.Binding("fill", "color"))
            );






        // Create the Diagram's Model:
        var nodeDataArray = [
            { key: 1, text: "Alpha", color: "white", category: "button" },
            { key: 2, text: "Beta", color: "white" },
            { key: 3, text: "Gamma", color: "white"},
            { key: 4, text: "Delta", color: "white"}
        ];
        var linkDataArray = [
            { from: 1, to: 2, color: "black" },
            { from: 2, to: 2 },
            { from: 3, to: 4, color: "black" },
            { from: 3, to: 1, color: "black" }
        ];
        myDiagram.model = new go.GraphLinksModel(nodeDataArray, linkDataArray);
    }
    window.addEventListener('DOMContentLoaded', init);
</script>