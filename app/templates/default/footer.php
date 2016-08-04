
</div>

<footer class="ttcFooter">
    <div class="row">
        <div class="small-4 medium-4 large-4 columns">
            <div class="left footer-link">
                <ul>
                    <li><a href="seg">ABOUT</a></li>
                    <li><a href="transparentcoffees">TT COFFEES</a></li>
                    <li><a href="register">REGISTER</li>
                    <li><a href="insights">INSIGHTS</a></li>
                    <li><a href="scrpi">SCRPI</a></li>
                    <li><a href="contact">CONTACT</a></li>
                </ul>
            </div>
        </div>
        <div class="small-8 medium-8 large-8 columns">
            <div class=" small-12 columns right socialIcons">
                <ul class="right">
                    <li><a href="https://www.facebook.com/transparentTrdCoffee"><i class="fa fa-facebook fa-2x"></i></a></li>
                    <li><a href="https://twitter.com/_TTcoffee"><i class="fa fa-twitter fa-2x"></i></a></li>
                </ul>
            </div>
            <div class="right small-12 columns powered">
                <a href="#" class="right">Powered by Social Enterprise @ Goizueta</a></li>
            </div>
            <div class="right small-12 columns copyright">
                <p>Copyright &copy; <?php echo date('Y');?> Transparent Trade Coffee</p>
            </div>
        </div>
    </div>
</footer>
<?php
helpers\assets::js(array(
    helpers\url::template_path() . 'js/jquery.js',
    helpers\url::template_path() . 'js/main.min.js',
    helpers\url::template_path() . 'js/jquery.nouislider.all.min.js',
    helpers\url::template_path() . 'js/zepto.min.js',
    helpers\url::template_path() . 'js/jquery.liblink.min.js',
    helpers\url::template_path() . 'js/flowtype.min.js',
))
?>
<script src="/bower_components/foundation/js/foundation.min.js"></script>
<script src="/bower_components/fastclick/lib/fastclick.min.js"></script>
<script type="text/javascript" src="/bower_components/slick-1.5.0/slick/slick.min.js"></script>
<script type="text/javascript" src="/app/templates/default/js/slick.min.js"></script>
<script src="/bower_components/modernizr/modernizr.min.js"></script>


<script>
    $("#swap").on("replace", function() {
        $(document).foundation();
    });
    $(document).foundation();
    $(document).ready(function(){
        $('#dialog').foundation('reveal', 'open');
    });
</script>
</body>
</html>
