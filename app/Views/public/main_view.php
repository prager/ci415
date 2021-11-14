<nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
            <div class="container">
                <a href="#" class="navbar-brand">Frontend Bootcamp</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navmenu">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="#learn" class="nav-link">What You'll Learn</a>
                        </li>
                        <li class="nav-item">
                            <a href="#questions" class="nav-link">Questions</a>
                        </li>
                        <li class="nav-item">
                            <a href="#instructors" class="nav-link">Instructors</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Showcase -->
        <section class="bg-dark text-light p-2 p-lg-5 text-center text-sm-start">
            <div class="container">
              <div class="row">&nbsp;</div>
                <div class="d-sm-flex align-items-center justify-content-between">
                    <div>
                        <h1>Become <span class="text-warning">a Web Developer</span> </h1>
                        <p class="lead my-4">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        </p>
                        <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#enroll">Start Enrollment</button>
                    </div>
                    <img class="img-fluid w-25 d-none d-sm-block" src="img/msg.svg" alt="">
                </div>
            </div>
        </section>

        <!--Newsletter-->
        <section class="bg-primary text-light p-5">
            <div class="container">
                <div class="d-md-flex justify-content-between align-items-center">
                    <h3 class="mb-3 mb-md-0">Signup for newsletter</h3>

                    <div class="input-group news-input">
                        <input type="text" class="form-control" placeholder="Enter Email">
                        <button class="btn btn-dark btn-lg" type="button" id="button-addon2">Button</button>
                      </div>
                </div>
            </div>
        </section>

        <!--Boxes-->
        <section class="p-5">
            <div class="container">
               <div class="row text-center g-4">
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="h1 mb-3 mt-3">
                            <i class="bi bi-laptop"></i>
                        </div>
                        <h3 class="card-title mb-3">Virtual</h3>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero nihil ipsa porro, suscipit ratione illum.
                        </p>
                        <a href="#" class="btn btn-dark mb-2">Read More</a>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-secondary text-light">
                        <div class="h1 mb-3 mt-3">
                            <i class="bi bi-person-square"></i>
                        </div>
                        <h3 class="card-title mb-3">Hybrid</h3>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero nihil ipsa porro, suscipit ratione illum.
                        </p>
                        <a href="#" class="btn btn-dark pb-2">Read More</a>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="h1 mb-3 mt-3">
                            <i class="bi bi-people"></i>
                        </div>
                        <h3 class="card-title mb-3">In Person</h3>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero nihil ipsa porro, suscipit ratione illum.
                        </p>
                        <a href="#" class="btn btn-dark mb-2">Read More</a>
                    </div>
                </div>
               </div>
            </div>
        </section>

        <!--Learn Sections-->
        <section id="learn" class="p-5">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md">
                        <img src="img/time.svg" class="img-fluid w-75" alt="">
                    </div>
                    <div class="col-md p-5">
                        <h2>Learn The Fundamentals</h2>
                        <p class="lead">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni omnis vero asperiores voluptas dolores dolorum.
                        </p>
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. At inventore unde deleniti molestias eligendi. Amet, perspiciatis architecto cupiditate eum alias, quidem explicabo adipisci molestias iure, aliquid temporibus delectus quae aspernatur!
                        </p>
                        <a href="#" class="btn btn-light mt-3">
                            <i class="bi bi-chevron-right"></i> Read More
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section id="learn" class="p-5 bg-dark text-light">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md p-5">
                        <h2>Learn The React</h2>
                        <p class="lead">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni omnis vero asperiores voluptas dolores dolorum.
                        </p>
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. At inventore unde deleniti molestias eligendi. Amet, perspiciatis architecto cupiditate eum alias, quidem explicabo adipisci molestias iure, aliquid temporibus delectus quae aspernatur!
                        </p>
                        <a href="#" class="btn btn-light mt-3">
                            <i class="bi bi-chevron-right"></i> Read More
                        </a>
                    </div>

                    <div class="col-md">
                        <img src="img/web-dev.svg" class="img-fluid w-75" alt="">
                    </div>
                </div>
            </div>
        </section>

        <!--Question Accordion-->
        <section id="questions" class="p5 mt-3">
            <div class="container">
                <h2 class="text-center mb-4">Frequently Asked Questions</h2>
                <div class="accordion accordion-flush">
                    <!--Item 1-->
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-one">
                          Where exactly are you located
                        </button>
                      </h2>
                      <div id="question-one" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#questions">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id temporibus iure praesentium consequuntur nobis quod illo facere rerum. Dolorem, neque. Asperiores fugiat dignissimos est quibusdam numquam sed non illo nulla id debitis dolorem doloremque deleniti ipsam incidunt, mollitia minus quos! Fugiat maiores fugit ullam, quas cupiditate labore numquam harum quia.
                        </div>
                      </div>
                    </div>
                    <!--Item 2-->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-two">
                            How much does it cost to attend
                          </button>
                        </h2>
                        <div id="question-two" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#questions">
                          <div class="accordion-body">
                              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id temporibus iure praesentium consequuntur nobis quod illo facere rerum. Dolorem, neque. Asperiores fugiat dignissimos est quibusdam numquam sed non illo nulla id debitis dolorem doloremque deleniti ipsam incidunt, mollitia minus quos! Fugiat maiores fugit ullam, quas cupiditate labore numquam harum quia.
                          </div>
                        </div>
                      </div>
                    <!--Item 3-->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-three">
                            What do I need to know
                          </button>
                        </h2>
                        <div id="question-three" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#questions">
                          <div class="accordion-body">
                              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id temporibus iure praesentium consequuntur nobis quod illo facere rerum. Dolorem, neque. Asperiores fugiat dignissimos est quibusdam numquam sed non illo nulla id debitis dolorem doloremque deleniti ipsam incidunt, mollitia minus quos! Fugiat maiores fugit ullam, quas cupiditate labore numquam harum quia.
                          </div>
                        </div>
                      </div>
                      <!--Item 4-->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-four">
                            How do I sign up
                          </button>
                        </h2>
                        <div id="question-four" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#questions">
                          <div class="accordion-body">
                              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id temporibus iure praesentium consequuntur nobis quod illo facere rerum. Dolorem, neque. Asperiores fugiat dignissimos est quibusdam numquam sed non illo nulla id debitis dolorem doloremque deleniti ipsam incidunt, mollitia minus quos! Fugiat maiores fugit ullam, quas cupiditate labore numquam harum quia.
                          </div>
                        </div>
                      </div>
                      <!--Item 5-->
                    <div class="accordion-item mb-5">
                        <h2 class="accordion-header" id="flush-headingOne">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-five">
                            Do Help me find a job
                          </button>
                        </h2>
                        <div id="question-five" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#questions">
                          <div class="accordion-body">
                              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id temporibus iure praesentium consequuntur nobis quod illo facere rerum. Dolorem, neque. Asperiores fugiat dignissimos est quibusdam numquam sed non illo nulla id debitis dolorem doloremque deleniti ipsam incidunt, mollitia minus quos! Fugiat maiores fugit ullam, quas cupiditate labore numquam harum quia.
                          </div>
                        </div>
                      </div>
                  </div>
            </div>
        </section>
        <section id="instructors" class="p-5 bg-primary">
            <div class="container">
                <h2 class="text-center text-white">Our Instructors</h2>
                <p class="lead text-center text-white mb-5">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia perferendis veniam quia quo. Culpa qui ullam soluta reiciendis voluptate. Fugit!
                </p>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <img src="https://randomuser.me/api/portraits/men/11.jpg" class="rounded-circle mb-3" alt=""/>
                                <h3 class="card-title mb-3">John Doe</h3>
                                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi sit nulla molestias, tenetur id ut?</p>
                                <a href="#"><i class="bi bi-twitter text-dark mx-1"></i></a>
                                <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                                <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                                <a href="#"><i class="bi bi-instagram text-dark mx-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <img src="https://randomuser.me/api/portraits/women/11.jpg" class="rounded-circle mb-3" alt=""/>
                                <h3 class="card-title mb-3">Jane Doe</h3>
                                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi sit nulla molestias, tenetur id ut?</p>
                                <a href="#"><i class="bi bi-twitter text-dark mx-1"></i></a>
                                <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                                <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                                <a href="#"><i class="bi bi-instagram text-dark mx-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <img src="https://randomuser.me/api/portraits/men/12.jpg" class="rounded-circle mb-3" alt=""/>
                                <h3 class="card-title mb-3">Sam Smith</h3>
                                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi sit nulla molestias, tenetur id ut?</p>
                                <a href="#"><i class="bi bi-twitter text-dark mx-1"></i></a>
                                <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                                <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                                <a href="#"><i class="bi bi-instagram text-dark mx-1"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <img src="https://randomuser.me/api/portraits/women/12.jpg" class="rounded-circle mb-3" alt=""/>
                                <h3 class="card-title mb-3">Sara Smith</h3>
                                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi sit nulla molestias, tenetur id ut?</p>
                                <a href="#"><i class="bi bi-twitter text-dark mx-1"></i></a>
                                <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                                <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                                <a href="#"><i class="bi bi-instagram text-dark mx-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="p-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md">
                        <h2 class="text-center mb-4">Contact Info</h2>
                        <ul class="list-group list-group-flush lead">
                            <li class="list-group-item">
                                <span class="fw-bold">Main location: </span>50 Main Street Boston MA 012345
                            </li>
                            <li class="list-group-item">
                                Enrollment phone: </span>001-021-1234
                            </li>
                            <li class="list-group-item">
                                Enrollment email: </span>enroll@email.com
                            </li>
                            <li class="list-group-item">
                                Student email: </span>student@email.com
                            </li>
                        </ul>
                    </div>
                    <div class="col-md">
                       <div id="map">

                        </div>
                    </div>
                </div>
            </div>
        </section>
