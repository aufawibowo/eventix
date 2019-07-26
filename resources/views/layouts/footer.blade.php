  <!-- Brands -->

@yield('slider')
  <!-- Footer -->

  <footer class="footer">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 footer_col">
          <div class="footer_column footer_contact">
            <div class="logo_container">
              <div class="logo"><a href="#">EvenTix</a></div>
            </div>
            <div class="footer_title">Got Question? Call Us 24/7</div>
            <div class="footer_phone">+62 852 1739 4361</div>
            <div class="footer_contact_text">
              <p>10 Nopember, Sukolilo</p>
              <p>Surabaya, Indonesia</p>
            </div>
            <div class="footer_social">
              <ul>
                <li><a href="https://www.facebook.com/even.tix.7" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://twitter.com/even_tix" target="_blank"><i class="fab fa-twitter"></i></a></li>
                <li><a href="https://www.instagram.com/eventix_/" target="_blank"><i class="fab fa-instagram"></i></a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-lg-2 offset-lg-3">
          <div class="footer_column">
            <div class="footer_title">Find Tickets Now</div>
            <ul class="footer_list">
              <li><a href="{{url('movies')}}">Cinemas</a></li>
              <li><a href="{{url('events')}}">Events</a></li>
              <li><a href="{{url('sports')}}">Sports</a></li>
            </ul>
          </div>
        </div>

        {{-- <div class="col-lg-3">
          <div class="footer_column">
            <div class="footer_title">Customer Care</div>
            <ul class="footer_list">
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Terms & Conditions</a></li>
              <li><a href="#">FAQs</a></li>
            </ul>
          </div>
        </div> --}}

      </div>
    </div>
  </footer>

  <!-- Copyright -->

  <div class="copyright">
    <div class="container">
      <div class="row">
        <div class="col">

          <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
            <div class="copyright_content">
              Made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://www.its.ac.id/informatika/" target="_blank">Us</a>
            </div>
            <div class="logos ml-sm-auto">
              <ul class="logos_list">
                <li><a href="#"><img src="{{asset('images/logos_1.png')}}" alt=""></a></li>
                <li><a href="#"><img src="{{asset('images/logos_2.png')}}" alt=""></a></li>
                <li><a href="#"><img src="{{asset('images/logos_3.png')}}" alt=""></a></li>
                <li><a href="#"><img src="{{asset('images/logos_4.png')}}" alt=""></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
