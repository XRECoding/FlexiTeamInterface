<script>
    let baseurl = '<?= base_url()?>';
    const filename = "Neu.csv";

    document.getElementById("csvSaveButton").onclick= function () {
        console.log(data);

        let outputString = "Workflow Id,Workflow Type,Workflow Duration,Workflow Venue,Workflow Procedures,Task Id,Tasks," +
            "Task Priority,Task Duration,Next Task Id,Consumed Data,Data Description,Produced Data,Resources," +
            "Resource Qualification,Problem\n";

        for (let i = 0; i < data.length; i++) {
            outputString +=   data[i].workflowId + "," +
                data[i].workflowType + ",";

            let bool = false;


            for (let j = 0; j < data[i].subTasks.length; j++) {
                if (bool) outputString += ",,";     // only the first row per procedure contains id and type

                outputString +=   data[i].subTasks[0].workflowDuration + "," +
                    data[i].subTasks[j].workflowVenue + "," +
                    data[i].subTasks[j].workflowProcedures + "," +
                    data[i].subTasks[j].taskId + "," +
                    data[i].subTasks[j].tasks + "," +
                    data[i].subTasks[j].taskPriority + "," +
                    data[i].subTasks[j].taskDuration + ",";

                for (let k = 0; k < data[i].subTasks[j].nextTaskId.length; k++) {
                    if (k == data[i].subTasks[j].nextTaskId.length -1) {
                        outputString += data[i].subTasks[j].nextTaskId[k];
                    } else {
                        outputString += data[i].subTasks[j].nextTaskId[k] + "/";
                    }
                }

                outputString += ",";

                outputString +=   data[i].subTasks[j].consumedData + "," +
                    data[i].subTasks[j].dataDescription + "," +
                    data[i].subTasks[j].producedData + "," +
                    data[i].subTasks[j].resources + "," +
                    data[i].subTasks[j].resourceQualification + "," +
                    data[i].subTasks[j].problem +",\n";

                bool = true;
            }

            // string = string.replaceAll("undefined", "");
        }



        $.ajax({
            type: "POST",
            url: baseurl + "/Index/writeCSV",
            data: {
                filename: filename,
                string: outputString
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