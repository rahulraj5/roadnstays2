@extends('front.layout.layout')

@section('current_page_css')

@endsection
@section('current_page_js')

@endsection
@section('content')
<div class="termsbanner1">
      <img src="{{url('/')}}/resources/assets/img/{{ $list_content[0]->banner }}" alt="">

    </div>
    <section>
      <div class="container">
        <div class="row cancel-sec">
          <div class="col-md-12">
        
<h5>{{ $list_content[0]->heading }}
</h5>
{!! $list_content[0]->content !!}

          </div>
        </div>
      </div>
    </section>


@endsection