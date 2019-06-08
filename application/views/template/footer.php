
<div class="row">

    <div class="col">


        <footer class="page-footer font-small elegant-color pt-4">

            <!-- Footer Links -->
            <div class="container-fluid text-center text-md-left">

                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div class="col-md-6 mt-md-0 mt-3">

                        <!-- Content -->
                        <h5 class="text-uppercase">E-Money Dream</h5>
                        <p>Your Success Is Our Achievement. Our Goal Is to Reach You To The Highest.</p>
                        <form action="/customer/subscribe" method="post" id="subs_form" class="form-inline">
                           
                            <div class="form-group mb-2">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                            </div>
                            <button type="submit" id="btn-submit-cntct" class="btn ml-2 btn-outline-primary mb-2">Subscribe</button>
                        </form>
                    </div>
                    <!-- Grid column -->

                    <hr class="clearfix w-100 d-md-none pb-3">

                    <!-- Grid column -->
                    <div class="col-md-3 mb-md-0 mb-3">

                        <!-- Links -->
                        <h5 class="text-uppercase">Follow Us</h5>

                        <ul class="list-unstyled">
                            <li>
                                <i class='fab fa-facebook-square' style='font-size:24px'></i><a class="text-info" target="new" href="https://www.facebook.com/EmoneyDream"> Facebook</a>
                            </li>
                            <li>
                                <i class='fab fa-youtube-square' style='font-size:24px'></i><a class="text-info" target="new" href="https://www.youtube.com/channel/UC7_87Azo57GFGBiWIkr7TvA">
                                    Youtube</a>
                            </li>
                            <li>
                                <i class='fab fa-google-plus-square' style='font-size:24px'></i><a class="text-info" target="new" href="https://www.google.com"> Google+</a>

                            </li>
                            <li>
                                <i class='fab fa-blogger' style='font-size:24px'></i> <a class="text-info" target="new" href="https://blog.emoneydream.com"> Blog</a>
                            </li>
                        </ul>

                    </div>
                    <!-- Grid column -->


                    <!-- Grid column -->
                    <div class="col-md-3 mb-md-0 mb-3">

                        <!-- Links -->
                        <h5 class="text-uppercase">Contact</h5>

                        <ul class="list-unstyled">
                            <li>
                                Email<br>
                                <span class="text-info">contact@emoneydream.com</span>


                            </li>
                            <li>Messenger<br>
                                <span class="text-info">E-Money Dream</span>
                            </li>
                        </ul>

                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

            </div>
            <!-- Footer Links -->

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2019 Copyright:
                <a href="htpps://www.emoneydream.com"> E-Money Dream</a>
            </div>
            <!-- Copyright -->

        </footer>
    </div>
</div>

<script>
      $(document).ready(function() {
          $("#subs_form").submit(function(e) {
              var form = $(this);
              var url = form.attr('action');

              $.ajax({
                  type: "POST",
                  url: url,
                  data: form.serialize(), // serializes the form's elements.
                  success: function(data) {
                      if (data == "SUCCESS") {
                            $("#btn-submit-cntct").attr('disabled', 'disabled');
                            $("#btn-submit-cntct").removeClass('btn-outline-primary');
                            $("#btn-submit-cntct").addClass('btn-outline-success');
                            $("#btn-submit-cntct").text("Subscribed");
                           suc();
                     
                      } else {
                        $("#btn-submit-cntct").attr('disabled', 'disabled');
                          error();

                      }

                  }
              });
              e.preventDefault(); // avoid to execute the actual submit of the form.
          });
      });


      function error(){
        Swal.fire(
              'Thanks!',
              'You Have Already Subscribed',
              'info'
          )
      }

      function suc() {
          Swal.fire(
              'Thank You!',
              'You Have Subscribed To Our Newsletter',
              'success'
          )
      }
  </script>


<script src="//code.tidio.co/e2s01pqejfek7akixaix0ku5dvlc4ujy.js"></script>
</body>

</html>