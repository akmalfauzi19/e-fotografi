 <div class="container">
     <div class="row">
         <div class="col-md-12">
             <div class="aa-footer-top-area">
                 <div class="row">
                     <div class="col-md-3 col-sm-6">
                         <div class="aa-footer-widget">
                             <h3>Main Menu</h3>
                             <ul class="aa-footer-nav">
                                 <li><a href="{{ route('user.home') }}">Home</a></li>
                                 <li><a href="{{ route('user.portofolio') }}">Portofolio</a></li>
                                 @if (Route::has('login'))
                                     @auth
                                         @if (Auth::user()->is_admin == 1)

                                         @else
                                             <li>
                                                 <a href="{{ route('user.status.login', Auth::user()->email) }}">
                                                     My Transaction
                                                 </a>
                                             </li>
                                         @endif
                                     @else
                                         <li><a href="{{ route('user.status') }}">My Transaction</a></li>
                                     @endauth
                                 @endif
                                 <li><a href="{{ route('user.contact') }}">Contact</a></li>
                             </ul>
                         </div>
                     </div>
                     <div class="col-md-3 col-sm-6">
                         <div class="aa-footer-widget">
                             <div class="aa-footer-widget">
                                 <h3>Contact Us</h3>
                                 <address>
                                     <p> Gg. 18, Tirto, Kec. Pekalongan Barat, Kota Pekalongan, Jawa Tengah 51151</p>
                                     <p><span class="fa fa-phone"></span> 087730412573</p>
                                     <p><span class="fa fa-envelope"></span> Aristofotografi7@gmail.com</p>
                                 </address>
                                 <div class="aa-footer-social">
                                     <a href="https://www.facebook.com/aristofotografi/">
                                         <span class="fa fa-facebook"></span>
                                     </a>
                                     <a href="https://www.instagram.com/aristofotografi/">
                                         <span class="fa fa-instagram"></span>
                                     </a>
                                     <a
                                         href="https://wa.me/6287824965334?text=Halo%20AristoFotografi,%0AApakah%20paket%20foto%20tanpa%20Down%20Payment%20(DP)%20masih%20ada?%20:">
                                         <span class="fa fa-whatsapp">
                                         </span>
                                     </a>
                                     <a href="https://www.youtube.com/channel/UCMWFpy9QnAi57BL2HvqvnoA">
                                         <span class="fa fa-youtube"></span>
                                     </a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
