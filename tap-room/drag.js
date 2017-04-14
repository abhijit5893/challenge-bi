var margin = {top:10, right: 10, bottom: 10, left: 50},
    height = 500 - margin.top - margin.bottom,
    height = 500 - margin.top - margin.bottom,
    width  = 500 - margin.left - margin.right;

var days = ['mon','tue','wed','thu','fri'];

var hours = ['08:00 AM','08:30 AM','09:00 AM','09:30 AM','10:00 AM','10:30 AM','11:00 AM','11:30 AM','12:00 PM','12:30 PM',
             '01:00 PM','01:30 PM','02:00 PM','02:30 PM','03:00 PM','03:30 PM','04:00 PM','04:30 PM','05:00 PM','05:30 PM','06:00 PM',
             '06:30 PM','07:00 PM','07:30 PM','08:00 PM','08:30 PM','09:00 PM','09:30 PM'];

var hourScaleRangeBand = height / hours.length;

function isColliding(course, trans, otherCourses) {
    return _.chain(otherCourses).map(function(otherCourse) {
        if (course.id != otherCourse.id) {
            if (_.intersection(course.day, otherCourse.day).length > 0){
                var otherStart = hourScale(format.parse(otherCourse.time.start));
                var otherEnd = hourScale(format.parse(otherCourse.time.end));
                var thisStart = trans[1];
                var thisEnd = trans[1] + (hourScale(format.parse(course.time.end)) - hourScale(format.parse(course.time.start)));
                //console.log(otherStart,otherEnd,thisStart,thisEnd);
                return ((thisStart < otherStart && thisEnd > otherStart) || (thisStart > otherStart && thisStart < otherEnd));
            } else {
                return false;
            }
        } else {
            return false;
        }
    }).contains(true).value();
}

courses = [

    {
        id: 0,
        abbr: 'cead14902b556434a3df74028395b3cf',
        time: {
            start: '09:00 AM',
            end: '09:50 AM'
        },
        day: ['mon', 'tue', 'thu', 'fri']
    },
    {
        id: 1,
        abbr: '39b744866daaf1489b47d147b0511a46',
        time: {
            start: '10:30 AM',
            end: '11:20 AM'
        },
        day: ['mon', 'wed', 'fri']
    },
    {
        id: 2,
        abbr: '3d6c23c5f954c539c84048ac57a9e322',
        time: {
            start: '11:30 AM',
            end: '12:20 PM'
        },
        day: ['mon','wed','fri']
    },
    {
        id: 3,
        abbr: '50cb41859a0dd4e0068bcc3dd244a0c5',
        time: {
            start: '10:30 AM',
            end: '11:50 AM'
        },
        day: ['tue','thu']
    },
    {
        id: 4,
        abbr: '79b63ec3e5f7ef59fa059a5f8f232b3d',
        time: {
            start: '06:30 PM',
            end: '9:30 PM'
        },
        day: ['thu']
    }
];
var week = [];
var format = d3.time.format("%I:%M %p");
var drag = d3.behavior.drag()
    .origin(Object)
    .on('drag', function (d, i) {
        var t = d3.select(this);
        var trans = d3.transform(t.attr('transform')).translate;
        if (isColliding(d, trans, courses)) {
            t.style('fill','red'); // warn the user about the impending collision
        } else {
            t.style('fill','black');
        }
        // update the position of the course group
        // TODO: there is no t.attr('height') b/c its just a group, so get that height not critical
        t.attr('transform', 'translate(0,' + Math.min(height - t.attr('height'), Math.max(0, +d3.event.dy + trans[1])) + ')');
    })
    .on('dragend', function (d, i) {
        var t = d3.select(this);
        var trans = d3.transform(t.attr('transform')).translate;
        // round to the nearest half hour, TODO: do this with d3.time.minute.ceil or something
        var hrs = hours[Math.floor(trans[1] / hourScaleRangeBand)];

        if (isColliding(d, trans, courses)) {
            // user lets go in an invalid place -> return the course group to original location
            t.attr('transform', function(d) { console.log(d.time.start); return 'translate(0,' + hourScale(format.parse(d.time.start)) + ')';});
            t.style('fill','black'); // I see a red course and I want it painted black
        } else {
            // user selected a valid time for the course -> snap to nearest half hour slot
            // TODO: is there a possibility with a weird length course that it could snap to a conflicting time?
            t.attr('transform', function() { return 'translate(0,' + hourScale(format.parse(hrs)) + ')';});
            // calculate the duration of the course section
            var sectionDuration = (format.parse(courses[d.id].time.end) - format.parse(courses[d.id].time.start)) / 60000;
            courses[d.id].time.start = hrs;
            // find the section end time by add the duration of the section to the start time
            courses[d.id].time.end = format(d3.time.minute.offset(format.parse(hrs), sectionDuration));
            // redraw
            updateCourseGroups();
        };

    });


var d3datehours = hours.map(format.parse);

days.forEach(function(day){
    var hourObj = {};
    hours.forEach(function(hour){
       hourObj[hour] = {
           occupied: false,
           course: ''
       };
    });
    week.push(hourObj.day = day);
});

var dayScale = d3.scale.ordinal()
    .domain(days)
    .rangeRoundBands([0, width], 0.01);

var hourScale = d3.time.scale()
    .domain([d3datehours[0],d3datehours[27]])
    .rangeRound([0, height]);

svg = d3.select('body').append('svg')
    .attr('height', height + margin.top + margin.bottom)
    .attr('width', width + margin.right + margin.left)
    .append('g')
    .attr('transform','translate(' + margin.left + ',' + margin.top + ')');


function makeHourAxis() {
    return d3.svg.axis()
        .scale(hourScale)
        .orient('left')
}

function makeDayAxis() {
    return d3.svg.axis()
        .scale(dayScale)
        .orient('top')
}

svg.append('g')
    .attr('class', 'hour axis')
    .attr('transform','translate(' + width + ',0)')
    .attr('transform','translate(' + width + ',0)')
    .call(makeHourAxis().ticks(hours.length).tickSize(width, 0, 0).tickFormat(""));

svg.append('g')
    .attr('class', 'hour axis')
    .call(makeHourAxis());


svg.append('g')
    .attr('class', 'day axis')
    .attr('transform', 'translate(' + (dayScale.rangeBand() / 2) + ',' + height + ')')
    .call(makeDayAxis().tickSize(height, 0, 0).tickFormat(""));

svg.append('g')
    .attr('class', 'day axis')
    .call(makeDayAxis().tickSize(0));



var courseGroups = svg.selectAll('g.course')
    .data(courses)
    .enter().append('g')
    .attr('class', 'course')
    .attr('transform', function(d) {
        return 'translate(' + 0 + ',' + hourScale(format.parse(d.time.start)) + ')';
    })
    .call(drag);



var sections = courseGroups.selectAll('g.section')
    .data(function(d) {
        return d.day.map(function(e){
            return {day: e, time: d.time, abbr: d.abbr};
        });
    })
    .enter().append('g')
    .attr('class','section');

sections.append('rect')
    .attr('class','section')
    .attr('y', 0)
    .attr('x', function(d){ return dayScale(d.day); })
    .attr('width', dayScale.rangeBand())
    .attr('height', function(d) {
        return hourScale(format.parse(d.time.end)) - hourScale(format.parse(d.time.start));
    });

sections.append('text')
    .style('fill', 'white')
    .attr('y', 10)
    .attr('x', function(d){ return dayScale(d.day); })
    .text(function(d){ return d.abbr; });



function updateCourseGroups() {
    svg.selectAll('g.course')
        .data(courses)
        .attr('transform', function(d) {
            return 'translate(' + 0 + ',' + hourScale(format.parse(d.time.start)) + ')';
        });
}