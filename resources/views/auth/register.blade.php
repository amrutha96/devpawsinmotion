<!DOCTYPE html>
<html  >
    @include('includes.head')
<body>
    @include('includes.header')
  

<section data-bs-version="5.1" class="form5 cid-u8jXWcFKaQ" id="form02-1o">
    
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 content-head">
                <div class="mbr-section-head mb-5">
                    <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                        <strong>Register</strong></h3>
                    
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                <form action= "{{ route('store') }}" method="post" class="mbr-form form-with-styler" data-form-title="Form Name">
                    @csrf
                        <div class="dragArea row">
                        <div class="col-md col-sm-12 form-group mb-3" data-for="name">
                            <input type="text" placeholder="First Name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="col-md col-sm-12 form-group mb-3" data-for="lastname">
                            <input type="text" placeholder="Lastname" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" value="{{ old('lastname') }}">
                            @if ($errors->has('lastname'))
                                <span class="text-danger">{{ $errors->first('lastname') }}</span>
                            @endif
                        </div>
                        <div class="col-12 form-group mb-3" data-for="email">
                            <input type="email"  placeholder="Email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="col-12 form-group mb-3" data-for="phone">
                            <input type="text" placeholder="Phone" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" value="{{ old('contact') }}">
                            @if ($errors->has('contact'))
                                <span class="text-danger">{{ $errors->first('contact') }}</span>
                            @endif
                        </div>
                        <div class="col-12 form-group mb-3" data-for="textarea">
                            <textarea type="text" placeholder="Address" class="form-control @error('address_line1') is-invalid @enderror" id="address_line1" name="address_line1" value="{{ old('address_line1') }}"></textarea>
                            @if ($errors->has('address_line1'))
                                <span class="text-danger">{{ $errors->first('address_line1') }}</span>
                            @endif
                        </div>
                        <div class="col-12 form-group mb-3" data-for="address_line2">
                            <input type="text" placeholder="City/Town" class="form-control @error('address_line2') is-invalid @enderror" id="address_line2" name="address_line2" value="{{ old('address_line2') }}">
                            @if ($errors->has('address_line2'))
                                <span class="text-danger">{{ $errors->first('address_line2') }}</span>
                            @endif
                        </div>
                        <div class="col-12 form-group mb-3" data-for="phone">
                            <input type="text" placeholder="Postcode" class="form-control @error('postcode') is-invalid @enderror" id="postcode" name="postcode" value="{{ old('postcode') }}">
                            @if ($errors->has('postcode'))
                                <span class="text-danger">{{ $errors->first('postcode') }}</span>
                            @endif
                        </div>
                        <div class="col-12 form-group mb-3" data-for="phone">
                            <input type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="col-12 form-group mb-3" data-for="phone">
                            <input type="password" class="form-control" placeholder="Password confirmation" id="password_confirmation" name="password_confirmation">
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 align-center mbr-section-btn">
                            <button type="submit" class="btn btn-primary display-7">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@include('includes.footer')
  
  
  <input name="animation" type="hidden">
  </body>
</html>