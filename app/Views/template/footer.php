<!-- Footer -->
       <footer class="p-5 bg-dark text-white text-center position-relative">
           <div class="container">
               <p class="lead">Copyright &copy; 2021 Frontend Bootcamp</p>
               <a href="#" class="position-absolute bottom-0 end-0 p-5">
                   <i class="bi bi-arrow-up-circle h1"></i>
               </a>
           </div>
       </footer>


       <!-- Modal -->
       <div class="modal fade" id="enroll" tabindex="-1" aria-labelledby="enrollLabel" aria-hidden="true">
           <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                   <p class="lead">Fill out this form and we will get back to you</p>
                   <form>
                       <div class="mb-3">
                           <label for="first-name" class="col-form-label">
                               First Name
                           </label>
                           <input type="text" class="form-control" id="first-name"/>
                       </div>
                       <div class="mb-3">
                           <label for="last-name" class="col-form-label">
                               Last Name
                           </label>
                           <input type="text" class="form-control" id="last-name"/>
                       </div>
                       <div class="mb-3">
                           <label for="email" class="col-form-label">
                               Email
                           </label>
                           <input type="text" class="form-control" id="email"/>
                       </div>
                       <div class="mb-3">
                           <label for="phone" class="col-form-label">
                               Phone
                           </label>
                           <input type="text" class="form-control" id="phone"/>
                       </div>
                   </form>
               </div>
               <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               <button type="button" class="btn btn-primary">Save changes</button>
               </div>
           </div>
           </div>
       </div>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
       <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
       <script>
           mapboxgl.accessToken = 'pk.eyJ1IjoibGVob3MyNCIsImEiOiJja3ZxM29qMDBlbzRmMnBtbmRsNTg4cHY3In0.aRRDqiYJVURWAR3hfX0-1g';
           var map = new mapboxgl.Map({
           container: 'map',
           style: 'mapbox://styles/mapbox/streets-v11',
           center: [-122.021819, 37.987936],
           zoom: 12,
           });
       </script>
   </body>
</html>
