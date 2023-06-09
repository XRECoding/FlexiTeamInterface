<script>
    function readCSV(file) {
        return new Promise(function(resolve, reject) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", file, false);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var csvData = xhr.responseText;
                    var data = processData(csvData);
                    resolve(data);
                } else {
                    reject(xhr.statusText);
                }
            };
            xhr.onerror = function() {
                reject(xhr.statusText);
            };
            xhr.send();
        });
    }

    function processData(csvData) {
        var lines = csvData.split("\n");
        var dataArray = [];
        var currentArray;
        var currentTask = "";

        for (var i = 1; i < lines.length; i++) {
            var line = lines[i].split(",");

            if (line[0] !== "") {
                if (currentArray !== undefined) dataArray.push(currentArray);
                currentArray = {
                    workflowId: line[0],
                    workflowType: line[1],
                    subTasks: []
                };
            }

            var nextTaskId = (line[9] !== "" && line[9] !== undefined) ? line[9].replace(/"/g, '').split("/") : "";

            currentArray.subTasks.push({
                workflowDuration: line[2],
                workflowVenue: line[3],
                workflowProcedures: line[4],
                taskId: line[5],
                tasks: line[6],
                taskPriority: line[7],
                taskDuration: line[8],
                nextTaskId: nextTaskId,
                consumedData: line[10],
                dataDescription: line[11],
                producedData: line[12],
                resources: line[13],
                resourceQualification: line[14]
            });
        }

        if (currentArray !== undefined) dataArray.push(currentArray);

        return dataArray;
    }

    function getCSVData(callback) {
        readCSV("Workflow_new_updated_lateast.csv")
            .then(function(data) {
                callback(data);
            })
            .catch(function(error) {
                console.log("Fehler beim Lesen der CSV-Datei:", error);
                callback(null);
                
            });
    }

    var data = getCSVData();
    console.log("hello");

    var foundObject = data.find(function(obj) {
        return obj.workflowId === "W01";
    });

    console.log(foundObject);

</script>