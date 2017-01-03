$.fn.permis = function() {

	//set this
	var _this = $(this);
	
	//find backend,frontend
	_this.sys = _this.attr('id').replace('permission-','');

	//find backend,frontend
	_this.checked_all = true;

	_this.checked_modul = function(e){
		if(e.hasClass("hide-method")){
			e.find('i').removeClass('fa-plus-square').addClass('fa-minus-square');
			e.removeClass('hide-method').addClass('show-method');
			e.parent().find('ul').slideDown(300);
		}else{
			e.find('i').removeClass('fa-minus-square').addClass('fa-plus-square');
			e.removeClass('show-method').addClass('hide-method');
			e.parent().find('ul').slideUp(300);
		}
	}

	//open method in modul
	_this.find('a.switch').click(function() { _this.checked_modul($(this)) });

	//open all accordion
	$('#show-'+_this.sys).click(function() { _this.find('a.switch').click(); });

	//checked all in modul
	_this.find('input[check-all]').click(function() {
		var modul = $(this).attr('check-all');
		var prop = $(this).prop('checked') ? true : false;
		$('ul[list-modul="'+modul+'"]').find('input[type=checkbox]').prop('checked', prop)
	});

	//checked all modul
	$('#checkbox-'+_this.sys).click(function() {
		var prop = $(this).prop('checked') ? true : false;
		_this.find('input[type=checkbox]').prop('checked', prop)
	});

	//checked if checke all modul
	$.each(_this.find('li[modul]'), function(index, val) {
		var _modul=$(this);
		var modulChecked=false;
		$.each(_modul.find('ul[list-modul] li'), function(index, val) {
			if($(this).find('input[type=checkbox]').prop('checked')){ modulChecked=true; }
		});
		_modul.find('[check-all]').prop('checked', modulChecked);
		if(!modulChecked){ _this.checked_all=false; }
	});
	$('#checkbox-'+_this.sys).prop('checked', _this.checked_all);
	
};