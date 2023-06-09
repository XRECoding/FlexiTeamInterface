<script>
// Definieren Sie ein Diagramm und den Diagrammtyp
var diagram = new go.Diagram("myDiagramDiv");
diagram.initialContentAlignment = go.Spot.Center;

// Fügen Sie einen Knotentyp hinzu, der scrollbar ist
diagram.nodeTemplate =
  gojs(go.Node, "Auto",
    { resizable: true, resizeObjectName: "BODY" },
    gojs(go.Shape, "RoundedRectangle", { fill: "white" }),
    gojs(go.Panel, "Vertical",
      { defaultAlignment: go.Spot.Left, margin: 5 },
      gojs(go.TextBlock,
        { margin: 5, editable: true },
        new go.Binding("text", "text").makeTwoWay()
      )
    ),
    // Hinzufügen der Scrollbalken
    gojs("ScrollBar",
      { alignment: go.Spot.Right, width: 10 },
      new go.Binding("visible", "visible").ofObject("BODY").not()
    ),
    // Verknüpfen der Scrollbar mit dem Inhalt des Knotens
    {
      mouseEnter: function(e, obj) { showScrollBar(obj, true); },
      mouseLeave: function(e, obj) { showScrollBar(obj, false); }
    }
  );

// Hilfsfunktion zum Ein- und Ausblenden der Scrollbar
function showScrollBar(node, show) {
  var ad = node.findAdornment("ScrollBar");
  if (ad !== null) ad.findObject("BODY").visible = show;
}

// Erstellen Sie einige Knoten mit langem Text
diagram.model = new go.GraphLinksModel(
  [
    { key: 1, text: "Langer Text für Knoten 1. Dieser Text wird im scrollbaren Knoten angezeigt." },
    { key: 2, text: "Ein weiterer langer Text für Knoten 2. Der Inhalt kann über den Scrollbalken gescrollt werden." }
  ],
  [
    { from: 1, to: 2 }
  ]
);

</script>
