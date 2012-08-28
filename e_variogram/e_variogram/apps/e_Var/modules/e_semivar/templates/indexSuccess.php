<h2 class="red">ROUND 2: ELICITATION FOR THE VARIOGRAM</h2>
<hr/>
<p>
Depending on the result of the first round, that is whether the random variable has a normal or lognormal distribution, the next step of eliciting the variogram will be different.
<ol>
<li>If the pooled probability distribution is the normal distribution: Each expert will be asked to judge the medians of the absolute first increments.<br/>
Again, let the variable of interest (i.e. the maximum temperature on April 1, 2020) be denoted by symbol Z. The absolute first increment is the absolute difference V<sub>inc</sub> of the value of Z at two points located a certain distance h apart, regardless of its direction: V<sub>inc</sub>=|Z(x) &#45 Z(x+h)|.</li>
<li>If the pooled probability distribution is the lognormal distrbution: Each expert will be asked to judge the median of the absolute ratio of change V<sub>r</sub> in the value of Z at two locations: V<sub>r</sub>=|Z(x)/Z(x+h)|, assuming that |Z(x)|>|Z(x+h)|.</li>
</ol> 
</p>
<hr/>
<table>
  <tr><td><h3 class = "green"> Information about pooled marginal probability distribution</h3></td></tr>
  <tr><td>Probability distribution:</td><td> <?php echo $dist. " Distribution" ?></td></tr>
  <tr><td>Maximum value:</td><td> <?php echo $max?></td></tr>
  <tr><td>Minimum value: </td><td> <?php echo $min?></td></tr>
  <tr><td> Mean value: </td><td><?php echo $mean?></td></tr>
  <tr><td> Standard deviation:</td><td> <?php echo $std?></td></tr>
</table>
<hr/>
<p align="center"><a href="<?php echo url_for('e_semivar/new')?>" class="small blue button"> Click to continue </a></p>

 