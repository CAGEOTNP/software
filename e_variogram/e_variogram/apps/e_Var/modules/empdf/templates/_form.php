<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form style="display:none" action="<?php echo url_for('empdf/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
  <?php endif; ?>
  <table align="center">
    <tfoot>
      <tr>
      <td align="center" colspan="2">
        <br/>
        <input type="submit" value="Save changes" class="small green button"/> 
      </td>
      </tr>
    </tfoot>
    <tbody>
      <font color="#FF0000" size="0.5">
		<?php if ($form->hasGlobalErrors()):?>
        <?php echo $form->renderGlobalErrors();?>
        <?php endif;?>
      </font>
      <?php $label=array();?>
      <?php $label[1]='Minimum value Z<sub>min</sub>';?>
      <?php $label[2]='Maximum value Z<sub>max</sub>';?>
      <?php $label[3]='Median value Z<sub>med</sub>';?> 
      <?php $label[4]='First quartile value Z<sub>0.25</sub>';?>
      <?php $label[5]='Third quartile value Z<sub>0.75</sub>';?>
      <?php $i = 0;?>
      <?php foreach ($form as $field):?>
      <?php $i = $i + 1;?>
      <?php if ($i<6):?>	   
      <?php echo '<tr bgcolor="#F5F5F5"><td style="padding-left:80px; padding-right:80px"><p>';?>
      <?php echo $label[$i];?>
      <?php echo '</p>';?>
      <?php echo '<td style="padding-left:80px; padding-right:80px"><font color="#FF0000" size="0.2">';?>
      <?php echo $field->renderError();?>
      <?php echo'</font>';?>
      <?php echo $field->render(array('size'=>3));?>
      <?php echo'</td></tr>';?>
      <?php endif;?>
      <?php endforeach;?>
      <?php echo $form['_csrf_token']; ?>
    </tbody>
  </table>
</form>
