 <div class="container-fluid footer_wrapper">
        <div class="container footer_wrapper_inside">
            <div class="row">
                <div class="col-md-4">
                    <nav class="nav flex-column">
                        <h3 class="footer_title"> About us</h3>
                        <div class="footer_links">
                            <a class="nav-link" href="#">About Jain-Brothers</a>
                            <a class="nav-link" href="#">Our History</a>
                            <a class="nav-link" href="#">The Handbook</a>
                            <a class="nav-link" href="#">Ethical Trading</a>
                            <a class="nav-link" href="#">Corporate Social Responsibility</a>
                        </div>
                    </nav>
                </div>
                <div class="col-md-3">
                    <nav class="nav flex-column">
                        <h3 class="footer_title"> Self-Service</h3>
                        <div class="footer_links">
                            <a class="nav-link" href="#">Track Your Order</a>
                            <a class="nav-link" href="#">Shipping Policy</a>
                            <a class="nav-link" href="#">Size Chart</a>
                        </div>
                    </nav>
                </div>
                <div class="col-md-3">
                    <nav class="nav flex-column">
                        <h3 class="footer_title"> Get Help</h3>
                        <div class="footer_links">
                            <a class="nav-link" href="#">Help & FAQS</a>
                            <a class="nav-link" href="#">Email Us</a>
                            <a class="nav-link" href="tel:91-9079814056">(91) 9079814056</a>
                        </div>
                    </nav>
                </div>
                <div class="col-md-2">
                    <div class="logo_wapper">
                        <img src="{{ asset('images/Home/logo.png') }}" class="w-100" />
                    </div>
                </div>
            </div>
        </div>
 </div>

 <div class="container-fluid social_media_wrapper">
     <div class="container footer_wrapper_inside">
         <div class="row">
             <div class="col-md-1">
                 <div class="india_flag">
                     <img src="{{ asset('images/Home/india.svg') }}" class="w-100"/>
                 </div>
             </div>
             <div class="col-md-2 text-center">
                 &copy; <span id="year"></span> Jain-Brothers.
             </div>

             <div class="col-md-5">
                 <div class="w-100 text-center">
                     <a href="#" class="social_media_icon"><img src="{{ asset('images/social-media/fb.svg') }}"/></a>
                     <a href="#" class="social_media_icon"><img src="{{ asset('images/social-media/twitter.svg') }}"/></a>
                     <a href="#" class="social_media_icon"><img src="{{ asset('images/social-media/youtube.svg') }}"/></a>
                     <a href="#" class="social_media_icon"><img src="{{ asset('images/social-media/instagram.svg') }}"/></a>
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="text-center">
                     <a class="px-3 text-dark" href="#">Terms & Conditions</a>
                     <a class="px-3 text-dark" href="#">Privacy</a>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <script>
     document.getElementById("year").innerHTML = new Date().getFullYear();
 </script>
