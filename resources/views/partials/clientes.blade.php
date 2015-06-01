<!-- Busca las imagenes que estan en la carpeta de clientes y los muestra -->

<hr>
<script>
        jQuery(document).ready(function ($) {
            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlaySteps: 4,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,                          //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 160,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                $SlideWidth: 200,                                   //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 150,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 3,                                   //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 4,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                              //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 0,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 0,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 0,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                },

                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 2,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 4                                       //[Optional] Steps to go for each navigation request, default value is 1
                }
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var bodyWidth = document.body.clientWidth;
                if (bodyWidth)
                    jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 809));
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
        


    </script>

<div class="container">
    <h2>Nuestros Clientes</h2>
    
    <hr>
    
    
    	<div id="slider1_container">
        <!-- Loading Screen -->
            <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                    background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;">
                </div>
                <div style="position: absolute; display: block; background: url({{ asset('img/loading.gif') }}) no-repeat center center;
                    top: 0px; left: 0px;width: 100%;height:100%;">
                </div>
            </div>
                <div u="slides" class="banner_clientes">
                    <div><img u="image" class="clientes" src="{{ asset('img/clientes/aseguradora-solidaria_140_62.jpg' ) }}" /></div>
                    <div><img u="image" class="clientes" src="{{ asset('img/clientes/cafam_140_62.png' ) }}" /></div>
                    <div><img u="image" class="clientes" src="{{ asset('img/clientes/capita_salud_140_62.png' ) }}" /></div>
                    <div><img u="image" class="clientes" src="{{ asset('img/clientes/colmena_140_62.png' ) }}" /></div>
                    <div><img u="image" class="clientes" src="{{ asset('img/clientes/colpatria_140_62.png' ) }}" /></div>
                    <div><img u="image" class="clientes" src="{{ asset('img/clientes/colsubsudio_140_62.png' ) }}" /></div>
                    <div><img u="image" class="clientes" src="{{ asset('img/clientes/comfacundi_140_62.png' ) }}" /></div>
                    <div><img u="image" class="clientes" src="{{ asset('img/clientes/comparta_140_62.png' ) }}" /></div>
                    <div><img u="image" class="clientes" src="{{ asset('img/clientes/compensar_140_62.png' ) }}" /></div>
                    <div><img u="image" class="clientes" src="{{ asset('img/clientes/equidad-seguros_140_62.png' ) }}" /></div>
                    <div><img u="image" class="clientes" src="{{ asset('img/clientes/famisanar_140_62.png' ) }}" /></div>
                    <div><img u="image" class="clientes" src="{{ asset('img/clientes/generali_140_62.png' ) }}" /></div>
                    <div><img u="image" class="clientes" src="{{ asset('img/clientes/liberty_140_62.png' ) }}" /></div>
                    <div><img u="image" class="clientes" src="{{ asset('img/clientes/mallamas_140_62.png' ) }}" /></div>
                    <div><img u="image" class="clientes" src="{{ asset('img/clientes/mapfre_140_62.png' ) }}" /></div>
                    <div><img u="image" class="clientes" src="{{ asset('img/clientes/positiva_140_62.png' ) }}" /></div>
                    <div><img u="image" class="clientes" src="{{ asset('img/clientes/seguros-del-bolivar_140_62.png' ) }}" /></div>
                    <div><img u="image" class="clientes" src="{{ asset('img/clientes/seguros-del-estado_140_62.png' ) }}" /></div>
                    <div><img u="image" class="clientes" src="{{ asset('img/clientes/sura_140_62.png' ) }}" /></div>

                </div>
            <div u="navigator" class="jssorb03" style="bottom: 4px; right: 6px;">
            <!-- bullet navigator item prototype -->
            <div u="prototype"><div u="numbertemplate"></div></div>
            
        <!-- Arrow Left -->
        <span u="arrowleft" class="jssora03l" style="top: 123px; left: 8px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora03r" style="top: 123px; right: 8px;">
        </span>
        </div>
        </div>
   
</div>
<script>
    $().ready(function(){
    //Modifica los estilos para cambiar la posicion del banner
        $("div[style='position: absolute; top: 0px; left: 0px; width: 809px; height: 150px; transform-origin: 0px 0px 0px; transform: scale(1);']")
        .css('position', '').css('top', '').css('left', '');

        $("span:contains('1')").hide();
    }); 
            
</script>
 