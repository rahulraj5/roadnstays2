@extends('front.layout.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')

@endsection

@section('current_page_js')

@endsection

@section('content')
<main id="main" class="main-body">
    <section class="registration-sec">
        <div class="row reg-row">
            <div class="col-md-5 reg-col reg-col-1">
                <div class="text">
                    <h4>Reset Password</h4>
                    <input type="password" name="" id="" placeholder="password">
                    <br>
                    <input type="password" name="" id="" placeholder="confirm password">
                    <br>
                    <button>Submit</button>
                </div>

            </div>
            <div class="col-md-7 reg-col reg-col-2">
                <div class="content">
                    <a href="{{ url('/') }}" class="logo"><img src="https://votivetechnologies.in/roadNstays/resources/assets/img/road-logo.png" alt="" class="img-fluid"></a>
                    <h5>Travel with Roadnstays Safe&Secure</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, maiores..</p>
                    <!-- <button>login</button> -->
                    <button><a href="" data-toggle="modal" data-target="#exampleModal-log-in" class="">login</button>
                </div>
                
            </div>
        </div>
    </section>
</main>
<!-- End #main -->
<!-- MODAL AREA START -->

<!-- MODAL AREA END -->


@endsection