<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('location: login.php');
}
include 'inc/connect.php';
$user_id = $_SESSION['user_id'];
$sz = "SELECT * FROM users WHERE id='$user_id'";
$sb = $db->prepare($sz);
$sb->execute([$user_id]);
$sa = $sb->fetch();


$sw = "SELECT * FROM session WHERE user_id='$user_id'";
$sp = $db->prepare($sw);
$sp->execute([$user_id]);
$ss = $sp->fetch();


$se = "SELECT * FROM chat WHERE sid='$user_id'";
$sh = $db->prepare($se);
$sh->execute([$user_id]);
$sd = $sh->fetch();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>XMessenger </title>
  <meta name="description" content="#">
  <link rel="stylesheet" href="dist/css/grayshift.min.css">
  <link rel="stylesheet" href="dist/css/swipe.min.css">
  <!-- <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
  <div class="d-flex flex-column flex-lg-row">
    <nav class="navside navside-expand-lg sticky-top order-2 order-lg-0">
      <div class="container">
        <a class="d-none d-lg-inline" rel="home" href="index.php">
          <i class="eva-xl" data-eva="message-circle-outline" data-eva-animation="pulse"></i>
        </a>
        <ul class="nav navside-nav" role="tablist" aria-orientation="vertical">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#channels" role="tab" aria-controls="channels" aria-selected="true">
              <i class="eva-md" data-eva="message-square" data-eva-animation="pulse"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#friends" role="tab" aria-controls="friends" aria-selected="false">
              <i class="eva-md" data-eva="people" data-eva-animation="pulse"></i>
            </a>
          </li>
          <li class="nav-item flex-lg-grow-1">
            <a class="nav-link" data-toggle="tab" href="#notifications" role="tab" aria-controls="notifications" aria-selected="false">
              <i class="eva-md" data-eva="bell" data-eva-animation="pulse"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">
              <i class="eva-md" data-eva="settings" data-eva-animation="pulse"></i>
            </a>
          </li>
          <li class="nav-item d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="eva-md" data-eva="bulb" data-eva-animation="pulse"></i>
            </a>
          </li>
          <li class="nav-item d-none d-lg-block">
            <a href="javascript:void()" id="logout" style="cursor: pointer;">
              <img  class="avatar avatar-md status status-online h8 bg-danger rounded-circle" src="uploads/<?php echo $sa->image;?>">
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="sidebar sidebar-expand-lg order-1 order-lg-0">
      <div class="container py-5 px-lg-5">


        <form>
          <div class="input-group">
            <div class="input-group-prepend">
              <i data-eva="search"></i>
            </div>
            <input class="form-control form-control-lg" type="search" placeholder="Search" aria-label="Search">
          </div>
        </form>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="channels" role="tabpanel">
            <ul class="nav nav-tabs nav-justified nav-sm mt-3" role="tablist" aria-orientation="horizontal">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#chat" role="tab" aria-controls="chat" aria-selected="true">Message</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#active" role="tab" aria-controls="active" aria-selected="false">Active</a>
              </li>
            </ul>
            <hr class="mb-0">
            <div class="tab-content">
              <div class="tab-pane fade show active" id="chat" role="tabpanel">
                 <?php
                  $sl = mysqli_query($con, "SELECT * FROM chat  GROUP BY chatid");
                  while ($l = mysqli_fetch_assoc($sl)) {
                    $chatid = $l['chatid'];
                    // echo $chatid;
                     // $sp = mysqli_query($con, "SELECT * FROM chat WHERE chatid = '$chatid' GROUP BY chatid");
                  // while ($p = mysqli_fetch_assoc($sp)) {
                  //   echo $p['rid'];
                  ?>
                <a onclick="getchat(<?php echo $l['user_id'];?>)" data-toggle="tab">
                <div class="channel">
                  <span class="avatar avatar-sm status status-online mr-3 bg-danger rounded-circle">jd</span>
                  <div class="flex-grow-1">
                    <div class="d-flex align-items-center mb-3">
                      <h6 class="mr-auto"><?php echo $l['username']  ?></h6>
                      <p class="ml-3">Today</p>
                    </div>
                    <p class="text"><?php  ?></p>
                  </div>
                </div>
                </a>
                <?php 
                  }
                // }
               ?>
              </div>
              <div class="tab-pane fade" id="active" role="tabpanel">
                <div id="online">
                  <!-- Active users appers here -->
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="friends" role="tabpanel">
            <h3 class="my-5">Friends</h3>
            <hr class="mb-0">
              <div id="onact">
                <!-- Active Friends appers here -->
              </div>
          </div>
          <div class="tab-pane fade" id="notifications" role="tabpanel">
            <h3 class="my-5">Notifications</h3>
            <hr class="mb-0">
            <div class="d-flex align-items-center align-items-lg-start py-5 border-bottom">
              <span class="icon mr-3 bg-neutral rounded-circle">
                <i data-eva="person-done" data-eva-width="20" data-eva-height="20"></i>
              </span>
              <p>The quick brown fox jumps over the lazy dog.</p>
            </div>
          </div>
          <div class="tab-pane fade" id="settings" role="tabpanel">
            <h3 class="my-5">Settings</h3>
            <hr class="mb-0">
            <div id="accordionOne">
              <div class="accordion-item">
                <div class="accordion-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" role="button" aria-expanded="false" aria-controls="collapseOne">
                  <div class="mr-auto">
                    <h6 class="mb-1 lh-150">My Account</h6>
                    <p>Configure your preferences.</p>
                  </div>
                  <i data-eva="arrow-ios-forward"></i>
                  <i data-eva="arrow-ios-downward"></i>
                </div>
                <div class="collapse" id="collapseOne" data-parent="#accordionOne" aria-labelledby="headingOne">
                  <div class="accordion-body">
                    <form method="POST">
                      <label for="name">Name</label>
                      <input class="form-control form-control-lg mb-5" id="name" type="text" placeholder="Name">
                      <label for="email">Email</label>
                      <input class="form-control form-control-lg mb-5" id="email" type="email" placeholder="Email Address">
                      <label for="address">Mobile No.</label>
                      <input class="form-control form-control-lg mb-5" id="address" type="text" placeholder="Address">
                      <label for="biography">Bio</label>
                      <textarea class="form-control mb-5" id="biography" rows="3" placeholder="Tell us a little about yourself"></textarea>
                      <button class="btn btn-block btn-lg btn-danger" type="submit">Apply changes</button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <div class="accordion-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" role="button" aria-expanded="false" aria-controls="collapseTwo">
                  <div class="mr-auto">
                    <h6 class="mb-1 lh-150">Privacy & Safety</h6>
                    <p>Configure your preferences.</p>
                  </div>
                  <i data-eva="arrow-ios-forward"></i>
                  <i data-eva="arrow-ios-downward"></i>
                </div>
                <div class="collapse" id="collapseTwo" data-parent="#accordionOne" aria-labelledby="headingTwo">
                  <div class="accordion-body">
                    <form>
                      <label for="currentPassword">Current Password</label>
                      <input class="form-control form-control-lg mb-5" id="currentPassword" type="password" placeholder="Current Password">
                      <label for="newPassword">New Password</label>
                      <input class="form-control form-control-lg mb-5" id="newPassword" type="password" placeholder="New Password">
                      <label for="repeatPassword">Repeat Password</label>
                      <input class="form-control form-control-lg mb-5" id="repeatPassword" type="password" placeholder="Repeat Password">
                      <button class="btn btn-block btn-lg btn-danger" type="submit">Apply changes</button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <div class="accordion-header" id="headingThree" data-toggle="collapse" data-target="#collapseThree" role="button" aria-expanded="false" aria-controls="collapseThree">
                  <div class="mr-auto">
                    <h6 class="mb-1 lh-150">Notifications</h6>
                    <p>Configure your preferences.</p>
                  </div>
                  <i data-eva="arrow-ios-forward"></i>
                  <i data-eva="arrow-ios-downward"></i>
                </div>
                <div class="collapse" id="collapseThree" data-parent="#accordionOne" aria-labelledby="headingThree">
                  <div class="accordion-body">
                    <form>
                      <div class="d-flex align-items-center mb-3">
                        <h6 class="mr-auto lh-150">Action</h6>
                        <div class="form-check form-switch h3">
                          <input class="form-check-input" type="checkbox" checked>
                        </div>
                      </div>
                      <p>The quick brown fox jumps over the lazy dog.</p>
                      <hr>
                    </form>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <div class="accordion-header" id="headingFour" data-toggle="collapse" data-target="#collapseFour" role="button" aria-expanded="false" aria-controls="collapseFour">
                  <div class="mr-auto">
                    <h6 class="mb-1 lh-150">Integrations</h6>
                    <p>Configure your preferences.</p>
                  </div>
                  <i data-eva="arrow-ios-forward"></i>
                  <i data-eva="arrow-ios-downward"></i>
                </div>
                <div class="collapse" id="collapseFour" data-parent="#accordionOne" aria-labelledby="headingFour">
                  <div class="accordion-body">
                    <div class="card mb-3">
                      <div class="card-body d-flex">
                        <span class="icon mr-3 bg-danger rounded-circle">
                          <i class="fill-white" data-eva="google"></i>
                        </span>
                        <div>
                          <h6 class="mb-2 lh-100">Google</h6>
                          <p class="lh-100">Read, write, edit</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <div class="accordion-header" id="headingFive" data-toggle="collapse" data-target="#collapseFive" role="button" aria-expanded="false" aria-controls="collapseFive">
                  <div class="mr-auto">
                    <h6 class="mb-1 lh-150">Appearance</h6>
                    <p>Configure your preferences.</p>
                  </div>
                  <i data-eva="arrow-ios-forward"></i>
                  <i data-eva="arrow-ios-downward"></i>
                </div>
                <div class="collapse" id="collapseFive" data-parent="#accordionOne" aria-labelledby="headingFive">
                  <div class="accordion-body">
                    <form>
                      <div class="d-flex align-items-center mb-3">
                        <h6 class="mr-auto lh-150">Action</h6>
                        <div class="form-check form-switch h3">
                          <input class="form-check-input" type="checkbox">
                        </div>
                      </div>
                      <p>The quick brown fox jumps over the lazy dog.</p>
                    </form>
                  </div>
                </div>
                <hr class="my-0">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="compose" tabindex="-1" role="dialog" aria-labelledby="composeLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 id="composeLabel">Compose</h4>
            <button class="btn btn-sm btn-circle btn-neutral align-self-start" data-dismiss="modal" type="button" aria-label="Close">
              <i data-eva="close" aria-hidden="true"></i>
            </button>
          </div>
          <div class="modal-body p-0">
            <ul class="nav nav-tabs nav-justified p-3 px-sm-5 rounded-0" role="tablist" aria-orientation="horizontal">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="true">Details</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#members" role="tab" aria-controls="members" aria-selected="false">Members</a>
              </li>
            </ul>
            <div class="px-3 py-5 px-sm-5">
              <div class="tab-content">
                <div class="tab-pane fade show active" id="details" role="tabpanel">
                  <form>
                    <label for="subject">Subject</label>
                    <input class="form-control form-control-lg mb-5" id="subject" type="text" placeholder="What's the subject?">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" rows="3" placeholder="Hmm, are you friendly?"></textarea>
                  </form>
                </div>
                <div class="tab-pane fade" id="members" role="tabpanel">
                  <form>
                    <div class="input-group mb-5">
                      <div class="input-group-prepend">
                        <i data-eva="funnel-outline"></i>
                      </div>
                      <input class="form-control form-control-lg" type="search" placeholder="Search" aria-label="Search">
                    </div>
                  </form>
                  <h3>Members</h3>
                  <hr class="mb-0">
                  <div class="d-flex py-5 border-bottom">
                    <span class="avatar avatar-sm status status-online mr-3 bg-danger rounded-circle">jd</span>
                    <div class="mr-auto">
                      <h6 class="mb-2 lh-100">John Doe</h6>
                      <p class="lh-100">Manhattan</p>
                    </div>
                    <div class="form-check align-self-center ml-3">
                      <input class="form-check-input" type="checkbox">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-block btn-lg btn-danger" type="submit">Compose</button>
          </div>
        </div>
      </div>
    </div>
    <main class="flex-lg-grow-1">
      <div class="chat chat-offcanvas">
        <div class="d-flex">
          <div class="flex-grow-1">
            <div class="container px-lg-5">
              <div class="chat-header" >
                <!-- Chat Header Appers Here -->
                <div class="d-flex mr-auto" id="chathead" >
                  <span class="avatar avatar-sm status status-offline mr-3 bg-info rounded-circle">jd</span>
                  <div>
                    <h6 class="mb-2 lh-100"> </h6>
                    <p class="lh-100"></p>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                <!--   <button class="btn d-none d-xl-inline-block">
                    <i class="eva-md" data-eva="video" data-eva-animation="pulse"></i>
                  </button>
                  <button class="btn d-none d-xl-inline-block ml-5" type="button">
                    <i class="eva-md" data-eva="phone-call" data-eva-animation="pulse"></i>
                  </button> -->
                  <button class="btn d-lg-none ml-5" data-toggle="chat-offcanvas" type="button">
                    <i class="eva-md" data-eva="arrow-circle-left" data-eva-animation="pulse"></i>
                  </button>
                  <button class="btn d-none d-xl-inline-block ml-5" type="button">
                    <i class="eva-md" data-eva="people" data-eva-animation="pulse"></i>
                  </button>
                  <div class="dropdown d-xl-none ml-5">
                    <button class="btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                      <i class="eva-md" data-eva="settings-2" data-eva-animation="pulse"></i>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <!-- <div class="dropdown-menu dropdown-menu-right">
                      <button class="dropdown-item" type="button">Video call</button>
                      <button class="dropdown-item" type="button">Voice call</button>
                      <button class="dropdown-item" type="button">Members</button>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="chat-body" id="chatbody">
                <!-- Chat body appers here -->
            </div>
            <div class="chat-footer" id="footer">

            </div>
            </div>
            <button class="btn btn-circle btn-neutral sidebar-toggler" data-toggle="sidebar-offcanvas">
              <i class="ml-n3" data-eva="chevron-left"></i>
            </button>
          </div>
        </div>
      </div>
    </main>
  </div>
  
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
<script src="https://unpkg.com/eva-icons@1.1.1/eva.min.js" integrity="sha384-m76M9FZUsYkrBUkI7xVlheH3b+8fhrmj3NW/7DRvtsjYv+vvwft9NB/rilorriCM" crossorigin="anonymous"></script>
<script src="dist/js/offcanvas.min.js"></script>


<!-- offline scripts -->
<!-- 
  <script src="dist/js/jquery-3.2.1.min.js"></script>
    <script src="dist/unpkg.com/eva-icons@1.1.1/eva.min.js" integrity="sha384-m76M9FZUsYkrBUkI7xVlheH3b+8fhrmj3NW/7DRvtsjYv+vvwft9NB/rilorriCM" crossorigin="anonymous"></script>
    <script src="dist/code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="dist/stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
 -->

  <script>
  eva.replace()
  </script>
<script type="text/javascript">
  //
  $(document).ready(function(){
    //auto refresh active tab
  setInterval(function(){
    $("#online").load("active.php");
    }, 5000);
    //auto refresh friends tab
  setInterval(function(){
    $("#onact").load("friends.php").fadeIn("slow");
    }, 5000);


// $.get( "active.php", function( data ) {
  // $( "#online" ).html( data );

    // logging out user
  $("#logout").click(function() {
    window.location.href = 'logout.php';
    // return false;
  });


  //ajax send message
  $('#sendmsg').click(function() {
        var msg = $('#msg').val();
        //trim() is used to remove spaces
        if($.trim(msg) != '') {
          $.ajax({
            url:"sendmsg.php",
            method:"POST",
            data:{msg:msg},
            dataType:"text",
            success:function(data) {
              $('#comment').val("");
            }
          });
        }
  });
});
// Ajax get chat with auto refresh
function getchat(id)
{
    alert('under Construction contact +2349030919902 for full script ');
   
   }

</script>
</body>
</html>
