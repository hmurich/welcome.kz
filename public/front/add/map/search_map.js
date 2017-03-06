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

    myMap.controls.add("zoomControl");
    myMap.controls.add("mapTools");
    myMap.controls.add("typeSelector");

    myCollection = new ymaps.GeoObjectCollection();
    myMap.geoObjects.add(myCollection);

    addGeoObjets();
    function addGeoObjets(){
        myMap.geoObjects.remove(myCollection);

        myCollection = new ymaps.GeoObjectCollection();

        jQuery( ".js_object_li" ).each(function( i ) {
            var lng = jQuery(this).data('lng'),
                lat = jQuery(this).data('lat'),
                name = jQuery(this).data('name'),
                id = jQuery(this).data('id');

            console.log(lng, lat, name, id);
            placemark = new ymaps.Placemark([lng, lat], {
               balloonContent: '<a href="/show/index/' + id + '">' + name + '</a>'
            });

            myCollection.add(placemark);
        });

        myMap.geoObjects.add(myCollection);
    }

}
