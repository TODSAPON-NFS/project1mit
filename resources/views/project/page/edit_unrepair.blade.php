@extends("project.template")
@section("content")
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>
<div class="w3-main" style="margin-left:250px;">

 <div id="myTop" class="w3-top w3-container w3-padding-16 w3-theme w3-large">
  <i class="fa fa-bars w3-opennav w3-hide-large w3-xlarge w3-margin-left w3-margin-right" onclick="w3_open()"></i>
  <span id="myIntro" class="w3-hide">DR system: record</span>
</div>

<header class="w3-container w3-theme w3-padding-24" style="padding-left:24px" >
  <h1 class="w3-xxxlarge w3-padding-16">Dormitory Repairing System for PSU</h1>
</header>
 
<div class="w3-container w3-padding-32" style="padding-left:32px">
  <div class="w3-container w3-padding-16 w3-card-2" style="background-color:#FFFFFF">

    <div class="w3-container w3-sand w3-leftbar">
      <br>
      <h1 class="w3-center w3-text-indigo">แก้ไขผลการซ่อม ( ซ่อมไม่ได้ )</h1>
      <br>
    </div>



@foreach($Equ as $key => $v) 
   
    <div class="w3-content" style="max-width:800px">
      <br>
      <div class="w3-panel w3-light-grey w3-border w3-round">

      
      <p><strong>ห้อง : </strong><i>{{$Equu->num_room}}</i></p>
      <p><strong>อุปกรณ์ : </strong><i>{{$v->equiment}}</i></p>
      <p><strong>รายละเอียด : </strong><i>{{$v->detail_equiment}} </i></p>   
      </div>

      <h3 class="w3-text-blue">รายละเอียดการซ่อม</h3>     


      <form action="{{url('update_record_uncomplete/')}}/{{$v->id_unrepairequipment}}" method="post">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">  
        <textarea class="w3-input w3-animate-input" style="width:70%;"  rows="4"  cols="50"  name="list_detail_repair{{$key}}">{{$v->detail_repair}}</textarea>
        <br>

        <div class="w3-row">
          <div class="w3-col m2">
            <p>ช่างผู้ดำเนินงาน :</p>
          </div>

          <div class="w3-col m10">
            <input class="w3-input w3-animate-input" value="{{ Auth::user()->name }}" type="text" style="width:70%"></p>
          </div>
        </div>

        <br>

        <div class="w3-row">
          <div class="w3-col m2">
            <p>วันที่ซ่อมเสร็จ :</p>
          </div>
          <div class="w3-col m10">
            <input class="w3-input" type="date" value="{{$date = date("Y-m-d")}}" disabled="disabled" style="width:70%">
          </div>
        </div>

        <br>

        <h3 class="w3-text-blue">รายการเบิกอุปกรณ์</h3>     
        <!-- <textarea class="w3-input w3-animate-input" style="width:70%;" rows="4" cols="50" placeholder="ระบุรายการเบิกอุปกรณ์" name="list_use_equipment{{$key}}" ></textarea> -->
                  <p>ชื่ออุปกรณ์</p> <input class="input.ui-autocomplete-input" id="tags" value="{{$v->detail_use_equipment}}" name="list_use_equipment{{$key}}"  type="text"  style="width:70%" />
                  <br>
                  <i> จำนวนอุปกรณ์</i>  
                  <input class="w3-input w3-animate-input" value="{{$v->number}}" name="num{{$key}}" type="text"  style="width:70%" />
                  <br>

        <br>

        <div class="w3-row">
          <div class="w3-col m2">
            <p>ลงชื่อผู้เบิกของ :</p>
          </div>
          <div class="w3-col m10">
            <input class="w3-input w3-animate-input" value="{{ Auth::user()->name }}" type="text" style="width:70%"></p>
          </div>
        </div>

        <br>

        <div class="w3-row">
          <div class="w3-col m2">
            <p>วันที่เบิก :</p>
          </div>
          <div class="w3-col m10">
           <input class="w3-input" type="date" value="{{$date = date("Y-m-d")}}" disabled="disabled" style="width:70%">
         </div>
       </div>

       <br>

       <div class="w3-row">
        <h3 class="w3-text-blue">สถานะการซ่อม</h3>
      <!--   <p>
          <input class="w3-radio" type="radio" name="status{{$key}}" value="repair" checked><label class="w3-validate">ซ่อม</label>
        </p> -->

        <p>
          <input class="w3-radio" type="radio" name="status{{$key}}" value="unrepair" checked>
          <label class="w3-validate">ซ่อมไม่ได้</label>
        </p>

<!--         <p>
          <input class="w3-radio" type="radio" name="status{{$key}}" value="change" checked>
          <label class="w3-validate">เปลี่ยน</label>
        </p> -->
      </div>
      </div>
          

          
      @endforeach






      <br>
      <br>

            <div class="w3-row">
              <div class="w3-col m6">
                <!-- <a href="tryw3css_templates_blog.htm" target="_blank" type="submit"  class="w3-btn w3-padding-12 w3-dark-grey" style="width:98.5%">บันทึก</a> -->
                <center><p><button class="w3-btn w3-padding-12 w3-green" type="submit" style="width:50%" >บันทึก</button></p></center>
              </div>
              <div class="w3-col m6">
                <!-- <a href="w3css_templates.asp" class="w3-btn w3-padding-12 w3-dark-grey" style="width:98.5%">ย้อนกลับ</a> -->
                <center><p><button class="w3-btn w3-padding-12 w3-red" style="width:50%" >ย้อนกลับ</button></p></center>
              </div>
            </div>

          </form>

          <br>
          <br>
        </div>
      </div>
<!-- ค้นหาอุปกรณ์  -->      
<script>

$( function() {
  var availableTags = [
  @foreach($name_equipment as $a) 
  "{{$a->name}}",
  @endforeach
  ];
  $( "input.ui-autocomplete-input" ).autocomplete({
    source: availableTags
  });
} );
</script>
@endsection