<!DOCTYPE html>
<html lang="en">
<title>DRsystem</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<!-- <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
 -->  
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{url('w3css/w3.css')}}">




  <!-- <link rel="stylesheet" href="{{url('w3css/w3-theme-deep-purple.css')}}"> -->
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-deep-purple.css">




  <!-- <link rel="stylesheet" href="w3css/font-awesome.min.css"> -->
  <!--  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css"> -->
  <!--   <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <link rel="stylesheet" href="{{url('jquery/jquery-ui.css')}}"> 
  <script src="{{url('jquery/external/jquery/jquery.js')}}"></script>
  <script src="{{url('jquery/jquery-ui.js')}}"></script>
<!--   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script> -->
  <!-- Open-materialize CSS -->
  <!-- Compiled and minified CSS -->
  <!--   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css"> -->
  <!-- Compiled and minified JavaScript -->
  <!--   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script> -->
  <!-- Off-materialize CSS -->

  <style>
    .w3-sidenav a {padding:16px;font-weight:bold}

/*#para1 {
    background-image: -webkit-gradient(linear, left top, right top, from(#F90), to(#FFF));

   //เรียกใช้ id="para1"
}
*/
</style>

<body>

  <nav class="w3-sidenav w3-collapse w3-white w3-animate-left w3-card-2 w3-padding-4" style="z-index:3;width:250px;" id="mySidenav">
    <a href="{{url('/home')}}" class="w3-border-bottom w3-large w3-padding-32"><img src="https://scontent.fbkk10-1.fna.fbcdn.net/v/t1.0-9/14053948_907940599310962_5923993153439261598_n.jpg?oh=104c4d504e8e005296b41f551f4ab003&oe=5921CCCD" style="width:100%;"></a>
    <a href="javascript:void(0)" onclick="w3_close()" 
    class="w3-text-deep-purple w3-hide-large w3-closenav w3-large">Close <i class="fa fa-remove"></i></a>

    @if (Auth::guest())
    <a href="{{url('/login')}}">เข้าสู่ระบบ</a>
    <a href="{{url('/register')}}">สมัครสมาชิก</a>

    @else
    <div class="w3-accordion">
      <a onclick="myAccordion('demo')" href="javascript:void(0)">{{ Auth::user()->name }}<i class="fa fa-caret-down"></i></a>
      <div id="demo" class="w3-accordion-content w3-animate-left w3-padding">
        <a href="{{url('/logout')}}">ออกจากระบบ</a>
      </div>
    </div>
    @endif

    @if (Auth::guest())
    <!--   <a href="#" class="w3-light-grey w3-medium">Home</a> -->
    <a href="https://drive.google.com/file/d/0B_zH0xEcQXTSN3ZqY04yVk1uQ2M/view?usp=sharing">คู่มือการใช้งาน</a>
    <a href="https://www.facebook.com/hktdorm">ติดต่อสอบถาม</a>
    <!-- normal user -->
    @elseif(Auth::user()->level == 0)
    <a href="{{url('/home')}}">หน้าหลัก</a>
    <!-- student user -->
    @elseif(Auth::user()->level == 3)
    <a href="{{url('/home')}}">หน้าหลัก</a>
    <a href="{{url('/fix')}}">ใบแจ้งซ่อม</a>
    <!-- repairman user -->
    @elseif(Auth::user()->level == 2)
    <a href="{{url('/home')}}">หน้าหลัก</a>
    <a href="{{url('/showw')}}">บันทึกการซ่อม</a>
    <a href="{{url('/stat')}}">สถิติ</a>
    <a href="{{url('/savestock')}}">เพิ่มอุปกรณ์สำรอง</a>
    <a href="{{url('/showstock')}}">จำนวนอุปกรณ์สำรอง</a>
    @else
    <a href="{{url('/home')}}">หน้าหลัก</a>
    <a href="{{url('/member')}}">ยืนยันสมาชิก</a>
    <a href="{{url('/fix')}}">ใบแจ้งซ่อม</a>
    <a href="{{url('/showw')}}">บันทึกการซ่อม</a>
    <a href="{{url('/stat')}}">สถิติ</a>
    <a href="{{url('/savestock')}}">เพิ่มอุปกรณ์สำรอง</a>
    <a href="{{url('/showstock')}}">จำนวนอุปกรณ์สำรอง</a>
    <!-- <a href="{{url('/editstock')}}">แก้ไขจำนวนอุปกรณ์สำรอง</a> -->
    <!--  <a href="{{url('/record')}}">หน้าบันทึกการซ่อม</a> -->
    @endif
  </nav>
<!--   <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>

  <div class="w3-main" style="margin-left:250px;">

    <div id="myTop" class="w3-top w3-container w3-padding-16 w3-theme w3-large">
      <i class="fa fa-bars w3-opennav w3-hide-large w3-xlarge w3-margin-left w3-margin-right" onclick="w3_open()"></i>
      <span id="myIntro" class="w3-hide">DR system: Home</span>
    </div>

    <header class="w3-container w3-theme w3-padding-64" style="padding-left:32px" >
      <h1 class="w3-xxxlarge w3-padding-16">Dormitory Repairing System for PSU</h1>
    </header> -->
    @yield("content")

   
<!--     <footer class="w3-container w3-theme w3-padding-4" style="padding-left:24px" >
      <h3 >ติดต่อสำนักงานหอพักนักศึกษาในกำกับ </h3>
      <p>ที่อยู่ : สำนักงานหอพักนักศึกษาในกำกับ มหาวิทยาลัยสงขลานครินทร์ วิทยาเขตภูเก็ต 1,2, และ 3 --80 หมู่ 1 ถนนวิชิตสงคราม ตำบลกะทู้ อำเภอกะทู้ จังหวัดภูเก็ต 83120</p>
      <p>หมายเลขโทรศัพท์ : สำนักงานหอพักนักศึกษาในกำกับฯ 1,2 = 076-248-006 ถึง 20 , สำนักงานหอพักนักศึกษาในกำกับ 3 = 076-361-501</p>

    </footer> -->
        <footer class="w3-container w3-theme w3-padding-4 w3-bottom" style="padding-left:16px" >
      <p>ติดต่อสำนักงานหอพักนักศึกษาในกำกับ มอ.ภูเก็ต : 076-248-006 ถึง 20 </p>
      <!-- <p>ที่อยู่ : สำนักงานหอพักนักศึกษาในกำกับ มหาวิทยาลัยสงขลานครินทร์ วิทยาเขตภูเก็ต 1,2, และ 3 --80 หมู่ 1 ถนนวิชิตสงคราม ตำบลกะทู้ อำเภอกะทู้ จังหวัดภูเก็ต 83120</p>
      <p>หมายเลขโทรศัพท์ : สำนักงานหอพักนักศึกษาในกำกับฯ 1,2 = 076-248-006 ถึง 20 , สำนักงานหอพักนักศึกษาในกำกับ 3 = 076-361-501</p>
      <p><i>เปิดให้บริการทุกวัน ตั้งแต่เวลา 08.00 – 22.30 น.</i></p> -->
    </footer>

  </div>

  <script>
// Open and close the sidenav on medium and small screens
function w3_open() {
  document.getElementById("mySidenav").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
function w3_close() {
  document.getElementById("mySidenav").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

// Change style of top container on scroll
window.onscroll = function() {myFunction()};
function myFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("myTop").classList.add("w3-card-4");
    document.getElementById("myIntro").classList.add("w3-show-inline-block");
  } else {
    document.getElementById("myIntro").classList.remove("w3-show-inline-block");
    document.getElementById("myTop").classList.remove("w3-card-4");
  }
}

// Accordions
function myAccordion(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-theme";
  } else { 
    x.className = x.className.replace("w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-theme", "");
  }
}

</script>

</body>
</html> 