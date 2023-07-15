<?php 
// Template Name: Assessment
get_header()?>
<!--******************* Banner Section Start *********************-->
<div class="home-banner">
    <div class="banner" style="background: #5C5C5C url('images/home-slide1.jpg') no-repeat center center / cover;">
        <div class="container">
            <h1>Free Assessment</h1>
        </div>
    </div>
</div>
<!--******************* Banner Section End *********************-->
<!--******************* Header Section End *********************-->
<!--******************* Middle Section Start ******************-->
<main>
    <section class="common-section">
        <div class="container">
            <form class="assessment-form">
                <!-- <p>For us to give you a preliminary assessment of your suitability for Canadian PR please share the following information</p>
                <div class="form-title">
                    <h4><span>1</span>Basic Information</h4>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Age">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-3 col-md-3 col-lg-3">
                                    <label>Are you married ?</label>
                                </div>
                                <div class="col-sm-3 col-md-3 col-lg-2">
                                    <ul class="radio-list">
                                        <li>
                                            <input type="radio" name="rtest" checked="checked" id="rad1" data-jcf='{"wrapNative": true}' />
                                            <label for="rad1">Yes</label>
                                        </li>
                                        <li>
                                            <input type="radio" name="rtest" id="rad1" />
                                            <label for="rad1">No</label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-4">                                    
                                    <input type="text" class="form-control" placeholder="Partner's Age">
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-title">
                    <h4><span>2</span>Academic Information</h4>
                </div>
                <div>
                    <div class="form-group">
                        <label>What is your highest educational qualification ?</label>
                        <select data-jcf='{"wrapNative": false, "wrapNativeOnMobile": false}'>
                            <option>Select One...</option>
                            <option>Matrix</option>
                            <option>Graduate</option>
                            <option>Post Graduate</option>
                            <option>PHD (Doctorate)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>What is your partner’s highest educational qualification ?</label>
                        <select data-jcf='{"wrapNative": false, "wrapNativeOnMobile": false}'>
                            <option>Select One...</option>
                            <option>Matrix</option>
                            <option>Graduate</option>
                            <option>Post Graduate</option>
                            <option>PHD (Doctorate)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>If you have taken the IELTS/TFR exam please mention your score.</label>
                        <input type="text" class="form-control" placeholder="Score">
                    </div>
                    <div class="form-group">
                        <label>If your partner has taken the IELTS/TFR exam please mention the score.</label>
                        <input type="text" class="form-control" placeholder="Score">
                    </div>
                </div>
                <div class="form-title">
                    <h4><span>3</span>Work Experience</h4>                    
                </div>
                <div>
                    <div class="form-group">
                        <label>In the last 10 years, how many years of skilled work experience do you have?</label>
                        <label>It must have been continuous, paid, full-time (or an equal amount in part-time), and in only one occupation</label>
                        <input type="text" class="form-control" placeholder="number of years">
                    </div>
                </div>
                <div class="form-title">
                    <h4><span>4</span>Resume</h4>
                </div>
                <div class="row">
                    <div class="form-group file-upload-btn">
                        <div class="col-sm-4"><label>Upload your latest resume</label></div>
                        <div class="col-sm-8">
                            <input id="file" type="file" class="form-control inputfile">
                            <label class="file-submit theme-btn" for="file">Upload</label>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Submit" class="form-control button submit theme-btn">
                </div> -->
                <?php echo do_shortcode('[contact-form-7 id="396" title="Assessment"]') ?>
            </form>
        </div>
    </section>
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
<?php get_footer() ?>
