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

        <div class="container">

            <div class="row">

                <div class="col-md-3">

                    <div class="user-bar">

                        <div class="profle-img">

                            <div class="avatar-upload">

                                <div class="avatar-edit">

                                    <form method="post" id="form-image" enctype="multipart/form-data">



                                        <input type='file' name="imageUpload" id="imageUpload" accept=".png, .jpg, .jpeg" />

                                        <label for="imageUpload"> <i class="bx bx-pencil"></i></label>

                                    </form>

                                </div>

                                <div class="avatar-preview">

                                    @if(is_null(Auth::user()->profile_pic))

                                    <div id="imagePreview" style="background-image: url('{{ asset('/public/img/user1.jpg') }}');"></div>

                                    @else

                                    <div id="imagePreview" style="background-image: url('{{ asset('/public/uploads/profile_img/'.Auth::user()->profile_pic) }}');"></div>

                                    @endif

                                </div>

                            </div>

                        </div>

                        <h2 class="usern"> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h2>

                        <ul>

                            <li><a href="#"><i class='bx bx-user'></i> <span> Profile </span></a> </li>

                            <li><a href="#"><i class='bx bxs-detail'></i><span> Change Password </span></a> </li>

                            <li><a href="#"><i class='bx bx-copy-alt'></i><span> Save Travellers </span></a> </li>



                            @if(Auth::check())

                            @if(Auth::user()->user_type == "normal_user")

                            <li><a href="{{ route('user.logout') }}"><i class='bx bx-reply'></i><span> Logout </a> </span></li>

                            @elseif(Auth::user()->user_type == "service_provider")

                            <li><a href="{{ route('servicepro.logout') }}"><i class='bx bx-reply'></i><span> Logout </a> </span></li>

                            @else

                            @endif

                            @endif

                        </ul>





                    </div>



                </div>

                <div class="col-md-9">

                    <div class="sider-page">

                        <div class="top-dash">

                            <div class="">

                                <h3> Profile </h3>

                                <p> Basic info, for a faster booking experience</p>



                            </div> <a href="" data-toggle="modal" data-target="#profileModal-edit"><button type="button" class="prifle"> <i class='bx bx-edit-alt'></i> Edit</button></a>

                        </div>



                        <!-- <div class="row">

                            <div class="col-md-6">

                                <label>User Id</label>

                            </div>

                            <div class="col-md-6">

                                <p>RNS{{ Auth::user()->id }}</p>

                            </div>

                        </div> -->

                        <div class="row">

                            <div class="col-md-6">

                                <label>Name</label>

                            </div>

                            <div class="col-md-6">

                                <p>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <label>Email</label>

                            </div>

                            <div class="col-md-6">

                                <p>{{ Auth::user()->email }}</p>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <label>Phone</label>

                            </div>

                            <div class="col-md-6">

                                <p>{{ Auth::user()->contact_number }}</p>

                            </div>

                        </div>

                        <div class="row">

                           <div class="col-md-6">

                               <label>Address</label>

                           </div>

                           <div class="col-md-6">

                               <p>
                                   {{ Auth::user()->address }} @if(!empty(Auth::user()->user_city)),@endif {{ Auth::user()->user_city }} @if(!empty(Auth::user()->state_id)),@endif {{ Auth::user()->state_id }} @if(!empty(Auth::user()->user_country)),@endif {{ Auth::user()->user_country }} @if(!empty(Auth::user()->postal_code)),@endif {{ Auth::user()->postal_code }} 
                                  
                                </p>

                           </div>

                        </div>



                    </div>



                </div>

            </div>

        </div>





    </section>









</main>

<!-- End #main -->





<!-- profile update modal -->

<div class="modal fade" id="profileModal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div id="LoginForm">

                <div class="col-md-12">

                    <div class="container">

                        <div class="login-form">

                            <div class="main-div">

                                <div class="panel">

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                        <span aria-hidden="true">&times;</span>

                                    </button>

                                    <h2 class="user-lo">Edit Profile</h2>

                                    <p>Please Update details:</p>

                                </div>

                                <form id="profileUpdate_form" method="POST">

                                    @csrf

                                    <div class="form-group">

                                        <input type="text" class="form-control" name="puname" id="puname" value="{{ Auth::user()->first_name }}" placeholder="Full name">

                                    </div>

                                    <div class="form-group">

                                        <input type="email" class="form-control" name="puemail" id="puemail" value="{{ Auth::user()->email }}" placeholder="Email Address" readonly />

                                    </div>

                                    <div class="form-group">

                                        <input type="number" class="form-control" name="puphone_no" id="puphone_no" value="{{ Auth::user()->contact_number }}" placeholder="Mobile number">

                                    </div>

                                    <div class="form-group">

                                        <input type="text" class="form-control" name="city" id="city" value="{{ Auth::user()->user_city }}" placeholder="City">

                                    </div>

                                    <div class="form-group">

                                        <input type="text" class="form-control" name="state" id="state" value="{{ Auth::user()->state_id }}" placeholder="State">

                                    </div>

                                    <div class="form-group">

                                        <input type="text" class="form-control" name="country" id="country" value="{{ Auth::user()->user_country }}" placeholder="Country">

                                    </div>

                                    <div class="form-group">

                                        <input type="text" class="form-control" name="address" id="address" value="{{ Auth::user()->address }}" placeholder="Address">

                                    </div>

                                    <div class="form-group">

                                        <input type="text" class="form-control" name="zip_code" id="zip_code" value="{{ Auth::user()->postal_code }}" placeholder="Postal Code">

                                    </div>

                                    <!-- <div class="form-group">

                                        <input type="password" class="form-control" name="pupassword" id="pupassword" placeholder="Password">

                                    </div>

                                    <div class="form-group">

                                        <input type="password" class="form-control" name="puconfirm_password" id="puconfirm_password" placeholder="Confirm password">

                                    </div> -->

                                    <button type="submit" class="btn btn-primary">Update</button>

                                </form>

                            </div>

                        </div>

                    </div>
                </div>



            </div>

        </div>

    </div>

</div>



@endsection