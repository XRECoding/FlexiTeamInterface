<script>

    var data = loadCSV();

    var foundObject = data.find(function(obj) {
        return obj.workflowId === "W01";
    });


    console.log(data);
    console.log(foundObject.subTasks);


    $("tbody").sortable({connectWith:"tbody"});

    // keeping track of the id of the clicked node
    let clickedNodeId = null;

    // Get the modal
    var modal = document.getElementById("myModal");

    // Adding closing functionality to modal close button
    document.getElementById("modalClose").onclick = function () {
        console.log("Close");
        modal.style.display = "none";
    }

    // ----------------------------------------------------------
    document.getElementById("test").onclick = function () {
        modal.style.display = "block";
    }
    // ----------------------------------------------------------

    // Adding save functionality to modal save button
    document.getElementById("saveButton").onclick = function () {
        // saving resources
        var table = document.getElementById("main-resourceTable");
        var writeString = "";
        for (var i = 0, row; row = table.rows[i]; i++) {
            writeString += row.cells[0].textContent + ", ";
        }
        writeString =   writeString.substr(0, writeString.length-2);

        var clickedNode = myDiagram.findNodeForKey(clickedNodeId + "data");
        myDiagram.select(clickedNode);
        myDiagram.model.commit(m => {
            m.set(clickedNode.data, "text", writeString);
        }, "changed text");

        // also writing into the array to make a save state possible
        nodes[clickedNodeId-1].data = writeString;


        // saving staff
        table = document.getElementById("main-staffTable");
        writeString = "";
        for (var i = 0, row; row = table.rows[i]; i++) {
            writeString += row.cells[1].textContent + ", ";
        }
        writeString =   writeString.substr(0, writeString.length-2);

        clickedNode = myDiagram.findNodeForKey(clickedNodeId + "staff");
        myDiagram.select(clickedNode);
        myDiagram.model.commit(m => {
            m.set(clickedNode.data, "text", writeString);
        }, "changed text");

        // also writing into the array to make a save state possible
        nodes[clickedNodeId-1].staff = writeString;


        // var test = clickedNode.findSubGraphParts();
        console.log(nodes);

        modal.style.display = "none";
    }

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

    function sidebarFill(){
        // removing all old rows
        // its probably more efficient to create a new tbody element und replace the old one
        var table = document.getElementById("staffTable");
        while(table.hasChildNodes()){
            table.removeChild(table.firstChild);
        }

        table = document.getElementById("resourceTable");
        while(table.hasChildNodes()){
            table.removeChild(table.firstChild);
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


        // Adding resources to the Sidebar
        const resources = ["Stretcher", "Stethoscope", "Needle", "Tape", "Scissors"];
        const resourceNumbers = ["1", "2", "3", "4", "5"];

        table = document.getElementById("resourceTable");
        for (let i = 0; i < resources.length; i++) {
            var row = table.insertRow();
            var cellFirst = row.insertCell(0);
            var cellSecond = row.insertCell(1);
            cellFirst.innerText = resources[i];
            cellSecond.innerText = resourceNumbers[i];
        }
    }


    // -----------------------------------------------------------------------------------------------------------


  //  Kilian onclick methode start------------------------------------
    /*
    var gruppe2 =
        $(go.Group, "Vertical", {
                layout: $(go.LayeredDigraphLayout, { direction: 0 }),
                click: function(e, group) {
                    // Behandle den Klick auf die Gruppe hier
                    // console.log("Gruppe wurde geklickt: " + group.data.key);

                    // var clickedNode = myDiagram.findNodeForKey(group.data.key);

                    console.log(nodes);

                    // set the id of the clicked node
                    clickedNodeId = group.data.key.replace("group", "");   // Todo find better solution. eg working with GoJS groups


                    // adding staff & resources to the sidebar table
                    sidebarFill();

                    // Adding resources to the Main Pane
                    var clickedNode = myDiagram.findNodeForKey(clickedNodeId + "data");
                    const resourcesMain = clickedNode.data.text.split(", ");
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
                    const staffMain = clickedNode.data.text.split(", ");
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

                    // changing the progress bar
                    var clickedNode = myDiagram.findNodeForKey(clickedNodeId);
                    document.getElementById("progressBar").innerHTML = clickedNode.data.text;



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
*/
    //  Kilian onclick methode ende------------------------------------





</script>