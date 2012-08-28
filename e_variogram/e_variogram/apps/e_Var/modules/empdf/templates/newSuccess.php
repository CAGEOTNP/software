<?php use_javascript('jquery-1.6.1.min.js') ?>
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
<h2 class="red">ROUND 1: ELICITATION FOR THE PROBABILITY DISTRIBUTION</h2>
<hr/>
<font style="line-height:2">In this first round, each expert is asked to judge the probability distribution of the maximum temperature on April 1, 2020 at a randomly chosen location in the Netherlands. Each expert will be first asked to estimate the minimum and maximum value of the variable and next the three quartiles (the first and third quartile, and the median).<br/></font>
<font class="green" size="-2" style="line-height:2">Note: The rule of probability requires in this case that: minimum &#60 first quartile &#60 median &#60 third quartile &#60 maximum. Inappropriate values will be noticed by the system and the expert is asked to modify the entries until the requirements are met. To avoid bias, you should answer the questions from top to bottom.</font>
<hr/>
<br/>
<?php include_partial('formone', array('form' => $form)) ?>
