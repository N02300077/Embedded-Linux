Raspberry Pi / Arduino Temperature Sensor Interface README
==========================================================

**Complete project documentation may be found in /embedded linx/documentation/Complete Documentation.pdf


PROJECT DISCRIPTION

This project explains how to set up an interface between the Arduino Mega microcontroller and Raspberry Pi 
microcontroller running the Raspbian operating system. In the system the Arduino reads temperature values 
through its analog port and sends the values to the Raspberry Pi.  The Raspberry Pi then displays the values 
on a website using a Highcharts linegraph and a table format.  This project may be expanded to use more than 
a single sensor and is fully customizable. 

----------------------------------------------------------

PROJECT REQUIREMENTS

Skills Required
> A knowledge of web programming (Languages used: HTML, SQL, PHP, Python)
> A knowledge of basic electonics

Tools Required
> Arduino Mega Microcontroller
> Raspberry Pi Microcontroller
> 22 Gauge Electronic Wire
> LM-35 Temperature Sensor
> Solderless Plug-in BreadBoard

----------------------------------------------------------

DIRECTORY HIERARCHY

--embedded linux
	--src
		--Code for Testing Temperature Circuit
			>temperature_sensor_arduino_code.ino
		--Database Test Data
			>data
			>tempData.xls
		--Highcharts Files
			--highcharts
				>all highcharts folder and files are located here
		--Python Serial Comm Scripts
			>readme //readme doc for python serial scripts
			>serial_collect.py
			>serial_collect_update.py
		--Webpage WWW Directory
			--www
				>highcharts
				>js //java script files for website graph
				>old programs //old php files
				>data //sqlite test data
				>index.lighttpd.html //lighttpd html document
				>index.php //website php file
				>realtime_data //data base used by website
				>serial_collect_update.py // python script that updates website
				>styles.css //CSS doc for HTML table
		
	--documentation
		--Powerpoint Presentations
			>arduino + raspberry pi data collection.ppt 
			>Arduino Data Collection
		>Complete Documentation.pdf //complete documentation

				
		