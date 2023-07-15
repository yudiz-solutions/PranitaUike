<!--******************* Footer Section Start ******************-->
<footer>
    <div class="footer-inner">
        <div class="container">
            <?php  $logo = get_field('image','Options'); 
            // echo"<pre>";
            // print_r($logo);
            ?>

            <a href="index.html" class="footer-logo"><img src="<?php echo $logo['url'] ?>" alt="logo"></a>
            <?php dynamic_sidebar('menu') ?>
            <?php $contact = get_field('conatact','Options') ;
            
            ?>
            <a href="<?php echo $contact['url'] ?>" class="theme-btn white-btn"><?php  echo $contact['title'] ?></a>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-sm-7">
                    <p>© 2018 Expatriate Assistance Services Inc. All Rights Reserved.</p>
                </div>
                <div class="col-sm-5 footer-links">
                    <ul>
                        <li><a href="terms-condition.html">TERMS AND CONDITIONS</a></li>
                        <li><a href="privacy-policy.html">PRIVACY POLICY</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--******************* Footer Section End ******************-->
<!--*********************** All End ************************-->
</body>
<?php wp_footer() ?>
</html>