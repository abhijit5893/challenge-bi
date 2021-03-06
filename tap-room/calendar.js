var today = new Date('2013-08-01');
var animDuration =1000,
	min = 0,
	max=4000;

d3.selection.prototype.moveToFront = function() {
  return this.each(function(){
    this.parentNode.appendChild(this);
  });
};

d3.selection.prototype.moveToBack = function() {
    return this.each(function() {
        var firstChild = this.parentNode.firstChild;
        if (firstChild) {
            this.parentNode.insertBefore(this, firstChild);
        }
    });
};

function numberWithCommas(x) {
    x = x.toString();
    var pattern = /(-?\d+)(\d{3})/;
    while (pattern.test(x))
        x = x.replace(pattern, "$1,$2");
    return x;
}

//http://stackoverflow.com/questions/10638529/how-to-parse-a-date-in-format-yyyymmdd-in-javascript
function dateParser(str) {
    var y = str.substr(0,4),
        m = str.substr(4,2) - 1,
        d = str.substr(6,2);
    var D = new Date(y,m,d);
    return (D.getFullYear() == y && D.getMonth() == m && D.getDate() == d) ? D : 'invalid date';
}

//http://stackoverflow.com/questions/1144783/replacing-all-occurrences-of-a-string-in-javascript
String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.replace(new RegExp(search, 'g'), replacement);
};

//http://stackoverflow.com/questions/1527803/generating-random-numbers-in-javascript-in-a-specific-range
function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function prettyDate(dateObj){
	var newObj = new Date(dateObj);
	var day = newObj.getDate();
	var monthIndex = newObj.getMonth();
	var year = newObj.getFullYear();
	var monthNames = ["January", "February", "March","April", "May", "June", "July","August", "September", "October","November", "December"];
	return monthNames[monthIndex]+" "+day+", "+year;
}


function generateAttendeeData(min,max){
	var rawFile = new XMLHttpRequest();
	var dates = [];
	var count = [];
    rawFile.open("GET", "2013.txt", false);
    rawFile.onreadystatechange = function ()
    {
        if(rawFile.readyState === 4)
        {
            if(rawFile.status === 200 || rawFile.status == 0)
            {
                var allText = rawFile.responseText;
                var lines = allText.split('\n');

				for(var i = 0;i < lines.length;i++){
    				dates.push(lines[i].split('\t')[0])
    				count.push(lines[i].split('\t')[1])
				}
            }
        }
    }
    rawFile.send(null);
	var returnArray=[];

	for(var i = 0;i < dates.length;i++){
		var datePointer = new Date(dates[i]);
		returnArray.push({
				date:datePointer,
				hours:parseInt(count[i])
			});
	}

	return returnArray;
}

function clickedDay(d){
	d3.selectAll(".day")
	   .transition()
	   .duration(animDuration/5)
	   .style("fill",function(d){
			var boxData = $("#box-id-"+dateParser(d).toDateString().replaceAll(" ","")).data();
			var sel = d3.select(this);
				sel.moveToBack();
			return boxData.fill;
		})
		.style("opacity",function(d){
			var boxData = $("#box-id-"+dateParser(d).toDateString().replaceAll(" ","")).data();
			return boxData.opacity;
		});

	var sel =d3.select(this);
	sel.moveToFront();

	d3.select("#box-id-"+dateParser(d).toDateString().replaceAll(" ",""))
		.transition()
		.duration(animDuration/3)
		.style("fill","#82B446")
		.style("opacity","1");

	var boxData = $("#box-id-"+dateParser(d).toDateString().replaceAll(" ","")).data();
	if(boxData.value !== undefined){
		$("#calendar-click-info").text(prettyDate(boxData.date)+" has a value of "+boxData.value+" units");
	}
	else{
		$("#calendar-click-info").text("No information present for "+prettyDate(boxData.date));
	}
}

function animateColorTransition(color,nestData){
	d3.selectAll(".day")
		.transition()
		.duration(animDuration)
		.delay(function(d,i){return i*20;})
		.style("fill", function(d) {
	    	return (color(nestData[dateParser(d).toDateString()])!=="#NaNNaNNaN")?
	    		color(nestData[dateParser(d).toDateString()]) :
	    		"#000000";
	    })
	    .attr("data-fill",function(d){
	    	return (color(nestData[dateParser(d).toDateString()])!=="#NaNNaNNaN")?
	    		 color(nestData[dateParser(d).toDateString()]) :
	    		 "#000000";
	    })
	    .style("opacity",function(d){
	    	return (color(nestData[dateParser(d).toDateString()])!=="#NaNNaNNaN")?
	    		 "1":
	    		 "0.25";
	    })
	    .attr("data-opacity",function(d){
			return (color(nestData[dateParser(d).toDateString()])!=="#NaNNaNNaN")?
	    		 "1":
	    		 "0.25";
	    });
}

function renderCalendar(){

	var width = $("#calendar-wrapper").width(),
	    height = $("#calendar-wrapper").height(),
		cellSize = parseInt($(window).width()/62),
	    week_days = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat']
	    month = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

	var day = d3.time.format("%w"),
	    week = d3.time.format("%U"),
	    percent = d3.format(".1%"),
		format = d3.time.format("%Y%m%d");
		parseDate = d3.time.format("%Y%m%d").parse;

	var color = d3.scale.linear()
					.range(["#b5cde1", '#386890'])
					.domain([min, max])

	var svg = d3.select("#calendar-wrapper").selectAll("svg")
	    .data(d3.range(parseInt(today.getFullYear()), parseInt(today.getFullYear())+1))
	  .enter().append("svg")
	    .attr("width", width)
	    .attr("height", height)
	  	.append("g")
	  	.attr("id","total-wrapper")
	   	.attr("transform", "translate(" + ((width - cellSize * 53) / 2) + "," + (30) + ")");


	for (var i=0; i<7; i++)
	{
		svg.append("text")
		    .attr("transform", "translate(8," + cellSize*(i+1) + ")")
		    .style("text-anchor", "end")
		    .attr("dy", "-.25em")
		    .style("stroke","black")
	    	.style("font-size","12px")
	    	.style("font-weight","100")
		    .text(function(d) { return week_days[i]; });
	 }

	var legendWrapper = d3.select("#total-wrapper")
							.append("g")
							.attr("id","legend-wrapper")
							.attr("transform","translate(80,-10)");

	var legend = legendWrapper.selectAll(".legend")
	    .data(month)
	    .enter().append("g")
	    .attr("class", "legend")
		.attr("transform", function(d, i) { return "translate(" + (((cellSize*4.3)*i)+(width/100)) + ",0)"; });

	legend.append("text")
		.attr("class","month-label")
	   .attr("id", function(d,i){ return month[i] })
	   .style("text-anchor", "end")
	   .style("font-size","12px")
	   .style("font-weight","100")
	   .style("stroke","black")
	   .text(function(d,i){ return month[i] });

	 var generatedData = generateAttendeeData(min,max);

	  var nestData = d3.nest()
	    .key(function(d) {return d.date.toDateString();})
	    .rollup(function(d){return d[0].hours})
	    .map(generatedData);

	var rectWrapper = d3.select("#total-wrapper")
						.append("g")
						.attr("id","blocks-wrapper")
						.attr("transform","translate(30,0)");

	var rect = rectWrapper.selectAll(".day")
	    .data(function(d) { return d3.time.days(new Date(d, 0, 1), new Date(d, month.length, 1)); })
	  .enter()
		.append("rect")
	    .attr("class", "day")
	    .attr("width", cellSize)
	    .attr("height", cellSize)
	    .attr("x", function(d) { return week(d) * cellSize; })
	    .attr("y", function(d) { return day(d) * cellSize; })
	    .style("fill","#000000")
	    .style("opacity","0.25")
	    .attr("id",function(d){return "box-id-"+d.toDateString().replaceAll(" ","");})
		.attr("data-value", function(d){return nestData[d.toDateString()];})
		.attr("data-date",function(d){return d;})
		.attr("data-fill","#000000")
		.attr("data-opacity","0.25")
	    .datum(format)
	    .on("click", clickedDay);

	animateColorTransition(color,nestData);

	//Draws the month boundaries
	rectWrapper.selectAll(".month")
	    .data(function(d) { return d3.time.months(new Date(d, 0, 1), new Date(d, month.length, 1)); })
	  .enter().append("path")
	    .attr("class", "month-path")
	    .attr("id", function(d,i){ return month[i] })
	    .attr("d", monthPath);

	    //Thank you Mike Bostock
	function monthPath(t0) {
	  var t1 = new Date(t0.getFullYear(), t0.getMonth() + 1, 0),
	      d0 = +day(t0), w0 = +week(t0),
	      d1 = +day(t1), w1 = +week(t1);
	  return "M" + (w0 + 1) * cellSize + "," + d0 * cellSize
	      + "H" + w0 * cellSize + "V" + 7 * cellSize
	      + "H" + w1 * cellSize + "V" + (d1 + 1) * cellSize
	      + "H" + (w1 + 1) * cellSize + "V" + 0
	      + "H" + (w0 + 1) * cellSize + "Z";
	}

}


$( document ).ready(function() {
	renderCalendar();
	$("#calendar-title").text("Course information for year 2013");
});