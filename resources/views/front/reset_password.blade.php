@extends('front.layout.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')

@endsection

@section('current_page_js')
<script>
    $('#resetPassword_form').validate({
        // initialize the plugin
        rules: {
            reset_password: {
                required: true
            },
            reset_repassword: {
                required: true,
                equalTo: "#reset_password"
            }
        },
        submitHandler: function(form) {
            // form.submit();
            var site_url = $("#baseUrl").val();
            // alert(site_url);
            var formData = $(form).serialize();
            $(form).ajaxSubmit({
                type: 'POST',
                url: site_url + '/resetPassword_action',
                data: formData,
                success: function(response) {
                    console.log(response);
                    if (response.status == 'success') {
                        $("#resetPassword_form")[0].reset();
                        success_noti(response.msg);
                        setTimeout(function(){window.location.href=site_url},2000);
                    } else if (response.status == 'expError') {
                        error_noti(response.msg);
                        setTimeout(function() {window.location.href = site_url}, 2000);
                    } else {
                        error_noti(response.msg);
                    }

                }
            });
        }
    });
</script>
@endsection

@section('content')
<main id="main" class="main-body">
    <section class="registration-sec">
        <div class="row reg-row">
            <div class="col-md-5 reg-col reg-col-1">
                <div class="text">
                    <h4>Reset Password</h4>
                    <form method="post" name="resetPassword_form" id="resetPassword_form">
                        <input type="hidden" name="token" id="token" value="{{ $token }}">
                        <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}" />

                        <input type="password" placeholder="Password" id="reset_password" name="reset_password" required>
                        <br>
                        <input type="password" placeholder="Confirm Password" id="reset_repassword" name="reset_repassword" required>
                        <br>
                        <button type="submit" class="signup-sub">Submit</button>

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