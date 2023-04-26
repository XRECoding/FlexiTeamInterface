<script>

    function init() {


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
            alert("test");
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