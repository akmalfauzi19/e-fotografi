 <!-- Scripts -->
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
 <script src="{{ asset('admin/assets/js/main.js') }}"></script>

 <!--  Chart js -->
 <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>
 <script src="{{ asset('admin/assets/js/init/chartjs-init.js') }}"></script>
 <!--Chartist Chart-->
 <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
 <script src="{{ asset('admin/assets/js/init/weather-init.js') }}"></script>

 <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
 <script src="{{ asset('admin/assets/js/init/fullcalendar-init.js') }}"></script>
 <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>

 {{-- ckeditor --}}

 <script>
     ClassicEditor
         .create(document.querySelector('.ckeditor'))
         .then(editor => {
             console.log(editor);
         })
         .catch(error => {
             console.error(error);
         });

 </script>

 {{-- end ckeditor --}}

 {{-- modal --}}
 <script>
     jQuery(document).ready(function($) {
         $('#mymodal').on('show.bs.modal', function(e) {
             var button = $(e.relatedTarget);
             var modal = $(this);

             modal.find('.modal-body').load(button.data("remote"));
             modal.find('.modal-title').html(button.data("title"));

         });
     });

 </script>



 <div class="modal" id="mymodal" tabindex="-1" role="dialog">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
                 <h5 class="modal-title text-center"></h5>
             </div>
             <div class="modal-body">
                 <center>
                     <i class="fa fa-spinner fa-spin"></i>
                 </center>
             </div>
         </div>
     </div>
 </div>
 {{-- end modal --}}

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

 {{-- paginate ajax --}}
 <script type="text/javascript">
     $(window).on('hashchange', function() {
         if (window.location.hash) {
             var page = window.location.hash.replace('#', '');
             if (page == Number.NaN || page <= 0) {
                 return false;
             } else {
                 getData(page);
             }
         }
     });

     $(document).ready(function() {
         $(document).on('click', '.pagination a', function(event) {
             event.preventDefault();

             $('li').removeClass('active');
             $(this).parent('li').addClass('active');

             var myurl = $(this).attr('href');
             var page = $(this).attr('href').split('page=')[1];

             getData(page);
         });

     });

     function getData(page) {
         $.ajax({
             url: '?page=' + page,
             type: "get",
             datatype: "html"
         }).done(function(data) {
             $("#tag_container").empty().html(data);
             location.hash = page;
         }).fail(function(jqXHR, ajaxOptions, thrownError) {
             alert('No response from server');
         });
     }

 </script>
 {{-- end paginate ajax --}}
