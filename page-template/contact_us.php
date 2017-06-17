<?php
/**
 * Template Name: Contact Us Page
 */
get_header();
?>
<style type="text/css">

    .acf-map {
        width: 100%;
        height: 400px;
        border: #ccc solid 1px;
        /*margin: 20px 0;*/
    }

    /* fixes potential theme css conflict */
    .acf-map img {
        max-width: inherit !important;
    }

</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPTLYJilQY058Zom5QyeZJQzhEAIbDGwg"></script>
<script type="text/javascript">
    (function ($) {

        /*
         *  new_map
         *
         *  This function will render a Google Map onto the selected jQuery element
         *
         *  @type	function
         *  @date	8/11/2013
         *  @since	4.3.0
         *
         *  @param	$el (jQuery element)
         *  @return	n/a
         */

        function new_map($el) {

            // var
            var $markers = $el.find('.marker');


            // vars
            var args = {
                zoom: 14,
                center: new google.maps.LatLng(0, 0),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };


            // create map
            var map = new google.maps.Map($el[0], args);


            // add a markers reference
            map.markers = [];


            // add markers
            $markers.each(function () {

                add_marker($(this), map);

            });


            // center map
            center_map(map);


            // return
            return map;

        }

        /*
         *  add_marker
         *
         *  This function will add a marker to the selected Google Map
         *
         *  @type	function
         *  @date	8/11/2013
         *  @since	4.3.0
         *
         *  @param	$marker (jQuery element)
         *  @param	map (Google Map object)
         *  @return	n/a
         */

        function add_marker($marker, map) {

            // var
            var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));

            // create marker
            var marker = new google.maps.Marker({
                position: latlng,
                map: map
            });

            // add to array
            map.markers.push(marker);

            // if marker contains HTML, add it to an infoWindow
            if ($marker.html()) {
                // create info window
                var infowindow = new google.maps.InfoWindow({
                    content: $marker.html()
                });

                infowindow.open(map, marker);

//                // show info window when marker is clicked
//                google.maps.event.addListener(marker, 'click', function() {
//
//                    infowindow.open( map, marker );
//
//                });
            }

        }

        /*
         *  center_map
         *
         *  This function will center the map, showing all markers attached to this map
         *
         *  @type	function
         *  @date	8/11/2013
         *  @since	4.3.0
         *
         *  @param	map (Google Map object)
         *  @return	n/a
         */

        function center_map(map) {

            // vars
            var bounds = new google.maps.LatLngBounds();

            // loop through all markers and create bounds
            $.each(map.markers, function (i, marker) {

                var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());

                bounds.extend(latlng);

            });

            // only 1 marker?
            if (map.markers.length == 1) {
                // set center of map
                map.setCenter(bounds.getCenter());
                map.setZoom(14);
            }
            else {
                // fit to bounds
                map.fitBounds(bounds);
            }

        }

        /*
         *  document ready
         *
         *  This function will render each map when the document is ready (page has loaded)
         *
         *  @type	function
         *  @date	8/11/2013
         *  @since	5.0.0
         *
         *  @param	n/a
         *  @return	n/a
         */
// global var
        var map = null;

        $(document).ready(function () {

            $('.acf-map').each(function () {

                // create map
                map = new_map($(this));

            });

        });

    })(jQuery);
</script>

<?php $location = get_field('map', 7064); ?>


<div class="container">
       <ol class="breadcrumb mr-top20">
        <li><?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?></li>  
    </ol>
    <div class="botgrapper_wrp mr-top30">  
    
    <div class="row">
     
      <h3><?php the_title();?></h3>
      <div class="progress">
        <div style="width: 20%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info"><span class="sr-only">20% Complete</span></div>
      </div>
      
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                        <h3><i class="fa fa-map-marker red-color" aria-hidden="true"></i> : <?php echo $location['address']; ?> </h3>
                        <h4></h4>
                    </div>
                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">
                        <h3><i class="fa fa-phone red-color" aria-hidden="true"></i> : <?php echo get_field('contact_number', 7064) ?></h3>
                    </div>
                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">
                        <h3><i class="fa fa-envelope-o red-color" aria-hidden="true"></i> : <?php echo get_field('email_address', 7064) ?></h3>
                    </div>
                </div>
                
                 <hr>
                <h3 class="red-color">Inquiry Form</h3>
                
                 <?php echo do_shortcode('[contact-form-7 id="150" title="Inquiry Form"]'); ?>
                 
                <hr class="mr-top30">
                <h3 class="red-color">Location Map</h3>
 <div>
                 <?php if (!empty($location)): ?>
                <div class="acf-map">
                    <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
                        <h3 class="mt-0"><?php echo get_bloginfo('name'); ?></h3>

                        <p style="font-size: 16px" class=""><i class="fa fa-map-marker orange-color mr-10"></i>
                            <?php echo $location['address']; ?>
                        </p>

                        <p style="font-size: 16px" class=""><i class="fa fa-phone orange-color mr-10"></i> <?php echo get_field('contact_number', 7064) ?></p>
                    </div>
                </div>
            <?php endif; ?>
      </div>
       
     
      </div>
<!--</div>-->
</div>
</div>

<?php get_footer(); ?>
