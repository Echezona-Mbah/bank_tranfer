  <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="asset/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="asset/vendors/chart.js/Chart.min.js"></script>
<script src="asset/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="asset/vendors/flot/jquery.flot.js"></script>
<script src="asset/vendors/flot/jquery.flot.resize.js"></script>
<script src="asset/vendors/flot/jquery.flot.categories.js"></script>
<script src="asset/vendors/flot/jquery.flot.fillbetween.js"></script>
<script src="asset/vendors/flot/jquery.flot.stack.js"></script>
<script src="asset/vendors/flot/jquery.flot.pie.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="asset/js/off-canvas.js"></script>
<script src="asset/js/hoverable-collapse.js"></script>
<script src="asset/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="asset/js/dashboard.js"></script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Include this script after jQuery -->
<script>
  $(document).ready(function () {
      $('#currencySelector').on('change', function () {
          updateDisplay($(this).val());
      });
  });

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  function updateDisplay(selectedCurrency) {
      console.log("Selected Currency: " + selectedCurrency);

      $.ajax({
          type: 'POST',
          url: '/get-conversion-rate',
          data: { selectedCurrency: selectedCurrency },
          beforeSend: function(xhr) {
              xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
          },
          success: function(response) {
              const conversionRate = response.conversionRate;

              // Update the displayed amount
              $('.amount').each(function() {
                  const originalAmount = parseFloat($(this).data('amount'));
                  const convertedAmount = originalAmount * conversionRate;
                  $(this).find('.displayAmount').text(convertedAmount.toFixed(2));
              });

              // Update the displayed currency code
              $('.displayCode').text(selectedCurrency);
          },
          error: function(error) {
              console.log("Error:", error);
          }
      });
  }
</script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- In your dashboard view, below the notification element -->
<script>
  $(document).ready(function () {
      var notification = $('#updateAccountNotification');
      notification.slideDown(); // Slide down animation

      // Optionally, hide the notification after a delay
      setTimeout(function () {
          notification.slideUp(); // Slide up animation
      }, 5000); // Hide the notification after 5 seconds (adjust as needed)
  });
</script>


<!-- End custom js for this page -->
</body>

<!-- Mirrored from themewagon.github.io/Breeze-Free-Bootstrap-Admin-Template/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2024 15:55:55 GMT -->
</html>