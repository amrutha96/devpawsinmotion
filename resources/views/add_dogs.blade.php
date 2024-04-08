<!DOCTYPE html>
<html>
@include('includes.head')

<body>
    @include('includes.header')

    <section data-bs-version="5.1" class="form5 cid-u8lGwfqMGi" id="form02-1r">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 content-head">
                    <div class="mbr-section-head mb-5">
                        <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                            <strong>Add your dog</strong></h3>

                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                    <form action= "{{ route('add_dogs') }}" method="post" class="mbr-form form-with-styler"
                        data-form-title="Form Name" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value = "{{Auth::id()}}">
                        <div class="dragArea row">
                            <div id="dog_container">
                                <div class="single_dog_card" id="single_dog_card">
                                    <div class="col-md col-sm-12 form-group mb-3" data-for="name">
                                        <input type="text" name="name[]" placeholder="Name" data-form-field="name"
                                            class="form-control" value="" id="" required>
                                    </div>
                                    <div class="col-md col-sm-12 form-group mb-3" data-for="email">
                                        <input type="text" name="height[]" placeholder="Height" data-form-field="email"
                                            class="form-control" value="" required>
                                    </div>
                                    <div class="col-12 form-group mb-3" data-for="phone">
                                        <input type="text" name="weight[]" placeholder="Weight" data-form-field="phone"
                                            class="form-control" value="" id="" required>
                                    </div>
                                    <div class="col-12 form-group mb-3" data-for="phone">
                                        <input type="text" name="age[]" placeholder="Age" data-form-field="phone"
                                            class="form-control" value="" id="" required>
                                    </div>
                                    <div class="col-12 form-group mb-3" data-for="phone">
                                        <label>Add your dog picture</label>
                                        <input type="file" name="image[]" placeholder="Image" data-form-field="phone"
                                            class="form-control" value="" id="" required>
                                    </div>
                                    <div class="col-12 form-group mb-3" data-for="textarea">
                                        <textarea name="textarea[]" placeholder="Please describe your dog"
                                            data-form-field="textarea" class="form-control" id="" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" onclick="appendDiv()">+</button>
                            <div class="col-lg-12 col-md-12 col-sm-12 align-center mbr-section-btn"><button
                                    type="submit" class="btn btn-primary display-7">Save</button></div>
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
