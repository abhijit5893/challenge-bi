<!DOCTYPE html>
<html>
<head>
<title>Toptal Bi-Challenge</title>
<link type="text/css" href="http://mbostock.github.io/d3/style.css" rel="stylesheet" />
<link type="text/css" href="example.css" rel="stylesheet" />
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
  font-size: 20px;" >Summary Page (2016-05-31) </div>
	<button type="button" onclick="addTask()">Add Class</button>
	<button type="button" onclick="removeTask()">Remove Class</button>
	<button type="button" onclick="changeTimeDomain('1hr')">1 HR</button>
	<button type="button" onclick="changeTimeDomain('3hr')">3 HR</button>
	<button type="button" onclick="changeTimeDomain('6hr')">6 HR</button>
        <button type="button" onclick="changeTimeDomain('1day')">1 DAY</button>
        <button type="button" onclick="changeTimeDomain('1week')">1 WEEK</button>
     <button type="image"   style="  color:white;" onclick="location.href='page1.php'" >Yearly View</button>
     <button type="image"   style="  color:white;" onclick="location.href='page4.php'" >Academic tree</button>
     <button type="image"   style=" color:white;" onclick="location.href='page3.php'" >Academic Buildings</button>
     <button type="image"   style=" color:white;" onclick="location.href='page2.php'" >Weekly View</button>

    <div id="roomalloc" style="position: fixed; bottom: 30px; left: 10%;width: 100%; align:center"></div>
</body>
</html>
        <script type="text/javascript" src="http://d3js.org/d3.v3.min.js"></script>
	<script type="text/javascript" src="http://static.mentful.com/gantt-chart-d3v2.js"></script>
	<script type="text/javascript" src="example3.js"></script>