// JavaScript Document

$(function () {
	var plot;
	var d1 = [];
	
	ncolumn = n + 1;
    for (var i = 0; i < ncolumn; i += 1)
        d1.push([dist[i], sim[i]]);    

    plot = $.plot($("#container"), 
          [{data  : d1,
			lines : {show:true},
		    points: {show:true, radius: 2},
			color : '#090'}],
		  {
		  series: {
			  lines: { show: true }
		  },
		  });
});






