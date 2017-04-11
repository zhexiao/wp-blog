<!-- footer content -->		
<footer>
    <div class="container">
        <div class="footer-content clearfix">
            <div class="col-md-4">
                <div class="meta"><?php dynamic_sidebar( 'footer_meta' ); ?></div>
            </div>
            
            <div class="col-md-4">
                <div class="category"><?php wp_list_categories(['depth'=>1, 'title_li'=>'<h4>Categories</h4>']); ?></div>
            </div>

            <div class="col-md-4">
                <h4>Tags</h4>
                <div class="tags">
                    <?php wp_tag_cloud([
                        'smallest'  => 11,
                        'largest'   => 26,
                        'unit'      => 'px',
                        'number'    => 70,
                        'order'     => 'ASC',
                    ]); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-copy clearfix">
        <div class="container"> 
            Copyright © <?=date('Y')?> Zhe Xiao. All rights reserved.
        </div>
    </div>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-83214741-1', 'auto');
      ga('send', 'pageview');

    </script>
</footer>

<?php wp_footer(); ?>
</body>
</html>