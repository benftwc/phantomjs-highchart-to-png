#The Highcharts image convert script#
The file highcharts-convert.js is a [PhantomJS](http://phantomjs.org/) script to convert SVG or Highcharts JSON options objects to chart images. It is ideal for batch processing Highcharts configurations for attaching to emails or reports. It is also used in the featured (Java based) export server. An online demo with a GUI can be viewed at [export.highcharts.com/demo](http://export.highcharts.com/demo).



#Example usage#
With PhantomJS
	phantomjs highcharts-convert.js -infile options1.json -outfile chart1.png -scale 2.5 -width 300 -constr Chart -callback callback.js
With PHP Script
	Edit phpGen.php (first parameters) and then do 
	php phpGen.php
	

#Installation of Phantomjs#
See http://phantomjs.org/download.html
