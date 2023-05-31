<!-- https://www.w3schools.com/xml/xml_parser.asp -->

<script>

loadXMLDoc();
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
        // for (elem of x.querySelectorAll("[c=TaskSemantic]")){
        //     console.log(elem.firstElementChild.getAttribute("v"));
        // }
        // console.log((x.childNodes[1]).childNodes.length);
        for (elem of (x.childNodes[3]).childNodes){
            console.log(elem);
        }

        // console.log(x.querySelectorAll("[c=ResourceSemantic]").length);
        // console.log(x.querySelectorAll("[c=TaskSemantic]").length);
        // console.log(x.querySelectorAll("[c=DataSemantic]").length);
    }
    
</script>
