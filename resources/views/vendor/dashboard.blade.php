@extends('vendor.layout.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')
<style>
    /*.container-fluid{
        padding-right: 0px !important;
        padding-left: 0px !important;
    }*/
</style>
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


                        <div class="row d-flex flex-wrap p-3 content-body">
                            <div class="col-md-3">
                                <div class="rating-das">
                                    <div class="Budget">
                                        <div class="rt">
                                            <p class="p-0">Total Booking</p>
                                            <h3>{{ $total_booking}} <small> Since last month</small></h3>
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
                                            <p class="p-0">Total Tour</p>
                                            <h3>{{ $total_tour}} <small> Since last month</small></h3>
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
                                            <p class="p-0">Total Space</p>
                                            <h3>{{ $total_space}} <small> Since last month</small></h3>
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
                                            <h3>{{ $total_hotel}} <small> Since last month</small> </h3>
                                        </div>
                                        <div class="icon-vb">
                                            <i class='bx bx-buildings'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped mt-3">
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