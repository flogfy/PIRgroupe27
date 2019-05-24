
$(document).ready(function() {
	var inscription = 375,
	foodpack = 45,
	assuranceR = 12,
	assuranceRA = 25,
	skiB = 33,
	skiA = 45,
	skiO = 62,
	skiCB = 45,
	skiCA = 58,
	skiCO = 79,
	CskB = 19,
	CskA = 25,
	CskO = 33,
	snowA = 48,
	snowO = 65,
	snowCA = 65,
	snowCO = 79,
	CsnA = 25,
	CsnO = 41;

	$('.label-couleurmatos,#couleurmatos_select, #typematos_select, .label-typematos').hide();
	$('#matos_select').change(function(){
		if($(this).val() == 'matosY'){
			$('.label-couleurmatos,#couleurmatos_select, #typematos_select, .label-typematos').show();
		} else {
			$('.label-couleurmatos,#couleurmatos_select, #typematos_select, .label-typematos').hide();
		}
	});
	$('#typematos_select').change(function(){
		console.log($(this).val());
		if($(this).val() == 'ski' || $(this).val() == 'skiC' || $(this).val() == 'Csk'){
			$('#couleurmatos_select option:first-child').show();
		} else {
			$('#couleurmatos_select option:first-child').hide();
			$('#couleurmatos_select').val('argent');
		}
	});

	$('.button').click(function(){
		var total = inscription;
		$('.matosresultat').html('');
		$('.foodresultat').html('');
		$('.assuranceresultat').html('');
		$('.totalinscription').html('- Frais d\'inscription : ' + inscription + ' €');
		if($('#foodpack_select').val() == 'foodpackY'){
			total += foodpack;
			$('.foodresultat').html(' - Foodpack : ' + foodpack + ' €');
		}

		if($('#assurance_select').val() == 'assuranceR'){
			total += assuranceR;
			$('.assuranceresultat').html(' - Assurance rapatriement : ' + assuranceR + ' €');
		} else if($('#assurance_select').val() == 'assuranceRA'){
			total += assuranceRA;
			$('.assuranceresultat').html(' - Assurance rapatriement et annulation : ' + assuranceRA + ' €');
		} 
		if($('#matos_select').val() == 'matosY'){
			if($('#typematos_select').val() == 'ski' && $('#couleurmatos_select').val() == 'bronze'){
				total += skiB;
				$('.matosresultat').html(' - Ski bronze : ' + skiB + ' €');
			} else if($('#typematos_select').val() == 'ski' && $('#couleurmatos_select').val() == 'argent'){
				total += skiA;
				$('.matosresultat').html(' - Ski argent : ' + skiA + ' €');
			} else if($('#typematos_select').val() == 'ski' && $('#couleurmatos_select').val() == 'or'){
				total += skiO;
				$('.matosresultat').html(' - Ski or : ' + skiO + ' €');
			} else if($('#typematos_select').val() == 'skiC' && $('#couleurmatos_select').val() == 'bronze'){
				total += skiCB;
				$('.matosresultat').html(' - Ski & chaussures bronze : ' + skiCB + ' €');
			} else if($('#typematos_select').val() == 'skiC' && $('#couleurmatos_select').val() == 'argent'){
				total += skiCA;
				$('.matosresultat').html(' - Ski & chaussures argent : ' + skiCA + ' €');
			} else if($('#typematos_select').val() == 'skiC' && $('#couleurmatos_select').val() == 'or'){
				total += skiCO;
				$('.matosresultat').html(' - Ski & chaussures or : ' + skiCO + ' €');
			} else if($('#typematos_select').val() == 'Csk' && $('#couleurmatos_select').val() == 'bronze'){
				total += CskB;
				$('.matosresultat').html(' - Chaussures de ski bronze : ' + CskB + ' €');
			} else if($('#typematos_select').val() == 'Csk' && $('#couleurmatos_select').val() == 'argent'){
				total += CskA;
				$('.matosresultat').html(' - Chaussures de ski argent : ' + CskA + ' €');
			} else if($('#typematos_select').val() == 'Csk' && $('#couleurmatos_select').val() == 'or'){
				total += CskO;
				$('.matosresultat').html(' - Chaussures de ski or : ' + CskO + ' €');
			} else if($('#typematos_select').val() == 'snow' && $('#couleurmatos_select').val() == 'argent'){
				total += snowA;
				$('.matosresultat').html(' - Snow argent : ' + snowA + ' €');
			} else if($('#typematos_select').val() == 'snow' && $('#couleurmatos_select').val() == 'or'){
				total += snowO;
				$('.matosresultat').html(' - Snow or : ' + snowO + ' €');
			} else if($('#typematos_select').val() == 'snowC' && $('#couleurmatos_select').val() == 'argent'){
				total += snowCA;
				$('.matosresultat').html(' - Snow & chaussures argent : ' + snowCA + ' €');
			} else if($('#typematos_select').val() == 'snowC' && $('#couleurmatos_select').val() == 'or'){
				total += snowCO;
				$('.matosresultat').html(' - Snow & chaussures or : ' + snowCO + ' €');
			} else if($('#typematos_select').val() == 'Csn' && $('#couleurmatos_select').val() == 'argent'){
				total += CsnA;
				$('.matosresultat').html(' - Chaussures de snow argent : ' + CsnA + ' €');
			} else if($('#typematos_select').val() == 'Csn' && $('#couleurmatos_select').val() == 'or'){
				total += CsnO;
				$('.matosresultat').html(' - Chaussures de snow or : ' + CsnO + ' €');
			}
			
		}
		$('.totalresultat').html('Ton séjour te coûtera : ' + total + ' € !')
		console.log(total);
	});
});