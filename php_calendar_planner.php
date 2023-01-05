<html>
<html lang="en">
<head>

<title> Lab Assignment 2 </title>

<style type="text/css">

h1
{
font-family: Helvetica, sans-serif;
font-style: bold;
font-size: 2.5em;
padding: 20px 15px;
width: 100%;
color : #ffffff;
max-width: 100%;
text-align: center;
}
.text
{
font-family: Helvetica, sans-serif;
font-style: normal;
font-size: 1.75em;
padding: 20px 15px;
width: 100%;
color : #000000;
max-width: 100%;
text-align: center;
}
.month
{
font-family: Helvetica, sans-serif;
font-style: bold;
font-size: 2.5em;
padding: 20px 15px;
width: 100%;
color : #ffffff;
max-width: 100%;
text-align: center;
}
.month ul {
margin: 0;
padding: 0;
}

.month .prev {
float: left;
padding-top: 10px;
}

.month .next {
float: right;
padding-top: 10px;
}
.weekday
{
font-family: Helvetica, sans-serif;
font-style: bold;
font-size: 1.5em;
color : #ffffff;
max-width: 100%;
text-align: center;
}

.number
{
font-family: Helvetica, sans-serif;
font-style: normal;
font-size: 1em;
color : #ffffff;
max-width: 100%;
}
body
{
background-color : #B4B7CE;
}
.calendarcolumn {
display: grid;
grid-template-columns: auto auto auto auto auto auto auto;
background-color: #B4B7CE;
padding: 20px;
text-align: center;
}
.calendarcolumn2 {
display: grid;
grid-template-columns: auto auto auto auto auto auto;
background-color: #B4B7CE;
padding: 20px;
text-align: center;
}
.calendarRow {
background-color: #B4B7CE;
border: 1px;
padding: 50px;
font-size: 30px;
text-align: center;
}

</style>

<body>

<?php $date = explode(',', date("j,m,t, F")); ?>

<div class="month">
<ul>
<li>
<?php echo $date[3]; ?><br>
</li>
</ul>
</div>

<div class="calendarcolumn">
<?php

$last_month = date("t", strtotime("last day of previous month"));
//echo $date[0] . " : " . $date[1] . " : " . $date[2]; //day of week : day of month : days in month

$WeekDays = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
$days_matching = false;
$days_previous = 0;
$first_day = date('l', strtotime('first day of this month'));

foreach ($WeekDays as $Day){
if($first_day == $Day){
$days_matching = true;
}
else if(! $days_matching){
$days_previous++;
}
echo "<div class=\"weekday\">$Day</div>\n";
}
$days_remaining = $days_previous;
while($days_previous--){
echo "<div class=\"calendarRow\">" . ((int)$last_month - (int)$days_previous) . "</div>\n";
}
for($i = 1; $i <= $date[2]; $i++){
echo "<div class=\"calendarRow\">$i</div>\n";
}
while($days_remaining--){
echo "<div class=\"calendarRow\"></div>\n";
}
//echo $days_previous;
?>
</div>

<!--<div class="calendarcolumn">
<div class="weekday">Sunday</div>
<div class="weekday">Monday</div>
<div class="weekday">Tuesday</div>
<div class="weekday">Wednesday</div>
<div class="weekday">Thursday</div>
<div class="weekday">Friday</div>
<div class="weekday">Saturday</div>
<div class="calendarRow">1</div>
<div class="calendarRow">2</div>
<div class="calendarRow">3</div>
<div class="calendarRow">4</div>
<div class="calendarRow">5</div>
<div class="calendarRow">6</div>
<div class="calendarRow">7</div>
<div class="calendarRow">8</div>
<div class="calendarRow">9</div>
<div class="calendarRow">10</div>
<div class="calendarRow">11</div>
<div class="calendarRow">12</div>
<div class="calendarRow">13</div>
<div class="calendarRow">14</div>
<div class="calendarRow">15</div>
<div class="calendarRow">16</div>
<div class="calendarRow">17</div>
<div class="calendarRow">18</div>
<div class="calendarRow">19</div>
<div class="calendarRow">20</div>
<div class="calendarRow">21</div>
<div class="calendarRow">22</div>
<div class="calendarRow">23</div>
<div class="calendarRow">24</div>
<div class="calendarRow">25</div>
<div class="calendarRow">26</div>
<div class="calendarRow">27</div>
<div class="calendarRow">28</div>
<div class="calendarRow">29</div>
<div class="calendarRow">30</div>
<div class="calendarRow">31</div>
<div class="calendarRow"></div>
<div class="calendarRow"></div>
<div class="calendarRow"></div>
<div class="calendarRow"></div>
<div class="calendarRow"></div>
<div class="calendarRow"></div>
<div class="calendarRow"></div>
<div class="calendarRow"></div>
<div class="calendarRow"></div>
<div class="calendarRow"></div>
<div class="calendarRow"></div>
</div>-->

<h1> Office Hours Setup Form </h1>
<div class="calendarcolumn2">
<div class="h2">Day:</div>
<div class="weekday">Monday</div>
<div class="weekday">Tuesday</div>
<div class="weekday">Wednesday</div>
<div class="weekday">Thursday</div>
<div class="weekday">Friday</div>
<div class="h2">Time:</div>
<div class="h2">
<form action="/appointmentTime.php">
<label for="calendarcolumn2">
</label>
<select name="h2" id="cars">
<option value="7am">7am</option>
<option value="7:30am">7:30am</option>
<option value="8am">8am</option>
<option value="8:30am">8:30am</option>
<option value="9am">9am</option>
<option value="9:30am">9:30am</option>
<option value="10am">10am</option>
<option value="10:30am">10:30am</option>
<option value="11am">11am</option>
<option value="11:30am">11:30am</option>
<option value="12pm">12pm</option>
<option value="12:30pm">12:30pm</option>
<option value="1pm">1pm</option>
<option value="1:30pm">1:30pm</option>
<option value="2pm">2pm</option>
<option value="2:30pm">2:30pm</option>
<option value="3pm">3pm</option>
<option value="3:30pm">3:30pm</option>
<option value="4pm">4pm</option>
<option value="4:30pm">4:30pm</option>
<option value="5pm">5pm</option>
<option value="5:30pm">5:30pm</option>
<option value="6pm">6pm</option>
<option value="6:30pm">6:30pm</option>
<option value="7pm">7pm</option>
<option value="7:30pm">7:30pm</option>
<option value="8pm">8pm</option>
<option value="8:30pm">8:30pm</option>
<option value="9pm">9pm/option>
<option value="9:30pm">9:30pm</option>
<option value="10pm">10pm</option>
</select>
<br><br>
</div>
<div class="h2">
<form action="/appointmentTime.php">
<label for="calendarcolumn2">
</label>
<select name="h2" id="cars">
<option value="7am">7am</option>
<option value="7:30am">7:30am</option>
<option value="8am">8am</option>
<option value="8:30am">8:30am</option>
<option value="9am">9am</option>
<option value="9:30am">9:30am</option>
<option value="10am">10am</option>
<option value="10:30am">10:30am</option>
<option value="11am">11am</option>
<option value="11:30am">11:30am</option>
<option value="12pm">12pm</option>
<option value="12:30pm">12:30pm</option>
<option value="1pm">1pm</option>
<option value="1:30pm">1:30pm</option>
<option value="2pm">2pm</option>
<option value="2:30pm">2:30pm</option>
<option value="3pm">3pm</option>
<option value="3:30pm">3:30pm</option>
<option value="4pm">4pm</option>
<option value="4:30pm">4:30pm</option>
<option value="5pm">5pm</option>
<option value="5:30pm">5:30pm</option>
<option value="6pm">6pm</option>
<option value="6:30pm">6:30pm</option>
<option value="7pm">7pm</option>
<option value="7:30pm">7:30pm</option>
<option value="8pm">8pm</option>
<option value="8:30pm">8:30pm</option>
<option value="9pm">9pm/option>
<option value="9:30pm">9:30pm</option>
<option value="10pm">10pm</option>
</select>
<br><br>
<input type="submit" value="Submit">
</form>
</div>
<div class="h2">
<form action="/appointmentTime.php">
<label for="calendarcolumn2">
</label>
<select name="h2" id="cars">
<option value="7am">7am</option>
<option value="7:30am">7:30am</option>
<option value="8am">8am</option>
<option value="8:30am">8:30am</option>
<option value="9am">9am</option>
<option value="9:30am">9:30am</option>
<option value="10am">10am</option>
<option value="10:30am">10:30am</option>
<option value="11am">11am</option>
<option value="11:30am">11:30am</option>
<option value="12pm">12pm</option>
<option value="12:30pm">12:30pm</option>
<option value="1pm">1pm</option>
<option value="1:30pm">1:30pm</option>
<option value="2pm">2pm</option>
<option value="2:30pm">2:30pm</option>
<option value="3pm">3pm</option>
<option value="3:30pm">3:30pm</option>
<option value="4pm">4pm</option>
<option value="4:30pm">4:30pm</option>
<option value="5pm">5pm</option>
<option value="5:30pm">5:30pm</option>
<option value="6pm">6pm</option>
<option value="6:30pm">6:30pm</option>
<option value="7pm">7pm</option>
<option value="7:30pm">7:30pm</option>
<option value="8pm">8pm</option>
<option value="8:30pm">8:30pm</option>
<option value="9pm">9pm/option>
<option value="9:30pm">9:30pm</option>
<option value="10pm">10pm</option>
</select>
<br><br>
</div>
<div class="h2">
<form action="/appointmentTime.php">
<label for="calendarcolumn2">
</label>
<select name="h2" id="cars">
<option value="7am">7am</option>
<option value="7:30am">7:30am</option>
<option value="8am">8am</option>
<option value="8:30am">8:30am</option>
<option value="9am">9am</option>
<option value="9:30am">9:30am</option>
<option value="10am">10am</option>
<option value="10:30am">10:30am</option>
<option value="11am">11am</option>
<option value="11:30am">11:30am</option>
<option value="12pm">12pm</option>
<option value="12:30pm">12:30pm</option>
<option value="1pm">1pm</option>
<option value="1:30pm">1:30pm</option>
<option value="2pm">2pm</option>
<option value="2:30pm">2:30pm</option>
<option value="3pm">3pm</option>
<option value="3:30pm">3:30pm</option>
<option value="4pm">4pm</option>
<option value="4:30pm">4:30pm</option>
<option value="5pm">5pm</option>
<option value="5:30pm">5:30pm</option>
<option value="6pm">6pm</option>
<option value="6:30pm">6:30pm</option>
<option value="7pm">7pm</option>
<option value="7:30pm">7:30pm</option>
<option value="8pm">8pm</option>
<option value="8:30pm">8:30pm</option>
<option value="9pm">9pm/option>
<option value="9:30pm">9:30pm</option>
<option value="10pm">10pm</option>
</select>
<br><br>
</div>
<div class="h2">
<form action="/appointmentTime.php">
<label for="calendarcolumn2">
</label>
<select name="h2" id="cars">
<option value="7am">7am</option>
<option value="7:30am">7:30am</option>
<option value="8am">8am</option>
<option value="8:30am">8:30am</option>
<option value="9am">9am</option>
<option value="9:30am">9:30am</option>
<option value="10am">10am</option>
<option value="10:30am">10:30am</option>
<option value="11am">11am</option>
<option value="11:30am">11:30am</option>
<option value="12pm">12pm</option>
<option value="12:30pm">12:30pm</option>
<option value="1pm">1pm</option>
<option value="1:30pm">1:30pm</option>
<option value="2pm">2pm</option>
<option value="2:30pm">2:30pm</option>
<option value="3pm">3pm</option>
<option value="3:30pm">3:30pm</option>
<option value="4pm">4pm</option>
<option value="4:30pm">4:30pm</option>
<option value="5pm">5pm</option>
<option value="5:30pm">5:30pm</option>
<option value="6pm">6pm</option>
<option value="6:30pm">6:30pm</option>
<option value="7pm">7pm</option>
<option value="7:30pm">7:30pm</option>
<option value="8pm">8pm</option>
<option value="8:30pm">8:30pm</option>
<option value="9pm">9pm/option>
<option value="9:30pm">9:30pm</option>
<option value="10pm">10pm</option>
</select>
<br><br>
</div>
</div>
<input type="submit" value="Submit">
</form>
</div>

</body>
</html>