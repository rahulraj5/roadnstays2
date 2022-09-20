@extends('front.layout.layout')
<!-- @section('title', 'User - Profile') -->
@section('current_page_css')

@endsection

@section('current_page_js')
@endsection

@section('content')

<main id="main" style="padding-top: 77px; background-color: #f6f6f6;">

<div class="termsbanner">
      <img src="{{url('/')}}/resources/assets/img/{{ $list_content[0]->banner }}" alt="">

    </div>
    <section>
      <div class="container">
        <div class="row terms-sec">
          <div class="col-md-12">
<h5>{{ $list_content[0]->heading }}
</h5>
{!! $list_content[0]->content !!}
          </div>
        </div>
      </div>
    </section>



</main>
<!-- End #main -->


@endsection