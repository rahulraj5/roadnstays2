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
          {{ $banner->isEmpty() }}
          <?php $i = 1; ?>
          @if (!$banner->isEmpty())
            @foreach ($banner as $arr)
            <div class="carousel-item <?php if($i == 1){ echo 'active'; } ?>">
              <img class="d-block w-100" src="{{url('/')}}/resources/assets/img/{{ $arr->images }}" alt="First slide">
              <div class="carousel-caption d-md-block">
                <h5>{{ $arr->heading }}</h5>
                <p>{{ $arr->sub_heading }}</p>
              </div>
            </div>
            <?php $i++; ?>
            @endforeach
          @endif
          <!-- <div class="carousel-item">
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
          </div> -->
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
                          <span class="title">{{ $about_content[0]->content_heading }}</span>
                          <h2>{{ $about_content[0]->content_subheading }}</h2>
                      </div>
                      {!! $about_content[0]->about_content !!}
                      <div class="btn-box">
                          <a href="{{ $about_content[0]->button_url }}" class="theme-btn btn-style-one">{{ $about_content[0]->button_name }}</a>
                      </div>
                  </div>
              </div>

              <!-- Image Column -->
              <div class="image-column col-lg-6 col-md-12 col-sm-12">
                  <div class="inner-column wow fadeInLeft">
                    <div class="author-desc">
                      <h2>{{ $about_content[0]->image_heading }}</h2>
                      <span>{{ $about_content[0]->image_subheading }}</span>
                    </div>
                      <figure class="image-1"><a href="#" class="lightbox-image" data-fancybox="images"><img title="" src="{{url('/')}}/resources/assets/img/{{ $about_content[0]->content_image }}" alt=""></a></figure>
                   
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
            <h4>{!! $chooseus_heading[0]->heading !!}</h4>
            <p>{!! $chooseus_heading[0]->subheading !!}</p>
          </div>
          @if (!$about_choose_us->isEmpty())
            <?php $i = 1; ?>
            @foreach ($about_choose_us as $arr)
              <div class="col-lg-4 col-sm-6 item">
                  
                    <?php
                      if($i == 1){
                        ?>
                        <span class="icon feature_box_col_one"><i class="fa fa-globe"></i></span>
                        <?php
                      }elseif($i == 2){
                        ?>
                        <span class="icon feature_box_col_two"><i class="fa fa-anchor"></i></span>
                        <?php
                      }elseif($i == 3){
                        ?>
                        <span class="icon feature_box_col_three"><i class="fa fa-hourglass-half"></i></span>
                        <?php
                      }elseif($i == 4){
                        ?>
                        <span class="icon feature_box_col_four"><i class="fa fa-database"></i></span>
                        <?php
                      }elseif($i == 5){
                        ?>
                        <span class="icon feature_box_col_five"><i class="fa fa-upload"></i></span>
                        <?php
                      }elseif($i == 6){
                        ?>
                        <span class="icon feature_box_col_six"><i class="fa fa-camera"></i></span>
                        <?php
                      }
                    ?>
                  
                  <h6>{{ $arr->heading }}</h6>
                  <p>{{ $arr->subheading }}</p>

              </div>
              <?php $i++; ?>
            @endforeach

          @endif
      </div>
    </div>
  
  </section>

@endsection