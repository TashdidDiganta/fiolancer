<?php 

   /**
    * Template part for displaying header side information
    *
    * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
    *
    * @package arckytech
   */

   $arckytech_offcanvas_logo = get_theme_mod( 'arckytech_offcanvas_logo', get_template_directory_uri() . '/assets/img/logo/logo.svg' );

   // offcanvas btn
   $arckytech_offcanvas_btn = get_theme_mod( 'arckytech_offcanvas_btn_text', __( 'Contact Us', 'arckytec' ) );
   $arckytech_offcanvas_btn_url = get_theme_mod( 'arckytech_offcanvas_btn_url', __( '#', 'arckytec' ) );
?>
<!-- Start sidebar widget content -->
<div class="xs-sidebar-group info-group info-sidebar">
    <div class="xs-overlay xs-bg-black"></div>
    <div class="xs-sidebar-widget">
        <div class="sidebar-widget-container">
            <div class="widget-heading">
                <a href="#" class="close-side-widget">X</a>
            </div>
            <div class="sidebar-textwidget">
                <div class="sidebar-info-contents">
                    <div class="content-inner">
                        <div class="logo">
                            <a href="index.html"><img src="assets/images/resources/logo-2.png" alt="" /></a>
                        </div>
                        <div class="content-box">
                            <h4>About Us</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut
                                labore et magna aliqua. Ut enim ad minim veniam laboris.</p>
                        </div>
                        <div class="form-inner">
                            <h4>Get a free quote</h4>
                            <form action="assets/inc/sendemail.php" class="contact-form-validated"
                                novalidate="novalidate">
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Name" required="">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Email" required="">
                                </div>
                                <div class="form-group">
                                    <textarea name="message" placeholder="Message..."></textarea>
                                </div>
                                <div class="form-group message-btn">
                                    <button type="submit" class="thm-btn form-inner__btn">Submit Now</button>
                                </div>
                            </form>
                            <div class="result"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End sidebar widget content -->
