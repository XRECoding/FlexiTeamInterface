
  <script>
var $ = go.GraphObject.make;
var diagram = 
    $(go.Diagram, "myDiagramDiv", {
        // Definiere verschiedene Eigenschaften für das Diagramm-Modell
        isReadOnly: true,
        // Generiere das Diagramm als Horizontaler Baum.
        layout: $(go.TreeLayout, { angle: 0, layerSpacing: 40 })
    }
);

diagram.nodeTemplate =
  $(go.Node, "Auto",
    $(go.Shape, "Ellipse", { fill: "white" }),
    $(go.TextBlock,
      new go.Binding("text", "key"))
  );

  diagram.groupTemplate =
  $(go.Group, "Vertical",
    { layout: $(go.LayeredDigraphLayout, { direction: 90 }) },
    $(go.Panel, "Auto",
      $(go.Shape, "RoundedRectangle",  // surrounds the Placeholder
        { parameter1: 14,
          fill: "rgba(128,128,128,0.33)" }),
      $(go.Placeholder,    // represents the area of all member parts,
        { padding: 5})  // with some extra padding around them
    ),
    $(go.TextBlock,         // group title
      { alignment: go.Spot.Right, font: "Bold 12pt Sans-Serif" },
      new go.Binding("text", "key"))
  );





var nodeDataArray = [
  { key: "Alpha" },
  { key: "Beta", group: "Omega" },
  { key: "Gamma", group: "Omega" },
  { key: "Omega", isGroup: true },
  { key: "Delta" }
];
var linkDataArray = [
  { from: "Alpha", to: "Beta" },  // from outside the Group to inside it
  { from: "Beta", to: "Gamma" },  // this link is a member of the Group
  { from: "Omega", to: "Delta" }  // from the Group to a Node
];
diagram.model = new go.GraphLinksModel(nodeDataArray, linkDataArray);

  </script>
