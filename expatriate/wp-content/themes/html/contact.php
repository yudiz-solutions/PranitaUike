<?php
// Template Name:Contact US

get_header();

$contact = get_field('contact');

$contact_info = get_field('contact_info');
$contact_field = $contact_info['contact_field'];

?>
<!--******************* Banner Section Start *********************-->
<?php if (isset($contact)) { ?>
  <div class="home-banner">
    <div class="banner"
      style="background: #5C5C5C url('<?php echo $contact['image']['url'] ?>') no-repeat center center / cover;">
      <div class="container">
        <h1>
          <?php echo $contact['heading'] ?>
        </h1>
      </div>
    </div>
  </div>
<?php } ?>
<!--******************* Banner Section End *********************-->
<!--******************* Header Section End *********************-->
<!--******************* Middle Section Start ******************-->
<main>
  <section class="common-section contact-section">
    <div class="container-fluid">
      <div class="contact-right col-sm-6 col-sm-offset-6"></div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="contact-form">
            <?php if (isset($contact['contact_form_name'])) { ?>
              <h3 class="blue-text">
                <?php echo $contact['contact_form_name'] ?>
              </h3>
            <?php } ?>
            <form action="#" method="post">
              <?php echo do_shortcode('[contact-form-7 id="226" title="Contact form 1"]') ?>
            </form>
          </div>
        </div>
        <?php if (isset($contact_info)) { ?>
          <div class="col-sm-6 fill-mob">
            <div class="contact-info">
              <h3 class="blue-text">
                <?php echo $contact_info['contact_heading'] ?>
              </h3>
              <h4>
                <?php echo $contact_info['content_heading'] ?>
              </h4>
              <p>
                <?php echo $contact_info['content'] ?>
              </p>
              <?php if (isset($contact_field)) { ?>
                <p>
                  <?php foreach ($contact_field as $repeater) { ?>
                    <?php echo $repeater['field_value']; ?> <a href="<?php echo $repeater['field_value_link']['url'] ?>"><?php echo $repeater['field_value_link']['title']; ?></a><br>
                  <?php } ?>
                </p>
              <?php } ?>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <section id="map"></section>
  <section class="assessment-section">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <h2>Get your free assessment done right now !</h2>
        </div>
        <div class="col-sm-6 text-right">
          <a href="assessment.html" class="theme-btn white-btn">apply now</a>
        </div>
      </div>
    </div>
  </section>
</main>
<!--******************* Middle Section End ******************-->
<!--******************* Footer Section Start ******************-->
<?php get_footer(); ?>
<!--******************* Footer Section End ******************-->
<script type="text/javascript">
  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 1) {
      jQuery('header').addClass("sticky-header");
    }
    else {
      jQuery('header').removeClass("sticky-header");
    }
  });
</script>
<!-- Custom Map -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script> -->
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtc0b_oAykroc2auPTfMoHDcbaESZzNqk&callback=initMap"
  type="text/javascript"></script>
<script type="text/javascript">
  function initMap() {
    var mapDiv = document.getElementById('map');
    var latlng = new google.maps.LatLng(43.648636, -79.381744); //     (Latitude and Longitude of your location)
    var map = new google.maps.Map(mapDiv, {
      center: latlng,
      zoom: 15,
      mapTypeId: google.maps.MapTypeId.MAP
    });
    var marker = new google.maps.Marker({
      position: latlng,
      title: "My Location",    // Title for your location(optional)
      icon: 'images/map-marker.svg' // Map marker image(optional)
    });
    marker.setMap(map);
    map.set('styles', [
      {
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#f5f5f5"
          }
        ]
      },
      {
        "elementType": "labels.icon",
        "stylers": [
          {
            "visibility": "off"
          }
        ]
      },
      {
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#616161"
          }
        ]
      },
      {
        "elementType": "labels.text.stroke",
        "stylers": [
          {
            "color": "#f5f5f5"
          }
        ]
      },
      {
        "featureType": "administrative.land_parcel",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#bdbdbd"
          }
        ]
      },
      {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#eeeeee"
          }
        ]
      },
      {
        "featureType": "poi",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#757575"
          }
        ]
      },
      {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#e5e5e5"
          }
        ]
      },
      {
        "featureType": "poi.park",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#9e9e9e"
          }
        ]
      },
      {
        "featureType": "road",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#ffffff"
          }
        ]
      },
      {
        "featureType": "road.arterial",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#757575"
          }
        ]
      },
      {
        "featureType": "road.highway",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#dadada"
          }
        ]
      },
      {
        "featureType": "road.highway",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#616161"
          }
        ]
      },
      {
        "featureType": "road.local",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#9e9e9e"
          }
        ]
      },
      {
        "featureType": "transit.line",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#e5e5e5"
          }
        ]
      },
      {
        "featureType": "transit.station",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#eeeeee"
          }
        ]
      },
      {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
          {
            "color": "#c9c9c9"
          }
        ]
      },
      {
        "featureType": "water",
        "elementType": "labels.text.fill",
        "stylers": [
          {
            "color": "#9e9e9e"
          }
        ]
      }
    ]);
  }
</script>
<!-- Sticky Js Included -->
<script type="text/javascript" src="js/sticky-kit.js"></script>
<script type="text/javascript">
  jQuery(".assessment-section").stick_in_parent();
</script>
<!-- Sticky Js Included -->
<!--*********************** All End ************************-->
</body>

</html>