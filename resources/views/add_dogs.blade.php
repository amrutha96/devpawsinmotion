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
                            <strong>Register your dogs</strong></h3>

                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                    <form action="{{ route('add_dogs') }}" method="post"
                        class="mbr-form form-with-styler" data-form-title="Form Name" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
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
    <section data-bs-version="5.1" class="form5 cid-u8qz46VfTs" style="background-color: white;">
        <div class="container">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Sl. No</th>
                        <th>Dog nane</th>
                        <th>Height</th>
                        <th>Weight</th>
                        <th>Age</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th colspan="2">Edit/Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $serial = 1;
                    @endphp
                    @if($dogs)
                        @foreach($dogs as $dog)
                            <tr>
                                <td>{{ $serial++ }}</td>
                                <td>{{ $dog->name }}</td>
                                <td>{{ $dog->height }}
                                </td>
                                <td>{{ $dog->weight }}</td>
                                <td>{{ $dog->age }}</td>
                                <td>{{ $dog->notes }}</td>
                                <td><img src="{{ asset('images/' . $dog->id . '/' . $dog->image) }}" alt="Dog Image" height="75px" width="75px"></td>
                                <td> <a href="{{ route('editdog', $dog->id) }}"
                                        class="btn btn-primary">Edit</a></td>
                                <td>
                                    <form
                                        action="{{ route('deletedog', $dog->id) }}"
                                        method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this dog details?')">
                                            <i class="fas fa-trash-alt" style="color: #dd1d1d;"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td> You have no dogs registered</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </section>
    @include('includes.footer')


    <input name="animation" type="hidden">
</body>

</html>
