<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/ico" />

    <title>Manandhar Sudip</title>

    <!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

    <!-- Datatables -->
    <link href="{{ asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.cs') }}s" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="home" class="site_title"><i class="fa fa-paw"></i> <span>{{Auth::user()->name}}</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ asset('uploads/pp/'.$info[0]->pp ) }}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>MS</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="home">Dashboard</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-info-circle"></i> Information <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="perInfo">Basic Info.</a></li>
                      <li><a href="contact">Contact Info.</a></li>
                      <li><a href="education">Education</a></li>
                      <li><a href="skill">Skills</a></li>
                      <li><a href="workingexp">Working Experience</a></li>
                      <li><a href="smedia">Social Medias</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Works and Blogs<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="workcategory">Work Category</a></li>
                      <li><a href="work">Works</a></li>
                      <li><a href="blog">Blogs</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-envelope"></i> Reviews & Messages<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="review">Client Reviews</a></li>
                      <li><a href="message">Messages</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tablesDynamic">Table Dynamic</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                </form>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('uploads/pp/'.$info[0]->pp ) }}" alt="">{{Auth::user()->name}}
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="perInfo"> Profile</a>
                      <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a>
                    <a class="dropdown-item"  href="{{route('logout')}}" 
                          onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                            </form>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">{{$mess->count()}}</span>
                  </a>
                  
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    @foreach($mess as $mes)
                      <li class="nav-item">
                        <a class="dropdown-item" href="message">
                          <span class="image"><img src="{{ asset('uploads/pp/'.$info[0]->pp ) }}" alt="Profile Image" /></span>
                          <span>
                            <span>{{explode(" ",$mes->name)[0]}}</span>
                            <span class="time">{{date('M d, Y h:m a', strtotime($mes->created_at))}}</span>
                          </span>
                          <span class="message">
                                {{substr($mes->message,0,10).'...'}}
                          </span>
                        </a>
                      </li>
                    @endforeach

                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item" href="message">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('vendors/DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('js/custom.min.js') }}"></script>


    <!-- for personal Info. -->
    <script type="text/javascript">
          //  for the modal(form)
            function editInfo(element){
              //console.log(element);
              console.log(element);
              var perInfo = $(element).data("perinfo");
              if(typeof(perInfo) != "object"){
                  perInfo = JSON.parse(perInfo);
              }
              $('#fullname').val(perInfo[0].name);
              $('#profession').val(perInfo[0].profession);
              $('#quote').val(perInfo[0].quote);
              $('#bio').val(perInfo[0].bio);
              $('#id').val(perInfo[0].id);

              //to show previously added image
              var image_id1 = perInfo[0].pp;
              if (image_id1!=''){
                var path1 = "<?php echo asset('uploads/pp/') ?>"+'/'+image_id1;
              }else{
                var path1 = "<?php echo asset('uploads/')?>"+'/'+'noimg.png';
              }
              var image_id2 = perInfo[0].cp;
              if (image_id2!=''){
                var path2 = "<?php echo asset('uploads/cp/') ?>"+'/'+image_id2;
              }else{
                var path2 = "<?php echo asset('uploads/')?>"+'/'+'noimg.png';
              }
              $('#ppimgid img').attr("src",path1);
              $('#cpimgid img').attr("src",path2);
              showModal();
            }
            
            function showModal(){
              $('.modal').modal();
            }

            //for the thumbnail
              document.getElementById("pp").onchange = function () {
                var reader = new FileReader();

                reader.onload = function (e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("ppthumbnail").src = e.target.result;
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            };
            //for the thumbnail
            document.getElementById("cp").onchange = function () {
                var reader = new FileReader();

                reader.onload = function (e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("cpthumbnail").src = e.target.result;
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            };
    </script>

  <!-- for social media -->
    <script type='text/javascript'>
          function addMedia(){
              $('#title').html('Add Media');
              $('#medianame').val("");
              $('#link').val("");
              $('#iconname').val("");
              $('#id').removeAttr('value');
              // console.log(media);
              showModal2();
            }
          function editMedia(element){
              console.log(element);
              var media = $(element).data("media");
              if(typeof(media) != "object"){
                  media = JSON.parse(media);
              }
              $('#title').html('Edit Media');
              $('#medianame').val(media.name);
              $('#link').val(media.link);
              $('#iconname').val(media.iconname);
              $('#id').val(media.id);
              console.log(media);
              showModal2();
            }
            function showModal2(){
              $('.modal').modal();
            }
    </script>

    <!-- for contact infos. -->
    <script type='text/javascript'>
          function addContact(){
              $('#title').html('Add Contact Information');
              $('#name').val("");
              $('#contents').val("");
              $('#iconname').val("");
              $('#id').removeAttr('value');
              // console.log(contact);
              showModal3();
            }
          function editContact(element){
              console.log(element);
              var contact = $(element).data("contact");
              if(typeof(contact) != "object"){
                  contact = JSON.parse(contact);
              }
              $('#title').html('Edit Contact Information');
              $('#name').val(contact.name);
              $('#contents').val(contact.content);
              $('#iconname').val(contact.iconname);
              $('#id').val(contact.id);
              console.log(contact);
              showModal3();
            }
            function showModal3(){
              $('.modal').modal();
            }
    </script>

    <!-- for academic qualifications -->
    <script type='text/javascript'>
          function addEducation(){
              $('#title').html('Add Academic Qualification');
              $('#startyear').val("");
              $('#endyear').val("");
              $('#qualifications').val("");
              $('#institute').val("");
              $('#boarduni').val("");
              $('#description').val("");
              $('#gpa').val("");
              $('#id').removeAttr('value');
              // console.log(contact);
              showModal4();
            }
          function editEducation(element){
              console.log(element);
              var education = $(element).data("education");
              if(typeof(education) != "object"){
                  education = JSON.parse(education);
              }
              $('#title').html('Edit Academic Qualification');
              $('#startyear').val(education.startyear);
              $('#endyear').val(education.endyear);
              $('#qualifications').val(education.qualification);
              $('#institute').val(education.institute);
              $('#boarduni').val(education.boarduni);
              $('#description').val(education.description);
              $('#gpa').val(education.gpa);
              $('#id').val(education.id);
              // console.log(education);
              showModal4();
            }
            function showModal4(){
              $('.modal').modal();
            }
    </script>

    <!-- for skills infos. -->
    <script type='text/javascript'>
          function addSkill(){
              $('#title').html('Add Skill');
              $('#skillname').val("");
              $('#skilltype').val("");
              $('#skillpercent').val("");
              $('#id').removeAttr('value');
              // console.log(contact);
              showModal5();
            }
          function editSkill(element){
              // console.log(element);
              var skill = $(element).data("skill");
              if(typeof(skill) != "object"){
                  skill = JSON.parse(skill);
              }
              $('#title').html('Edit Skill');
              $('#skillname').val(skill.skillname);
              $('#skilltype').val(skill.skilltype);
              $('#skillpercent').val(skill.skillpercent);
              $('#id').val(skill.id);
              // console.log(skill);
              showModal5();
            }
            function showModal5(){
              $('.modal').modal();
            }
    </script>

    <!-- for working experience -->
    <script type='text/javascript'>
          function addWorkingexp(){
              $('#title').html('Add Working Experience');
              $('#startyear').val("");
              $('#endyear').val("");
              $('#institute').val("");
              $('#post').val("");
              $('#description').val("");
              $('#id').removeAttr('value');
              // console.log(contact);
              showModal6();
            }
          function editWorkingexp(element){
              // console.log(element);
              var workingexp = $(element).data("workingexp");
              if(typeof(workingexp) != "object"){
                  workingexp = JSON.parse(workingexp);
              }
              $('#title').html('Edit Working Experience');
              $('#startyear').val(workingexp.startyear);
              $('#endyear').val(workingexp.endyear);
              $('#institute').val(workingexp.institute);
              $('#post').val(workingexp.post);
              $('#description').val(workingexp.description);
              $('#id').val(workingexp.id);
              // console.log(workingexp);
              showModal6();
            }
            function showModal6(){
              $('.modal').modal();
            }
    </script>
    <!-- for WorkCategory -->
    <script type="text/javascript">
          //  for the modal(form)
          function addWorkCat(){
              $('#title').html('Add Work Category');
              $('#catname').val("");
              $('#description').val("");
              var path1 = "<?php echo asset('uploads/')?>"+'/'+'insert.jpg';
              $('#imgid img').attr("src",path1);
              $('#id').removeAttr('value');
              // console.log(contact);
              showModal7();
            }
            function editWorkCat(element){
              //console.log(element);
              // console.log(element);
              var workcat = $(element).data("workcat");
              if(typeof(workcat) != "object"){
                  workcat = JSON.parse(workcat);
              }
              $('#title').html('Edit Work Category');
              $('#catname').val(workcat.catname);
              $('#description').val(workcat.description);
              $('#id').val(workcat.id);

              //to show previously added image
              var image_id1 = workcat.catimage;
              if (image_id1!=''){
                var path1 = "<?php echo asset('uploads/workCat/') ?>"+'/'+image_id1;
              }else{
                var path1 = "<?php echo asset('uploads/')?>"+'/'+'noimg.png';
              }
              $('#imgid img').attr("src",path1);
              showModal7();
            }
            
            function showModal7(){
              $('.modal').modal();
            }

            //for the thumbnail
              document.getElementById("catimage").onchange = function () {
                var reader = new FileReader();

                reader.onload = function (e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("thumbnail").src = e.target.result;
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            };
    </script>
    <!-- for Work -->
    <script type="text/javascript">
          //  for the modal(form)
          function addWork(){
              $('#title').html('Add Work');
              $('#wtitle').val("");
              $('#content').val("");
              $('#link').val("");
              $('#featured').val("");
              $('#categoryid').val("");
              var path1 = "<?php echo asset('uploads/')?>"+'/'+'insert.jpg';
              $('#imgid img').attr("src",path1);
              $('#id').removeAttr('value');
              // console.log(contact);
              showModal8();
            }
            function editWork(element){
              // console.log(element);
              var work = $(element).data("work");
              if(typeof(work) != "object"){
                  work = JSON.parse(work);
              }
              console.log(work);
              $('#title').html('Edit Work');
              $('#wtitle').val(work.title);
              $('#categoryid').val(work.categoryid);
              $('#featured').val(work.featured);
              $('#link').val(work.link);
              $('#content').val(work.content);
              $('#id').val(work.id);

              //to show previously added image
              var image_id1 = work.workimage;
              if (image_id1!=''){
                var path1 = "<?php echo asset('uploads/work/') ?>"+'/'+image_id1;
              }else{
                var path1 = "<?php echo asset('uploads/')?>"+'/'+'noimg.png';
              }
              $('#imgid img').attr("src",path1);
              showModal8(work.content);
            }
            
            function showModal8(data=""){
              ckeditor(data);
              $('.modal').modal();
            }

            //for the thumbnail
              document.getElementById("workimage").onchange = function () {
                var reader = new FileReader();

                reader.onload = function (e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("thumbnail").src = e.target.result;
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            };
    </script>
    <!-- for Blogs -->
    <script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>

    
    <script type="text/javascript">
            // var content = $('#content').val();    //for content for while editing
            // ckeditor(content);

            function ckeditor(data=""){
              $('.ck').remove();
              ClassicEditor
              .create( document.querySelector( '#content' ) )
              .then( editor => {
                  editor.setData(data);
              } )
              .catch( error => {
                  console.error( error );
              } );
            }
          //  for the modal(form)
          function addBlog(){
              $('#title').html('Add Blog');
              $('#blogtitle').val("");
              $('#content').val("");
              $('#featured').val("");
              $('#categoryid').val("");
              var path1 = "<?php echo asset('uploads/')?>"+'/'+'insert.jpg';
              $('#imgid img').attr("src",path1);
              $('#id').removeAttr('value');
              // console.log(contact);
              showModal9();
            }
            function editBlog(element){
              //console.log(element);
              // console.log(element);
              var blog = $(element).data("blog");
              if(typeof(blog) != "object"){
                  blog = JSON.parse(blog);
              }
              $('#title').html('Edit Blog');
              $('#blogtitle').val(blog.blogtitle);
              $('#categoryid').val(blog.categoryid);
              $('#featured').val(blog.featured);
              $('#content').val(blog.content);
              $('#id').val(blog.id);

              //to show previously added image
              var image_id1 = blog.blogimage;
              if (image_id1!=''){
                var path1 = "<?php echo asset('uploads/blog/') ?>"+'/'+image_id1;
              }else{
                var path1 = "<?php echo asset('uploads/')?>"+'/'+'noimg.png';
              }
              $('#imgid img').attr("src",path1);
              showModal9(blog.content);
            }
            
            function showModal9(data=""){
              ckeditor(data);
              $('.modal').modal();
            }

            //for the thumbnail
              document.getElementById("blogimage").onchange = function () {
                var reader = new FileReader();

                reader.onload = function (e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("thumbnail").src = e.target.result;
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            };
    </script>

     <!-- for client reviews -->
     <script type='text/javascript'>
          function addReview(){
              $('#title').html('Add Review');
              $('#name').val("");
              $('#post').val("");
              $('#company').val("");
              $('#review').val("");
              $('#email').val("");
              $('#workid').val("");
              $('#id').removeAttr('value');
              // console.log(contact);
              showModal10();
            }
          function editReview(element){
              // console.log(element);
              var review = $(element).data("review");
              if(typeof(review) != "object"){
                  review = JSON.parse(review);
              }
              $('#title').html('Edit Review');
              $('#name').val(review.name);
              $('#email').val(review.email);
              $('#company').val(review.company);
              $('#post').val(review.post);
              $('#review').val(review.review);
              $('#workid').val(review.workid);
              $('#id').val(review.id);
              // console.log(review);
              showModal10();
            }
            function showModal10(){
              $('.modal').modal();
            }
    </script>
    <!-- for messages -->
    <script type='text/javascript'>
          function addMessage(){
              $('#title').html('Add Message');
              $('#name').val("");
              $('#email').val("");
              $('#message').val("");
              $('#id').removeAttr('value');
              // console.log(contact);
              showModal11();
            }
          function editMessage(element){
              // console.log(element);
              var message = $(element).data("message");
              if(typeof(message) != "object"){
                  message = JSON.parse(message);
              }
              $('#title').html('Edit Message');
              $('#name').val(message.name);
              $('#email').val(message.email);
              $('#message').val(message.message);
              $('#id').val(message.id);
              // console.log(message);
              showModal11();
            }
            function showModal11(){
              $('.modal').modal();
            }
    </script>
  </body>
</html>
