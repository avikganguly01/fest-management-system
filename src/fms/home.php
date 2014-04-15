<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])){
header("location:index.php");
}
include('db.php');
$topevents = mysql_query("SELECT eventname,count(id) FROM `registration` WHERE paid=1 group by eventname order by count(id) desc limit 10");
$clgparticipation = mysql_query("SELECT collegename,count(id) FROM `registration` WHERE paid=1 group by collegename order by count(id) desc limit 6");
$deptparticipation = mysql_query("SELECT r.dept,count(r.id) FROM `registration` r WHERE r.paid=1 and r.dept<>'' group by r.dept order by count(r.id) desc limit 6");
$winners = mysql_query("SELECT r.collegename,count(r.id) FROM registration r,events e WHERE paid=1 and r.id=e.winnerreg group by r.collegename order by count(r.id) desc limit 6");
$runners = mysql_query("SELECT r.collegename,count(r.id) FROM registration r,events e WHERE paid=1 and r.id=e.runnerreg group by r.collegename order by count(r.id) desc limit 6");
?>
<html lang="en">
    <head>
        <title>Fest Management System</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="css/index.css" />
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/nv.d3.css">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script src="js/modernizr.custom.js"></script>
        <script src="js/d3.min.js"></script>
        <script src="js/nv.d3.min.js"></script>
        
         <script>
		     nv.addGraph(function() {
  var chart = nv.models.discreteBarChart()
      .x(function(d) { return d.label })    
      .y(function(d) { return d.value })
      .staggerLabels(true)    //Too many bars and not enough room? Try staggering labels.
      .tooltips(false)        //Don't show tooltips
      .showValues(true)       //...instead, show the bar value right on top of each bar.
      .transitionDuration(350)
      ;
 
  d3.select('#chart1 svg')
      .datum(exampleData1())
      .call(chart);
 
  nv.utils.windowResize(chart.update);
 
  return chart;
});
 
//Each bar represents a single discrete quantity.
function exampleData1() {
 return  [ 
    {	   
      key: "Cumulative Return",
      values: [
	  <?php  while ($row = mysql_fetch_array($topevents)) { 
         echo "{";
		 echo '"label" : "'.$row[0].'" ,';
		 echo '"value" :'.$row[1].'';
		 echo "},";
	  }?>
        
      ]
    }
  ]
 
}
 
//Donut chart1
nv.addGraph(function() {
  var chart = nv.models.pieChart()
      .x(function(d) { return d.label })
      .y(function(d) { return d.value })
      .showLabels(true)     //Display pie labels
      .labelThreshold(.10)  //Configure the minimum slice size for labels to show up
      .labelType("percent") //Configure what type of data to show in the label. Can be "key", "value" or "percent"
      .donut(true)          //Turn on Donut mode. Makes pie chart look tasty!
      .donutRatio(0.35)     //Configure how big you want the donut hole size to be.
      ;
 
    d3.select("#chart2 svg")
        .datum(exampleData2())
        .transition().duration(350)
        .call(chart);
 
  return chart;
});
 
function exampleData2() {
  return  [
     <?php  while ($row = mysql_fetch_array($clgparticipation)) { 
	     echo "{";
		 echo '"label" : "'.$row[0].'" ,';
		 echo '"value" :'.$row[1].'';
		 echo "},";
	 }?>
    ];
}

//Donut chart2
nv.addGraph(function() {
  var chart = nv.models.pieChart()
      .x(function(d) { return d.label })
      .y(function(d) { return d.value })
      .showLabels(true)     //Display pie labels
      .labelThreshold(.10)  //Configure the minimum slice size for labels to show up
      .labelType("percent") //Configure what type of data to show in the label. Can be "key", "value" or "percent"
      .donut(true)          //Turn on Donut mode. Makes pie chart look tasty!
      .donutRatio(0.35)     //Configure how big you want the donut hole size to be.
      ;
 
    d3.select("#chart3 svg")
        .datum(exampleData3())
        .transition().duration(350)
        .call(chart);
 
  return chart;
});
 
//Pie chart example data. Note how there is only a single array of key-value pairs.
function exampleData3() {
  return  [
    <?php  while ($row = mysql_fetch_array($deptparticipation)) { 
	     echo "{";
		 echo '"label" : "'.$row[0].'" ,';
		 echo '"value" :'.$row[1].'';
		 echo "},";
	 }?>
    ];
}


//Donut chart3
nv.addGraph(function() {
  var chart = nv.models.pieChart()
      .x(function(d) { return d.label })
      .y(function(d) { return d.value })
      .showLabels(true)     //Display pie labels
      .labelThreshold(.10)  //Configure the minimum slice size for labels to show up
      .labelType("percent") //Configure what type of data to show in the label. Can be "key", "value" or "percent"
      .donut(true)          //Turn on Donut mode. Makes pie chart look tasty!
      .donutRatio(0.35)     //Configure how big you want the donut hole size to be.
      ;
 
    d3.select("#chart4 svg")
        .datum(exampleData4())
        .transition().duration(350)
        .call(chart);
 
  return chart;
});
 
//Pie chart example data. Note how there is only a single array of key-value pairs.
function exampleData4() {
  return  [
    <?php  while ($row = mysql_fetch_array($winners)) { 
	     echo "{";
		 echo '"label" : "'.$row[0].'" ,';
		 echo '"value" :'.$row[1].'';
		 echo "},";
	 }?>
    ];
}


//Donut chart4
nv.addGraph(function() {
  var chart = nv.models.pieChart()
      .x(function(d) { return d.label })
      .y(function(d) { return d.value })
      .showLabels(true)     //Display pie labels
      .labelThreshold(.10)  //Configure the minimum slice size for labels to show up
      .labelType("percent") //Configure what type of data to show in the label. Can be "key", "value" or "percent"
      .donut(true)          //Turn on Donut mode. Makes pie chart look tasty!
      .donutRatio(0.35)     //Configure how big you want the donut hole size to be.
      ;
 
    d3.select("#chart5 svg")
        .datum(exampleData5())
        .transition().duration(350)
        .call(chart);
 
  return chart;
});
 
//Pie chart example data. Note how there is only a single array of key-value pairs.
function exampleData5() {
  return  [
    <?php  while ($row = mysql_fetch_array($runners)) { 
	     echo "{";
		 echo '"label" : "'.$row[0].'" ,';
		 echo '"value" :'.$row[1].'';
		 echo "},";
	 }?>
    ];
}
		</script>
        
    </head>
    <body>
    	<div id="header"> 
        </div>
        
        <div class="container">
            <div class="content">
               <nav class="dr-menu">
						<div class="dr-trigger"><span id="dr-icon" class="fa fa-bars"></span><a class="dr-label">Menu</a></div>
						<ul>
							<li><a id="dr-icon" class="fa fa-compass"  href="home.php">Dashboard</a></li>
							<li><a id="dr-icon" class="fa fa-check-square-o" href="registration.php">Registration</a></li>
							<li><a id="dr-icon" class="fa fa-bar-chart-o" href="reporting.php">Reporting</a></li>
							<li><a id="dr-icon" class="fa fa-pencil" href="events.php">Events</a></li>
                            <li><a id="dr-icon" class="fa fa-phone" href="contact.php">Contact Us</a></li>
							<li><a id="dr-icon" class="fa fa-power-off" href="logout.php">Logout</a></li>
						</ul>
					</nav>
            </div><!-- content -->
            <div id="block">
                  <h4 style="width:10%; margin-left:23px;">Dashboard</h4>
                 
               <div id="insideblock">
                     
                      <h3>Top Events</h3>
                  <div id="chart1" style="height:300px;">
                      <svg></svg>
                  </div>
                  <h3 style="float:left; width:50%;">College Participation Report</h3>
                  <h3 style="float:left; width:50%;">Internal Department Participation Report</h3>
                  <div id="chart2" style="height:300px; float:left; width:50%;">
                      <svg></svg>
                  </div>
                  <div id="chart3" style="height:300px; float:left; width:50%;">
                      <svg></svg>
                  </div>
				  <h3 style="float:left; width:50%;">Winner Report</h3>
                  <h3 style="float:left; width:50%;">Runner-up Report</h3>
				  <div id="chart4" style="height:300px; float:left; width:50%;">
                      <svg></svg>
                  </div>
				  <div id="chart5" style="height:300px; float:left; width:50%;">
                      <svg></svg>
                  </div>
              
               </div>
            </div>
        </div>
        
        <div id="footer"> <p id="leftContent">Fest Management System</p>
        </div>
        <script src="js/ytmenu.js"></script>
    </body>
</html>