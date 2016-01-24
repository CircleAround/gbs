$(function() {
	
	var
	oid = 1,
	index = 0,
	$answerIcon = $('.answerIcon');

	$('.check_L , .check_R').each(function(index) {
		$(this).on('click', function() {
			var
			flgCheck = $(this).prop('checked'),
			className = $(this).attr('class').split('_')[1];
			
			if(className == 'L'){
				var iconNum = 0;
			}else{
				var iconNum = 1;
			}
				
			if(flgCheck){
				$(this).parent('label').parent('li').addClass('onBackC_' + iconNum);
				$(this).parent('label').next('i').addClass('onIcon');
				flgCheck = false;
			}else{
				$(this).parent('label').parent('li').removeClass('onBackC_' + iconNum);
				$(this).parent('label').next('i').removeClass('onIcon');
				flgCheck = true;
			}
		});
	});

	
	
	$answerIcon.each(function() {
		var
		animeNum = 1,
		mouseNum = 0,
		mouseCountMax = 2;
		
		$(this).hover(
			function() {
				$(this).find('i').addClass('answerOver');
			},
			function() {
				$(this).find('i').removeClass('answerOver');
				console.log('bbb');
			}
		);
		
		$(this).mouseup(function(){
				$(this).removeClass('mousedown');
				$(this).addClass('mouseup');
			})
			.mousedown(function(){
	
				var
				mouseCount = mouseNum + 1,
				scaleNum = (animeNum - 0.3).toFixed(1);
				
				$(this).removeClass('mouseup');
				$(this).addClass('mousedown');
				
				$(this).parents('.iconCheck').prevAll('.boxInner').find('.smallArea').css({
					'opacity':scaleNum,
					'color':'#CCC',
					'transform':'scale('+ scaleNum +')'
				});
	
				if(mouseCount == mouseCountMax){
					$(this).css({'pointer-events':'none'});
					$(this).addClass('answerIconOff');
					return;
				}
				
				animeNum = scaleNum;
				mouseNum = mouseCount;
		});
    });
	
});








