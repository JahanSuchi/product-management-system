$(document).ready(function() {
  $('#productForm').submit(function(event) {
    event.preventDefault();

   
    let productName = $('#productName').val();
    let category = $('#category').val();
    let manufacturingDate = $('#manufacturingDate').val();
    let imageUrl = $('#imageUrl').val();

    if (productName === '' || category === '' || manufacturingDate === '' || imageUrl === '') {
      alert('Please fill in all required fields.');
      return;
    }

    // Date Validation
    let dateObj = new Date(manufacturingDate);
    if (isNaN(dateObj.getTime())) {
      alert('Invalid manufacturing date. Please enter a valid date.');
      return;
    }

   
    this.submit();
  });
});
  
  