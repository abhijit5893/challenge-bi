<!DOCTYPE html>
<html>

  <head>
    <title>Toptal BI-Challenge</title>
    <script src="//d3js.org/d3.v3.min.js" charset="utf-8"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="calendar.css"/>
  </head>

  <body>
    <div id="calendar-title">Data</div>
    <div id="calendar-wrapper">
        <div id="calendar-click-info">Click on a Square For Details</div>
        <div id="calendar-legend">Less
          <div class="legend-box" id="legend-box-white"></div>
          <div class="legend-box" id="legend-box-light"></div>
          <div class="legend-box" id="legend-box-dark"></div> More
        </div>
      </div>
    <button type="image"   style=" height:50px; width:100px; color:blue; margin: -20px  40px; position:relative;top:50%; left:50%;" onclick="location.href='page2.php'" >Proceed to weekly view</button>
    <button type="image"   style=" height:50px; width:100px; color:blue; margin: -20px -50px; position:relative;top:50%; left:50%;" onclick="location.href='page3.php'" >Academic Buildings</button>
    <button type="image"   style=" height:50px; width:100px; color:blue; margin: -20px -240px; position:relative;top:50%; left:50%;" onclick="location.href='page4.php'" >Academy tree</button>

  </body>

  <script type="text/javascript" src="calendar.js"></script>

</html>