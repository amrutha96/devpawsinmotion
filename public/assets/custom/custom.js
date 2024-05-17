
function appendDiv() {
    var container = document.getElementById('dog_container');
    // var newDiv = document.createElement('div');
    // newDiv.classList.add('single_dog_card');
    // container.append(newDiv);
    container.insertAdjacentHTML('beforeend', '<div class="single_dog_card">' + 
    '<div class="col-md col-sm-12 form-group mb-3" data-for="name"> '+ 
    '<input type="text" name="name[]" placeholder="Name" data-form-field="name" class="form-control" value="" id="" required>' +
    '</div>'+
    '<div class="col-md col-sm-12 form-group mb-3" data-for="email">'+
    '<input type="text" name="height[]" placeholder="Height" data-form-field="email" class="form-control" value="" required>'+
    '</div>'+
    '<div class="col-12 form-group mb-3" data-for="phone">'+
    '<input type="text" name="weight[]" placeholder="Weight" data-form-field="phone" class="form-control" value="" id="" required>' +
    '</div>' +
    '<div class="col-12 form-group mb-3" data-for="phone">'+
    '<input type="text" name="age[]" placeholder="Age" data-form-field="phone" class="form-control" value="" id="" required>'+
    '</div>'+
    '<div class="col-12 form-group mb-3" data-for="phone">'+
    '<label>Add your dog picture</label>'+
    '<input type="file" name="image[]" placeholder="Image" data-form-field="phone"  class="form-control" value="" id="" required>'+
    '</div>'+
    '<div class="col-12 form-group mb-3" data-for="textarea">'+
    '<textarea name="textarea[]" placeholder="Please describe your dog"  data-form-field="textarea" class="form-control" id="" required></textarea>'+
    '</div>' + 
    '<button class="btn btn-primary" onclick="removeDiv(this)">-</button> ' +
    '</div>');
  }
  function removeDiv(button) {
    var container = button.parentNode;

    // Remove the container from the document
    container.parentNode.removeChild(container);
  }
  flatpickr("#datetimepicker", {
    enableTime: true, // Enable time selection
    altInput: true,
    minDate: "today",
    dateFormat: "d-m-Y H:i", // Customize the date and time format as needed
    altFormat: "F j, Y H:i"
});

