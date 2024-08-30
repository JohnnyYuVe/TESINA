<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<head>	
			
	
<style> 

body {
		background-color: red;

}
.MAINgrid {
  display: grid;
  grid-template-columns: repeat(9, 1fr);
  grid-template-rows: repeat(4, minmax(100px, auto));
}

.SUBgrid {
  display: grid;
  grid-column: 2 / 7;
  grid-row: 2 / 4;
  grid-template-columns: subgrid;
  grid-template-rows: repeat(3, 80px);
}

.item {
  grid-column: 3 / 6;
  grid-row: 1 / 3;
}

</style>

</head>	


<body>
	<div class="MAINgrid">
	  <div class="SUBgrid">
		    <div class="item">
		    	
		    </div>
	  </div>
	</div>

</body>

</html>	

<!--
link utilizzati:
https://developer.mozilla.org/en-US/ 
https://www.freepik.com/
-->


