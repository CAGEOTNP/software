<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<form action="<?php echo url_for('e_semivar/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
  <?php endif; ?>
  <table align="center">
    <tbody>
      <font color="#FF0000" size="0.5">
		<?php if ($form->hasGlobalErrors()) echo $form->renderGlobalErrors() ?>
      </font>
      <?php 
		$i = 0;
		foreach($form as $field){
		  $i = $i+1; 
		  if ($i<8){   
			echo '<tr bgcolor="#F5F5F5"><td style=" padding-left:100px; padding-right:100px"><p>';
			echo $field->renderLabel();
			echo '</p></td><td><font color="#FF0000" size="0.5">';
			echo $field->renderError();
			echo '</font>';
			echo $field->render(array('size' => 3));
			echo '<br/></td></tr>';
		  };
		}
	  ?>
      <?php echo $form['_csrf_token']; ?>
    </tbody>
  </table>
  <table width="100%">
    <tr>
      <td  align="left">
        <a href="<?php echo url_for('e_semivar/index')?>" class="small blue button">Click to go back</a>
      </td>
      <td align="right" colspan="2">
        <br/>
        <input type="submit" value="Click to continue" class="small blue button"/>
      </td>
    </tr>
  </table>
</form>
