<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<form action="<?php echo url_for('empdf/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
  <?php endif; ?>
  <h3 align="center" class="green">Please carefully read and answer the questions below!</h3>
  <br/>
  <br/>
  <font size="0"> Let the variable of interest (i.e. the maximum temperature on April 1, 2020) be denoted by symbol Z (Pr is abbreviation of probability)</font>
  <table width="100%" align="center">
    <tfoot>
      <tr>
        <td align="left">
          <a href="<?php echo url_for('empdf/briefdoc')?>" class="small blue button">Click to go back</a>
        </td>
        <td align="right" colspan="2">
          <br/>
          <input type="submit" value="Click to continue" class="small blue button"/>
        </td>
      </tr>
    </tfoot>
    <tbody>
    <font color="#FF0000" size="0.5">
	  <?php if ($form->hasGlobalErrors()):?>
      <?php echo $form->renderGlobalErrors();?>
      <?php endif; ?>
    </font>
    <?php $label=array();?>
    <?php $label[1]='Which is the lowest  possible value (Z<sub>min</sub>) of Z?';?>
    <?php $label[2]='Which is the highest possible value (Z<sub>max</sub>) of Z?';?>
    <?php $label[3]='What is the value Z<sub>med</sub> such that there is a 50% probability that the value of Z is equal or smaller than this value?<br/>Pr(Z&#8804Z<sub>med</sub>) = 50%';?> 
    <?php $label[4]='What is the value Z<sub>0.25</sub> such that there is a 50% probability that the value of Z is equal or smaller than this value within the interval [Z<sub>min</sub>, Z<sub>med</sub>]?<br/> Pr(Z&#8804Z<sub>0.25</sub>) = 25%';?>
    <?php $label[5]='What is the value Z<sub>0.75</sub> such that there is a 50% probability that the value of Z is equal or smaller than this value within the interval [Z<sub>med</sub>, Z<sub>max</sub>]? <br/> Pr(Z&#8804Z<sub>0.75</sub>) = 75%';?>	
    <?php $i = 0;?>
    <?php foreach ($form as $field):?>
    <?php $i = $i + 1;?>
    <?php if ($i<6):?>	   
    <?php echo '<tr bgcolor="#F5F5F5"><td style="padding-left:80px; padding-right:80px"><p>';?>
    <?php echo $label[$i];?>
    <?php echo '</p>' ?>
    <?php echo '</td><td style="padding-left:80px; padding-right:80px"><font color="#FF0000" size="0.2">';?>
    <?php echo $field->renderError();?>
    <?php echo'</font>';?>
    <?php echo $field->render(array('size'=>3));?>
    <?php echo'</td></tr>';?>
    <?php endif; ?>
    <?php endforeach; ?>
    <?php echo $form['_csrf_token']; ?>
    </tbody>
  </table>
</form>
