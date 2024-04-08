<!DOCTYPE html>
<html  >
    @include('includes.head')
<body>
    @include('includes.header')

<section data-bs-version="5.1" class="form03 cid-u8jNEwd2mZ" id="form03-1k">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg item-wrapper">
                <div class="mbr-section-head mb-5">
                    <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                        <strong>Login</strong></h3>
                    
                </div>
                <div class="col-lg-12 mx-auto mbr-form" data-form-type="formoid">
                    <form action="{{ route('authenticate') }}" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name">
                        @csrf
                        <div class="dragArea row">
                            
                            <div class="col-md col-sm-12 form-group mb-3 mb-3" data-for="email">

                                <input type="email" name="email" placeholder="E-mail" data-form-field="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                            </div>
                            <div class="col-12 form-group mb-3 mb-3" data-for="password">
                                <input type="password" name="password" placeholder="Password" data-form-field="phone" class="form-control @error('password') is-invalid @enderror" id="password">
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                            </div>
                            
                            <div class="col-lg-12 col-md-12 col-sm-12 align-center mbr-section-btn"><button type="submit" class="btn btn-primary display-7">
                                    Login</button></div>
                        </div>
                    </form>
                </div>


            </div>
            <div class="col-12 col-lg-6">
                <div class="image-wrapper">
                    <img class="w-100" src="assets/images/mbr-1256x1125.png" alt="Mobirise Website Builder">
                </div>
            </div>

        </div>
    </div>
</section>

@include('includes.footer')
  
  
  <input name="animation" type="hidden">
  </body>
</html>