// Desarrollo Gerardo Penagos
// Mass Digital 2015
var optionsprincipal = {
	$AutoPlay: true,
	$AutoPlaySteps: 4,
	$AutoPlayInterval: 10000,
	$PauseOnHover: 1,
	$ArrowKeyNavigation: false,
	$SlideDuration: 600,
	$MinDragOffsetToSlide: 20,
	$SlideWidth: 1280,
	$SlideHeight: 500,
	$SlideSpacing: 3,
	$DisplayPieces: 1,
	$ParkingPosition: 0,
	$UISearchMode: 1,
	$PlayOrientation: 1,
	$DragOrientation: 1,
	$BulletNavigatorOptions: {
		$Class: $JssorBulletNavigator$,
		$ChanceToShow: 2,
		$AutoCenter: 1,
		$Steps: 1,
		$Lanes: 1,
		$SpacingX: 10,
		$SpacingY: 0,
		$Orientation: 1
	}
};
var optionsproyecto = {
	$AutoPlay: false,
	$AutoPlaySteps: 1,
	$AutoPlayInterval: 2000,
	$PauseOnHover: 1,
	$ArrowKeyNavigation: true,
	$SlideDuration: 300,
	$MinDragOffsetToSlide: 80,
	//$SlideWidth: 600,
	//$SlideHeight: 150,
	$SlideSpacing: 3,
	$DisplayPieces: 1,
	$ParkingPosition: 0,
	$UISearchMode: 0,
	$PlayOrientation: 2,
	$DragOrientation: 1,
	$ThumbnailNavigatorOptions: {
		$Class: $JssorThumbnailNavigator$,
		$ChanceToShow: 2,
		$ActionMode: 1,
		$AutoCenter: 3,
		$Lanes: 1,
		$SpacingX: 0,
		$SpacingY: 0,
		$DisplayPieces: 2,
		$ParkingPosition: 0,
		$Orientation: 1,
		$DisableDrag: true
	}
};
$(function() {
	$('.field-form').on('focus',function(){
	  $(this).removeClass('error');
  	});
	
	var nestedSliders = [];

	$.each(["sliderh1_container", "sliderh2_container"], function (index, containerId) {
		var nestedSliderOptions = {
			$PauseOnHover: 1,
			$SlideDuration: 500,
			$MinDragOffsetToSlide: 20,
			$SlideSpacing: 3,
			$DisplayPieces: 1,
			$ParkingPosition: 0,
			$UISearchMode: 0,
			$BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
				$Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
				$ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
				$AutoCenter: 0,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
				$Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
				$Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
				$SpacingX: 10,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
				$SpacingY: 0,                                   //[Optional] Vertical space between each item in pixel, default value is 0
				$Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
			},
			$ArrowNavigatorOptions: {
				$Class: $JssorArrowNavigator$,
				$ChanceToShow: 2,
				$AutoCenter: 2,
				$Steps: 1
			}
		};

		nestedSliders.push(new $JssorSlider$(containerId, nestedSliderOptions));
	});
	
	/*Inicializacion de sliders*/
	var slider_principal = new $JssorSlider$('slider_superior', optionsprincipal);
	var slider_proyecto = new $JssorSlider$("slider_proyecto", optionsproyecto);
	/*Funciones para redimensionar slider*/
	function ScalePrincipal() {
		var paddingWidth = 0;
		var minReserveWidth = 0;
		var parentElement = slider_principal.$Elmt.parentNode;
		var parentWidth = parentElement.clientWidth;
		if (parentWidth) {
			var availableWidth = parentWidth - paddingWidth;
			var sliderWidth = availableWidth * 1
			sliderWidth = Math.min(sliderWidth, 1900);
			var clearFix = "none";
			if (availableWidth - sliderWidth < minReserveWidth) {
				sliderWidth = availableWidth;
				clearFix = "both";
			}
			$('#clearFixDiv').css('clear', clearFix);
			slider_principal.$SetScaleWidth(sliderWidth);
		}else{
			$Jssor$.$Delay(ScalePrincipal, 30);
		}
	}
	function ScaleProyecto() {
		var paddingWidth = 0;
		var minReserveWidth = 0;
		var parentElement = slider_proyecto.$Elmt.parentNode;
		var parentWidth = parentElement.clientWidth;
		if (parentWidth) {
			var availableWidth = parentWidth - paddingWidth;
			var sliderWidth = availableWidth * 1
			sliderWidth = Math.min(sliderWidth, 846);
			var clearFix = "none";
			if (availableWidth - sliderWidth < minReserveWidth) {
				sliderWidth = availableWidth;
				clearFix = "both";
			}
			$('#clearFixDiv').css('clear', clearFix);
			slider_proyecto.$SetScaleWidth(sliderWidth);
		}else{
			$Jssor$.$Delay(ScaleProyecto, 30);
		}
	}
	$Jssor$.$AddEvent(window, "load", ScalePrincipal);
	$Jssor$.$AddEvent(window, "resize", $Jssor$.$WindowResizeFilter(window, ScalePrincipal));
	$Jssor$.$AddEvent(window, "orientationchange", ScalePrincipal);
	$Jssor$.$AddEvent(window, "load", ScaleProyecto);
	$Jssor$.$AddEvent(window, "resize", $Jssor$.$WindowResizeFilter(window, ScaleProyecto));
	$Jssor$.$AddEvent(window, "orientationchange", ScaleProyecto);
	/*Validación y envio del formulario*/
	$('#enviar').on('click',function(e){
		e.preventDefault();
		var	exprNm = /^[a-zA-ZáéíóúñÑ ]+$/i;
		var exprEml = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		var exprTel = /^[0-9]{7,10}$/;
		var nombre = $('#name').val();
		var apellido = $('#lastname').val();
		var email = $('#email').val();
		var telefono = $('#phone').val()
		var estatus = 'ok';
		var formulario = $(this).data('landing');
		switch (formulario) {
			case 'sanluis':
				llamara = "envio_sanluis";
			break;
		}
		if(nombre == ""){
			estatus = 'error';
			$('#name').addClass('error');
		}else{
			if(!exprNm.test(nombre)){
				estatus = 'error';
				$('#name').val('');
				$('#name').addClass('error');
			}
		}
		if(apellido == ""){
			estatus = 'error';
			$('#lastname').addClass('error');
		}else{
			if(!exprNm.test(apellido)){
				estatus = 'error';
				$('#lastname').val('');
				$('#lastname').addClass('error');
			}
		}
		if(email == ""){
			estatus = 'error';
			$('#email').addClass('error');
		}else{
			if(!exprEml.test(email)){
				estatus = 'error';
				$('#email').val('');
				$('#email').addClass('error');
			}
		}
		if(telefono == ""){
			estatus = 'error';
			$('#phone').addClass('error');
		}else if(telefono != ''){
			if(!exprTel.test(telefono)){
				estatus = 'error';
				$('#phone').val('');
				$('#phone').addClass('error');
			}	
		}
		if(estatus == 'error'){
			return;
		}
		$("#formcontacto").ajaxForm({
			url : '../mass/request.php',
			type : 'post',
			data : {
				a : 'envio_formulario',
				b : llamara
			},
			dataType : 'json',
			success : function(data) {
				if (data.status == 'ok') {
					$('#formcontacto').each(function() {
						this.reset();
					});
					document.location = 'thankyou.html';
				}
			}
		}).submit();
	});
});