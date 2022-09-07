@extends('front.layout.layout')

@section('current_page_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

<style>

</style>
@endsection
@section('current_page_js')

@endsection
@section('content')





<section class="contact_us">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="contact_inner">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="contact_form_inner">
                                <div class="contact_field">
                                    <h3>Contact Us</h3>
                                    <p>Feel Free to contact us any time. We will get back to you as soon as we can!.</p>
                                    <input type="text" class="form-control form-group" placeholder="Name" />
                                    <input type="text" class="form-control form-group" placeholder="Email" />
                                    <textarea class="form-control form-group" placeholder="Message"></textarea>
                                    <button class="contact_form_submit">Send</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="right_conatct_social_icon d-flex align-items-end">
                                <div class="socil_item_inner d-flex">
                                    <li><a href="https://www.facebook.com/RoadnStayscom-113429408032932"><i class="fab fa-facebook-square"></i></a></li>
                                    <li><a href="https://www.instagram.com/roadnstays/"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="https://www.youtube.com/channel/UCnYwJuD_-gTvBNnUVYLibvA"><i class="fab fa-youtube"></i></a></li>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="contact_info_sec">
                        <h4>Skyler Associates
                        </h4>
                        <div class="d-flex info_single align-items-center">
                        <i class='bx bx-phone-call' ></i>
                            @php $admin_details = DB::table('admins')->where('id', 1)->first() @endphp
                            <a href="tel:{{ $admin_details->admin_number }}">{{ $admin_details->admin_number }}</a>
                        </div>

                        <div class="d-flex info_single align-items-center">
                        <i class='bx bxl-whatsapp' ></i>
                            <a href="mailto: info@roadnstays.com">+92 342 4514629</a>
                        </div>
                        <div class="d-flex info_single align-items-center">
                        <i class='bx bx-envelope' ></i>
                            <a href="mailto: info@roadnstays.com">info@roadnstays.com</a>
                        </div>
                        <div class="d-flex info_single align-items-center">
                        <i class='bx bx-mail-send' ></i>
                            <a href="mailto: contact@roadnstays.com">contact@roadnstays.com</a>
                        </div>
                        <div class="d-flex info_single align-items-center">
                        <i class='bx bx-map-alt' ></i>
                            <span>Office No. 34, 2nd floor, Gulf Center, Qurtaba chowk, Main Feiroz pur road Lahore</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="map_sec">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="map_inner">
                    <h4>Find Us on Google Map</h4>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore quo beatae quasi assumenda, expedita aliquam minima tenetur maiores neque incidunt repellat aut voluptas hic dolorem sequi ab porro, quia error.</p> -->
                    <div class="map_bind">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1700.0722787896714!2d74.31509300057013!3d31.54764715749354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391904a63b5b6e27%3A0x82046d1f35b0e57b!2sQartaba%20Chowk%20Clock%20Tower%2C%20Ferozepur%20Rd%2C%20Jubilee%20Town%2C%20Lahore%2C%20Punjab%2054000%2C%20Pakistan!5e0!3m2!1sen!2sin!4v1661853221807!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>



@endsection