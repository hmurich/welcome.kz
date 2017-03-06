var myMap;
ymaps.ready(init);

function init()
{
    var lng = jQuery('.js_map_field_main').data('lng');
    var lat = jQuery('.js_map_field_main').data('lat');
    //console.log(city_center);
    myMap = new ymaps.Map("map",{
        center: [lng, lat],
        zoom: 12,
        behaviors: ["default", "scrollZoom"]
    },
    {
        balloonMaxWidth: 300
    });

    myPlacemark = new ymaps.Placemark([lng, lat]);
    myMap.geoObjects.add(myPlacemark);


    myMap.controls.add("zoomControl");
    myMap.controls.add("mapTools");
    myMap.controls.add("typeSelector");
}
