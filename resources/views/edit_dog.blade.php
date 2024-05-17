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
                            <strong>Update Dog Details</strong></h3>

                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                    <form action="{{ route('updatedog', $dog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Dog Name:</label>
                            <input type="text" id="name" name="name" value="{{ $dog->name }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="height">Height:</label>
                            <input type="text" id="height" name="height" value="{{ $dog->height }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="weight">Weight:</label>
                            <input type="text" id="weight" name="weight" value="{{ $dog->weight }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="age">Age:</label>
                            <input type="text" id="age" name="age" value="{{ $dog->age }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="notes">Description:</label>
                            <textarea id="notes" name="notes" class="form-control">{{ $dog->notes }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Dog Image:</label>
                            <input type="file" id="image" name="image" accept="image/*" class="form-control-file">
                            <img src="{{ asset('images/' . $dog->id . '/' . $dog->image) }}" alt="Dog Image"style="width:100px;">
                        </div>
                        <!-- Add input fields for other dog details as needed -->
                        <button type="submit" class="btn btn-primary">Update Dog</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @include('includes.footer')
    <input name="animation" type="hidden">
</body>

</html>
