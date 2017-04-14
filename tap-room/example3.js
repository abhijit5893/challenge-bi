


var rawFile1 = new XMLHttpRequest();
var allText1;

function myfunc(){
    var e = document.getElementById("courseId");
    var strUser = e.options[e.selectedIndex].value;
    var lines = allText1.split('\n');
    for (var i = 0; i < lines.length-1; i++) {
        if (lines[i].split('\t')[0].localeCompare(strUser) == 0){
            document.getElementById("a1").innerHTML = "<a href='page5.php?id="+lines[i].split('\t')[0]+"'>"+lines[i].split('\t')[0]+"</a>";
            document.getElementById("a2").innerHTML = lines[i].split('\t')[1];
            document.getElementById("a3").innerHTML = lines[i].split('\t')[2];
            document.getElementById("a4").innerHTML = lines[i].split('\t')[3];
            document.getElementById("a5").innerHTML = lines[i].split('\t')[4];
            document.getElementById("a6").innerHTML = lines[i].split('\t')[5];
      }
    }
}

rawFile1.open("GET", "2016-05-31_alloc.txt", false);
rawFile1.onreadystatechange = function ()
{
    if(rawFile1.readyState === 4)
    {
        if(rawFile1.status === 200 || rawFile1.status == 0)
        {
            allText1 = rawFile1.responseText;
            var lines = allText1.split('\n');
            var html = "<table border='1|1'>";
        var temp = "<option value='CourseID'>CourseID</option>"
        for (var i = 0; i < lines.length-1; i++) {
            temp += "<option value='"+lines[i].split('\t')[0]+"''>"+lines[i].split('\t')[0]+"</option>"
        }
        html+="<tr>";
        html+="<td><select placeholder='CourseID' id='courseId' onchange='myfunc()'>"+temp+"</select></td>";
        html+="<td>BuildingName</td>";
        html+="<td>RoomNumber</td>";
        html+="<td>MaxEnrollment</td>";
        html+="<td>RoomCapacity</td>";
        html+="<td>RoomCost</td>";

        html+="</tr>";
        html += "<tr>"


        html+="<td id='a1'></td>";
        html+="<td id='a2'></td>";
        html+="<td id='a3'></td>";
        html+="<td id='a4'></td>";
        html+="<td id='a5'></td>";
        html+="<td id='a6'></td>";

    html+="</tr>";
    html+="</table>";
    document.getElementById("roomalloc").innerHTML = html;
        }
    }
}
rawFile1.send(null);


var rawFile = new XMLHttpRequest();
var dates = [];
var course = [];
rawFile.open("GET", "2016-05-31.txt", false);
rawFile.onreadystatechange = function ()
{
    if(rawFile.readyState === 4)
    {
        if(rawFile.status === 200 || rawFile.status == 0)
        {
            var allText = rawFile.responseText;
            var lines = allText.split('\n');

            for(var i = 0;i < lines.length;i++){
                course.push(lines[i].split('\t')[0]);
                dates.push(lines[i].split('\t')[1]);
            }
        }
    }
}
rawFile.send(null);



var tasks = [
{"startDate":new Date(dates[0]),"endDate":new Date(new Date(dates[0]).getTime() + 60*60000),"taskName":course[0],"status":"ALLOCATED"}
,{"startDate":new Date(dates[1]),"endDate":new Date(new Date(dates[1]).getTime() + 60*60000),"taskName":course[1],"status":"ALLOCATED"}
,{"startDate":new Date(dates[2]),"endDate":new Date(new Date(dates[2]).getTime() + 60*60000),"taskName":course[2],"status":"ALLOCATED"}
,{"startDate":new Date(dates[3]),"endDate":new Date(new Date(dates[3]).getTime() + 60*60000),"taskName":course[3],"status":"OVERLAPPING"}
,{"startDate":new Date(dates[1]),"endDate":new Date(new Date(dates[1]).getTime() + 60*60000),"taskName":course[4],"status":"OVERLAPPING"}
,{"startDate":new Date(dates[2]),"endDate":new Date(new Date(dates[2]).getTime() + 60*60000),"taskName":course[5],"status":"ALLOCATED"}
,{"startDate":new Date(dates[3]),"endDate":new Date(new Date(dates[3]).getTime() + 60*60000),"taskName":course[6],"status":"ALLOCATED"}
,{"startDate":new Date(dates[3]),"endDate":new Date(new Date(dates[3]).getTime() + 60*60000),"taskName":course[7],"status":"OVERLAPPING"}
,{"startDate":new Date(dates[1]),"endDate":new Date(new Date(dates[1]).getTime() + 60*60000),"taskName":course[8],"status":"OVERLAPPING"}
,{"startDate":new Date(dates[2]),"endDate":new Date(new Date(dates[2]).getTime() + 60*60000),"taskName":course[9],"status":"ALLOCATED"}
,{"startDate":new Date(dates[3]),"endDate":new Date(new Date(dates[3]).getTime() + 60*60000),"taskName":course[10],"status":"ALLOCATED"}

];

// for(var i = 1;i < dates.length; i++){
//         tasks.push({
//         "startDate" : new Date(dates[i]),
//         "endDate" : new Date(new Date(dates[i]).getTime() + 60*60000),
//         "taskName" : course[i],
//         "status" : "ALLOCATED"
//         });
// }

var taskStatus = {
    "ALLOCATED" : "bar",
    "OVERLAPPING" : "bar-failed",
    "INPROGRESS" : "bar-running",
    "CANCELLED" : "bar-killed"
};

var taskNames = course;

tasks.sort(function(a, b) {
    return a.endDate - b.endDate;
});
var maxDate = tasks[tasks.length - 1].endDate;
tasks.sort(function(a, b) {
    return a.startDate - b.startDate;
});
var minDate = tasks[0].startDate;

var format = "%H:%M";
var timeDomainString = "1day";

var gantt = d3.gantt().taskTypes(taskNames).taskStatus(taskStatus).tickFormat(format).height(450).width(800);


gantt.timeDomainMode("fixed");
changeTimeDomain(timeDomainString);

gantt(tasks);
gantt.timeDomain([ d3.time.hour.offset(getEndDate(), -1), getEndDate() ]);
gantt.tickFormat("%H:%M:%S");
gantt.redraw(tasks);

function changeTimeDomain(timeDomainString) {
    this.timeDomainString = timeDomainString;
    switch (timeDomainString) {
    case "1hr":
    format = "%H:%M:%S";
    gantt.timeDomain([ d3.time.hour.offset(getEndDate(), -1), getEndDate() ]);
    break;
    case "3hr":
    format = "%H:%M";
    gantt.timeDomain([ d3.time.hour.offset(getEndDate(), -3), getEndDate() ]);
    break;

    case "6hr":
    format = "%H:%M";
    gantt.timeDomain([ d3.time.hour.offset(getEndDate(), -6), getEndDate() ]);
    break;

    case "1day":
    format = "%H:%M";
    gantt.timeDomain([ d3.time.day.offset(getEndDate(), -1), getEndDate() ]);
    break;

    case "1week":
    format = "%a %H:%M";
    gantt.timeDomain([ d3.time.day.offset(getEndDate(), -7), getEndDate() ]);
    break;
    default:
    format = "%H:%M"

    }
    gantt.tickFormat(format);
    gantt.redraw(tasks);
}

function getEndDate() {
    var lastEndDate = Date.now();
    if (tasks.length > 0) {
    lastEndDate = tasks[tasks.length - 1].endDate;
    }

    return lastEndDate;
}

function addTask() {

    var lastEndDate = getEndDate();
    var taskStatusKeys = Object.keys(taskStatus);
    var taskStatusName = taskStatusKeys[Math.floor(Math.random() * taskStatusKeys.length)];
    var taskName = taskNames[Math.floor(Math.random() * taskNames.length)];

    tasks.push({
    "startDate" : d3.time.hour.offset(lastEndDate, Math.ceil(1 * Math.random())),
    "endDate" : d3.time.hour.offset(lastEndDate, (Math.ceil(Math.random() * 3)) + 1),
    "taskName" : taskName,
    "status" : taskStatusName
    });

    changeTimeDomain(timeDomainString);
    gantt.redraw(tasks);
};

function removeTask() {
    tasks.pop();
    changeTimeDomain(timeDomainString);
    gantt.redraw(tasks);
};