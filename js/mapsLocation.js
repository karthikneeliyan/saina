var map;
var marker;
var geolocation_lat;
var geolocation_lng;
function initMap() {
  
  var geocoder = new google.maps.Geocoder;
  var infowindow = new google.maps.InfoWindow;
  getLocation();

  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else {
      console.log("Geolocation is not supported by this browser.");
    }
  }

  function showPosition(position) {
    geolocation_lat = position.coords.latitude;
    geolocation_lng = position.coords.longitude;
    var center_loc = {
      lat: geolocation_lat,
      lng: geolocation_lng
    };
    map = new google.maps.Map(document.getElementById('google-maps'), {
      center: center_loc,
      zoom: 15
    });
    marker.setMap(map);
    marker.setPosition(center_loc);

    
    geocoder.geocode({
      'location': center_loc
    }, function (results, status) {
      if (status === 'OK') {

        if (results[0]) {
          console.log(results[0].formatted_address);
          let address = results[0].formatted_address;
          $('#round_trip_autocomplete').val(address);
        }
      }
    });
  }
  map = new google.maps.Map(document.getElementById('google-maps'), {
    center: {
      lat: 13,
      lng: 77
    },
    zoom: 15
  });
  setInitialCoordinates();
  marker = new google.maps.Marker({
    position: map_constants.get_co_ordinates(),
    map: map,
    draggable: true,
    title: "select your location"
  });
  map.addListener('dragend', function () {
    console.log("dragged");

  });
  marker.addListener('dragend', function (event) {
    function serviceAvailable(latlong)
    {
      if(latlong.lat>14.6||latlong.lat<8.07||latlong.lng<76||latlong.lng>80.4)
      {

        return false;
      }
     
        return true;
      

    }
    var position = marker.getPosition();
    console.log(position);
    let latt = position.lat();
    let longg = position.lng();
    let latlng = {
      lat: latt,
      lng: longg
    };
    console.log(latlng);
    geocoder.geocode({
      'location': latlng
    }, function (results, status) {
      if (status === 'OK'&& serviceAvailable(latlng)) {

        if (results[0]) {
          console.log(results[0].formatted_address);
          let address = results[0].formatted_address;
          $('#'+currentAddressTab).val(address);
         
        }
      }
      else{
        $('#'+currentAddressTab).val("Service Not Available");
      }
    });

  });
  // initAutocomplete(autocompleteId);
}

function setInitialCoordinates() {
  map_constants.set_co_ordinates(13.082680, 80.270718);
}


function geocodeAddress(geocoder, resultsMap, address) {
  geocoder.geocode({
    'address': address
  }, function (results, status) {
    if (status === 'OK') {
      console.log(results[0].geometry.location);
      resultsMap.setCenter(results[0].geometry.location);
      marker.setMap(resultsMap);
      marker.setPosition(results[0].geometry.location);


    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}

var placeSearch, autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initAutocomplete(autocompleteId) {
  // Create the autocomplete object, restricting the search to geographical
  // location types.

  autocomplete = new google.maps.places.Autocomplete(
    /** @type {!HTMLInputElement} */
    (document.getElementById(autocompleteId)), {
      types: ['geocode']
    });

  // When the user selects an address from the dropdown, populate the address
  // fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();
  let adddresss = "";

  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  if (undefined !== place.address_components.length && 0 < place.address_components.length) {
    let rows = place.address_components;

    if (rows.length > 0) {
      rows.forEach(function (addres) {
        if (undefined !== addres["long_name"])
          adddresss += addres["long_name"] + ",";
      });
    }
    $('#update_localty').val(adddresss);
  }
  var geocoder = new google.maps.Geocoder;
  var infowindow = new google.maps.InfoWindow;
  geocodeAddress(geocoder, map, adddresss);

}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate(id) {
  autocompleteId = id;
  initAutocomplete(autocompleteId);
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      // 
      autocomplete.setBounds(circle.getBounds());
    });
  }
}

function geocodeLatLng(geocoder, map, infowindow) {
  var input = document.getElementById('latlng').value;
  var latlngStr = input.split(',', 2);
  var latlng = {
    lat: parseFloat(latlngStr[0]),
    lng: parseFloat(latlngStr[1])
  };
  geocoder.geocode({
    'location': latlng
  }, function (results, status) {
    if (status === 'OK') {
      if (results[0]) {
        map.setZoom(11);
        var marker = new google.maps.Marker({
          position: latlng,
          map: map
        });
        infowindow.setContent(results[0].formatted_address);
        infowindow.open(map, marker);
      } else {
        window.alert('No results found');
      }
    } else {
      window.alert('Geocoder failed due to: ' + status);
    }
  });
}

$('.tripType').click(function () {
  $('#booking_form')[0].reset();
  let totalTrips = ["roundTripBtn", "oneWayBtn", "outstationBtn"];
  var req_type_mapping={
    roundTripBtn:"Round Trip",
    oneWayBtn:"One Way",
    outstationBtn:"Outstation"
  }
  let selectedTripType = this.id;
  currentAddressTab="pickup_oneWay";
  requestType=req_type_mapping[selectedTripType];
  console.log(selectedTripType);
  totalTrips.forEach(id => $('#' + id).removeClass('active'));
  $('#' + selectedTripType).addClass('active');
  if (selectedTripType === "roundTripBtn") {

    $('#oneWay_OutStation').hide();
    $('#roundtrip').show();
  } else {

    $('#roundtrip').hide();
    $('#oneWay_OutStation').show();
  }

})