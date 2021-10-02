<div id="footer">
  <div class="container text-center">
      @foreach($informations as $key => $value)
            @if($key == "Phone")
                  <div class="col-md-2">
                      <h3>Phone</h3>
                      <div class="contact-item">
                      @foreach($value as $data)
                          <p>phone : {{$data->value}}</p>
                          @endforeach
                      </div>
                  </div>
              

          @endif

          @if($key == "Email")
                  <div class="col-md-2">
                      <h3>Email</h3>
                      <div class="contact-item">
                      @foreach($value as $data)
                          <p>Email : {{$data->value}}</p>
                          @endforeach
                      </div>
                  </div>
              

          @endif
          @if($key == "Opening Hours")
                  <div class="col-md-2">
                      <h3>Opening Hours</h3>
                      <div class="contact-item">
                      @foreach($value as $data)
                          <p>Opening Hours : {{$data->value}}</p>
                          @endforeach
                      </div>
                  </div>
              

          @endif
          @if($key == "Address")
                  <div class="col-md-2">
                      <h3>Address</h3>
                      <div class="contact-item">
                      @foreach($value as $data)
                          <p>Address : {{$data->value}}</p>
                          @endforeach
                      </div>
                  </div>
              

          @endif
          @if($key == "Contact Info")
                  <div class="col-md-2">
                      <h3>Contact Info</h3>
                      <div class="contact-item">
                      @foreach($value as $data)
                          <p>Contact Info : {{$data->value}}</p>
                          @endforeach
                      </div>
                  </div>
              

          @endif
      @endforeach
    
    
  </div>
  <div class="container-fluid text-center copyrights">
    <div class="col-md-8 col-md-offset-2">
      <div class="social">
        <ul>
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
        </ul>
      </div>
      <p>&copy; 2016 Touché. All rights reserved. Designed by <a href="http://www.templatewire.com" rel="nofollow">TemplateWire</a></p>
    </div>
  </div>
</div>
<script type="text/javascript" src="{{asset('endUserAssets/js/jquery.1.11.1.js')}}"></script>
<script type="text/javascript" src="{{asset('endUserAssets/js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('endUserAssets/js/SmoothScroll.js')}}"></script>
<script type="text/javascript" src="{{asset('endUSerAssets/js/nivo-lightbox.js')}}"></script>
<script type="text/javascript" src="{{asset('endUSerAssets/js/jquery.isotope.js')}}"></script>
<script type="text/javascript" src="{{asset('endUSerAssets/js/jqBootstrapValidation.js')}}"></script>
<script type="text/javascript" src="{{asset('endUSerAssets/js/contact_me.js')}}"></script>
<script type="text/javascript" src="{{asset('endUSerAssets/js/main.js')}}"></script>
</body>

</html>
