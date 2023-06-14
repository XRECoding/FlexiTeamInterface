<script>

    var data = loadCSV();

    var foundObject = data.find(function(obj) {
        return obj.workflowId === "W01";
    });


    // console.log(data);
    // console.log(foundObject.subTasks);


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
    // document.getElementById("test").onclick = function () {
    //     document.getElementById("myModalTest").style.display = "block";
    // }
    // ----------------------------------------------------------



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

    // window.onload = function () {
        // document.getElementById("resource-tab-pane-2").classList.add("active");
        // Adding procedures to the Dropdown
        // const critical = ["false", "true", "false", "true"];
        // console.log(data);


        // var select = document.getElementById("inputGroupSelect01");
        // data.forEach(function (item) {
            // var option = document.createElement('option');
            // option.text = item.workflowID;
            // select.add(option);

        // })
        // for (let i = 0; i < data.length; i++) {
        //     var test = data[i];
        //     console.log(test.workflowId);
        // }



        // var option2 = document.createElement('option');
        // option2.text = "test";
        // option2.classList.add("critical");
        // select.add(option2);
    // };

    // adding procedures to dropdown
    var select = document.getElementById("inputGroupSelect01");
    for (let i = 0; i < data.length; i++) {
        var test = data[i];
        var option = document.createElement('option');
        option.text = test.workflowId;      // TOdo should be Type
        option.value = i;

        for (let j = 0; j < data[i].subTasks.length; j++) {
            if (data[i].subTasks[j].problem == "yes"){
                // console.log(data[i].subTasks[j].tasks);
                option.classList.add("critical");
                break;
            }
        }
        select.add(option);
    }


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



</script>