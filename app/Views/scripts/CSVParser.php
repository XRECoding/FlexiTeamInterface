<script>
  const csvFileName = 'Workflow_new_updated_lateast.csv';

  // Die Funktion "loadCSV()" lädt eine CSV-Datei über eine XMLHttpRequest-Abfrage synchron, 
  // d.h. der Code blockiert, bis die Anfrage abgeschlossen ist. Wenn die Anfrage erfolgreich
  // ist (Statuscode 200), wird der Inhalt der CSV-Datei an die Funktion "processCSV()" übergeben,
  // die die Daten verarbeitet und in einem bestimmten Format zurückgibt.
  function loadCSV() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', csvFileName, false); // Durch false wird das ganze Synchron durchgeführt
    xhr.send();

    if (xhr.status === 200) {
      const csvContent = xhr.responseText;
      return processCSV(csvContent);
    }
  }


  // Die Funktion "processCSV(csvData)" nimmt den Inhalt einer CSV-Datei entgegen, zerlegt ihn
  // in Zeilen und erstellt ein Array mit Workflow-Daten. Jeder Workflow enthält eine eindeutige
  // ID, einen Typ und eine Liste von Unteraufgaben mit verschiedenen Eigenschaften wie Dauer,
  // Veranstaltungsort, Verfahren usw.
  function processCSV(csvData) {
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
                resourceQualification: line[14],
                problem: line[15]
            });
        }

        if (currentArray !== undefined) dataArray.push(currentArray);

        return dataArray;
  }

</script>
