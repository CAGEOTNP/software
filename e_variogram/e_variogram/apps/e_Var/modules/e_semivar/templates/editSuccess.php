<?php use_javascript('jquery-1.6.1.min.js') ?>
<?php use_javascript('flot/jquery.flot.js') ?>
<?php use_javascript('flot/jquery.flot.crosshair.js') ?>
<?php use_javascript('flot/excanvas.min.js') ?>
<?php use_javascript('varfeedback.js') ?>
<?php use_javascript('elicitator2.js') ?>

<h2 class="red"> INDIVIDUAL FEEDBACK</h2>
<hr/>
<?php if($err != 1):?>
<h4 class="blue">Simulated value along a transect within the study area</h4>
<br/>
<?php 
$distance = explode(" ",$pdist);
$simulation = explode(" ",$psim);
$script = '<script>var dist = new Array(' . implode(',', $distance) . '); var sim = new Array(' . implode(',', $simulation) . '); n = '.$pncol.'</script>';
echo $script;
?> 
<div id="container" style="width:100%;height:300px"></div>
<br/>
<a href="javascript:document.location.reload();" class="small green button">
Click to generate a new simulation</a>
<hr/>
<br/>
<div id="change"> <h4 class="green"> <a>Click here if you want to revise your judgements</a> </h4></div>
<br/>
<?php include_partial('formone', array('form' => $form, 'caseid' => $caseid, 'dist'=>$dist)) ?>
<hr/>
<?php endif;?>
<?php if($err == 1):?>
<p> Your judged values can not be automatically fitted to a valid variogram model. Please carefully consider again your judgments. You can change your judgements by clicking to go back. If you believe that your judgements are true, please send an email to <a href="mailto:phuong.truong@wur.nl"> phuong.truong@wur.nl</a>, we will try to get back to you very soon with feedback .</p> 
<?php endif;?>
<table width="100%">
<tr>
<td align="left">
<a href="<?php echo url_for('e_semivar/new')?>" class="small blue button">Click to go back</a>
</td>
<td align="right">
<a href="<?php echo url_for('e_semivar/poolvar')?>" class="small blue button">Click to see pooling result</a>
</td>
</tr>
</table>

