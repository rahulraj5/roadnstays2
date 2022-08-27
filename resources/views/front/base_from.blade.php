@extends('front.layout.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
@endsection

@section('current_page_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script>
   const phoneInputField = document.querySelector("#phone");
   const phoneInput = window.intlTelInput(phoneInputField, {
        preferredCountries: ["us", "pk", "in", "de"],
        initialCountry: "auto",
        geoIpLookup: getIp,
        utilsScript:
        "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    })

    function getIp(callback) {
        fetch('https://ipinfo.io/json?token=a1bc0bab615274', { headers: { 'Accept': 'application/json' }})
        .then((resp) => resp.json())
        .catch(() => {
            return {
            country: 'us',
            };
        }).then((resp) => callback(resp.country));
    }

    const info = document.querySelector(".alert-info");
    function process(event) {
        event.preventDefault();
        const phoneNumber = phoneInput.getNumber();
        info.style.display = "";
        info.innerHTML = `Phone number in E.164 format: <strong>${phoneNumber}</strong>`;
    }    
 </script>
<script>
    // $('input[name="dates"]').daterangepicker();
</script>
<script>
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    });
</script>
@endsection

@section('content')
<main id="main" class="main-body">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <!-- /.col (left) -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <!-- <h3 class="card-title">Date picker</h3> -->
                        </div>
                        <div class="card-body">
                            <!-- Date range -->
                            <div class="form-group">
                                <!-- <label>Date range:</label> -->
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <!-- <input type="text" class="form-control float-right" id="reservation"> -->
                                    <input type="text" name="daterange" value="01/01/2018 - 01/15/2018" />
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>

                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col (right) -->

                <div class="col-md-6">
                    
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
        <div class="container">
            <form id="login" onsubmit="process(event)">
                <p>Enter your phone number:</p>
                <input id="phone" type="tel" name="phone" />
                <input type="submit" class="btn" value="Verify" />
            </form>
            <div class="alert alert-info" style="display: none;"></div>
        </div>
    </section>
    <!-- /.content -->

</main>
@endsection