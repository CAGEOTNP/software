<?php use_javascript('jquery-1.6.1.min.js') ?>
<?php use_javascript('flot/jquery.flot.js') ?>
<?php use_javascript('flot/excanvas.min.js') ?>
<?php use_javascript('pdffeedback.js') ?>
<?php use_javascript('elicitator2.js') ?>

<?php slot('topbutton') ?>
  <a class="small blue button" href="<?php echo url_for('empdf/studyarea') ?>"> Study area</a>
  <a class="small blue button" href="<?php echo url_for('empdf/briefdoc') ?>"> Briefing document</a>
  <a class="small blue button" href="<?php echo url_for('empdf/new') ?>"> Round 1</a>
<?php end_slot() ?>   
<div id="topbutton">
  <?php if (has_slot('topbutton')): ?>
  <?php include_slot('topbutton') ?>
  <?php endif; ?>
</div>

<h2 class="red"> INDIVIDUAL FEEDBACK</h2>
A distribution was fitted to your judgement. Note that the fitted distribution need not satisfy all your judged values because a normal or lognormal distribution was enforced. You can now adjust your judgement if you wish.
<hr/>
<h4 class="blue">Probability distribution function</h4>
<table width="100%"> 
  <tr valign="top">
  <td>
    <table>
      <tr><b> Fitted values</b></tr>
      <tr><td>Distribution type:</td><td><font color="#090"><?php echo $distname?> distribution</font></td></tr>
      <tr><td>Median value:</td><td><font color="#0000FF"><?php echo round($median,3)?></font></td></tr>
      <tr><td>First quartile:</td><td><font color="#FF9900"><?php echo round($p1,3)?></font></td></tr>
      <tr><td>Third quartile:</td><td><font color="#CC00FF"><?php echo round($p2,3)?></font></td></tr>
      <tr><td>10<sup>th</sup> percentile: </td><td><?php echo round($p10,3)?></font></td></tr>
      <tr><td>90<sup>th</sup> percentile: </td><td><?php echo round($p90,3)?></font></td></tr>
    </table>
  </td>
  <td>
    <table>
      <tr><td><b> Your judged values </b></td></tr>
      <tr><td>&nbsp;</td></tr>
      <tr><td>Median value:</td><td><?php echo round($jmed,3)?></td></tr>
      <tr><td>First quartile:</td><td><?php echo round($jfq,3)?></td></tr>
      <tr><td>Third quartile:</td><td><?php echo round($jtq,3)?></td></tr>
    </table>
  </td>
  </tr>
</table>
<br/>
<?php $probability = explode(" ",$pro);
      $percentile = explode(" ",$per);
	  $script = '<script>var pro = new Array(' . implode(',', $probability) . '); var per = new Array(' . implode(',', $percentile ) . '); var fq = '.$p1.'; var tq = '.$p2.'; var med = '.$median.';</script>';
	  echo $script;
	  ?> 
<div id="container" style="width:100%;height:300px"></div>
<p align="center">Temperature (<sup>o</sup>C)</p> 
<br/>
<hr/>
<br/>
<div id="change"><h3 class="green"><a> Click here if you want to revise your judgement.</a> </h3></div>
<br/>
<font size="-3"> Hint: <ol type="disc"><li>If you think that any of the four intervals: [Z<sub>min</sub>, Z<sub>0.25</sub>], [Z<sub>0.25</sub>, Z<sub>med</sub>], [Z<sub>med</sub>, Z<sub>0.75</sub>], and [Z<sub>0.75</sub>, Z<sub>max</sub>] is more likely or probable than the others, you should revise your judgement.</li>
<li>Z<sub>min</sub> &#60 Z<sub>0.25</sub> &#60 Z<sub>med</sub> &#60 Z<sub>0.75</sub> &#60 Z<sub>max</sub></li></ol></font>
<br/>
<br/>
<?php include_partial('form', array('form' => $form)) ?>
<hr/>
<table width="100%">
  <tr>
    <td align="left">
      <a href="<?php echo url_for('empdf/new')?>" class="small blue button">Click to go back</a>
    </td>
    <td align="right">
      <a href="<?php echo url_for('empdf/poolmpdf')?>" class="small blue button">Click to see pooling result</a>
    </td>
  </tr>
</table>

