<!DOCTYPE html>
<html>
@include('includes.head')

<body>
    @include('includes.header')
    
    <section data-bs-version="5.1" class="form5 cid-u8qz46VfTs" id="form02-1u">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 content-head">
                    <div class="mbr-section-head mb-5">
                        <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                            <strong>Book Appointment</strong></h3>

                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                    <form action="" method="post" class="mbr-form form-with-styler"
                        data-form-title="Form Name">
                        <div class="dragArea row">
                            <div class="col-md col-sm-12 form-group mb-3" data-for="name">
                                <select name="dog_id" id="dropdown" class="form-control" data-form-field="name">
                                    <option value="" disabled selected>Select Your dog name</option>
                                    @foreach($dogs as $dog)
                                        <option class="form-control" value="{{ $dog['id'] }}">
                                            {{ $dog['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md col-sm-12 form-group mb-3" data-for="email" id='' >
                                <input type="text" id="datetimepicker" placeholder="Choose date and time" name="datetime" class="form-control">
                            </div>
                                <div class="col-12 form-group mb-3" data-for="textarea">
                                    <textarea name="pickup_address" placeholder="Pick up address"
                                        data-form-field="textarea" class="form-control" id=""></textarea>
                                </div>
                                <div class="col-12 form-group mb-3" data-for="phone">
                                    <input type="tel" name="postcode" placeholder="Postcode" data-form-field="phone"
                                        class="form-control" value="" id="">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 align-center mbr-section-btn">
                                    <button type="submit" class="btn btn-primary display-7">Send message</button>
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
