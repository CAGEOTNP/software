<?php slot('topbutton') ?>
<a class="small blue button" href="<?php echo url_for('e_semivar/studyarea') ?>"> Study area</a>
<a class="small blue button" href="<?php echo url_for('e_semivar/briefdoc') ?>"> Briefing document</a>
<a class="small blue button" href="<?php echo url_for('e_semivar/new') ?>"> Round 2</a>
<?php end_slot() ?>   
<div id="topbutton">
<?php if (has_slot('topbutton')): ?>
<?php include_slot('topbutton') ?>
<?php endif; ?>
</div>

<h2 class="red" align="left"> BRIEFING DOCUMENT</h2>
<hr/>
<ol>
<li class="blue">
<h3> Objective </h3>
</li>
<p align="justify">The objective of this elicitation procedure is to characterise and quantify the spatial variation of the maximum temperature on April 1, 2020 over the Netherlands. The results will be used for scientific communication only. The main audiences are students, experts, decision makers and scientists in weather and climatology.</p>
<li class="blue">
<h3> Outline of elicitation task </h3>
</li>
<p align="justify">The elicitation procedure has two main rounds:
<ol type="disc">
<li style="line-height:3"> The first round is the elicitation of the marginal probability distribution of the temperature at a randomly chosen location in the Netherlands.<br/> 
</li>
<li style="line-height:3"> The second round is the elicitation of the variogram.<br/> 
</li>
</ol>
<br/>
Both rounds will take about 30 minutes to complete with four questions in round 1 and seven questions in round 2. Round 2, however, cannot be commenced immediately after round 1. There must be a break of several days in between the two rounds to allow all experts to modify their judgements of the first round based on the opinions of other experts and to pool results.</p>
<li class="blue">
<h3> Elicitation techniques </h3>
</li>
<p align="justify">To characterise the marginal probability distribution of the maximum temperature at a randomly chosen location in the Netherlands, the procedure elicits from the expert the first quartile, the median and the third quartile, together with the range of possible values (the minimum and the maximum).</p>
<p align="justify">To characterise the variogram, the technique branches between two types of marginal distributions: the normal and the log-normal:
<ol type="disc">
<li style="line-height:3">In case of the normal distribution, the experts are asked to estimate the median of the absolute difference between the temperatures at two locations for seven distance classes.  
</li>
<li style="line-height:3">In case of the log-normal distribution, the median of the ratio of the  temperatures at two locations is elicited for the seven distance classes, whereby the larger temperature is put in the numerator and the smaller value in the denominator.
</li></ol></p>
<li class="blue">
<h3> Definition of probabilistic terms </h3>
</li>

<table cellspacing="3">
<tr>
<td>
<p>
<ol type = "disc">
<li>
The marginal probability distribution is the probability distribution of the temperature at a single location.
</li>
<li>
The median divides a dataset or probability distribution into two equal parts: the probability of a value greater (or smaller) than the median is 50%.
</li>
<li>
The first quartile is the median of the lower half of the data: the probability of a value smaller than the first quartile is 25%.
</li>
<li>
The third quartile is the median of the upper half of the data: the probability of a value greater than the third quartile is 25%.
</li>
</ol>
</p>
</td>
<td>
<?php 
echo image_tag("pdf.png");
?> 
<br/><br/><font size="0">Figure: Example of marginal probability distribution, its median and quartiles.</font>
</td>
</tr>
</table>
<li class="blue">
<h3> Requirements from experts </h3>
</li>
<p align="justify">Experts are kindly requested to complete both rounds of the elicitation procedure.</p>
<li class="blue">
<h3> Some possible causes of biased judgments </h3>
</li>
<p align="justify">Experts can possibly make biased judgements. Some causes of biased judgements that experts are kindly asked to be aware of when giving their judgement:<br />
<ol>
<li><b>Availability bias:</b> judgements given by experts are affected by easy recall of recent experiences.<br/>For example, if the train from Amsterdam to Rotterdam was reported to be delayed more often these days, experts can overestimate the probability of the train being delayed today. The recent high frequency of events can cause experts to give it a higher probability than justified by long-term evidence.</li> <br/>

<li><b>Representativeness bias:</b> judgements given by experts are based on inappropriate or evidences that are too specific.<br/>A typical example from the literature:<br/>Linda is 31 years old, single, outspoken and very bright. She majored in philosophy. As a student, she was deeply concerned with issues of discrimination and social justice, and also participated in anti-nuclear demonstrations. Please check off the most likely alternative:
<ol><li>Linda is a bank teller.</li>
<li>Linda is a bank teller and is active in the feminist movement.</li></ol>
Most people (typically more than 80%) judge the second option as more likely than the first because Linda is a woman with the given profile. However, the fact that Linda is a bank teller is more likely than that she is a bank teller <u>and</u> active in the feminist movement.  
  </li><br/>

<li><b>Anchoring and adjustment:</b> experts judge by first choosing a starting point as a first estimate and next adjusting the estimate.<br/>For example, an expert is asked to judge the maximum temperature. If he or she is first asked to judge the median and then asked to judge the plausible range of the maximum temperature, he or she will tend to anchor his or her judgements on the median and insufficiently modify outwards. This results in a range which only covers about 70% (instead of 100%) of the probable maximum temperature.</li><br/>

<li><b>Motivational bias:</b> judgements given by experts are motivated by inappropriate factors such as satisfying the expectation of society, legal constraints, and professional responsibility.<br />For example, if an expert is asked to judge the probability of success of his or her project's proposal, he (or she) may assign a high probability that the project will be successful because he (or she) thinks that his high confidence about the success of the proposal will give a good impression on the committee. </li>

</ol>
</ol>
<hr/>
