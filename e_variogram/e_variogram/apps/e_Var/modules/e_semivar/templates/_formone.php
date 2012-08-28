<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<form style="display:none" action="<?php echo url_for('e_semivar/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
  <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
  <?php endif; ?>
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
  <table align="center">
    <tfoot align="center">
      <tr>
        <td colspan="2">
          <br/>
          <input class="button small green" type="submit" value="Save changes" />
        </td>
      </tr>
    </tfoot>
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
</form>
