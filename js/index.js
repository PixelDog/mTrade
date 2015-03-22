(function($) {

var hcConfig=({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Most Exchanged Currencies.'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        }
    });
    
	var ajax = {
		parseJSON:function(result){

			var dataOBJ={};
			var obj = $.parseJSON(result);
			$.each(obj, function(key,row) {
				$.each(row, function(key2,row2) {
					if(key2=='currencyFrom'){
						if(!dataOBJ[row2]){
							dataOBJ[row2]=[row2, 1];
						}else{
							dataOBJ[row2][1]+=1;
						}
					}
				});
			});
			var hcData=[];
			
			$.each(dataOBJ, function(k,v) {
				hcData.push(v);
			});

			hcConfig['series']=[{
            	type: 'pie',
            	name: 'Currency Exchange',
            	// data: [JSON.stringify(dataOBJ)]
            	data: hcData
        	}];

			$('#container').highcharts(hcConfig);
		},
		ajaxCall: function(url, initialize) {
			$.ajax({
				url: url,
				async: 'true',
				success: function(result) {
					ajax.parseJSON(result);
				},
				error: function(request, error) {
					alert('Network error has occurred, please try again!');
				}
			});
		}
	}
	
	$(document).ready(function() {
		 ajax.ajaxCall("ExchangeData");
	});
	
}(jQuery));
 