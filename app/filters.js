//Create a Filter
app.filter("moneySpanishFormat", function() {
        //Defining the filter function
        //return function(amount, moneySimbol = '') { return moneySimbol+" "+amount.toFixed(2).replace('.',','); };
        return function(amount, moneySimbol = '') {
        	return moneySimbol+" "+amount.toLocaleString(
        		'es-ES',
        		{minimumFractionDigits:2, maximumFractionDigits:2}
        	);
        };
});