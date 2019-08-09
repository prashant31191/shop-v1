<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- SLICK -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />
    <!-- SLICK -->

<style>
    body {
        padding-top: 20px;        
    }
    
</style>
<title>Test Products</title>

<div class="container">    
    <div class="col">
        <div class="row">
            @foreach ($products as $product)
               
                <div class="col-lg-3 col-md-5 mb-4">
                    <div class="card h-100">

                        {{-- <a href="#"><img class="card-img-top" src="{{ $product->images->first() }}"></a> --}}

                        <div class="carousel">
                            @foreach ($product->images as $image)     
                                <img src="{{$image}}">                
                            @endforeach                                                   
                        </div>

                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">{{ $product->name }}</a>
                            </h4>
                            <h5>MDL {{ $product->price }}</h5>
                        </div>

                    </div>
                </div>            

            @endforeach

        </div>
    </div>
</div>

<!-- SLICK -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<!-- SLICK -->

<script>
    $(document).ready(function(){
        $('.carousel').slick({
            dots: true,
            arrows: false
        //setting-name: setting-value
        });
    });
</script>
