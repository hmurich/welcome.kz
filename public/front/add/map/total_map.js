var myMap;
ymaps.ready(init);

function init()
{
    var city_center = jQuery('.js_map_field_main').data('city_center');
    city_center = city_center.split(',');
    //console.log(city_center);
    myMap = new ymaps.Map("map",{
        center: [city_center[0], city_center[1]],
        zoom: 12,
        behaviors: ["default", "scrollZoom"]
    },
    {
        balloonMaxWidth: 300
    });

    jQuery(".js_map_field").change(changeField);


    myMap.controls.add("zoomControl");
    myMap.controls.add("mapTools");
    myMap.controls.add("typeSelector");


    function changeField(){
        var val = $(this).val();
        var type = $(this).data('type');
        var id = $(this).data('id');

        pushAll();
    }

    pushAll();

    function pushAll(){
        var arr = getAllVal();
        getLocation(arr);
    }

    function getAllVal(){
        var arr = {};
        jQuery.each( jQuery('.js_map_field'), function( key, value ) {
            var val = $(this).val();
            var type = $(this).data('type');
            var id = $(this).data('id');

            arr[id] = val;
        });
        arr['cat_id'] = jQuery('.js_map_field_main').data('cat_id');

        return arr;
    }

    function getLocation(arr){
        console.log('sended data');
        console.log(arr);
        jQuery.post("/map/geo-objects", arr ).done(function( data ) {
    		data = JSON.parse(data);
            console.log('recive data data');
            console.log(data);
            addGeoObjets(data.geo);
            addToList(data.items, 1);
            addToList(data.vip, 2);
            addToList(data.specail, 3);
        });
    }

    myCollection = new ymaps.GeoObjectCollection();
    myMap.geoObjects.add(myCollection);

    function addGeoObjets(objects){
        myMap.geoObjects.remove(myCollection);

        myCollection = new ymaps.GeoObjectCollection();

        jQuery.each(objects, function( key, value ) {
            placemark = new ymaps.Placemark([value.lng, value.lat], {
               balloonContent: '<a href="/show/index/' + value.id + '">' + value.name + '</a>'
            });

            myCollection.add(placemark);
            //myCollection.add(new ymaps.Placemark([value.lng, value.lat]));
        });

        myMap.geoObjects.add(myCollection);
    }

    function addToList(list_item, type = 1){
        if (type == 1)
            jQuery('.js_object_list').empty();
        jQuery.each(list_item, function( key, value ) {
            console.log('type ' + type);

            var element = '';
            if (type == 2)
                element = '<li  class="js_object_list_li js_object_list_li_vip">';
            else if (type == 3)
                element = '<li class="js_object_list_li js_object_list_li_specail">';
            else
                element = '<li class="js_object_list_li ">';

            element = element   + '<a class="mini-zaved" href="/show/index/'+value.id+'">'
                                    + '<img class="mini-zaved__img" src="'+value.logo+'" style="max-width: 80px; margin-right: 5px;">'
                                    + '<div class="info-zaved">'
                                        + '<span class="info-zaved__heading">'+value.name+'</span>'
                                        + '<ul class="info-ul">';
            jQuery.each(value.options, function( key, value ) {
                element = element + '<li>'
                        + '<span>' + key + ':</span>' + value
                   + '</li>';
            });


            element = element           + '</ul>'
                                        + '<p class="info-zaved__regym">'
                                            + '<span>Режим работы:</span> ' + value.time_begin + ' - ' + value.time_end + ''
                                        + '</p>'
                                    + '</div>'
                                + '</a>'
                            + '</li>';
            if (type == 2 && jQuery( ".js_object_list .js_object_list_li:eq(1)" ).length > 0)
                jQuery( ".js_object_list .js_object_list_li:eq(1)" ).after(element);
            else if (type == 3 && jQuery( ".js_object_list .js_object_list_li:eq(3)" ).length > 0)
                jQuery( ".js_object_list .js_object_list_li:eq(3)" ).after(element);
            else
                jQuery('.js_object_list').append(element);
        });

    }
}
