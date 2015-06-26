
</div>

<footer class="ttcFooter">
    <div class="row">
        <div class="small-4 medium-4 large-4 columns">
            <div class="left">
                <ul>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="#">TT COFFEES</a></li>
                    <li><a href="#">REGISTER</li>
                    <li><a href="#">INSIGHTS</a></li>
                    <li><a href="#">SCRPI</a></li>
                    <li><a href="#">CONTACT</a></li>
                </ul>
            </div>
        </div>
        <div class="small-8 medium-8 large-8 columns">
            <div class=" small-12 columns right socialIcons">
                <ul class="right">
                    <li><a href="#"><i class="fa fa-facebook fa-2x"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter fa-2x"></i></a></li>
                </ul>
            </div>
            <div class="right small-12 columns powered">
                <a href="#" class="right">Powered by Social Enterprise @ Goizueta</a>
            </div>
        </div>
    </div>
</footer>
<?php
helpers\assets::js(array(
    helpers\url::template_path() . 'js/jquery.js',
    helpers\url::template_path() . '//cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.js',
    helpers\url::template_path() . 'js/main.js',
    helpers\url::template_path() . 'js/jquery.nouislider.all.min.js',
    helpers\url::template_path() . 'js/zepto.min.js',
    helpers\url::template_path() . 'js/jquery.liblink.js'
))
?>
<script src="/bower_components/foundation/js/foundation.min.js"></script>
<script src="/bower_components/foundation/js/foundation/foundation.accordion.js"></script>
<script src="/bower_components/fastclick/lib/fastclick.js"></script>
<script type="text/javascript" src="/bower_components/slick-1.5.0/slick/slick.min.js"></script>
<script type="text/javascript" src="/app/templates/default/js/slick.js"></script>

<script>
    $("#swap").on("replace", function() {
        $(document).foundation();
    });
    $(document).foundation();
</script>
</body>
</html>
