<?php use_javascript('jquery-1.6.1.min.js') ?>
<?php use_javascript('flot/jquery.flot.js') ?>
<?php use_javascript('flot/excanvas.min.js') ?>
<?php use_javascript('varpoolfeedback.js') ?>

<body>
<br/>
<br/>
<h3 class="red"> POOLING RESULT </h3>
<br/>
<p>Total number of invited experts: <?php echo $allE?></p>
<p>Number of experts that completed round 2: <?php echo $Nexp?></p>
<hr/>
<br/>
<br/>
<?php $distance = explode(" ",$pdist);
      $simulation = explode(" ",$psim);
	  $edistance = explode(" ",$epdist);
      $esimulation = explode(" ",$epsim);
	  $script = '<script>var dist = new Array(' . implode(',', $distance) . '); var sim = new Array(' . implode(',', $simulation) . '); var edist = new Array(' . implode(',', $edistance) . '); var esim = new Array(' . implode(',', $esimulation). '); n = '.$pncol.'</script>';
	  echo $script;
	   ?> 
<div id="container" style="width:100%;height:300px"></div>
<br/>
<a href="javascript:document.location.reload();" class="small green button">
Click to generate a new simulation</a>
<hr/>
<table width="100%">
<tr>
<td align="left">
<a href="javascript:history.go(-1)" class="small blue button">Click to go back</a>
</td>
<td align="right">
<a href="<?php echo url_for('logout/index')?>" class="small blue button">Round 2 is completed, click to close</a>
</td>
</tr>
</table>
</body>
