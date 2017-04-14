<!DOCTYPE html>
<html>
<head>
    <title>Weekly view</title>
    <!--<script src="../bower_components/d3/d3.js" charset="utf-8"></script>-->
    <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
    <style>
        svg {
            font: 10px sans-serif;
            background: white;
            display:block;
            margin:0 auto;
        }
        /*button {
          clear:right;
          float:right;
        }*/
        .chart rect {
            stroke: white;

        }
        rect.section {
            cursor: ns-resize;
        }
        .line {
            fill:none;
            stroke:#000;
            stroke-width:1.5px;
        }
        .axis path, .axis line {
            fill:none;
            stroke:silver;
            shape-rendering: crispEdges;
        }
        .axis path {
            display: none;
        }
        .grid {
            fill:none;
            stroke-width:0.5px;
            stroke:#000;
            opacity:0.2;
        }
        .ratio {
            fill:#f2c180;
            color:#f2c180;
        }
        .fsratio {
            fill:#f3a53d;
            color:#f3a53d;
        }
        .students {
            fill:#5cadf0;
            color:#5cadf0;
        }
        .faculty {
            fill:steelblue;
            color:steelblue;
        }
        #wrap {
            width:910px;
            margin:0 auto;
        }
    </style>
</head>
<body>
        <div id="title" style="  display: block;
  position: relative;
  width: 70%;
  margin-left: 15%;
  text-align: center;
  border-bottom: thin solid black;
  margin-top: 10px;
  margin-bottom: 30px;
  padding-bottom: 10px;
  font-size: 20px;" >Weekly scheduler and conflict monitoring</div>
<script src="drag.js"></script>
<button type="image"   style=" height:50px; width:100px; color:blue; margin: -20px -50px; position:relative;top:50%; left:50%;" onclick="location.href='index.php'" >Proceed to daily view</button>
</body>
</html>