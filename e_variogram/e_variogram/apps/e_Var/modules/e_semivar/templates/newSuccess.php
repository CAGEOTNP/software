<?php slot('topbutton') ?>
  <a class="small blue button" href="<?php echo url_for('e_semivar/studyarea') ?>"> Study area</a>
  <a class="small blue button" href="<?php echo url_for('e_semivar/briefdoc') ?>"> Briefing document</a>
<?php end_slot() ?>   
<div id="topbutton">
  <?php if (has_slot('topbutton')): ?>
  <?php include_slot('topbutton') ?>
  <?php endif; ?>
</div>
<br/>
<br/>
Please answer the question below for each distance interval (<a href="<?php echo url_for('e_semivar/studyarea')?>" target="_blank"><font size="-4">click here if you want to see the study area again</font></a>)
<hr/>
<br/>
<?php if ($dist == 'Normal'):?>
  <h4 class="green"> Could you determine a value such that the
  absolute difference V<sub>inc</sub>=|Z(x) &#45 Z(x+h)| of attribute Z at two locations
  that are a distance h apart is equally likely to be less
  than or greater than this value?</h4><br/>
<?php endif; ?>
<?php if ($dist == 'Lognormal'):?>
  <h4 class="green">Suppose that we observe Z at some location
  and another location a distance h from it. Next we take
  the ratio of these two observations, while putting the
  largest of the two in the numerator. Could you
  determine a value such that the ratio is equally likely
  to be less than or greater than this value?</h4><br/>
<?php endif; ?>
<?php include_partial('form', array('form' => $form, 'caseid' => $caseid)) ?>
