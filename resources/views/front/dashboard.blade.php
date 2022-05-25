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
    $("#imageUpload").change(function() {
        readURL(this);
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
                                    <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                    <label for="imageUpload"> <i class="bx bx-pencil"></i></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2 class="usern"> krshna patel</h2>
                        <ul>
                            <li><a href="#"><i class='bx bx-user'></i> <span> Profile </span></a> </li>
                            <li><a href="#"><i class='bx bxs-detail'></i><span> Login Details </span></a> </li>
                            <li><a href="#"><i class='bx bx-copy-alt'></i><span> Save Travellers </span></a> </li>
                            <li><a href="#"><i class='bx bx-reply'></i><span> Logout </a> </span></li>
                        </ul>


                    </div>

                </div>
                <div class="col-md-9">
                    <div class="sider-page">
                        <div class="top-dash">
                            <div class="">
                                <h3> Profile </h3>
                                <p> Basic info, for a faster booking experience</p>
                                
                            </div> <button type="button" class="prifle"> <i class='bx bx-edit-alt'></i> Edit</button>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label>User Id</label>
                            </div>
                            <div class="col-md-6">
                                <p>Kshiti123</p>
                            </div>
                        </div>
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
                                <p>123 456 7890</p>
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