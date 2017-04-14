<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Academy tree</title>

    <style>

	.node {
		cursor: pointer;
	}

	.node circle {
	  fill: #fff;
	  stroke: steelblue;
	  stroke-width: 3px;
	}

	.node text {
	  font: 12px sans-serif;
	}

	.link {
	  fill: none;
	  stroke: #ccc;
	  stroke-width: 2px;
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
  font-size: 20px;" >Academy tree</div>
<!-- load the d3.js library -->
<script src="http://d3js.org/d3.v3.min.js"></script>

<script>

var treeData = [
  {
    "name": "Student",
    "parent": "null",
    "children": [
      {
        "name": "Undergrad",
        "parent": "Student",
        "children": [
	      {
	        "name": "CMCI",
	        "parent": "null",
	        "children": [
	      {
	        "name": "B-IAWP",
	        "parent": "null",

	      }, {
	        "name": "B-APRD",
	        "parent": "null",

	      }, {
	        "name": "B-CMCI",
	        "parent": "null",

	      }
	      , {
	        "name": "B-COMN",
	        "parent": "null",

	      }, {
	        "name": "B-MDST",
	        "parent": "null",

	      }, {
	        "name": "B-DCMP",
	        "parent": "null",

	      }, {
	        "name": "B-JRNL",
	        "parent": "null",

	      }]


	      },
	      {
	        "name": "ARPL",
	        "parent": "null",
	         "children": [
	      {
	        "name": "B-ARPL",
	        "parent": "null",

	      },{
	        "name": "B-ARCH",
	        "parent": "null",

	      },
	      {
	        "name": "B-ENVD",
	        "parent": "null",

	      }]

	      },
	      {
	        "name": "JOUR",
	        "parent": "null",
	        "children": [
	      {
	        "name": "B-JOUR",
	        "parent": "null",

	      }]


	      },
	      {
	        "name": "ARSC",
	        "parent": "null",
	          "children": [
	      {
	        "name": "B-JWST",
	        "parent": "null",

	      },
	      {
	        "name": "B-EALC",
	        "parent": "null",

	      },
	      {
	        "name": "B-CLAS",
	        "parent": "null",

	      },
	      {
	        "name": "B-COMM",
	        "parent": "null",

	      },
	      {
	        "name": "B-MCDB",
	        "parent": "null",

	      },
	      {
	        "name": "B-FRIT",
	        "parent": "null",

	      },
	      {
	        "name": "B-GEOL",
	        "parent": "null",

	      },
	      {
	        "name": "B-ALTC",
	        "parent": "null",

	      },
	      {
	        "name": "B-COMR",
	        "parent": "null",

	      },
	      {
	        "name": "B-CAMW",
	        "parent": "null",

	      },
	      {
	        "name": "B-SOCY",
	        "parent": "null",

	      },
	      {
	        "name": "B-GEOG",
	        "parent": "null",

	      },
	      {
	        "name": "B-EBIO",
	        "parent": "null",

	      },
	      {
	        "name": "B-PHIL",
	        "parent": "null",

	      },
	      {
	        "name": "B-ENVS",
	        "parent": "null",

	      },
	      {
	        "name": "B-PSCI",
	        "parent": "null",

	      },
	      {
	        "name": "GSLL",
	        "parent": "null",

	      },
	      {
	        "name": "B-WMST",
	        "parent": "null",

	      },
	      {
	        "name": "B-LIBB",
	        "parent": "null",

	      },
	      {
	        "name": "B-ARSC",
	        "parent": "null",

	      },
	      {
	        "name": "B-THDN",
	        "parent": "null",

	      },
	      {
	        "name": "B-BAKR",
	        "parent": "null",

	      },
	      {
	        "name": "B-ECON",
	        "parent": "null",

	      },
	      {
	        "name": "B-IPHY",
	        "parent": "null",

	      },
	      {
	        "name": "B-ETHN",
	        "parent": "null",

	      },
	      {
	        "name": "B-ANTH",
	        "parent": "null",

	      },
	      {
	        "name": "B-RLST",
	        "parent": "null",

	      },
	      {
	        "name": "B-INVS",
	        "parent": "null",

	      },
	      {
	        "name": "B-ARSP",
	        "parent": "null",

	      },
	      {
	        "name": "B-SUST",
	        "parent": "null",

	      },
	      {
	        "name": "B-HONR",
	        "parent": "null",

	      },
	      {
	        "name": "B-FILM",
	        "parent": "null",

	      },
	      {
	        "name": "B-CHEM",
	        "parent": "null",

	      },
	      {
	        "name": "B-AAAH",
	        "parent": "null",

	      },
	      {
	        "name": "B-ENGL",
	        "parent": "null",

	      },
	      {
	        "name": "B-MUSM",
	        "parent": "null",

	      },
	      {
	        "name": "B-LING",
	        "parent": "null",

	      },
	      {
	        "name": "B-GSAP",
	        "parent": "null",

	      },
	      {
	        "name": "B-ASIA",
	        "parent": "null",

	      },
	      {
	        "name": "B-NRLN",
	        "parent": "null",

	      },
	      {
	        "name": "B-ATOC",
	        "parent": "null",

	      },
	      {
	        "name": "B-FARR",
	        "parent": "null",

	      },
	      {
	        "name": "B-SEWL",
	        "parent": "null",

	      },
	      {
	        "name": "B-SSIR",
	        "parent": "null",

	      },
	      {
	        "name": "B-SLHS",
	        "parent": "null",

	      },
	      {
	        "name": "B-PSYC",
	        "parent": "null",

	      },
	      {
	        "name": "B-COML",
	        "parent": "null",

	      },
	      {
	        "name": "B-APPM",
	        "parent": "null",

	      },
	      {
	        "name": "B-PHYS",
	        "parent": "null",

	      },
	      {
	        "name": "B-ASPS",
	        "parent": "null",

	      },
	      {
	        "name": "B-HIST",
	        "parent": "null",

	      },
	      {
	        "name": "B-PWRT",
	        "parent": "null",

	      },
	      {
	        "name": "B-IAFS",
	        "parent": "null",

	      },
	      {
	        "name": "B-TGBT",
	        "parent": "null",

	      },
	      {
	        "name": "B-HUMN",
	        "parent": "null",

	      },
	      {
	        "name": "B-LDSP",
	        "parent": "null",

	      },
	      {
	        "name": "B-ALAC",
	        "parent": "null",

	      },
	      {
	        "name": "B-CSVC",
	        "parent": "null",

	      },
	      {
	        "name": "B-MATH",
	        "parent": "null",

	      }]

	      },
	      {
	        "name": "MUSC",
	        "parent": "null",
	         "children": [
	      {
	        "name": "B-MUEL",
	        "parent": "null",

	      },
	      {
	        "name": "B-TMUS",
	        "parent": "null",

	      },{
	        "name": "B-MUSC",
	        "parent": "null",

	      },{
	        "name": "B-EMUS",
	        "parent": "null",

	      }]

	      },
	      {
	        "name": "CEPS",
	        "parent": "null",
	        "children": [
	      {
	        "name": "B-CEPS",
	        "parent": "null",

	      }]


	      },
	      {
	        "name": "CRSS",
	        "parent": "null",
	         "children": [
	      {
	        "name": "B-ROTC",
	        "parent": "null",

	      },{
	        "name": "B-PRLC",
	        "parent": "null",

	      },{
	        "name": "B-REGR",
	        "parent": "null",

	      },{
	        "name": "B-RSEI",
	        "parent": "null",

	      },{
	        "name": "B-LDSP",
	        "parent": "null",

	      },{
	        "name": "B-NRLN",
	        "parent": "null",

	      },{
	        "name": "B-CSVC",
	        "parent": "null",

	      }]

	      },
	      {
	        "name": "CONC",
	        "parent": "null",
	        "children": [
	      {
	        "name": "B-CONC",
	        "parent": "null",

	      }]


	      },
	      {
	        "name": "BUSN",
	        "parent": "null",
	        "children": [
	      {
	        "name": "B-MGMT",
	        "parent": "null",

	      },{
	        "name": "B-MSBX",
	        "parent": "null",

	      },{
	        "name": "B-BPOL",
	        "parent": "null",

	      },{
	        "name": "B-BCOR",
	        "parent": "null",

	      },{
	        "name": "B-MKTG",
	        "parent": "null",

	      },{
	        "name": "B-MBAX",
	        "parent": "null",

	      },{
	        "name": "B-ACCT",
	        "parent": "null",

	      },{
	        "name": "B-ORMG",
	        "parent": "null",

	      },{
	        "name": "B-INBU",
	        "parent": "null",

	      },{
	        "name": "B-REAL",
	        "parent": "null",

	      },{
	        "name": "B-FNCE",
	        "parent": "null",

	      },{
	        "name": "B-ESBM",
	        "parent": "null",

	      },{
	        "name": "B-CESR",
	        "parent": "null",

	      },{
	        "name": "B-BUSN",
	        "parent": "null",

	      },{
	        "name": "B-BUSM",
	        "parent": "null",

	      },{
	        "name": "B-BADM",
	        "parent": "null",

	      }]


	      },
	      {
	        "name": "ENGR",
	        "parent": "null",
	        "children": [
	      {
	        "name": "B-SUST",
	        "parent": "null",

	      },{
	        "name": "B-CHEN",
	        "parent": "null",

	      },{
	        "name": "B-GEEN",
	        "parent": "null",

	      },{
	        "name": "B-EVEN",
	        "parent": "null",

	      },{
	        "name": "B-ECEN",
	        "parent": "null",

	      },{
	        "name": "B-TLEN",
	        "parent": "null",

	      },{
	        "name": "B-HUEN",
	        "parent": "null",

	      },{
	        "name": "B-ENGS",
	        "parent": "null",

	      },{
	        "name": "B-CVEN",
	        "parent": "null",

	      },{
	        "name": "B-MCEN",
	        "parent": "null",

	      },{
	        "name": "B-EMEN",
	        "parent": "null",

	      },{
	        "name": "B-CSCI",
	        "parent": "null",

	      },{
	        "name": "B-ASEN",
	        "parent": "null",

	      },{
	        "name": "B-ATLS",
	        "parent": "null",

	      }]

	      },
	      {
	        "name": "EDUC",
	        "parent": "null",
	        "children": [
	      {
	        "name": "B-EDUC",
	        "parent": "null",

	      }]


	      },
	      {
	        "name": "LAWS",
	        "parent": "null",
	        "children": [
	      {
	        "name": "B-LAWS",
	        "parent": "null",

	      }]

	      }
	     ]
      },
      {
        "name": "Graduate",
        "parent": "Student",
        "children": [
	      {
	        "name": "CMCI",
	        "parent": "null",
	        "children": [
	      {
	        "name": "B-IAWP",
	        "parent": "null",

	      }, {
	        "name": "B-APRD",
	        "parent": "null",

	      }, {
	        "name": "B-CMCI",
	        "parent": "null",

	      }
	      , {
	        "name": "B-COMN",
	        "parent": "null",

	      }, {
	        "name": "B-MDST",
	        "parent": "null",

	      }, {
	        "name": "B-DCMP",
	        "parent": "null",

	      }, {
	        "name": "B-JRNL",
	        "parent": "null",

	      }]


	      },
	      {
	        "name": "ARPL",
	        "parent": "null",
	         "children": [
	      {
	        "name": "B-ARPL",
	        "parent": "null",

	      },{
	        "name": "B-ARCH",
	        "parent": "null",

	      },
	      {
	        "name": "B-ENVD",
	        "parent": "null",

	      }]

	      },
	      {
	        "name": "JOUR",
	        "parent": "null",
	        "children": [
	      {
	        "name": "B-JOUR",
	        "parent": "null",

	      }]


	      },
	      {
	        "name": "ARSC",
	        "parent": "null",
	          "children": [
	      {
	        "name": "B-JWST",
	        "parent": "null",

	      },
	      {
	        "name": "B-EALC",
	        "parent": "null",

	      },
	      {
	        "name": "B-CLAS",
	        "parent": "null",

	      },
	      {
	        "name": "B-COMM",
	        "parent": "null",

	      },
	      {
	        "name": "B-MCDB",
	        "parent": "null",

	      },
	      {
	        "name": "B-FRIT",
	        "parent": "null",

	      },
	      {
	        "name": "B-GEOL",
	        "parent": "null",

	      },
	      {
	        "name": "B-ALTC",
	        "parent": "null",

	      },
	      {
	        "name": "B-COMR",
	        "parent": "null",

	      },
	      {
	        "name": "B-CAMW",
	        "parent": "null",

	      },
	      {
	        "name": "B-SOCY",
	        "parent": "null",

	      },
	      {
	        "name": "B-GEOG",
	        "parent": "null",

	      },
	      {
	        "name": "B-EBIO",
	        "parent": "null",

	      },
	      {
	        "name": "B-PHIL",
	        "parent": "null",

	      },
	      {
	        "name": "B-ENVS",
	        "parent": "null",

	      },
	      {
	        "name": "B-PSCI",
	        "parent": "null",

	      },
	      {
	        "name": "GSLL",
	        "parent": "null",

	      },
	      {
	        "name": "B-WMST",
	        "parent": "null",

	      },
	      {
	        "name": "B-LIBB",
	        "parent": "null",

	      },
	      {
	        "name": "B-ARSC",
	        "parent": "null",

	      },
	      {
	        "name": "B-THDN",
	        "parent": "null",

	      },
	      {
	        "name": "B-BAKR",
	        "parent": "null",

	      },
	      {
	        "name": "B-ECON",
	        "parent": "null",

	      },
	      {
	        "name": "B-IPHY",
	        "parent": "null",

	      },
	      {
	        "name": "B-ETHN",
	        "parent": "null",

	      },
	      {
	        "name": "B-ANTH",
	        "parent": "null",

	      },
	      {
	        "name": "B-RLST",
	        "parent": "null",

	      },
	      {
	        "name": "B-INVS",
	        "parent": "null",

	      },
	      {
	        "name": "B-ARSP",
	        "parent": "null",

	      },
	      {
	        "name": "B-SUST",
	        "parent": "null",

	      },
	      {
	        "name": "B-HONR",
	        "parent": "null",

	      },
	      {
	        "name": "B-FILM",
	        "parent": "null",

	      },
	      {
	        "name": "B-CHEM",
	        "parent": "null",

	      },
	      {
	        "name": "B-AAAH",
	        "parent": "null",

	      },
	      {
	        "name": "B-ENGL",
	        "parent": "null",

	      },
	      {
	        "name": "B-MUSM",
	        "parent": "null",

	      },
	      {
	        "name": "B-LING",
	        "parent": "null",

	      },
	      {
	        "name": "B-GSAP",
	        "parent": "null",

	      },
	      {
	        "name": "B-ASIA",
	        "parent": "null",

	      },
	      {
	        "name": "B-NRLN",
	        "parent": "null",

	      },
	      {
	        "name": "B-ATOC",
	        "parent": "null",

	      },
	      {
	        "name": "B-FARR",
	        "parent": "null",

	      },
	      {
	        "name": "B-SEWL",
	        "parent": "null",

	      },
	      {
	        "name": "B-SSIR",
	        "parent": "null",

	      },
	      {
	        "name": "B-SLHS",
	        "parent": "null",

	      },
	      {
	        "name": "B-PSYC",
	        "parent": "null",

	      },
	      {
	        "name": "B-COML",
	        "parent": "null",

	      },
	      {
	        "name": "B-APPM",
	        "parent": "null",

	      },
	      {
	        "name": "B-PHYS",
	        "parent": "null",

	      },
	      {
	        "name": "B-ASPS",
	        "parent": "null",

	      },
	      {
	        "name": "B-HIST",
	        "parent": "null",

	      },
	      {
	        "name": "B-PWRT",
	        "parent": "null",

	      },
	      {
	        "name": "B-IAFS",
	        "parent": "null",

	      },
	      {
	        "name": "B-TGBT",
	        "parent": "null",

	      },
	      {
	        "name": "B-HUMN",
	        "parent": "null",

	      },
	      {
	        "name": "B-LDSP",
	        "parent": "null",

	      },
	      {
	        "name": "B-ALAC",
	        "parent": "null",

	      },
	      {
	        "name": "B-CSVC",
	        "parent": "null",

	      },
	      {
	        "name": "B-MATH",
	        "parent": "null",

	      }]

	      },
	      {
	        "name": "MUSC",
	        "parent": "null",
	         "children": [
	      {
	        "name": "B-MUEL",
	        "parent": "null",

	      },
	      {
	        "name": "B-TMUS",
	        "parent": "null",

	      },{
	        "name": "B-MUSC",
	        "parent": "null",

	      },{
	        "name": "B-EMUS",
	        "parent": "null",

	      }]

	      },
	      {
	        "name": "CEPS",
	        "parent": "null",
	        "children": [
	      {
	        "name": "B-CEPS",
	        "parent": "null",

	      }]


	      },
	      {
	        "name": "CRSS",
	        "parent": "null",
	         "children": [
	      {
	        "name": "B-ROTC",
	        "parent": "null",

	      },{
	        "name": "B-PRLC",
	        "parent": "null",

	      },{
	        "name": "B-REGR",
	        "parent": "null",

	      },{
	        "name": "B-RSEI",
	        "parent": "null",

	      },{
	        "name": "B-LDSP",
	        "parent": "null",

	      },{
	        "name": "B-NRLN",
	        "parent": "null",

	      },{
	        "name": "B-CSVC",
	        "parent": "null",

	      }]

	      },
	      {
	        "name": "CONC",
	        "parent": "null",
	        "children": [
	      {
	        "name": "B-CONC",
	        "parent": "null",

	      }]


	      },
	      {
	        "name": "BUSN",
	        "parent": "null",
	        "children": [
	      {
	        "name": "B-MGMT",
	        "parent": "null",

	      },{
	        "name": "B-MSBX",
	        "parent": "null",

	      },{
	        "name": "B-BPOL",
	        "parent": "null",

	      },{
	        "name": "B-BCOR",
	        "parent": "null",

	      },{
	        "name": "B-MKTG",
	        "parent": "null",

	      },{
	        "name": "B-MBAX",
	        "parent": "null",

	      },{
	        "name": "B-ACCT",
	        "parent": "null",

	      },{
	        "name": "B-ORMG",
	        "parent": "null",

	      },{
	        "name": "B-INBU",
	        "parent": "null",

	      },{
	        "name": "B-REAL",
	        "parent": "null",

	      },{
	        "name": "B-FNCE",
	        "parent": "null",

	      },{
	        "name": "B-ESBM",
	        "parent": "null",

	      },{
	        "name": "B-CESR",
	        "parent": "null",

	      },{
	        "name": "B-BUSN",
	        "parent": "null",

	      },{
	        "name": "B-BUSM",
	        "parent": "null",

	      },{
	        "name": "B-BADM",
	        "parent": "null",

	      }]


	      },
	      {
	        "name": "ENGR",
	        "parent": "null",
	        "children": [
	      {
	        "name": "B-SUST",
	        "parent": "null",

	      },{
	        "name": "B-CHEN",
	        "parent": "null",

	      },{
	        "name": "B-GEEN",
	        "parent": "null",

	      },{
	        "name": "B-EVEN",
	        "parent": "null",

	      },{
	        "name": "B-ECEN",
	        "parent": "null",

	      },{
	        "name": "B-TLEN",
	        "parent": "null",

	      },{
	        "name": "B-HUEN",
	        "parent": "null",

	      },{
	        "name": "B-ENGS",
	        "parent": "null",

	      },{
	        "name": "B-CVEN",
	        "parent": "null",

	      },{
	        "name": "B-MCEN",
	        "parent": "null",

	      },{
	        "name": "B-EMEN",
	        "parent": "null",

	      },{
	        "name": "B-CSCI",
	        "parent": "null",

	      },{
	        "name": "B-ASEN",
	        "parent": "null",

	      },{
	        "name": "B-ATLS",
	        "parent": "null",

	      }]

	      },
	      {
	        "name": "EDUC",
	        "parent": "null",
	        "children": [
	      {
	        "name": "B-EDUC",
	        "parent": "null",

	      }]


	      },
	      {
	        "name": "LAWS",
	        "parent": "null",
	        "children": [
	      {
	        "name": "B-LAWS",
	        "parent": "null",

	      }]

	      }
	     ]
      }
    ]
  }
];


// ************** Generate the tree diagram	 *****************
var margin = {top: 20, right: 120, bottom: 20, left: 120},
	width = 960 - margin.right - margin.left,
	height = 500 - margin.top - margin.bottom;

var i = 0,
	duration = 750,
	root;

var tree = d3.layout.tree()
	.size([height, width]);

var diagonal = d3.svg.diagonal()
	.projection(function(d) { return [d.y, d.x]; });

var svg = d3.select("body").append("svg")
	.attr("width", width + margin.right + margin.left)
	.attr("height", height + margin.top + margin.bottom)
  .append("g")
	.attr("transform", "translate(" + margin.left + "," + margin.top + ")");

root = treeData[0];
root.x0 = height / 2;
root.y0 = 0;

function flatten(root) {
    var nodes = [],
        i = 0;

    function recurse(node) {
        if (node.children) node.children.forEach(recurse);
        if (!node.id) node.id = ++i;
        nodes.push(node);
    }

    recurse(root);
    return nodes;
}

var nodes = flatten(root);
nodes.forEach(function (d) {
    d._children = d.children;
    d.children = null;
});

update(root);

d3.select(self.frameElement).style("height", "500px");

function update(source) {

  // Compute the new tree layout.
  var nodes = tree.nodes(root).reverse(),
	  links = tree.links(nodes);

  // Normalize for fixed-depth.
  nodes.forEach(function(d) { d.y = d.depth * 180; });

  // Update the nodes…
  var node = svg.selectAll("g.node")
	  .data(nodes, function(d) { return d.id || (d.id = ++i); });

  // Enter any new nodes at the parent's previous position.
  var nodeEnter = node.enter().append("g")
	  .attr("class", "node")
	  .attr("transform", function(d) { return "translate(" + source.y0 + "," + source.x0 + ")"; })
	  .on("click", click);

  nodeEnter.append("circle")
	  .attr("r", 1e-6)
	  .style("fill", function(d) { return d._children ? "lightsteelblue" : "#fff"; });

  nodeEnter.append("text")
	  .attr("x", function(d) { return d.children || d._children ? -13 : 13; })
	  .attr("dy", ".35em")
	  .attr("text-anchor", function(d) { return d.children || d._children ? "end" : "start"; })
	  .text(function(d) { return d.name; })
	  .style("fill-opacity", 1e-6);

  // Transition nodes to their new position.
  var nodeUpdate = node.transition()
	  .duration(duration)
	  .attr("transform", function(d) { return "translate(" + d.y + "," + d.x + ")"; });

  nodeUpdate.select("circle")
	  .attr("r", 10)
	  .style("fill", function(d) { return d._children ? "lightsteelblue" : "#fff"; });

  nodeUpdate.select("text")
	  .style("fill-opacity", 1);

  // Transition exiting nodes to the parent's new position.
  var nodeExit = node.exit().transition()
	  .duration(duration)
	  .attr("transform", function(d) { return "translate(" + source.y + "," + source.x + ")"; })
	  .remove();

  nodeExit.select("circle")
	  .attr("r", 1e-6);

  nodeExit.select("text")
	  .style("fill-opacity", 1e-6);

  // Update the links…
  var link = svg.selectAll("path.link")
	  .data(links, function(d) { return d.target.id; });

  // Enter any new links at the parent's previous position.
  link.enter().insert("path", "g")
	  .attr("class", "link")
	  .attr("d", function(d) {
		var o = {x: source.x0, y: source.y0};
		return diagonal({source: o, target: o});
	  });

  // Transition links to their new position.
  link.transition()
	  .duration(duration)
	  .attr("d", diagonal);

  // Transition exiting nodes to the parent's new position.
  link.exit().transition()
	  .duration(duration)
	  .attr("d", function(d) {
		var o = {x: source.x, y: source.y};
		return diagonal({source: o, target: o});
	  })
	  .remove();

  // Stash the old positions for transition.
  nodes.forEach(function(d) {
	d.x0 = d.x;
	d.y0 = d.y;
  });
}

// Toggle children on click.
function click(d) {
  if (d.children) {
	d._children = d.children;
	d.children = null;
  } else {
	d.children = d._children;
	d._children = null;
  }
  update(d);
}


</script>

  </body>
</html>