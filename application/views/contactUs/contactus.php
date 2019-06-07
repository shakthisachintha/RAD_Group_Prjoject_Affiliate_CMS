 


  <div class="row sticky-top">
      <div class="col">
          <!-- Navigation Pane -->
          <nav class="navbar navbar-expand-md navbar-dark elegant-color-dark shadow-lg mb-4">
              <a class="navbar-brand" href="https://www.emoneydream.com"><img src="../Images/favicon.png" style="width:20px;" alt="E-Money Dream">&nbsp;E-Money
                  Dream</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                  <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="collapsibleNavbar">
                  <ul class="navbar-nav">
                      <li class="nav-item">
                          <a class="nav-link" href="/">Home</a>
                      </li>
                      <li class="nav-item active">
                          <a class="nav-link" href="#top">Contact</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="/about">About</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link disabled" href="#">Support</a>
                      </li>
                  </ul>

                  <ul class="navbar-nav ml-auto">
                      <li class="nav-item">
                          <div style="display: inline-flex;">
                              <?php if ($this->session->userdata('logged_in')) : ?>
                                  <a href=/user/profile/<?= $this->session->userdata('userid') ?> class="text-success btn nav-link"><?= $this->session->userdata('name') ?></a>
                                  <a href=/user/logout class="text-light small btn nav-link">Logout</a>

                              <?php else : ?>
                                  <a class="btn text-success nav-link" data-toggle="modal" data-target="#login_modal">Login</a>
                                  <a class="btn text-warning nav-link" data-toggle="modal" data-target="#reg_modal">Register</a>
                              <?php endif; ?>

                              <a class="nav-link" target="new" href="https://www.facebook.com/EmoneyDream"><i class='fab fa-facebook-square' style='font-size:24px'></i></a>&nbsp;&nbsp;
                              <a class="nav-link" target="new" href="https://www.google.com"><i class='fab fa-google-plus-square' style='font-size:24px'></i></a>&nbsp;&nbsp;
                              <a class="nav-link" target="new" href="https://www.youtube.com/channel/UC7_87Azo57GFGBiWIkr7TvA"><i class='fab fa-youtube-square' style='font-size:24px'></i></a>&nbsp;&nbsp;
                              <a class="nav-link" target="new" href="https://www.mybloglk.com"><i class='fab fa-blogger' style='font-size:24px'></i></a>
                          </div>

                      </li>
                  </ul>

              </div>
          </nav>
      </div>
  </div>


  <script>
      $(document).ready(function() {
          $("#contact_form").submit(function(e) {
              var form = $(this);
              var url = form.attr('action');

              $.ajax({
                  type: "POST",
                  url: url,
                  data: form.serialize(), // serializes the form's elements.
                  success: function(data) {
                      if (data == "SUCCESS") {

                          $("#Name").removeClass("border border-danger");
                          $("#Email").removeClass("border border-danger");
                          $("#Phone").removeClass("border border-danger");
                          $("#Msg").removeClass("border border-danger");
                          $("#btn-submit").removeClass("btn-danger");

                          suc();
                          $("#btn-submit").removeClass("btn-primary");
                          $("#btn-submit").addClass("btn-success");
                          $("#btn-submit").val(status);
                          $("#Name").addClass("border-success");
                          $("#Email").addClass("border-success");
                          $("#Phone").addClass("border-success");
                          $("#Msg").addClass("border-success");
                          $("#btn-submit").val("Message Sent");
                          $("#btn-submit").prop('disabled', true);
                          $("#Name").prop('disabled', true);
                          $("#Email").prop('disabled', true);
                          $("#Phone").prop('disabled', true);
                          $("#Msg").prop('disabled', true);

                      } else {
                          error();
                          $("#btn-submit").addClass("btn-danger");
                          $("#btn-submit").val("Sent Failed..Try Again");

                          $("#Name").addClass("border border-danger");
                          $("#Email").addClass("border border-danger");
                          $("#Phone").addClass("border border-danger");
                          $("#Msg").addClass("border border-danger");
                      }

                  }
              });
              e.preventDefault(); // avoid to execute the actual submit of the form.
          });
      });


      function error(){
        Swal.fire(
              'Sorry!',
              'Your Feedback Could Not Be Sent',
              'error'
          )
      }

      function suc() {
          Swal.fire(
              'Thank You!',
              'Your Feedback Has Been Sent',
              'success'
          )
      }
  </script>


  <div class="row">
      <div class="mx-auto col-md-7">
          <div class="container-fluid">
              <div align=center class="mx-auto">
                  <img class="mx-auto" src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact" />
              </div>

              <form id="contact_form" method="post" action="/customer/contactUs">
                  <h2 id="head" class="text-dark" align=center><b>Drop Us a Message</b></h2><br>
                  <div class="row">
                      <div class="col-md-6">


                          <?php if ($this->session->userdata('logged_in')) : ?>

                              <div class="form-group">
                                  <label for="Name">Your Name</label>
                                  <input name="name" type="text" required id="Name" class="form-control rounded-4" readonly value="<?= $this->session->userdata('name') ?>" />
                              </div>
                              <div class="form-group">
                                  <label for="Email">Your Email</label>
                                  <input name="email" type="email" required id="Email" class="form-control" readonly value="<?= $this->session->userdata('email') ?>" />
                              </div>
                          <?php else : ?>
                              <div class="form-group">
                                  <label for="Name">Your Name*</label>
                                  <input name="name" type="text" required id="Name" class="form-control rounded-4" />
                              </div>
                              <div class="form-group">
                                  <label for="Email">Your Email*</label>
                                  <input name="email" type="email" required id="Email" class="form-control" />
                              </div>

                          <?php endif; ?>
                          <div class="form-group">
                              <label for="Phone">Your Phone Number</label>
                              <input type="tel" name="phone" id="Phone" class="form-control" value="" />
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="Msg">Your Message*</label>
                              <textarea id="Msg" name="msg" class="form-control" required style="width: 100%; height: 156px;"></textarea>
                          </div>
                          <div class="form-group">
                              <input type="submit" id="btn-submit" class="btn btn-primary rounded-4" value="Send Message" />
                          </div>
                      </div>
                  </div>
              </form>
              <br>

          </div>
      </div>

      <div class=" mx-auto col-md-3">
          <div>
              <H2 class="text-dark">FOLLOW US</H2>
              <br>
              <h6>Facebook</h6>
              <div class="fb-page" data-href="https://www.facebook.com/EmoneyDream/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                  <blockquote cite="https://www.facebook.com/EmoneyDream/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/EmoneyDream/">E-Money
                          Dream</a></blockquote>
              </div>

              <br>
              <br>
              <h6>Youtube</h6>

              <div>
                  <script src="https://apis.google.com/js/platform.js"></script>

                  <div class="g-ytsubscribe" data-channelid="UC7_87Azo57GFGBiWIkr7TvA" data-layout="full" data-count="default"></div>

              </div>
          </div>


      </div>

  </div>
  <br>