// JavaScript Document

$(function () {
	var plot;
	var d1 = [];
	var d2 = [];
	ncolumn = n + 1;
    for (var i = 0; i < ncolumn; i += 1){
        d1.push([dist[i], sim[i]]);    
		d2.push([edist[i], esim[i]])};
    plot = $.plot($("#container"), 
          [ {label: "Your transect", data  : d2,
			lines : {show:true},
		    points: {show:true, radius: 2},
			color : '#FFC'},
		    {label: "Pooled transect", data  : d1,
			lines : {show:true},
		    points: {show:true, radius: 2},
			color : '#090'}],
		  {
		  series: {
			  lines: { show: true }
		  },
		  });
});






