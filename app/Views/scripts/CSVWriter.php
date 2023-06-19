<script>
    let baseurl = '<?= base_url()?>';
    const filename = "Neu.csv";     // name of the file. should be set to the name of the AI exported file

    document.getElementById("csvSaveButton").onclick= function () {

        // set the header line for the CSV file
        let outputString = "Workflow Id,Workflow Type,Workflow Duration,Workflow Venue,Workflow Procedures,Task Id,Tasks," +
            "Task Priority,Task Duration,Next Task Id,Consumed Data,Data Description,Produced Data,Resources," +
            "Resource Qualification,Problem\n";

        // iterate over all procedures
        for (let i = 0; i < data.length; i++) {
            // write the procedure ID and type for the first row per procedure
            outputString +=   data[i].workflowId + "," +
                data[i].workflowType + ",";

            let bool = false;

            for (let j = 0; j < data[i].subTasks.length; j++) {
                // only the first row per procedure contains id and type. all other rows have empty cells instead
                if (bool) outputString += ",,";

                // write the data BEFORE the subtask data
                outputString +=   data[i].subTasks[0].workflowDuration + "," +
                    data[i].subTasks[j].workflowVenue + "," +
                    data[i].subTasks[j].workflowProcedures + "," +
                    data[i].subTasks[j].taskId + "," +
                    data[i].subTasks[j].tasks + "," +
                    data[i].subTasks[j].taskPriority + "," +
                    data[i].subTasks[j].taskDuration + ",";

                // write the subtask data
                for (let k = 0; k < data[i].subTasks[j].nextTaskId.length; k++) {
                    if (k == data[i].subTasks[j].nextTaskId.length -1) {
                        // the last entry doesnt need a separator
                        outputString += data[i].subTasks[j].nextTaskId[k];
                    } else {
                        // all the other entries need a separator
                        outputString += data[i].subTasks[j].nextTaskId[k] + "/";
                    }
                }

                outputString += ",";

                // write the data AFTER the subtask
                outputString +=   data[i].subTasks[j].consumedData + "," +
                    data[i].subTasks[j].dataDescription + "," +
                    data[i].subTasks[j].producedData + "," +
                    data[i].subTasks[j].resources + "," +
                    data[i].subTasks[j].resourceQualification + "," +
                    data[i].subTasks[j].problem +",\n";

                // we are within one procedure so bool has to be true in order to skip the workflow ID and type
                bool = true;
            }
        }


        // Ajax request to create / write the CSV file
        $.ajax({
            type: "POST",
            url: baseurl + "/Index/writeCSV",
            data: {
                filename: filename,     // the desired filename
                string: outputString    // the created string to be written
            },
            success: function (response) {
                console.log("success " + response);
            },
            error: function (request, status, error) {
                alert("AJAX Error: " + error);
            }
        });
    }
</script>