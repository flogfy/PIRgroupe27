$(document).ready(function() {
	var champ;
	$.getJSON("http://api.openweathermap.org/data/2.5/forecast?id=6544556&APPID=df7e65f04a5c4fca7919b922b516edbf", function( data ) {
		console.log(data);
		var temp = Math.round(data['list'][0]['main']['temp_min'] - 273);
		var wind = Math.round(data['list'][0]['wind']['speed'] * 3.6);
		var urlIcone = "./img/weather/" + data['list'][0]['weather'][0]['icon'] + ".svg";
		$('.meteo_valTho1 .iconMValTho').attr('src', urlIcone);
		$('.meteo_valTho1 .tempValTho').html(temp + ' °C');
		$('.meteo_valTho1 .windValTho').html(wind + ' km/h');
		var day =  data['list'][0]['dt_txt'];
		day = day.split(' ');
		var hour = parseInt(day[1].split(':'));
		if(hour==21){
			champ = 5;
		} else if(hour==18){
			champ = 6;
		} else if (hour == 15){
			champ = 7;
		} else if (hour == 12){
			champ = 8;
		} else if (hour == 9){
			champ = 9;
		} else if (hour == 6){
			champ = 10;
		} else if (hour == 3){
			champ = 11;
		} else if (hour == 0){
			champ = 12;
		}
		var temp2 = Math.round(data['list'][champ]['main']['temp_min'] - 273);
		var wind2 = Math.round(data['list'][champ]['wind']['speed'] * 3.6);
		var urlIcone2 = "./img/weather/" + data['list'][champ]['weather'][0]['icon'] + ".svg";
		$('.meteo_valTho2 .iconMValTho').attr('src', urlIcone2);
		$('.meteo_valTho2 .tempValTho').html(temp2 + ' °C');
		$('.meteo_valTho2 .windValTho').html(wind2 + ' km/h');
	});
	$.getJSON("http://api.openweathermap.org/data/2.5/forecast?id=3035416&APPID=df7e65f04a5c4fca7919b922b516edbf", function( data ) {
		var temp = Math.round(data['list'][0]['main']['temp_min'] - 273);
		var wind = Math.round(data['list'][0]['wind']['speed'] * 3.6);
		var urlIcone = "./img/weather/" + data['list'][0]['weather'][0]['icon'] + ".svg";
		var day =  data['list'][0]['dt_txt'];
		day = day.split(' ');
		var hour = parseInt(day[1].split(':'));
		if(hour==21){
			champ = 5;
		} else if(hour==18){
			champ = 6;
		} else if (hour == 15){
			champ = 7;
		} else if (hour == 12){
			champ = 8;
		} else if (hour == 9){
			champ = 9;
		} else if (hour == 6){
			champ = 10;
		} else if (hour == 3){
			champ = 11;
		} else if (hour == 0){
			champ = 12;
		}
		$('.meteo_Peyr1 .iconMValTho').attr('src', urlIcone);
		$('.meteo_Peyr1 .tempValTho').html(temp + ' °C');
		$('.meteo_Peyr1 .windValTho').html(wind + ' km/h');
        var temp2 = Math.round(data['list'][champ]['main']['temp_min'] - 273);
		var wind2 = Math.round(data['list'][champ]['wind']['speed'] * 3.6);
		var urlIcone2 = "./img/weather/" + data['list'][champ]['weather'][0]['icon'] + ".svg";
		$('.meteo_Peyr2 .iconMValTho').attr('src', urlIcone2);
		$('.meteo_Peyr2 .tempValTho').html(temp2 + ' °C');
		$('.meteo_Peyr2 .windValTho').html(wind2 + ' km/h');
	});

	
	//var DateDepart = 1524286800;
	var DateDepart = 1524286800;
	var DateNow = Math.round(new Date().getTime()/1000);
	var Ecart = DateDepart - DateNow;
	var jour = Math.floor(Ecart / 60 / 60 / 24);
	var heure = Math.floor(Ecart / 60 / 60 % 24);
	var minute = Math.floor(Ecart / 60 % 60);
	var seconde = Math.floor(Ecart % 60);
	$('.valJ').html(jour);
	$('.valH').html(heure);
	$('.valM').html(minute);
	$('.valS').html(seconde);

	console.log(jour, heure, minute, seconde);
	var timer = setInterval(function(){
		if(seconde>0){
			seconde--;
		} else if(minute>0) {
			seconde=59;
			minute--;
		} else if(heure>0) {
			seconde=59;
			minute=59;
			heure--;
		} else if(jour>0) {
			seconde=59;
			minute=59;
			heure=23;
			jour--;
		}
		$('.valJ').html(jour);
	    $('.valH').html(heure);
	    $('.valM').html(minute);
	    $('.valS').html(seconde);
	 	console.log(jour, heure, minute, seconde); 
	}, 1000);
	
});