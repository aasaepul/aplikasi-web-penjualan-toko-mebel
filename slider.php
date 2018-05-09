<style type="text/css"> 
        .captionOrange, .captionBlack
        {
            color: #fff;
            font-size: 20px;
            line-height: 30px;
            text-align: center;
            border-radius: 4px;
        }
        .captionOrange
        {
            background: #EB5100;
            background-color: rgba(235, 81, 0, 0.6);
        }
        .captionBlack
        {
        	font-size:16px;
            background: #000;
            background-color: rgba(0, 0, 0, 0.4);
        }
        a.captionOrange, A.captionOrange:active, A.captionOrange:visited
        {
        	color: #ffffff;
        	text-decoration: none;
        }
        a.captionOrange:hover
        {
            color: #eb5100;
            text-decoration: underline;
            background-color: #eeeeee;
            background-color: rgba(238, 238, 238, 0.7);
        }
        .bricon
        {
            background: url(../img/browser-icons.png);
        }

        .content-slider {
            float: left;
            width: auto;
            height: auto;
        }
    </style>
    <!-- use jssor.slider.min.js instead for release -->
    <!-- jssor.slider.min.js = (jssor.js + jssor.slider.js) -->
    <script>
        jssor_slider1_starter = function (containerId) {
            //Reference http://www.jssor.com/development/tip-make-responsive-slider.html

            var _CaptionTransitions = [];
            _CaptionTransitions["CLIP|L"] = { $Duration: 600, $Clip: 1, $Easing: $JssorEasing$.$EaseInOutCubic };
            _CaptionTransitions["RTT|10"] = { $Duration: 600, $Zoom: 11, $Rotate: 1, $Easing: { $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo }, $Opacity: 2, $Round: { $Rotate: 0.8} };
            _CaptionTransitions["ZMF|10"] = { $Duration: 600, $Zoom: 11, $Easing: { $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 };
            _CaptionTransitions["FLTTR|R"] = { $Duration: 600, x: -0.2, y: -0.1, $Easing: { $Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseInWave }, $Opacity: 2, $Round: { $Top: 1.3} };

            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0),

                $CaptionSliderOptions: {                            //[Optional] Options which specifies how to animate caption
                    $Class: $JssorCaptionSlider$,                   //[Required] Class to create instance to animate caption
                    $CaptionTransitions: _CaptionTransitions,       //[Required] An array of caption transitions to play caption, see caption transition section at jssor slideshow transition builder
                    $PlayInMode: 1,                                 //[Optional] 0 None (no play), 1 Chain (goes after main slide), 3 Chain Flatten (goes after main slide and flatten all caption animations), default value is 1
                    $PlayOutMode: 3                                 //[Optional] 0 None (no play), 1 Chain (goes before main slide), 3 Chain Flatten (goes before main slide and flatten all caption animations), default value is 1
                }
            };

            var jssor_slider1 = new $JssorSlider$(containerId, options);
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {

                //reserve blank width for margin+padding: margin+padding-left (10) + margin+padding-right (10)
                var paddingWidth = 20;

                //minimum width should reserve for text
                var minReserveWidth = 150;

                var parentElement = jssor_slider1.$Elmt.parentNode;

                //evaluate parent container width
                var parentWidth = parentElement.clientWidth;

                if (parentWidth) {

                    //exclude blank width
                    var availableWidth = parentWidth - paddingWidth;

                    //calculate slider width as 70% of available width
                    var sliderWidth = availableWidth * 0.7;

                    //slider width is maximum 600
                    sliderWidth = Math.min(sliderWidth, 600);

                    //slider width is minimum 200
                    sliderWidth = Math.max(sliderWidth, 200);

                    //evaluate free width for text, if the width is less than minReserveWidth then fill parent container
                    if (availableWidth - sliderWidth < minReserveWidth) {

                        //set slider width to available width
                        sliderWidth = availableWidth;

                        //slider width is minimum 200
                        sliderWidth = Math.max(sliderWidth, 200);
                    }

                    jssor_slider1.$ScaleWidth(sliderWidth);
                }
                else
                    $Jssor$.$Delay(ScaleSlider, 30);
            }

            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);

            $Jssor$.$AddEvent(window, "resize", $Jssor$.$WindowResizeFilter(window, ScaleSlider));
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
        };
    </script>
    <div class="content-slider">
    <!-- Jssor Slider Begin -->
    <!-- You can move inline styles to css file or css block. -->
        <div id="slider1_container" style="width:600px; height:300px;">
            <!-- Slides Container -->
            <div u="slides" style="width:600px; height:300px; overflow:hidden;">
                <div><img u="image" src="asset/images/header-ta.png" width="380" height="50">
                    <div u="caption" t="CLIP|L" style="position:absolute;left:90px;top:70px;width:120px;height:40px;font-size:36px;color:#fff;line-height:40px;">Selamat</div>
                    <div u="caption" t="CLIP|L" style="position:absolute;left:220px;top:70px;width:120px;height:40px;font-size:36px;color:#fff;line-height:40px;">Datang</div>
                    <div u="caption" t="CLIP|L" style="position:absolute;left:350px;top:70px;width:130px;height:40px;font-size:36px;color:#fff;line-height:40px;">...</div>
                </div>
                <div><img u="image" src="asset/images/header1.png">
                    <div u="caption" t="ZMF|10" style="position:absolute;left:80px;top:70px;width:110px;height:40px;font-size:36px;color:#fff;line-height:40px;">Murah</div>
                    <div u="caption" t="ZMF|10" style="position:absolute;left:200px;top:70px;width:120px;height:40px;font-size:36px;color:#fff;line-height:40px;">Berkualitas</div>
                    <div u="caption" t="ZMF|10" style="position:absolute;left:390px;top:70px;width:130px;height:40px;font-size:36px;color:#fff;line-height:40px;">Terpercaya!</div>
                </div>
                <div><img u="image" src="asset/images/header2.png">
                    <div u="caption" t="RTT|10" style="position:absolute;left:120px;top:70px;width:110px;height:40px;font-size:36px;color:#fff;line-height:40px;">Pesan</div>
                    <div u="caption" t="RTT|10" style="position:absolute;left:230px;top:70px;width:120px;height:40px;font-size:36px;color:#fff;line-height:40px;">Sekarang</div>
                    <div u="caption" t="RTT|10" style="position:absolute;left:380px;top:70px;width:130px;height:40px;font-size:36px;color:#fff;line-height:40px;">Juga !</div>
                </div>

                <div><img u="image" src="asset/images/header3.png">
                    <div u="caption" t="FLTTR|R" style="position:absolute;left:100px;top:50px;width:110px;height:40px;font-size:36px;color:#fff;line-height:40px;">Anda</div>
                    <div u="caption" t="FLTTR|R" style="position:absolute;left:230px;top:50px;width:120px;height:40px;font-size:36px;color:#fff;line-height:40px;">Puas</div>
                    <div u="caption" t="FLTTR|R" style="position:absolute;left:380px;top:50px;width:130px;height:40px;font-size:36px;color:#fff;line-height:40px;">Kami Senang !</div>
                </div>
            </div>
            <!-- Trigger -->
            <script>
                jssor_slider1_starter('slider1_container');
            </script>
        </div>
    </div>