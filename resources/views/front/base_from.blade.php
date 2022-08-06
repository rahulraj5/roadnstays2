@extends('front.layout.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')

@endsection

@section('current_page_js')
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
            </div>

            

            

        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</main>
@endsection