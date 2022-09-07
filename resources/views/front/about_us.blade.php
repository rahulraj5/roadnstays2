@extends('front.layout.layout')

@section('current_page_css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://daneden.github.io/animate.css/animate.min.css">
    


@endsection
@section('current_page_js')

@endsection
@section('content')
<section class="about-ussec" style="padding-top: 77px;">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{url('/')}}/resources/assets/img/about1.jpg" alt="First slide">
            <div class="carousel-caption d-md-block">
              <h5>Best Tour Facility</h5>
              <p>Book your Custom tour with us!</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{url('/')}}/resources/assets/img/about2.jpg" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>24/7 Service</h5>
              <p>Always be there For You!</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{url('/')}}/resources/assets/img/about3.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>Best Service in Town</h5>
              <p>Find a great deal on a hotel for tonight or an upcoming trip</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </section>




    <section class="about-section">
      <div class="container">
          <div class="row">                
              <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2">
                  <div class="inner-column">
                      <div class="sec-title">
                          <span class="title">Know More</span>
                          <h2>About RoadNstays</h2>
                      </div>
                      <div class="text">Road N Stays is passionate about providing clean and safe lodgings for travellers at an economical price point. We stand with the people on the move and we understand their pulse for stays away from home. We run a network of customer experience executives who are professionally trained to facilitate sanitized and comfortable rooms in a reliable environment for you to rest and relax. Moreover, our platform is a single source of reference for all your invoicing and billing requirements.
</div>
                    <div class="text">
                    Book with us and enjoy your tour.

                    </div>
                      <div class="btn-box">
                          <a href="#" class="theme-btn btn-style-one">Contact Us</a>
                      </div>
                  </div>
              </div>

              <!-- Image Column -->
              <div class="image-column col-lg-6 col-md-12 col-sm-12">
                  <div class="inner-column wow fadeInLeft">
                    <div class="author-desc">
                      <h2>RoadNstays</h2>
                      <span>Skyler Associates</span>
                    </div>
                      <figure class="image-1"><a href="#" class="lightbox-image" data-fancybox="images"><img title="" src="{{url('/')}}/resources/assets/img/about.jpg" alt=""></a></figure>
                   
                  </div>
              </div>
            
            </div>
             
      </div>
  </section>
  <section class="abour-2sec">
    <div class="feat bg-gray">
      <div class="container">
        <div class="row">
          <div class="section-head col-sm-12">
            <h4><span>Why Choose</span> Us?</h4>
            <p>When you choose us, you'll feel the benefit of 10 years' experience of Tourism. Because we know the digital world and we know that how to handle it. With working knowledge.</p>
          </div>
          <div class="col-lg-4 col-sm-6 item">
             <span class="icon feature_box_col_one"><i class="fa fa-globe"></i></span>
              <h6>Newly Space </h6>
              <p>We use latest technology for the latest world because we know the demand of peoples.</p>
            
          </div>
          <div class="col-lg-4 col-sm-6 item">
            <span class="icon feature_box_col_two"><i class="fa fa-anchor"></i></span>
              <h6>Creative Guide</h6>
              <p>We are always creative and and always lisen our costomers and we mix these two things and make beast design.</p>
            
          </div>
          <div class="col-lg-4 col-sm-6 item">
             <span class="icon feature_box_col_three"><i class="fa fa-hourglass-half"></i></span>
              <h6>24 x 7 User Support</h6>
              <p>If our customer has any problem and any query we are always happy to help then.</p>
            
          </div>
          <div class="col-lg-4 col-sm-6 item">
             <span class="icon feature_box_col_four"><i class="fa fa-database"></i></span>
              <h6>Business Growth</h6>
              <p>Everyone wants to live on top of the mountain, but all the happiness and growth occurs while you're climbing it</p>
            
          </div>
          <div class="col-lg-4 col-sm-6 item">
             <span class="icon feature_box_col_five"><i class="fa fa-upload"></i></span>
              <h6>Market Strategy</h6>
              <p>Holding back technology to preserve broken business models is like allowing blacksmiths to veto the internal combustion engine in order to protect their horseshoes.</p>
            
          </div>
          <div class="col-lg-4 col-sm-6 item">
             <span class="icon feature_box_col_six"><i class="fa fa-camera"></i></span>
              <h6>Affordable cost</h6>
              <p>Love is a special word, and I use it only when I mean it. You say the word too much and it becomes cheap.</p>
            
         
        </div>
      </div>
    </div>
  
  </section>

@endsection