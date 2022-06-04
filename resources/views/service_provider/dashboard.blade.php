@extends('front.layout.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')

@endsection

@section('current_page_js')
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imageUpload").change(function(data) {

        readURL(this);
        var imageFile = data.target.files[0];
        var formData = new FormData();
        formData.append('imageFile', imageFile);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ url('/updateProfileImage') }}",
            enctype: 'multipart/form-data',
            method: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                success_noti(response.msg);
            }
        });
    });
</script>
@endsection

@section('content')

<main id="main">

    <section class="user-section" style="padding-top: 100px; background-color: #f6f6f6;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 pr-0">
                    <div class="sidebar left ">
                        <ul class="list-sidebar bg-defoult">

                            <div class="vend-stays"> Road N Stays</div>

                            <li> <a href="#" data-toggle="collapse" data-target="#dashboard" class="collapsed active"> <i class='bx bx-space-bar'></i> <span class="nav-label"> Private space </span> <i class='bx bx-chevron-right pull-r'></i> </a>
                                <ul class="sub-menu collapse" id="dashboard">
                                    <li class="active"><a href="#"><i class='bx bx-chevron-left'></i>Add Private Space</a></li>
                                    <li><a href="#"><i class='bx bx-chevron-left'></i> List showing Privat space</a></li>
                                    <li><a href="#"><i class='bx bx-chevron-left'></i> Booking parivat space</a></li>
                                    <li><a href="#"><i class='bx bx-chevron-left'></i> Tabs & Accordions</a></li>
                                </ul>
                            </li>

                            <li> <a href="#" data-toggle="collapse" data-target="#products" class="collapsed active"> <i class='bx bx-car'></i> <span class="nav-label">Tour Booking </span> <i class='bx bx-chevron-right pull-r'></i> </a>
                                <ul class="sub-menu collapse" id="products">
                                    <li class="active"><a href="#"> <i class='bx bx-chevron-left'></i> Add tour packages List</a></li>
                                    <li><a href="#"><i class='bx bx-chevron-left'></i> List showing tour packages</a></li>
                                    <li><a href="#"><i class='bx bx-chevron-left'></i> Tabs & Accordions</a></li>
                                    <li><a href="#"><i class='bx bx-chevron-left'></i> Typography</a></li>

                                </ul>
                            </li>
                            <li> <a href="#" data-toggle="collapse" data-target="#tables" class="collapsed active"><i class='bx bx-calendar-event'></i> <span class="nav-label">Event Management </span><i class='bx bx-chevron-right pull-r'></i></a>
                                <ul class="sub-menu collapse" id="tables">
                                    <li><a href=""><i class='bx bx-chevron-left'></i> Static Tables</a></li>
                                    <li><a href=""><i class='bx bx-chevron-left'></i> Data Tables</a></li>
                                    <li><a href=""><i class='bx bx-chevron-left'></i> Foo Tables</a></li>
                                    <li><a href=""><i class='bx bx-chevron-left'></i> jqGrid</a></li>
                                </ul>
                            </li>
                            <li> <a href="#" data-toggle="collapse" data-target="#e-commerce" class="collapsed active"><i class="fa fa-shopping-cart"></i> <span class="nav-label">E-commerce</span><i class='bx bx-chevron-right pull-r'></i></a>
                                <ul class="sub-menu collapse" id="e-commerce">
                                    <li><a href=""><i class='bx bx-chevron-left'></i> Products grid</a></li>
                                    <li><a href=""><i class='bx bx-chevron-left'></i> Products list</a></li>
                                    <li><a href=""><i class='bx bx-chevron-left'></i> Product edit</a></li>

                                </ul>
                            </li>

                        </ul>
                    </div>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('button').click(function() {
                                $('.sidebar').toggleClass('fliph');
                            });
                        });
                    </script>
                </div>

                <div class="col-md-9 pl-0">
                    <div class="table-space">
                        <header id="header-vendor" class="fixed-top-vendor">
                            <div class="container d-flex align-items-center justify-content-between">
                                <h3 class="dashbord-text"> Dashboard</h3>
                                <nav class=" vendor-nav d-lg-block">
                                    <ul>
                                        <li><a href=""><i class='bx bxs-bell'></i> <span class="n-numbr">2</span></a>
                                        </li>
                                        <li><a href="#"><i class='bx bxs-conversation'></i> <span class="n-numbr">4</span></a></li>
                                        <li class="drop-down"><a href="#"><i class='bx bxs-user-circle'></i></a>
                                            <ul>
                                                <li><a href="{{ url('/servicepro/profile') }}">View profile</a></li>
                                                <li><a href="#">Drop Down </a></li>
                                                <li><a href="#">Drop Down 3</a></li>

                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </header>

                        <div class="row d-flex flex-wrap p-3">
                            <div class="col-md-3">
                                <div class="rating-das">
                                    <div class="Budget">
                                        <div class="rt">
                                            <p class="p-0">Total Booking</p>
                                            <h3>20 <small> Since last month</small></h3>
                                        </div>
                                        <div class="icon-vb">
                                            <i class='bx bx-book-content'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="rating-das">
                                    <div class="Budget">
                                        <div class="rt">
                                            <p class="p-0">Tour Booking</p>
                                            <h3>351 <small> Since last month</small></h3>
                                        </div>
                                        <div class="icon-vb">
                                            <i class='bx bxs-car'></i>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="col-md-3">
                                <div class="rating-das">
                                    <div class="Budget">
                                        <div class="rt">
                                            <p class="p-0">Total Event</p>
                                            <h3>861 <small> Since last month</small></h3>
                                        </div>
                                        <div class="icon-vb">
                                            <i class='bx bx-star'></i>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="col-md-3">
                                <div class="rating-das">
                                    <div class="Budget">
                                        <div class="rt">
                                            <p class="p-0">Total Hotel </p>
                                            <h3>15 <small> Since last month</small> </h3>
                                        </div>
                                        <div class="icon-vb">
                                            <i class='bx bx-buildings'></i>
                                        </div>
                                    </div>

                                </div>



                            </div>
                            <div class="col-md-12">
                                <table class="table table-striped mt-3">
                                    <thead>
                                        <tr>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>John</td>
                                            <td>Doe</td>
                                            <td>john@example.com</td>
                                        </tr>
                                        <tr>
                                            <td>Mary</td>
                                            <td>Moe</td>
                                            <td>mary@example.com</td>
                                        </tr>
                                        <tr>
                                            <td>July</td>
                                            <td>Dooley</td>
                                            <td>july@example.com</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




</main>
<!-- End #main -->

@endsection