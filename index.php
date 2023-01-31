<?php
  include "./header.php";
?>

            <div id="navbar" class="navbar-collapse collapse pull-right">
              <ul class="nav navbar-nav">
                <li><a class="is-active" href="index.php">HOME</a></li>
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="gallery.php">GALLERY</a></li>
                <li><a href="contact.php">CONTACT</a></li>
              </ul>
            </div>
            <!-- /#navbar -->
          </div>
          <!-- /.container -->
        </div>
        <!-- /.navbar-main -->
      </nav>
    </header>
    <!-- /. main-header -->

    <!-- Carousel
    ================================================== -->
    <div
      id="homeCarousel"
      class="carousel slide carousel-home"
      data-ride="carousel"
    >
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#homeCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#homeCarousel" data-slide-to="1"></li>
        <li data-target="#homeCarousel" data-slide-to="2"></li>
      </ol>

      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img
            src="./assets/images/carousel/c1.jpg"
            alt=""
          />

          <div class="container">
            <div class="carousel-caption">
              <h2 class="carousel-title bounceInDown animated slow">
                Our help is much needed
              </h2>
              <h4 class="carousel-subtitle bounceInUp animated slow">
                Let's come together to support them
              </h4>
              <a
                href="#"
                class="btn btn-lg btn-secondary hidden-xs bounceInUp animated slow"
                data-toggle="modal"
                data-target="#donateModal"
                >DONATE NOW</a
              >
            </div>
            <!-- /.carousel-caption -->
          </div>
        </div>
        <!-- /.item -->

        <div class="item">
          <img
            src="./assets/images/carousel/c2.jpg"
            alt=""
          />

          <div class="container">
            <div class="carousel-caption">
              <h2 class="carousel-title bounceInDown animated slow">
                We come together to ipmrove lives
              </h2>
              <h4 class="carousel-subtitle bounceInUp animated slow">
                So you can join us!
              </h4>
              <a
                href="#"
                class="btn btn-lg btn-secondary hidden-xs bounceInUp animated"
                data-toggle="modal"
                data-target="#donateModal"
                >DONATE NOW</a
              >
            </div>
            <!-- /.carousel-caption -->
          </div>
        </div>
        <!-- /.item -->

        <div class="item">
          <img
            src="./assets/images/carousel/c3.jpg"
            alt=""
          />

          <div class="container">
            <div class="carousel-caption">
              <h2 class="carousel-title bounceInDown animated slow">
                Give a penny to help those who need it, however little it is.
              </h2>
              <h4 class="carousel-subtitle bounceInUp animated slow">
                That's all that makes the diffrence!
              </h4>
              <a
                href="#"
                class="btn btn-lg btn-secondary hidden-xs bounceInUp animated slow"
                data-toggle="modal"
                data-target="#donateModal"
                >DONATE NOW</a
              >
            </div>
            <!-- /.carousel-caption -->
          </div>
        </div>
        <!-- /.item -->
      </div>

      <a
        class="left carousel-control"
        href="#homeCarousel"
        role="button"
        data-slide="prev"
      >
        <span class="fa fa-angle-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a
        class="right carousel-control"
        href="#homeCarousel"
        role="button"
        data-slide="next"
      >
        <span class="fa fa-angle-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!-- /.carousel -->

    <div class="section-home about-us fadeIn animated">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <div class="about-us-col">
              <div class="col-icon-wrapper">
                <img src="assets/images/icons/our-mission-icon.png" alt="" />
              </div>
              <h3 class="col-title">our mission</h3>
              <div class="col-details">
                <p>
                  To make a difference by supporting humanity through charity
                </p>
              </div>
              <a href="#programs" class="btn btn-secondary"> Read more </a>
            </div>
          </div>

          <div class="col-md-3 col-sm-6">
            <div class="about-us-col">
              <div class="col-icon-wrapper">
                <img src="assets/images/icons/make-donation-icon.png" alt="" />
              </div>
              <h3 class="col-title">Donations</h3>
              <div class="col-details">
                <p>
                  Donations help us support orphans to improve their dreams and
                  make the world a better place for them
                </p>
              </div>
              <a
                href="#"
                data-toggle="modal"
                data-target="#donateModal"
                class="btn btn-secondary"
              >
                Donate
              </a>
            </div>
          </div>

          <div class="col-md-3 col-sm-6">
            <div class="about-us-col">
              <div class="col-icon-wrapper">
                <img src="assets/images/icons/help-icon.png" alt="" />
              </div>
              <h3 class="col-title">Help & support</h3>
              <div class="col-details">
                <p>
                  We support orphans by enabling them get education, food,
                  healthcare and human rights.
                </p>
              </div>
              <a href="#programs" class="btn btn-secondary"> Read more </a>
            </div>
          </div>

          <div class="col-md-3 col-sm-6">
            <div class="about-us-col">
              <div class="col-icon-wrapper">
                <img src="assets/images/icons/programs-icon.png" alt="" />
              </div>
              <h3 class="col-title">our programs</h3>
              <div class="col-details">
                <p>
                  We provide programs that give orphans access to education,
                  healthcare and help improve their creativity and inovation
                </p>
              </div>
              <a href="#programs" class="btn btn-secondary"> Read more </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.about-us -->

    <div class="section-home home-reasons">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="reasons-col animate-onscroll fadeIn">
              <img
                src="./assets/images/together_1.jpg"
                alt=""
              />

              <div class="reasons-titles">
                <h3 class="reasons-title">Together We Stand</h3>
                <h5 class="reason-subtitle">For all humans</h5>
              </div>

              <div class="on-hover hidden-xs">
                <p>
                  Supporting orphans requires a multi-faceted approach that
                  addresses the various challenges they face in terms of health,
                  nutrition, education, human rights, and equality. By providing
                  orphans with the resources and support they need to succeed,
                  we can help ensure that they have the best possible chance at
                  a successful future.
                </p>
                <p>
                  Have you ever donated to an orphanage? Maybe you’ve been
                  inspired by stories of helpless, hungry orphans fending for
                  themselves being ‘saved’ by a benevolent institution. If you
                  haven’t donated to an orphanage yourself, you probably know
                  someone who has.
                </p>

                <p>
                  We hope to bring the best everyday to the lives of every child
                  in the world. Everyone deserves the oportunity to get all that
                  there is for all humans. We support vulnarable orphans and
                  help prtect their future. You are welcomed to join us change
                  lives because every life matter.
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="reasons-col animate-onscroll fadeIn">
              <img
                src="./assets/images/love_care.jpg"
                alt=""
              />

              <div class="reasons-titles">
                <h3 class="reasons-title">We Give Love And Care</h3>
                <h5 class="reason-subtitle">For all humans</h5>
              </div>

              <div class="on-hover hidden-xs">
                <p>
                  The good news is that those of us working on the ground are
                  determinded to help children acheive their goals through a
                  well formed and loving community. We all want the best for
                  these vulnerable children. But we must ensure that we are
                  giving our best to them. The simultaneously simple and complex
                  solution is funding.
                </p>

                <p>
                  Funding communities at the root level, to support care reform,
                  to enhance child protection and strengthen families, to
                  promote the right of children to grow up in families… All this
                  relies upon the money that is so generously given ending up in
                  the right place.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.home-reasons -->

    <div class="section-home our-causes animate-onscroll fadeIn" id="programs">
      <div class="container">
        <h2 class="title-style-1">
          Our Programs <span class="title-under"></span>
        </h2>

        <div class="row">
          <div class="col-md-3 col-sm-6">
            <div class="cause">
              <img
                src="./assets/images/health_nutrition.jpg"
                alt=""
                class="cause-img"
              />

              <h4 class="cause-title"><a href="#">HEALTH AND NUTRITION</a></h4>
              <div class="cause-details">
                One key aspect of supporting orphans is providing them with
                access to quality healthcare and nutrition. This can include
                regular check-ups and vaccinations, as well as providing
                nutritious food to help them grow and develop properly
              </div>
            </div>
            <!-- /.cause -->
          </div>

          <div class="col-md-3 col-sm-6">
            <div class="cause">
              <img
                src="./assets/images/educatiion_1.jpg"
                alt=""
                class="cause-img"
              />

              <h4 class="cause-title">
                <a href="#">EDUCATION FOR ALL</a>
              </h4>
              <div class="cause-details">
                Additionally, providing education and training opportunities is
                critical to helping orphans develop the skills they need to
                succeed in life. This can include basic literacy and numeracy
                skills, as well as educational programs that help prepare them
                for the workforce.
              </div>
            </div>
            <!-- /.cause -->
          </div>

          <div class="col-md-3 col-sm-6">
            <div class="cause">
              <img
                src="./assets/images/rights_4.jpg"
                alt=""
                class="cause-img"
              />

              <h4 class="cause-title"><a href="#">HUMAN RIGHTS</a></h4>
              <div class="cause-details">
                An important aspect of supporting orphans is ensuring that they
                have access to their human rights and are treated with equality.
                This includes protecting orphans from abuse and neglect, and
                providing equal opportunities and access to resources.
              </div>
            </div>
            <!-- /.cause -->
          </div>

          <div class="col-md-3 col-sm-6">
            <div class="cause">
              <img
                src="./assets/images/rights.jpg"
                alt=""
                class="cause-img"
              />

              <h4 class="cause-title"><a href="#">EQUALITY FOR ALL </a></h4>
              <div class="cause-details">
                Equality is an essential aspect of supporting orphans, as it
                ensures that they have equal opportunities and access to
                resources regardless of their background. This includes
                protecting orphans from discrimination and bias.
              </div>
            </div>
            <!-- /.cause -->
          </div>
        </div>
      </div>
    </div>
    <!-- /.our-causes -->

    <?php
      include "./footer.php";
    ?>
    <!-- main-footer -->

    <!-- Donate Modal -->
    <div
      class="modal fade"
      id="donateModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="donateModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="donateModalLabel">DONATE NOW</h4>
          </div>
          <div class="modal-body">
            <form class="form-donation">
              <h3 class="title-style-1 text-center">
                Thank you for your donation <span class="title-under"></span>
              </h3>

              <div class="row">
                <div class="form-group col-md-12">
                  <input
                    type="text"
                    class="form-control"
                    id="amount"
                    placeholder="AMOUNT"
                  />
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                  <input
                    type="text"
                    class="form-control"
                    name="firstName"
                    placeholder="First name*"
                  />
                </div>

                <div class="form-group col-md-6">
                  <input
                    type="text"
                    class="form-control"
                    name="lastName"
                    placeholder="Last name*"
                  />
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                  <input
                    type="text"
                    class="form-control"
                    name="email"
                    placeholder="Email*"
                  />
                </div>

                <div class="form-group col-md-6">
                  <input
                    type="text"
                    class="form-control"
                    name="phone"
                    placeholder="Phone"
                  />
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-12">
                  <input
                    type="text"
                    class="form-control"
                    name="address"
                    placeholder="Address"
                  />
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-12">
                  <textarea
                    cols="30"
                    rows="4"
                    class="form-control"
                    name="note"
                    placeholder="Additional note"
                  ></textarea>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-12">
                  <button
                    type="submit"
                    class="btn btn-secondary pull-right"
                    name="donateNow"
                  >
                    DONATE NOW
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.modal -->

    <!--  Scripts
    ================================================== -->

    <!-- jQuery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
      window.jQuery ||
        document.write(
          '<script src="assets/js/jquery-1.11.1.min.js"><\/script>'
        );
    </script>

    <!-- Bootsrap javascript file -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- owl carouseljavascript file -->
    <script src="assets/js/owl.carousel.min.js"></script>

    <script src="assets/js/main.js"></script>
  </body>
</html>
