// JavaScript Document
$(function () {
	var d1 = [];
    for (var i = 0; i < 101; i += 1)
        d1.push([per[i], pro[i]]);
    $.plot($("#container"), 
          [{data: d1,
			color: '#090',
			lines:{show: true, fill:true}}], 
		  {
		   xaxis: {
		   },
		   yaxis: {
		    show: false
		   },
		   grid: {
			 markings:function(axes){
			 var markings = [];
			 markings = [{xaxis:{from: fq, to: fq}, color:"#FF9900"},
			             {xaxis:{from: med, to: med}, color:"#0000FF"},
						 {xaxis:{from: tq, to: tq}, color:"#CC00FF"}]
			 return markings;
		   }},
		  }
	     );
});