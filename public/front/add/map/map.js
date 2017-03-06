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


    lng = jQuery("#lng").val();
    lat = jQuery("#lat").val();
    myPlacemark = new ymaps.Placemark([lng, lat]);
    myMap.geoObjects.add(myPlacemark);

    myMap.events.add("click", function(e)
    {
        var coords = e.get("coordPosition");

        myMap.geoObjects.remove(myPlacemark);

        myPlacemark = new ymaps.Placemark([coords[0].toPrecision(10), coords[1].toPrecision(10)]);
        myMap.geoObjects.add(myPlacemark);

        jQuery("#lng").val(coords[0].toPrecision(10));
        jQuery("#lat").val(coords[1].toPrecision(10));
        console.log("Координаты: " + [coords[0].toPrecision(10),coords[1].toPrecision(10)].join("; "));
    });


    var search = new ymaps.control.SearchControl({noPlacemark:true});
    myMap.controls.add(search);
    search.events.add("resultselect", function (result){
        var coords = search.getResultsArray()[result.get('resultIndex')].geometry.getCoordinates();

        myMap.geoObjects.remove(myPlacemark);

        myPlacemark = new ymaps.Placemark([coords[0].toPrecision(10), coords[1].toPrecision(10)]);
        myMap.geoObjects.add(myPlacemark);

        jQuery("#lng").val(coords[0].toPrecision(10));
        jQuery("#lat").val(coords[1].toPrecision(10));
        console.log("Координаты: " + [coords[0].toPrecision(10),coords[1].toPrecision(10)].join("; "));
    });


    myMap.controls.add("zoomControl");
    myMap.controls.add("mapTools");
    myMap.controls.add("typeSelector");
}
