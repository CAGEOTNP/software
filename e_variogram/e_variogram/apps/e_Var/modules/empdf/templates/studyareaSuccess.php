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

<h2 class="red" align="center">CASE STUDY AND ENVIRONMENTAL VARIABLE</h2>
In this case study, the experts are asked to characterize the spatial variation of temperature over the Netherlands.
<hr/>
<ol>
<li class="blue">
<h3>DESCRIPTION OF THE STUDY AREA</h3>
</li>
<p> The Netherlands is located in North-West Europe. In the north and west it is bordered by the North Sea. The south of the Netherlands shares the border with Belgium, and the east with Germany. Agriculture and horticulture account for most land use in the Netherlands, approximately 70% of the surface area of the country is used by the agricultural sector.<br/><br/>
The Netherlands is a geographically flat and low-lying country, with about 25% of its area located below sea level. The lower areas are located in the north and west with the lowest point at about 7m below the mean sea level. Further to the south and east elevation is higher, with a maximum elevation of 322.5 m in the extreme southeast. The Netherlands is largely formed by the estuary of two important European rivers: the Rhine and the Meuse.<br/><br/>
The Netherlands lies between latitudes 50° and 54° N and longitudes 3° and 8° E, which belongs to the temperate climate zone. The predominant wind direction in the Netherlands is southwest. <br/>
Click for more information about <a href="http://en.wikipedia.org/wiki/Netherlands"> the Netherlands</a>    
</p>
<li class="blue">
<h3>DESCRIPTION OF THE VARIABLE</h3>
</li>
<p> The temperature in the Netherlands is measured in degrees Celsius. The experts are requested to judge the <b>maximum temperature on April 1, 2020</b>. <br/>
References for past temperature and it measurements in the Netherlands can be found in the website of the Dutch Royal Meteorological Institute (<a href="http://www.knmi.nl/index_en.html">KNMI</a>)</p>
</ol>
<br/>
<div align="center">
<iframe width="100%" height="480" frameborder="1" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.nl/maps/ms?ie=UTF8&amp;hl=nl&amp;t=k&amp;msa=0&amp;msid=208097547969447395026.0004a40396677668ffbe7&amp;ll=52.133488,5.372314&amp;spn=3.237243,7.03125&amp;z=7&amp;output=embed"></iframe>
</div>
<br />
<hr/>
<table width="100%">
  <tr>
    <td align="left">
      <a href="<?php echo url_for('casestudy/casestudy')?>" class="small blue button">Click to go back</a>
    </td>
    <td align="right">
      <a href="<?php echo url_for('empdf/briefdoc') ?>" class="small blue button">Click to continue</a>
    </td>
  </tr>
</table>
