<!-- https://www.w3schools.com/xml/xml_parser.asp -->

<script>
    function loadXMLDoc() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {

            // Request finished and response 
            // is ready and Status is "OK"
            if (this.readyState == 4 && this.status == 200) {
                readXMLDoc(this);
            }
        };

        // casebase.xml is the external xml file
        xmlhttp.open("GET", "casebase.xml", true);
        xmlhttp.send();
    }

    function readXMLDoc(xml) {
        var xmlDoc = xml.responseXML;
        var x = xmlDoc.getElementById("W02");

        // Iterate over all occurrences
        for (elem of x.querySelectorAll("[c=TaskSemantic]")){
            console.log(elem.firstElementChild.getAttribute("v"));
        }
    }
    
</script>
