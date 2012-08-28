<?php use_javascript('jquery-1.6.1.min.js') ?>
<?php use_javascript('flot/jquery.flot.js') ?>
<?php use_javascript('flot/excanvas.min.js') ?>
<?php use_javascript('pdffeedbackpool.js') ?>

<?php slot('topbutton') ?>
<a class="small blue button" href="<?php echo url_for('empdf/studyarea') ?>"> Study area</a>
<a class="small blue button" href="<?php echo url_for('empdf/briefdoc') ?>"> Briefing document</a>
<a class="small blue button" href="<?php echo url_for('empdf/new') ?>"> Round 1</a>
<a class="small blue button" href="<?php echo url_for('e_semivar/index') ?>"> Round 2</a>
<?php end_slot() ?>   
<div id="topbutton">
<?php if (has_slot('topbutton')): ?>
<?php include_slot('topbutton') ?>
<?php endif; ?>
</div>

<body>
<br/>
<br/>
<h3 class="red"> POOLING RESULT </h3>
<br/>
<p>Total number of invited experts: <?php echo $N2 ?></p>
<p>Number of experts that completed round 1: <?php echo $N1?></p>
<br/>
<hr/>
<h3 class="blue">Pooled probability distribution</h3>
<table> 
  <tr><td>Distribution type:</td><td><font color="#090"><?php echo $distname?> distribution</font></td></tr>
  <tr><td>Median value:</td><td><font color="#0000FF"><?php echo round($median,3)?></font></td></tr>
  <tr><td>First quartile:</td><td><font color="#FF9900"><?php echo round($p1,3)?></font></td></tr>
  <tr><td>Third quartile:</td><td><font color="#CC00FF"><?php echo round($p2,3)?></font></td></tr>
</table>
<br/>
<?php $probability = explode(" ",$pro);
      $percentile = explode(" ",$per);
	  $eprobability = explode(" ",$epro);
	  $epercentile = explode(" ",$eper);
	  $script = '<script>var pro = new Array(' . implode(',', $probability) . '); var per = new Array(' . implode(',', $percentile ) .'); var epro = new Array(' . implode(',', $eprobability).'); var eper = new Array(' . implode(',', $epercentile ).'); var fq = '.$p1.'; var tq = '.$p2.'; var med = '.$median.';</script>';
	  echo $script;
	  ?> 
<div id="container" style="width:100%;height:300px"></div>
<p align="center">Temperature (<sup>o</sup>C)</p> 
<br/>
<br/>

<hr />
<table width="100%">
  <tr>
    <td align="left">
      <p> You can still change your judgement <a href="javascript:history.go(-1)" class="small blue button">Click to go back</a></p>
    </td>
    <td align="right">
      <a href="<?php echo url_for('e_semivar/index')?>" class="small blue button">Click to continue round 2</a>
    </td>
  </tr>
</table>
</body>

