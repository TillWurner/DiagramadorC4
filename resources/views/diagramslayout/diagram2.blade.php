<!DOCTYPE html>
<link rel="stylesheet" href={{asset("https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css")}} integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
{{-- ***CSS*** --}}
<link rel="stylesheet" href={{ asset('gojscss/diagram.css') }}>
{{-- ***ParaPdf*** --}}
{{-- <script src="https://unpkg.com/gojs"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/require.js/2.3.6/require.min.js"></script> --}}
{{-- ***ParaPdf*** --}}
<html lang="en">
  <head>
    <meta charset="utf-8"/>
   {{--***SCRIPTS-BOOTSTRAP-MODAL*** --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    {{--***SCRIPTS-BOOTSTRAP-MODAL*** --}}
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover"/>
    <meta name="description" content="Drag a link to reconnect it. Nodes have custom Adornments for selection, resizing, and rotating.  The Palette includes links."/> 
    <link rel="stylesheet" href="{{ asset('site/assets/css/style.css')}}"/> 
    <!-- Copyright 1998-2022 by Northwoods Software Corporation. -->
    <title>My Diagram</title>
    <script src="https://cdn.socket.io/4.5.3/socket.io.min.js" integrity="sha384-WPFUvHkB1aHA5TDSZi6xtDgkF0wXJcIIxXhC6h8OT8EH3fC5PWro5pWJ1THjcfEi" crossorigin="anonymous"></script>
    <script type="importmap">
        {
          "imports": {
            "socket.io-client": "https://cdn.socket.io/4.4.1/socket.io.esm.min.js"
          }
        }
      </script>
      <script type="module">
        import { io } from "socket.io-client";
    </script>
    @livewireStyles
    @livewireScripts
  </head>
  <body>
    <!-- This top nav is not part of the sample code -->    {{-- TODO ESTO ES LA PARTE DE ARRIBA --}}
  <nav id="navTop" class="w-full z-30 top-0 text-white bg-nwoods-primary">
    <div class="w-full container max-w-screen-lg mx-auto flex flex-wrap sm:flex-nowrap items-center justify-between mt-0 py-2">
      <div class="md:pl-4">
        <a class="text-white hover:text-white no-underline hover:no-underline
        font-bold text-2xl lg:text-4xl rounded-lg hover:bg-nwoods-secondary " href="../">
          <h1 class="mb-0 p-1 ">My Diagram</h1>
        </a>
      </div>
    </div>
    <hr class="border-b border-gray-600 opacity-50 my-0 py-0" />
  </nav>
  <div class="md:flex flex-col md:flex-row md:min-h-screen w-full max-w-screen-xl mx-auto">
      <div class="navSide" > {{-- TODO EL SIDEBAR --}}
        <br>
        <h1 class="titlenav">Bienvenido!</h1>
        <h1 class="welcome">Piensa, diseña y </h1>
        <h1 class="welcome">programa!</h1>
        <br>
        <button class="btn btn-secondary">Exportar Diagrama</button>
        <button class="btn btn-secondary" onclick="pdf()">Exportar PDF</button>
        <button class="btn btn-secondary" onclick="makeBlob()">Exportar Jpg</button>
        <button class="btn btn-secondary" onclick="imprimir()">Imprimir</button>
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter">Invitar Colaboradores</button>
        @if ($user == $autor)
        <form method="GET" action="{{ route('export.json') }}">
          {{method_field('GET')}}
           {{csrf_field()}}
           <button class="btn btn-secondary"  type="submit" >Exportar Json</button>   {{-- EL BOTON NO DEBE TENER NAME --}}
         </form>    
        @endif
        
        {{--  <a href="download.php?file=codeworld.json" class="btn btn-secondary" >Descargar</a> --}}
        {{-- <button class="btn btn-secondary" onclick="<?php json($id) ?>">Json</button> --}}
        <?php 
        /* $db=connection_pgsql() or die('Sin conexion a la bd'); */
            //No es necesario hacer la conexion a la bd, igual funciona ocupar la variable que viene del controlador
               /* $db = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=diagramador;user=postgres;password=zeinaldo123");
              $query = "SELECT * FROM public.diagramas where id = $id ";
              $result = $db->prepare($query);
              $results = $result->execute();
              $row = $result->fetch();   //ENCONTRO EL JSON
              $file = $row['json'];
              echo "<script>console.log({$var})</script>";
              $json = json_encode($file); */ //No se ocupa //Hasta ACA COMENTAR  
              $file_name = 'diagram.json';
              file_put_contents($file_name, $var);  //OCUPAR LA VAR QUE VIENE DEL CONTROLADOR file_put_contents($file_name, $var);
              /* echo "<script>console.log({$json})</script>"; 
              header('Cache-control: private');
              header('Content-Type: application/octet-stream'); 
              header('Content-Length: '.strlen($json));
              header('Content-Disposition: filename=json.json');
              flush();
              print ($json) */
              /* echo "<script>console.log('" . json_encode($json) . "');</script>"; */
              /* header('Content-Type: application/json');
              header('Content-Disposition: attachment');
              flush();
              print ($json); */
              
             /*  $file_name = 'diagram.json';
               if (file_put_contents($file_name,file_get_contents($file_name))){ */
                //echo "<script>console.log({$file_name})</script>"; 
                
                 /* . 'File created' */; 
              //};  //Hasta aca descarga en la carpeta public
              
              /* echo "<script>console.log('" . json_encode($file_name) . "');</script>"; */

              //Prueba 1
             /*   header('Content-Type: application/json');
              header('Content-Description: File Transfer');
              header('Content-Length: ' . filesize($file));
              header('Content-Disposition: attachment; filename="'.basename($file).'"');  */
              
              //Prueba 2
              /* header('Content-Type: application/json');
              header('Content-Disposition: attachment; filename=data.json');
              header('Expires: 0'); //No caching allowed
              header('Cache-Control: must-revalidate'); */
              /* header('Content-Length: ' . strlen($file)); */
              /* file_put_contents('php://output', $file); */
              /* readfile($file_name);
             
              //Prueba 3
              /*header('Content-Disposition: attachment; filename=data.json');
              header('Expires: 0'); //No caching allowed
              header('Cache-Control: must-revalidate');
              header('Content-Length: ' . strlen($file));
              file_put_contents('php://output', $file); */
              /* readfile($file_name);
              exit; */
              /* echo "<script>console.log('" . json_encode($file) . "');</script>"; 
                  */ 
         /*  echo '<button class="btn btn-secondary" onclick="<?php get($id) ?>">Json</button>'; */
            /* echo '<a href="'.$file_name .'" class="btn btn-secondary">raa</a>'; */ 
        ?>  
        
        <?php
        /* $file_name = 'diagram.json';
              file_put_contents($file_name, $var); */
        ?>
        @if ($user == $autor)
        <form method="POST" action="{{url('/diag/'.$id)}}">
          {{method_field('POST')}}
           {{csrf_field()}}
           <input type="hidden"  name="json" id="mensaje" >
           <button class="btn btn-secondary"  type="submit" >Guardar Diagrama</button>   {{-- EL BOTON NO DEBE TENER NAME --}}
         </form>    
        @endif
          {{-- <button type="submit"><ion-icon name="trash-outline"></ion-icon></button> --}} {{-- Boton bonito --}}
          <a href={{route('home')}}>
            <button class="btn btn-secondary">Salirse</button>
          </a>
    </div>
    
    <!-- * * * * * * * * * * * * * -->
    <!-- Start of GoJS sample code -->

    {{-- AQUI EMPIEZA LO DIVERTIDO XD --}}
  <script src="https://unpkg.com/gojs@2.2.17/release/go.js"></script>
  <div id="allSampleContent" class="p-4 w-full">
  <script src="https://unpkg.com/gojs@2.2.17/extensions/Figures.js"></script>
  <script src="https://unpkg.com/gojs@2.2.17/extensions/DrawCommandHandler.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/require.js/2.3.6/require.min.js"></script>
    <script id="code" type="text/javascript">
      const socket = io("http://3.89.131.123:3000/", {
            transports: ["websocket"]
        });
        const sala = <?php echo $id ?> 
        console.log(sala);
        socket.emit('unirme_sala', sala );
    function init() {

      // Since 2.2 you can also author concise templates with method chaining instead of GraphObject.make
      // For details, see https://gojs.net/latest/intro/buildingObjects.html
      const $ = go.GraphObject.make;

      myDiagram =
        $(go.Diagram, "myDiagramDiv",
          {
            padding: 20,  // extra space when scrolled all the way
            grid: $(go.Panel, "Grid",  // a simple 10x10 grid
              $(go.Shape, "LineH", { stroke: "lightgray", strokeWidth: 0.5 }),
              $(go.Shape, "LineV", { stroke: "lightgray", strokeWidth: 0.5 })
            ),
            "draggingTool.isGridSnapEnabled": true,
            "animationManager.isEnabled": false,
            handlesDragDropForTopLevelParts: true,
            mouseDrop: e => {
              // when the selection is dropped in the diagram's background,
              // make sure the selected Parts no longer belong to any Group
              var ok = e.diagram.commandHandler.addTopLevelParts(e.diagram.selection, true);
              if (!ok) e.diagram.currentTool.doCancel();
              socket.emit('actualizar_diagrama', myDiagram.model.toJson(), sala ); 
              socket.on('diagrama_actualizado', (diagrama) => {
                // console.log(diagrama);
                myDiagram.model = go.Model.fromJson(diagrama);
                document.getElementById("mySavedModel").value = diagrama;
                $doc = document.getElementById("mySavedModel").value;
                 /* return $doc;  */
                document.getElementById("mensaje").value = $doc;
              } );
              //  console.log(myDiagram.model.toJson()); 
            },
            commandHandler: $(DrawCommandHandler),  // support offset copy-and-paste
            "clickCreatingTool.archetypeNodeData": { text: "NEW NODE" },  // create a new node by double-clicking in background
            "PartCreated": e => {
              var node = e.subject;  // the newly inserted Node -- now need to snap its location to the grid
              node.location = node.location.copy().snapToGridPoint(e.diagram.grid.gridOrigin, e.diagram.grid.gridCellSize);
              setTimeout(() => {  // and have the user start editing its text
                e.diagram.commandHandler.editTextBlock();
              }, 20);
            },
            "commandHandler.archetypeGroupData": { isGroup: true, text: "NEW GROUP" },
            "SelectionGrouped": e => {
              var group = e.subject;
              setTimeout(() => {  // and have the user start editing its text
                e.diagram.commandHandler.editTextBlock();
              })
            },
            "LinkRelinked": e => {
              // re-spread the connections of other links connected with both old and new nodes
              var oldnode = e.parameter.part;
              oldnode.invalidateConnectedLinks();
              var link = e.subject;
              if (e.diagram.toolManager.linkingTool.isForwards) {
                link.toNode.invalidateConnectedLinks();
              } else {
                link.fromNode.invalidateConnectedLinks();
              }
            },
            "undoManager.isEnabled": true
          });


      // Node template

      myDiagram.nodeTemplate =
        $(go.Node, "Auto",
          {
            locationSpot: go.Spot.Center, locationObjectName: "SHAPE",
            desiredSize: new go.Size(120, 60), minSize: new go.Size(40, 40),
            resizable: true, resizeCellSize: new go.Size(20, 20)
          },
          // these Bindings are TwoWay because the DraggingTool and ResizingTool modify the target properties
          new go.Binding("location", "loc", go.Point.parse).makeTwoWay(go.Point.stringify),
          new go.Binding("desiredSize", "size", go.Size.parse).makeTwoWay(go.Size.stringify),
          $(go.Shape,
            { // the border
              name: "SHAPE", fill: "white",
              portId: "", cursor: "pointer",
              fromLinkable: true, toLinkable: true,
              fromLinkableDuplicates: true, toLinkableDuplicates: true,
              fromSpot: go.Spot.AllSides, toSpot: go.Spot.AllSides
            },
            new go.Binding("figure"),
            new go.Binding("fill"),
            new go.Binding("stroke", "color"),
            new go.Binding("strokeWidth", "thickness"),
            new go.Binding("strokeDashArray", "dash")),
          // this Shape prevents mouse events from reaching the middle of the port
          $(go.Shape, { width: 100, height: 40, strokeWidth: 0, fill: "transparent" }),
          $(go.TextBlock,
            { margin: 1, textAlign: "center", overflow: go.TextBlock.OverflowEllipsis, editable: true },
            // this Binding is TwoWay due to the user editing the text with the TextEditingTool
            new go.Binding("text").makeTwoWay(),
            new go.Binding("stroke", "color"))
        );

      myDiagram.nodeTemplate.toolTip =
        $("ToolTip",  // show some detailed information
          $(go.Panel, "Vertical",
            { maxSize: new go.Size(200, NaN) },  // limit width but not height
            $(go.TextBlock,
              { font: "bold 10pt sans-serif", textAlign: "center" },
              new go.Binding("text")),
            $(go.TextBlock,
              { font: "10pt sans-serif", textAlign: "center" },
              new go.Binding("text", "details"))
          )
        );

      // Node selection adornment
      // Include four large triangular buttons so that the user can easily make a copy
      // of the node, move it to be in that direction relative to the original node,
      // and add a link to the new node.

      function makeArrowButton(spot, fig) {
        var maker = (e, shape) => {
            e.handled = true;
            e.diagram.model.commit(m => {
              var selnode = shape.part.adornedPart;
              // create a new node in the direction of the spot
              var p = new go.Point().setRectSpot(selnode.actualBounds, spot);
              p.subtract(selnode.location);
              p.scale(2, 2);
              p.x += Math.sign(p.x) * 60;
              p.y += Math.sign(p.y) * 60;
              p.add(selnode.location);
              p.snapToGridPoint(e.diagram.grid.gridOrigin, e.diagram.grid.gridCellSize);
              // make the new node a copy of the selected node
              var nodedata = m.copyNodeData(selnode.data);
              // add to same group as selected node
              m.setGroupKeyForNodeData(nodedata, m.getGroupKeyForNodeData(selnode.data));
              m.addNodeData(nodedata);  // add to model
              // create a link from the selected node to the new node
              var linkdata = { from: selnode.key, to: m.getKeyForNodeData(nodedata) };
              m.addLinkData(linkdata);  // add to model
              // move the new node to the computed location, select it, and start to edit it
              var newnode = e.diagram.findNodeForData(nodedata);
              newnode.location = p;
              e.diagram.select(newnode);
              setTimeout(() => {
                e.diagram.commandHandler.editTextBlock();
              }, 20);
            });
          };
        return $(go.Shape,
          {
            figure: fig,
            alignment: spot, alignmentFocus: spot.opposite(),
            width: (spot.equals(go.Spot.Top) || spot.equals(go.Spot.Bottom)) ? 36 : 18,
            height: (spot.equals(go.Spot.Top) || spot.equals(go.Spot.Bottom)) ? 18 : 36,
            fill: "orange", strokeWidth: 0,
            isActionable: true,  // needed because it's in an Adornment
            click: maker, contextClick: maker
          });
      }

      // create a button that brings up the context menu
      function CMButton(options) {
        return $(go.Shape,
          {
            fill: "orange", stroke: "gray", background: "transparent",
            geometryString: "F1 M0 0 M0 4h4v4h-4z M6 4h4v4h-4z M12 4h4v4h-4z M0 12",
            isActionable: true, cursor: "context-menu",
            click: (e, shape) => {
              e.diagram.commandHandler.showContextMenu(shape.part.adornedPart);
            }
          },
          options || {});
      }

      myDiagram.nodeTemplate.selectionAdornmentTemplate =
        $(go.Adornment, "Spot",
          $(go.Placeholder, { padding: 10 }),
          makeArrowButton(go.Spot.Top, "TriangleUp"),
          makeArrowButton(go.Spot.Left, "TriangleLeft"),
          makeArrowButton(go.Spot.Right, "TriangleRight"),
          makeArrowButton(go.Spot.Bottom, "TriangleDown"),
          CMButton({ alignment: new go.Spot(0.75, 0) })
        );

      // Common context menu button definitions

      // All buttons in context menu work on both click and contextClick,
      // in case the user context-clicks on the button.
      // All buttons modify the node data, not the Node, so the Bindings need not be TwoWay.

      // A button-defining helper function that returns a click event handler.
      // PROPNAME is the name of the data property that should be set to the given VALUE.
      function ClickFunction(propname, value) {
        return (e, obj) => {
            e.handled = true;  // don't let the click bubble up
            e.diagram.model.commit(m => {
              m.set(obj.part.adornedPart.data, propname, value);
            });
          };
      }

      // Create a context menu button for setting a data property with a color value.
      function ColorButton(color, propname) {
        if (!propname) propname = "color";
        return $(go.Shape,
          {
            width: 16, height: 16, stroke: "lightgray", fill: color,
            margin: 1, background: "transparent",
            mouseEnter: (e, shape) => shape.stroke = "dodgerblue",
            mouseLeave: (e, shape) => shape.stroke = "lightgray",
            click: ClickFunction(propname, color), contextClick: ClickFunction(propname, color)
          });
      }

      function LightFillButtons() {  // used by multiple context menus
        return [
          $("ContextMenuButton",
            $(go.Panel, "Horizontal",
              ColorButton("white", "fill"), ColorButton("beige", "fill"), ColorButton("aliceblue", "fill"), ColorButton("lightyellow", "fill")
            )
          ),
          $("ContextMenuButton",
            $(go.Panel, "Horizontal",
              ColorButton("lightgray", "fill"), ColorButton("lightgreen", "fill"), ColorButton("lightblue", "fill"), ColorButton("pink", "fill")
            )
          )
        ];
      }

      function DarkColorButtons() {  // used by multiple context menus
        return [
          $("ContextMenuButton",
            $(go.Panel, "Horizontal",
              ColorButton("black"), ColorButton("green"), ColorButton("blue"), ColorButton("red")
            )
          ),
          $("ContextMenuButton",
            $(go.Panel, "Horizontal",
              ColorButton("brown"), ColorButton("magenta"), ColorButton("purple"), ColorButton("orange")
            )
          )
        ];
      }

      // Create a context menu button for setting a data property with a stroke width value.
      function ThicknessButton(sw, propname) {
        if (!propname) propname = "thickness";
        return $(go.Shape, "LineH",
          {
            width: 16, height: 16, strokeWidth: sw,
            margin: 1, background: "transparent",
            mouseEnter: (e, shape) => shape.background = "dodgerblue",
            mouseLeave: (e, shape) => shape.background = "transparent",
            click: ClickFunction(propname, sw), contextClick: ClickFunction(propname, sw)
          });
      }

      // Create a context menu button for setting a data property with a stroke dash Array value.
      function DashButton(dash, propname) {
        if (!propname) propname = "dash";
        return $(go.Shape, "LineH",
          {
            width: 24, height: 16, strokeWidth: 2,
            strokeDashArray: dash,
            margin: 1, background: "transparent",
            mouseEnter: (e, shape) => shape.background = "dodgerblue",
            mouseLeave: (e, shape) => shape.background = "transparent",
            click: ClickFunction(propname, dash), contextClick: ClickFunction(propname, dash)
          });
      }

      function StrokeOptionsButtons() {  // used by multiple context menus
        return [
          $("ContextMenuButton",
            $(go.Panel, "Horizontal",
              ThicknessButton(1), ThicknessButton(2), ThicknessButton(3), ThicknessButton(4)
            )
          ),
          $("ContextMenuButton",
            $(go.Panel, "Horizontal",
              DashButton(null), DashButton([2, 4]), DashButton([4, 4])
            )
          )
        ];
      }

      // Node context menu

      function FigureButton(fig, propname) {
        if (!propname) propname = "figure";
        return $(go.Shape,
          {
            width: 32, height: 32, scale: 0.5, fill: "lightgray", figure: fig,
            margin: 1, background: "transparent",
            mouseEnter: (e, shape) => shape.fill = "dodgerblue",
            mouseLeave: (e, shape) => shape.fill = "lightgray",
            click: ClickFunction(propname, fig), contextClick: ClickFunction(propname, fig)
          });
      }

      myDiagram.nodeTemplate.contextMenu =
        $("ContextMenu",
          $("ContextMenuButton",
            $(go.Panel, "Horizontal",
              FigureButton("Rectangle"), FigureButton("RoundedRectangle"), FigureButton("Ellipse"), FigureButton("Diamond")
            )
          ),
          $("ContextMenuButton",
            $(go.Panel, "Horizontal",
              FigureButton("Parallelogram2"), FigureButton("ManualOperation"), FigureButton("Procedure"), FigureButton("Cylinder1")
            )
          ),
          $("ContextMenuButton",
            $(go.Panel, "Horizontal",
              FigureButton("Terminator"), FigureButton("CreateRequest"), FigureButton("Document"), FigureButton("TriangleDown")
            )
          ),
          LightFillButtons(),
          DarkColorButtons(),
          StrokeOptionsButtons()
        );


      // Group template

      myDiagram.groupTemplate =
        $(go.Group, "Spot",
          {
            layerName: "Background",
            ungroupable: true,
            locationSpot: go.Spot.Center,
            selectionObjectName: "BODY",
            computesBoundsAfterDrag: true,  // allow dragging out of a Group that uses a Placeholder
            handlesDragDropForMembers: true,  // don't need to define handlers on Nodes and Links
            mouseDrop: (e, grp) => {  // add dropped nodes as members of the group
              var ok = grp.addMembers(grp.diagram.selection, true);
              if (!ok) grp.diagram.currentTool.doCancel();
            },
            avoidable: false
          },
          new go.Binding("location", "loc", go.Point.parse).makeTwoWay(go.Point.stringify),
          $(go.Panel, "Auto",
            { name: "BODY" },
            $(go.Shape,
              {
                parameter1: 10,
                fill: "white", strokeWidth: 2,
                portId: "", cursor: "pointer",
                fromLinkable: true, toLinkable: true,
                fromLinkableDuplicates: true, toLinkableDuplicates: true,
                fromSpot: go.Spot.AllSides, toSpot: go.Spot.AllSides
              },
              new go.Binding("fill"),
              new go.Binding("stroke", "color"),
              new go.Binding("strokeWidth", "thickness"),
              new go.Binding("strokeDashArray", "dash")),
            $(go.Placeholder,
              { background: "transparent", margin: 10 })
          ),
          $(go.TextBlock,
            {
              alignment: go.Spot.Top, alignmentFocus: go.Spot.Bottom,
              font: "bold 12pt sans-serif", editable: true
            },
            new go.Binding("text"),
            new go.Binding("stroke", "color"))
        );

      myDiagram.groupTemplate.selectionAdornmentTemplate =
        $(go.Adornment, "Spot",
          $(go.Panel, "Auto",
            $(go.Shape, { fill: null, stroke: "dodgerblue", strokeWidth: 3 }),
            $(go.Placeholder, { margin: 1.5 })
          ),
          CMButton({ alignment: go.Spot.TopRight, alignmentFocus: go.Spot.BottomRight })
        );

      myDiagram.groupTemplate.contextMenu =
        $("ContextMenu",
          LightFillButtons(),
          DarkColorButtons(),
          StrokeOptionsButtons()
        );
      
        // initialize the Palette that is on the left side of the page
      myPalette =
        $(go.Palette, "myPaletteDiv",  // must name or refer to the DIV HTML element
          {
            maxSelectionCount: 1,
            nodeTemplateMap: myDiagram.nodeTemplateMap,  // share the templates used by myDiagram
            linkTemplate: // simplify the link template, just in this Palette
              $(go.Link,
                { // because the GridLayout.alignment is Location and the nodes have locationSpot == Spot.Center,
                  // to line up the Link in the same manner we have to pretend the Link has the same location spot
                  locationSpot: go.Spot.Center,
                  selectionAdornmentTemplate:
                    $(go.Adornment, "Link",
                      { locationSpot: go.Spot.Center },
                      $(go.Shape,
                        { isPanelMain: true, fill: null, stroke: "deepskyblue", strokeWidth: 0 }),
                      $(go.Shape,  // the arrowhead
                        { toArrow: "Standard", stroke: null })
                    )
                },
                {
                  routing: go.Link.AvoidsNodes,
                  curve: go.Link.JumpOver,
                  corner: 5,
                  toShortLength: 4
                },
                new go.Binding("points"),
                $(go.Shape,  // the link path shape
                  { isPanelMain: true, strokeWidth: 2 }),
                $(go.Shape,  // the arrowhead
                  { toArrow: "Standard", stroke: null })
              ),
            model: new go.GraphLinksModel([  // specify the contents of the Palette
              { text: "Container" ,figure: "Rectangle", "size":"75 80", fill: "transparent", strokeWidth: 3,
            strokeDashArray: [4, 2]  },
              { text: "Component" ,figure: "Rectangle", "size":"75 80", fill: "blue"},
              { text: "DataBase", figure: "MagneticData","size":"75 80", fill: "lightgray" },
              { text: "Software System", figure: "InternalStorage", "size":"75 75", fill: "lightskyblue" },
              { text: "Web browser", figure: "CreateRequest", "size":"75 75", fill: "lightskyblue" },
              { text: "Mobile app", figure: "Procedure", "size":"75 75", fill: "#CE0620" },
              { text: "Class", figure: "Class","size":"75 75", fill: "white" },
              { text: "User", figure: "BpmnTaskUser","size":"75 75", fill: "blue" }
            ], [
                // the Palette also has a disconnected Link, which the user can drag-and-drop
                //{ points: new go.List(/*go.Point*/).addAll([new go.Point(0, 0), new go.Point(30, 0), new go.Point(30, 40), new go.Point(60, 40)]) }
              ])
          });

      // Link template

      myDiagram.linkTemplate =
        $(go.Link,
          {
            layerName: "Foreground",
            routing: go.Link.AvoidsNodes, corner: 10,
            toShortLength: 4,  // assume arrowhead at "to" end, need to avoid bad appearance when path is thick
            relinkableFrom: true, relinkableTo: true,
            reshapable: true, resegmentable: true
          },
          new go.Binding("fromSpot", "fromSpot", go.Spot.parse),
          new go.Binding("toSpot", "toSpot", go.Spot.parse),
          new go.Binding("fromShortLength", "dir", dir => dir === 2 ? 4 : 0),
          new go.Binding("toShortLength", "dir", dir => dir >= 1 ? 4 : 0),
          new go.Binding("points").makeTwoWay(),  // TwoWay due to user reshaping with LinkReshapingTool
          $(go.Shape, { strokeWidth: 2 },
            new go.Binding("stroke", "color"),
            new go.Binding("strokeWidth", "thickness"),
            new go.Binding("strokeDashArray", "dash")),
          $(go.Shape, { fromArrow: "Backward", strokeWidth: 0, scale: 4/3, visible: false },
            new go.Binding("visible", "dir", dir => dir === 2),
            new go.Binding("fill", "color"),
            new go.Binding("scale", "thickness", t => (2+t)/3)),
          $(go.Shape, { toArrow: "Standard", strokeWidth: 0, scale: 4/3 },
            new go.Binding("visible", "dir", dir => dir >= 1),
            new go.Binding("fill", "color"),
            new go.Binding("scale", "thickness", t => (2+t)/3)),
          $(go.TextBlock,
            { alignmentFocus: new go.Spot(0, 1, -4, 0), editable: true },
            new go.Binding("text").makeTwoWay(),  // TwoWay due to user editing with TextEditingTool
            new go.Binding("stroke", "color"))
        );

      myDiagram.linkTemplate.selectionAdornmentTemplate =
        $(go.Adornment,  // use a special selection Adornment that does not obscure the link path itself
          $(go.Shape,
            { // this uses a pathPattern with a gap in it, in order to avoid drawing on top of the link path Shape
              isPanelMain: true,
              stroke: "transparent", strokeWidth: 6,
              pathPattern: makeAdornmentPathPattern(2)  // == thickness or strokeWidth
            },
            new go.Binding("pathPattern", "thickness", makeAdornmentPathPattern)),
          CMButton({ alignmentFocus: new go.Spot(0, 0, -6, -4) })
        );

      function makeAdornmentPathPattern(w) {
        return $(go.Shape,
          {
            stroke: "dodgerblue", strokeWidth: 2, strokeCap: "square",
            geometryString: "M0 0 M4 2 H3 M4 " + (w+4).toString() + " H3"
          });
      }

      // Link context menu
      // All buttons in context menu work on both click and contextClick,
      // in case the user context-clicks on the button.
      // All buttons modify the link data, not the Link, so the Bindings need not be TwoWay.

      function ArrowButton(num) {
        var geo = "M0 0 M16 16 M0 8 L16 8  M12 11 L16 8 L12 5";
        if (num === 0) {
          geo = "M0 0 M16 16 M0 8 L16 8";
        } else if (num === 2) {
          geo = "M0 0 M16 16 M0 8 L16 8  M12 11 L16 8 L12 5  M4 11 L0 8 L4 5";
        }
        return $(go.Shape,
          {
            geometryString: geo,
            margin: 2, background: "transparent",
            mouseEnter: (e, shape) => shape.background = "dodgerblue",
            mouseLeave: (e, shape) => shape.background = "transparent",
            click: ClickFunction("dir", num), contextClick: ClickFunction("dir", num)
          });
      }

      function AllSidesButton(to) {
        var setter = (e, shape) => {
            e.handled = true;
            e.diagram.model.commit(m => {
              var link = shape.part.adornedPart;
              m.set(link.data, (to ? "toSpot" : "fromSpot"), go.Spot.stringify(go.Spot.AllSides));
              // re-spread the connections of other links connected with the node
              (to ? link.toNode : link.fromNode).invalidateConnectedLinks();
            });
          };
        return $(go.Shape,
          {
            width: 12, height: 12, fill: "transparent",
            mouseEnter: (e, shape) => shape.background = "dodgerblue",
            mouseLeave: (e, shape) => shape.background = "transparent",
            click: setter, contextClick: setter
          });
      }

      function SpotButton(spot, to) {
        var ang = 0;
        var side = go.Spot.RightSide;
        if (spot.equals(go.Spot.Top)) { ang = 270; side = go.Spot.TopSide; }
        else if (spot.equals(go.Spot.Left)) { ang = 180; side = go.Spot.LeftSide; }
        else if (spot.equals(go.Spot.Bottom)) { ang = 90; side = go.Spot.BottomSide; }
        if (!to) ang -= 180;
        var setter = (e, shape) => {
            e.handled = true;
            e.diagram.model.commit(m => {
              var link = shape.part.adornedPart;
              m.set(link.data, (to ? "toSpot" : "fromSpot"), go.Spot.stringify(side));
              // re-spread the connections of other links connected with the node
              (to ? link.toNode : link.fromNode).invalidateConnectedLinks();
            });
          };
        return $(go.Shape,
          {
            alignment: spot, alignmentFocus: spot.opposite(),
            geometryString: "M0 0 M12 12 M12 6 L1 6 L4 4 M1 6 L4 8",
            angle: ang,
            background: "transparent",
            mouseEnter: (e, shape) => shape.background = "dodgerblue",
            mouseLeave: (e, shape) => shape.background = "transparent",
            click: setter, contextClick: setter
          });
      }

      myDiagram.linkTemplate.contextMenu =
        $("ContextMenu",
          DarkColorButtons(),
          StrokeOptionsButtons(),
          $("ContextMenuButton",
            $(go.Panel, "Horizontal",
              ArrowButton(0), ArrowButton(1), ArrowButton(2)
            )
          ),
          $("ContextMenuButton",
            $(go.Panel, "Horizontal",
              $(go.Panel, "Spot",
                AllSidesButton(false),
                SpotButton(go.Spot.Top, false), SpotButton(go.Spot.Left, false), SpotButton(go.Spot.Right, false), SpotButton(go.Spot.Bottom, false)
              ),
              $(go.Panel, "Spot",
                { margin: new go.Margin(0, 0, 0, 2) },
                AllSidesButton(true),
                SpotButton(go.Spot.Top, true), SpotButton(go.Spot.Left, true), SpotButton(go.Spot.Right, true), SpotButton(go.Spot.Bottom, true)
              )
            )
          )
        );

      load();
    }

    // Show the diagram's model in JSON format
    /* $doc = JSON.stringify(document.getElementById("mySavedModel").value); */
    function save() {
      /* savediag(document.getElementById("mySavedModel").value); */
      $doc = document.getElementById("mySavedModel").value;
       /* return $doc;  */
       document.getElementById("mensaje").value = $doc;
       console.log($doc);    /* FUNCIONA(BORRAR EL RETURN) */
      document.getElementById("mySavedModel").value = myDiagram.model.toJson();
      myDiagram.isModified = false;
    }
    function load() {
      myDiagram.model = go.Model.fromJson(document.getElementById("mySavedModel").value);
    }
    window.addEventListener('DOMContentLoaded', init);

    function pdf(){
      window.print();
    }
    function imprimir(){
      window.print();
    }
    /***FUNCION PARA GUARDAR EN TIPO IMAGEN***/

    function myCallback(blob) {
      var url = window.URL.createObjectURL(blob);
      var filename = "MyDiagram.jpg";

      var a = document.createElement("a");
      a.style = "display: none";
      a.href = url;
      a.download = filename;
      // IE 11
      if (window.navigator.msSaveBlob !== undefined) {
        window.navigator.msSaveBlob(blob, filename);
        return;
      }

      document.body.appendChild(a);
      requestAnimationFrame(() => {
        a.click();
        window.URL.revokeObjectURL(url);
        document.body.removeChild(a);
      });
    }

    function makeBlob() {
      var blob = myDiagram.makeImageData({ background: "white", returnType: "blob", callback: myCallback });
    }
    window.addEventListener('DOMContentLoaded', init);
    
  </script>

<div id="sample" >
  <div style="width: 100%; display: flex; justify-content: space-between">
    <div id="myPaletteDiv" class='no-print' style="width: 120px; margin-right: 2px; background-color: aquamarine; border: solid 1px black"></div>  {{-- Fondo Palleta --}}
    <div id="myDiagramDiv" style="flex-grow: 1; height: 620px;background-color: burlywood ;border: solid 1px black"></div>    {{-- Fondo del Diagrama --}}
    </div>
  <div class='no-print'>
    <p>
    Este proyecto fue desarrollado para la materia de Ingenieria en Software 1, impartida por el Ingeniero Roly Martinez.
  </p>
  </div>
  <div class='no-print'>
    <textarea style="visibility: hidden" id="mySavedModel" style="width:100%;height:300px">
      {{ $var }}
  </textarea>
  </div>
  
  <div class='no-print'>
    <p class="text-xs">Para visualizar el repositorio y otros trabajos realizados puede acceder mediante el siguiente link :</p>
  </div>
  </div>
  <div class='no-print'>
    <p><a href="https://github.com/TillWurner" target="_blank">José Gonzales Montaño - Repositorio GitHub</a></p>
  </div>
  <script src='/diagra'></script>
  </div>
  </body>
  </html>