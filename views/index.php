
<h1 class="the-title">PHP Test Application</h1>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by city" title="JS Search">
<table id="myTable" class="table table-striped">
	<thead class "thead-dark">
		<tr>
			<th scope="col">Name</th>
			<th scope="col">E-mail</th>
			<th scope="col">City</th>
                        <th scope="col">Number</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($users as $user){?>
		<tr>
			<td scope="row"><?=$user->getName()?></td>
			<td scope="row"><?=$user->getEmail()?></td>
			<td scope="row"><?=$user->getCity()?></td>
                        <td scope="row"><?=$user->getNumber()?></td>
		</tr>
		<?php }?>
	</tbody>
</table>

<form id="contact-form" class="needs-validation ajax" novalidate="">
	<div class="form-group">
			<div class="col-7">
				<label for="name" class="col-sm-2 col-form-label col-form-label-lg">Name:</label>
				<input name="name" class="form-control form-control-lg" placeholder="Name" input="text" id="name" required>
				<div class="valid-feedback">Valid.</div>
				<div class="invalid-feedback">Please enter your name.</div>
	     </div>



			<div class="col-7">
				<label for="email" class="col-sm-2 col-form-label col-form-label-lg">E-mail:</label>
				<input name="email" class="form-control form-control-lg" input="text" placeholder="Email" id="email" required>
				<div class="valid-feedback">Valid.</div>
				<div class="invalid-feedback">Please enter your email.</div>
			</div>

			<div class="col-7">
				<label for="city" class="col-sm-2 col-form-label col-form-label-lg">City:</label>
				<input name="city" class="form-control form-control-lg" placeholder="City" input="text" id="city" required>
				<div class="valid-feedback">Valid.</div>
				<div class="invalid-feedback">Please enter your city.</div>
			</div>

		<div class="col-7">
			<label for="number" class="col-sm-2 col-form-label col-form-label-lg">Phone-number:</label>
			<input name="number" class="form-control form-control-lg" placeholder="Phone Numer" input="text" id="number" required>
			<div class="valid-feedback">Valid.</div>
			<div class="invalid-feedback">Please enter your phone number.</div>
		</div>
		<button style="display: block;" class="btn btn-primary mb-2">Create new row</button>
	</div>

</form>

<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

// submit form with ajax
$('form#contact-form').on('submit', function(event){
	event.preventDefault();
	var form_data = $(this).serialize(); 
	$.ajax({
		url : 'create.php',
		type: 'POST',
		data : form_data
	}).done(function(response){
		console.log("Response received");
	});
});
</script>
