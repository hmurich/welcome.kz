$(document).ready(function() {
    // функии показа высплывающего окна
    if (($(".js_alert_mess_block").length > 0)){
		$('.js_alert_mess_block .alert-exit').click(function(){
			var parent_block = $(this).closest( ".js_alert_mess_block" );
			parent_block.remove();
		});

		setTimeout(function(){
			$( ".js_alert_mess_block" ).remove();
		}, 5000);
	}

    // функция смены языка
    if (($(".js_change_lang_id").length > 0)){
        $(".js_change_lang_id").change(function(){
            $('.js_change_lang_id_form').submit();
        });
    }

    // функция смены города
    if (($(".js_change_city").length > 0)){
        $(".js_change_city").change(function(){
            var reloader = $(this).data('reload');
            $.post("/city/ajax-change", {city_id:$(this).val()}).done(function( data ) {
                if (reloader == '1')
                    location.reload();
                console.log(data);
            });
        });
    }

    // функция поиска по тэгам
    if ($(".js_send_search").length > 0){
        $('.js_send_search').click(function(){
            $('.js_send_search_form').submit();
        });

        $( ".js_send_search_value" ).autocomplete({
    		source: function( request, response ) {
    			$.ajax({
    				type: "POST",
    				url: "/search/ajax-tag?name=" + request.term,
    				dataType: "json",
    				success: function ( data ) {
    					response (data);
    				},
    				error: function () {
                        console.log('error with backend. Try to get tag names');
    				}
    			});
    		},
    		select: function(event, ui) {
    			event.preventDefault();
    			$(this).val(ui.item.label);
    		},
            minLength: 3,
        });
    }

    // js select star
    $('.js_stars li').click(function(){
        var score = parseInt($(this).data('score'));
        $('.js_stars_val').val(score);

        $('.js_stars li').addClass('empty');
        $('.js_stars li:lt('+score+')').removeClass('empty');

        console.log(score);
    });

    // js call reserve modal
    $('.js_call_reserve_modal').click(function(){
        if ($('.m_reserve_modal').hasClass('m_reserve_modal--active'))
            $('.m_reserve_modal').removeClass('m_reserve_modal--active');
        else
            $('.m_reserve_modal').addClass('m_reserve_modal--active');
    });

    // датапикер
    $( "#datepicker" ).datepicker({
        onSelect: function(dateText, inst) {
            var date = $(this).datepicker('getDate'),
                day  = date.getDate(),
                month = date.getMonth() + 1,
                year =  date.getFullYear();

            if ($('.js_datepicker_year').length > 0)
                $('.js_datepicker_year').val(year);

            if ($('.js_datepicker_month').length > 0)
                $('.js_datepicker_month').val(month);

            if ($('.js_datepicker_day').length > 0)
                $('.js_datepicker_day').val(day);

            if ($('.js_datepicker_form').length > 0)
                $('.js_datepicker_form').submit();

        }
    });

    if ($('.js_datepicker_year').length > 0 && $('.js_datepicker_year').val() != '' &&
            $('.js_datepicker_month').length > 0 && $('.js_datepicker_month').val() != '' &&
            $('.js_datepicker_day').length > 0 && $('.js_datepicker_day').val() != ''){

        var year = $('.js_datepicker_year').val(),
            month = $('.js_datepicker_month').val(),
            day = $('.js_datepicker_day').val();

        console.log(year + ' - ' + month + ' - ' + day);

        $('#datepicker').datepicker("setDate", new Date(year, month - 1, day) );
    }
    else {
        var firstDay = $('.calendar').datepicker('option', 'firstDay');
        $('.calendar').datepicker('option', 'firstDay', 1);
    }


});

jQuery("#slider").slider({
	min: 0,
	max: 50000,
	values: [0,20000],
	range: true,
    create: function(event, ui) {
        jQuery(".min-cost").val(jQuery("#slider").slider("values",0));
        jQuery(".max-cost").val(jQuery("#slider").slider("values",1));
    },
    stop: function(event, ui) {
        jQuery(".min-cost").val(jQuery("#slider").slider("values",0) + " тг");
        jQuery(".max-cost").val(jQuery("#slider").slider("values",1) + " тг");
    },
    slide: function(event, ui){
        jQuery(".min-cost").val(jQuery("#slider").slider("values",0) + " тг");
        jQuery(".max-cost").val(jQuery("#slider").slider("values",1) + " тг");
    }
});
$("#slider span:nth-child(2)").append('<div class="c-range"><input class="min-cost" value="0 тг"></div>');
$("#slider span:nth-child(3)").append('<div class="c-range"><input class="max-cost" value="20.000 тг"></div>');
