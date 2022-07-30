@extends('layout')

@section('title', 'Theme Looks Test')

@section('content')
    <section id="aa-product-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-product-details-area">
                        <div class="aa-product-details-content">
                            <div class="row">
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <div class="aa-product-view-slider">
                                        <div id="demo-1" class="simpleLens-gallery-container">
                                            <div class="simpleLens-container">
                                                <div class="simpleLens-big-image-container"><a
                                                        data-lens-image="{{ asset('uploads/images') }}/{{ $productInfo['0']->image }}"
                                                        class="simpleLens-lens-image"><img
                                                            src="{{ asset('uploads/images') }}/{{ $productInfo['0']->image }}"
                                                            class="simpleLens-big-image" width="450px" height="300px"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal view content -->
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <div class="aa-product-view-content">
                                        <h3 style="color: orange;font-weight:700">{{ $productInfo['0']->name }}</h3>
                                        <div class="aa-price-block">
                                            <span class="aa-product-view-price" style="color: orange;font-weight:500;font-size:22px">{{ $productInfo['0']->product_attributes['0']->price }} Tk.</span>
                                        </div>
                                        <h4>Size</h4>
                                        {{-- Unique Size --}}
                                        @php $sizes = []; @endphp
                                            @foreach ($productInfo['0']->product_attributes as $product_attr)
                                                @php
                                                    $sizes[] = $product_attr->size;
                                                    $sizes = array_unique($sizes);
                                                @endphp
                                        @endforeach
                                        {{-- Unique Size --}}

                                        <div class="aa-prod-view-size">
                                            @foreach ($sizes as $size)
                                                <span onclick="details('{{ $productInfo['0']->id }}','{{ $size }}'); scrollDown()"><a href="javascript:void(0)">{{ strtoupper($size) }}</a></span>
                                            @endforeach
                                        </div>
                                        <div class="aa-prod-view-bottom">
                                            <a class="aa-add-to-cart-btn" href="javascript:void(0)">Add To Cart</a>
                                            <a class="aa-add-to-cart-btn" href="javascript:void(0)">Wishlist</a>
                                            <a class="aa-add-to-cart-btn" href="javascript:void(0)">Compare</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="aa-product-details-bottom">
                            <ul class="nav nav-tabs">
                                <li><a>More About The Product</a></li>
                            </ul>
                            <div class="tab-content" id="content">
                                <table class="table" id="attr_tbl">

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        function details(pid,size){
            $("#attr_tbl").empty();
            var p_id = pid;
            var p_size = size;
            $.ajax({
                url : "{{url('product/sizeBasedProductDetails')}}",
                type : "get",
                data : {productId:p_id,productSize:p_size},
                success : function(result){
                    var html = '<thead><th>Gender</th><th>Color</th><th>Size</th><th>Price</th></thead><tbody></tbody>';
                    $.each(result.data,function(key,val){
					html += '<tr><td>'+val.gender+'</td><td>'+val.color+'</td><td>'+val.size+'</td><td>'+val.price+'Tk.</td></tr>';
				});
                $("#attr_tbl").append(html);
                }
            });
        }

        function scrollDown(){
            const element = document.getElementById("content");
            element.scrollIntoView();
        }
    </script>

@endsection
