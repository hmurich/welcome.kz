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

    myMap.controls.add("searchControl");
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
            addToList(data.items);
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

    function addToList(list_item){
        jQuery('.js_object_list').empty();
        jQuery.each(list_item, function( key, value ) {
            var element = '<li>'
                                + '<a class="mini-zaved" href="/show/index/'+value.id+'">'
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
                                            + '<span>Режим работы:</span> 12:00 - 00.00'
                                        + '</p>'
                                    + '</div>'
                                + '</a>'
                            + '</li>';
            jQuery('.js_object_list').append(element);
        });

    }
}
