@extends('layout')

@section('title','Theme Looks Test')

@section('content')
<section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="popular">
                  <ul class="aa-product-catg">
                    @foreach ($load_products as $load_product)
                        <li>
                            <a class="aa-product-img" href="javascript:void(0)"><img src="{{asset('uploads/images')}}/{{$load_product->image}}" width="250px" height="300px"></a>
                            <h4 class="aa-product-title" style="font-weight: bold"><a href="{{ url('product/details',$load_product->id) }}">{{ $load_product->name }}</a></h4>
                        </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection
