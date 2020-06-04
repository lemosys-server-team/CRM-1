@extends('layouts.app')

@section('content')
<form id="form1" name="form1" method="post" action="" >
    <div class="containerOuterMost"> 
        <div class="container">
            <div class="containerOuter floatLeft_noWidth column">
                <div class="container position_relative_for">
                  @include('layouts.header') 
                  @include('layouts.banner')   
              </div>
              <section class="main_cont_wrap">
                  <div class="homeMainContainer">
                      <div class="left_cont">
                          <div class="homeBoxMarquee">
                      <a href="javascript:void(0)" onclick="wopen('{{route("notifications.list")}}','Notifications',810, 600); return false;">
                                  <img src="{{ asset('frontend-theme/img/Aaj-No-Din-Notifications.jpg') }}" style="margin-bottom: 8px;float: left;" alt="Notification" title="Notification"></a>
                              </div>
                          </div>
                          <div class="right_cont1">
                              <div class="homeBoxMarquee">
                                 <marquee scrollamount="4" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                                  <?php $marquee_text= getSetting('marquee_text');
                                  echo 'Current Qiyaam Shareef Syedna Abu Jafar us Sadiq Aaliqadr Mufaddal Saifuddin (TUS) Is In '.$marquee_text=isset($marquee_text)?$marquee_text:''; ?>
                                </marquee>
                              </div>
                          </div>
                      </div>
                  </section>
                  <div class="homeMainContainer">
                    <div class="container">
                        <div class="left_cont">
                         <!-- start miqaat -->
                         <div id="miqaatanimation" class="m-b-15">
                           <div class="homeBoxMiqaatTitle" id="expander">
                              <div class="site_same_heading clearfix">
                                 <span class="heading_after_icon">
                                     <img src="{{ asset('frontend-theme/img/play_icon.png') }}" alt="play_icon">
                                 </span>
                                 <h4>MIQAAT &amp; AAMAL</h4>
                             </div>
                         </div>
                         <div class="homeBoxMiqaatMatter">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                             <tbody>
                              <?php if(count($miqaatData) > 0){ 
                                foreach ($miqaatData as $key => $miqaat) { ?>
                                  <tr>
                                    <td class="homeBoxTblTd">
                                      <div class="floatLeft_noWidth">
                                        <?php  if($miqaat->description==''){ ?>
                                          <strong class="cls_miqaats"><?php echo isset($miqaat->type->title)?$miqaat->type->title:'';  ?> : </strong ><?php echo isset($miqaat->title)?$miqaat->title:''; ?>
                                  <?php  }else{ ?>
                                             <a href="javascript:void(0)" onclick="wopen('{{route("miqaats.details",$miqaat->id)}}','miqaatDetails',810, 600); return false;"> 
                                             <strong><?php echo isset($miqaat->type->title)?$miqaat->type->title:'';  ?> :</strong><?php echo isset($miqaat->title)?$miqaat->title:''; ?></a>
                                <?php   } ?>
                                      </div>
                                      <?php if($miqaat->description!=''){ ?>
                                      <div class="floatRight_noWidth">
                                        <a href="javascript:void(0)"  onclick="wopen('{{route("miqaats.details",$miqaat->id)}}','miqaatDetails',810, 600); return false;"><img src="{{ asset('frontend-theme/img/play_icon_circle.png') }}" alt="Audio Available" width="16" height="16" title="Audio Available"></a>
                                      </div>
                                  <?php } ?>
                                    </td>
                                  </tr>
                          <?php }
                              }else{ ?>
                                 <tr><td class="homeBoxTblTd" valign="top">There are no miqaats today</td></tr>
                        <?php }

                            if(count($amaalData) > 0 ){
                              foreach ($amaalData as $key => $amaal) { ?>
                                <tr>
                                   <td class="homeBoxTblTd">
                                      <div class="floatLeft_noWidth">
                                    <?php 
                                          if($amaal->getMedia('image')->count() > 0 && file_exists($amaal->getFirstMedia('image')->getPath())){ ?>
                                              <a href="javascript:void(0)" onclick="wopen('{{route("amaals.details",$amaal->id)}}','amaalsDetails',810, 600); return false;"> 
                                             <strong><?php echo isset($amaal->type->title)?$amaal->type->title:'';  ?> :</strong><?php echo isset($amaal->title)?$amaal->title:''; ?>
                                             </a>
                                    <?php }else{ ?>
                                              <strong><?php echo isset($amaal->type->title)?$amaal->type->title:'';  ?> :</strong><?php echo isset($amaal->title)?$amaal->title:''; ?>
                                         
                                  <?php } ?>
                                     </div>
                                    
                              <?php if($amaal->getMedia('image')->count() > 0 && file_exists($amaal->getFirstMedia('image')->getPath())){ ?>
                                      <div class="floatRight_noWidth">
                                             <a href="javascript:void(0)"  onclick="wopen('{{route("amaals.details",$amaal->id)}}','amaalsDetails',810, 600); return false;"> 
                                                <img src="{{ asset('frontend-theme/img/play_icon_circle.png') }}" alt="Audio Available" width="16" height="16" title="Audio Available">
                                            </a>
                                     </div>
                              <?php } ?>
                                         
                                 </td>
                               </tr>
                        <?php }
                              
                            }
                            ?>
                      </tbody>
                 </table>
             </div>
             <div class="site_same_btm_btn">
              <input type="button" name="button2" id="button2" value="Miqaats for the Month" class="site-same-btn" style="cursor:pointer">
          </div>
      </div>
      <!-- end miqaat -->
      <div id="first_row">
        <div class="brand_logo_site">
            <!-- Nuskah Box Start -->
            <div class="floatLeft_noWidth">
                <a href="#" onclick="wopen('{{route("nuskah.list")}}','Nuskah',810, 600); return false;">
                    <img src="{{ asset('frontend-theme/img/nuskha_img.jpg') }}" alt="Nuskah" border="0" title="Nuskah">
                </a>
                <!--code to get the latest nuska-->
            </div>
            <!-- Nuskah Box End -->
            <!-- disasul Box Start -->
            <div class="floatLeft_noWidth">
                <a href="{{route("adadcalculator")}}" target="_blank">
                    <img src="{{ asset('frontend-theme/img/disasul_img.jpg') }}" alt="adad" border="0" title="adad">
                </a>
            </div>
            <!-- disasul  Box End -->
            <!-- Rivaayat Box Start -->
            <div class="floatLeft_noWidth">
                <a href="javascript:void(0)" onclick="wopen('{{route("rivaayat.list")}}','Rivaayats',810, 600); return false;">
                    <img src="{{ asset('frontend-theme/img/rivayaty_img.jpg') }}" alt="Rivaayat" border="0" title="Rivaayat">
                </a>
                <!--code to get the latest rivaayat-->
            </div>
            <!-- Rivaayat Box End -->
        </div>

        <div class="brand_logo_site">
            <!-- Safar Ni Namaz Box Start -->
            <div class="floatLeft_noWidth">
                <a href="javascript:void(0)" onclick="wopen('{{route("safarninamaz")}}','SafarNinamaz',810, 600); return false;">
                    <img src="{{ asset('frontend-theme/img/safar_ali_namaz_img.jpg') }}" alt="Safar Ni Namaz" border="0" title="Safar Ni Namaz">
                </a>
            </div>
            <!-- Safar Ni Namaz Box End -->
            <!-- Countdown Box Start -->
            <div class="floatLeft_noWidth">
                <a href="#"  onclick="wopen('{{route("countdown")}}','CountDown',810, 600); return false;">
                    <img src="{{ asset('frontend-theme/img/countdown_img.jpg') }}" alt="Countdown" border="0" title="Countdown">
                </a>
            </div>
                        <!-- Countdown Box End -->
                         <!-- Hikayat Box Start -->
                                      <div class="floatLeft_noWidth">
                                          <a href="#" onclick="wopen('{{route("hikaayats.list")}}','Hikaayats',810, 600); return false;">
                                              <img src="{{ asset('frontend-theme/img/hikayat_img.jpg') }}" alt="Hikayat" border="0" title="Hikayat">
                                          </a>
                                          <!--code to get the latest Hikayat-->
                                      </div>
                                      <!-- Hikayat Box End -->
                                  </div>
                                  <div class="brand_logo_site">
                                      <!-- adad Box Start -->
                                      <div class="column6">
                                          <div class="" id="dishasool_x">
                                              <a href="#" onclick="wopen('{{route("disasul")}}','Disasul',810, 600); return false;">
                                                  <img src="{{ asset('frontend-theme/img/adad_img.jpg') }}" alt="Disasul" border="0" title="Disasul">
                                              </a>
                                          </div>
                                          <div class="dishasool"> <strong>South</strong> Direction not to be travelled today,
                                              <br>if required then    <strong>Eat Mustard seeds ( small )</strong>
                                              <br>
                                              <img src="{{ asset('frontend-theme/img/mustardseeds.jpg') }}" alt="Disasul" width="139" height="63" title="Disasul">
                                          </div>
                                      </div>
                                      <!-- adad Box End -->
                                      <!-- Hikayat Box Start -->
                                      <div class="column6">
                                          <!-- Sadaqah Title Start -->
                                          <div class="" id="sadaqaah_x">
                                              <a href="#" onclick="wopen('{{route("sadaqah")}}','Sadaqah',810, 600); return false;">
                                                  <img src="{{ asset('frontend-theme/img/Sadaqah_img.jpg') }}" alt="Sadaqah" border="0" title="Sadaqah">
                                              </a>
                                              <div class="sadaqaah">
                                                  <img src="{{ asset('frontend-theme/img/rice.jpg') }}" alt="Sadaqah" width="139" height="63" title="Sadaqah">   <strong>Do sadaqah of:</strong> Rice</div>
                                              </div>
                                              <!-- Sadaqah Title End -->
                                              <!--code to get the latest Hikayat-->
                                          </div>
                                          <!-- Hikayat Box End -->
                                      </div>
                                      <!-- Banners Box End -->
                                      <!-- Disasul / Sadaqah Box Start -->
                                      <div class="container">
                                          <div class="container">


                                          </div>
                                          <!--end container-->
                                          <div class="container">
                                              <div class="business_directory_cont">
                                                 <div class="site_same_heading clearfix">
                                                  <a href="javascript:void(0)">  <span class="heading_after_icon">
                                                      <img src="{{ asset('frontend-theme/img/briefcase.png') }}" alt="briefcase">
                                                  </span>
                                                  <h4>VEPAAR</h4>
                                              </a>    <span class="heading_before_icon"><img src="{{ asset('frontend-theme/img/dollar_icon.png') }}" alt="dollar_icon"></span>
                                          </div>
                                          <div id="cell" class="clearfix">
                                              <ul>
                                                  <li><a href="javascript:void(0)">CONNECT</a>
                                                  </li>
                                                  <li><a href="javascript:void(0)">FREE LISTINGS</a> 
                                                  </li>
                                                  <li><a href="javascript:void(0)">NETWORK</a>
                                                  </li>
                                                  <li><a href="javascript:void(0)">AND MORE</a>
                                                  </li>
                                              </ul>
                                          </div>
                                      </div>
                                    @include('frontend.calendar.calendar')  
                                <!-- Sadaqah Image / Matter End -->
                            </div>
                        </div>
                        <!-- Disasul / Sadaqah Box End -->
                        </div>

                                  <!--start other ads-->
                                  @include('frontend.advertisement.otherads')
                          <!-- tree -->           
                            <div id="other_ads_left">
                                        <!--new miqaats section-->
                                        <div class="ads_banner" style="float:left">
                                          <div id="miqaatanimation" class="m-b-15 home_page_for_boxmiqaat">
                                            <div class="homeBoxMiqaatTitle" id="expander">
                                              <div class="site_same_heading clearfix">
                                                <span class="heading_after_icon">
                                                  <img src="{{asset('frontend-theme/img/month_pannel_icon.png')}}" alt="month_pannel_icon">
                                                </span>
                                                <h4>MIQAATS OF THE MONTH</h4>
                                              </div>
                                              <div class="site_same_subheading clearfix">
                                                <h5><?php echo $hijriMonthName.'&nbsp;';?></h5>
                                              </div>
                                            </div>
                                            <div class="homeBoxMiqaatMatter">
                                              <div class="event_for_month_outer">
                                                <?php 
                                                  if(count($miqaatMonthData)){
                                                    foreach ($miqaatMonthData as $key => $miqaatMonth) { 
                                                            $dateEng=date('Y-m-d',strtotime($miqaatMonth->date));
                                                            $day=convertEnglishToHijri($dateEng,'j'); ?>
                                                      <div class="event_for_month_wrap">
                                                         <div class="event_for_month_wrap_left"><?php echo $day; ?></div>
                                                            <div class="event_for_month_wrap_right">
                                                                <div class="popCalMiqaatMatterTblText">
                                                                 <span class="bld"><?php echo isset($miqaatMonth->type->title)?$miqaatMonth->type->title:''; ?> : &nbsp; <?php echo isset($miqaatMonth->title)?$miqaatMonth->title:''; ?></span>
                                                                </div>
                                                          </div>    
                                                      </div>
                                        <?php       }
                                                  }
                                                ?>
                                              </div>

                                            </div>
                                          </div>
                                        </div>
                                        <!--new miqaats section-->
                                </div>

                              </div><!-- Left End -->

                              <div class="right_cont">
                                <div class="right_cont_left">
                                    <div class="homeMainContainerCol3 floatLeft_noWidth column">
                                       @include('frontend.download.download')
                                        <!-- Ghari Box Start -->
                                        <div class="container" id="gharimessage">
                                            <div class="homeBoxGhariTitle container">
                                                <?php $sunrise = explode(':',$calsunrise);
                                                $sunset  = explode(':',$calsunset);

                                                putenv("TZ=Greenwich");
                                                $t = @time();
                                                //$t = $t+($_COOKIE['city']['tz']*60*60);
                                                $t = $t+($_COOKIE['city']['tz']);
                                                //$t = $t+($_COOKIE['city']['tz']*60*60)-(5.13*60*60);
                                                $currtime = @date('G.i',$t);    #current time.
                                                $time1 = @date('H',$t);
                                                $time2 = @date('i',$t);
                                                if(isset($_REQUEST['date']))
                                                {
                                                    $VarDate = $_REQUEST['date'];
                                                }else
                                                {
                                                    $VarDate = @date('Y-m-d',$t);
                                                }
                                                ?>
                                                <?php   
                                                /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
                                                // $time1 - current time's  hrs part
                                                // $time2 - current time's min part
                                                #if file flag is set.
                                                //echo $_REQUEST['fileflg'];

                                                if(!isset($_REQUEST['fileflg'])){
                                                    #if hours > sunrise hours.
                                                    if($time1>$sunrise[0]){   
                                                        #if hours < sunset.
                                                        if($time1<$sunset[0]){ ?>
                                                            @include('frontend.ghari.12hoursday')
                                                            <?php $_GET['fileflg']=0;
                                                        }else if($time1 == $sunset[0]){  #if sunset and hours are equal.(Logic for evening.)
                                                            if($time2<=$sunset[1]){  #check for minutes. if minutes  < sunset minutes. ?>
                                                                @include('frontend.ghari.12hoursday')
                                                                <?php $_GET['fileflg']=0;
                                                            }else{ #if minutes > sunset minutes.?>
                                                                @include('frontend.ghari.12hoursnight')
                                                                <?php $_GET['fileflg']=1;
                                                            }
                                                        }else{ #if hours> sunset.?>
                                                            @include('frontend.ghari.12hoursnight')
                                                            <?php $_GET['fileflg']=1;
                                                        }
                                                    }else if($time1 == $sunrise[0]){ #if hourse and sunrise are equal.(Logic for morning.)
                                                        if($time2>=$sunrise[1]){ #if minutes are > sunrise minutes. ?>
                                                            @include('frontend.ghari.12hoursday')
                                                            <?php $_GET['fileflg']=0;
                                                        }
                                                    }else{ #if hours are < sunrise. ?>
                                                        @include('frontend.ghari.12hoursnight')
                                                        <?php $_GET['fileflg']=1;
                                                    }

                                                    /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
                                                }else{
                                                    if($_GET['fileflg']==0){?>
                                                        @include('frontend.ghari.12hoursday')
                                                    <?php }else{?>
                                                        @include('frontend.ghari.12hoursnight')
                                                    <?php }
                                                }
                                                ?>
                                                <div class="homeBoxGhariLegendDetails container">
                                                  <div class="homeBoxGhariLegend floatLeft_noWidth">
                                                    <img src="{{asset('frontend-theme/resources/images/boxGhariLegends.png')}}" alt="" width="192" height="20" />
                                                  </div>
                                                  <div class="homeBoxGhariDetails floatRight_noWidth">
                                                    <a href="#" onclick="wopen('popUpDetailsGhari.html', 'popup', 820, 720); return false;">
                                                Details</a>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="homeBoxGhariHover" id="gharibox">
                                        <!--<img src="resources/images/ghariHover.png" alt="" width="252" height="99" border="0" usemap="#Map" />
                                        <map name="Map" id="Map">
                                        <area shape="rect" coords="236,1,247,19" id="remove" style="cursor:pointer" />
                                        </map>-->
                                        <p class="important">Important Note</p>
                                        <p>Ghari Section - displayed on our website has been referred from Busaheba Sahifa and is only for information purpose. Mumineen are requested to take raza before doing any deeni aamal.</p>
                                    </div>
                                    <!-- Ghari Box End -->

                                    <!-- Right Ghari section start -->
                                    <div class="homeMainContainerCol5 floatLeft_noWidth column">
                                      <div class="container">
                                       <div class="homeMainContainerCol5_01 floatLeft_noWidth column">

                                        <!-- Dua Box Start -->
                                        <div class="dua_box_cont m-b-12">
                                            <div class="site_same_heading clearfix">
                                                <a href="javascript:void(0)" onclick="wopen('{{route("dua")}}','Dua',810, 600); return false;">
                                                    <span class="heading_after_icon">
                                                      <img src="{{asset('frontend-theme/img/open-book_icon.png')}}" alt="open-book_icon">
                                                    </span>
                                                    <h4>AAJ NA DIN <br> NI DUA</h4>
                                                  </a>  
                                            </div>
                                        </div>
                                        <!-- Dua Box End -->
                                        <!-- Exclusive Picture Box Start -->
                                        <div class="container">
                                        <div class="homeBoxExcluPictTitle">
                                              <div class="site_same_heading clearfix">
                                                    <a href="javascript:void(0)" onclick="wopen('{{route("kalemaat")}}','Kalemaat',810, 600); return false;">
                                                        <span class="heading_after_icon">
                                                          <img src="{{asset('frontend-theme/img/open-book_icon.png')}}" alt="open-book_icon">
                                                        </span>
                                                        <h4>KALEMAAT<br>NOORANIYAH</h4>
                                                      </a>  
                                              </div>
                                         </div>
                                          <a href="javascript:void(0)"  onclick="wopen('{{route("kalemaat")}}','Kalemaat',810, 600); return false;">
                                              <div class="homeBoxExcluPictMatter container m-b-12" style="height:70px;">
                                                 <?php if(isset($kalemaatData) && $kalemaatData->getMedia('image')->count() > 0 && file_exists($kalemaatData->getFirstMedia('image')->getPath())){ ?>
                                                         <img src="{{ $kalemaatData->getFirstMedia('image')->getFullUrl() }}"  height="100" width="157" >  
                                                <?php } ?>
                                              </div>
                                          </a>
                                        </div>
                                        <!-- start this day -->
                                         <div class="homeBoxTDTYMattermain m-b-15">
                                            <div class="homeBoxTDTYTitle">
                                              <div class="site_same_heading clearfix">
                                                 <span class="heading_after_icon">
                                                        <img src="{{asset('frontend-theme/img/tdty_icon.png')}}" alt="tdty_icon">
                                                      </span>
                                                      <h4>THIS DAY THAT YEAR</h4>
                                              </div>
                                            </div>
                                          <div class="homeBoxTDTYMatter" style="height:85px; overflow: auto; display: block;background:#ffffff">
                                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <?php
                                                 if(count($tdtyData) > 0){
                                                      foreach ($tdtyData as $key => $tdty) { ?>
                                                        <tr>
                                                          <td class="homeBoxTblTd" valign="top">
                                                            <?php echo isset($tdty->title)?$tdty->title:'' ?>
                                                          </td>
                                                        </tr>
                                                        <?php if(count($tdtyData) > 1){ ?>
                                                         <tr>
                                                             <td class="homeBoxTblHline" valign="top"></td>
                                                        </tr>
                                                      <?php }
                                                    } 
                                                  }else{ ?>
                                                    <td class="homeBoxTblTd" valign="top">No data available for today</td>
                                          <?php   } ?>  
                                              </table>
                                            </div>
                                          </div>
                                        <!-- end this day -->
                                         <!-- start links -->
                                        <?php 
                                          $app_store= getSetting('app_store');
                                          $app_store=isset($app_store)?$app_store:'';
                                          $google_play= getSetting('google_play');
                                          $google_play=isset($google_play)?$google_play:'';
                                          $instagram_url= getSetting('instagram_url');
                                          $instagram_url=isset($instagram_url)?$instagram_url:''; ?>
                                         <div class="aap-store-cont m-b-15">
                                            <a href="{{ $app_store }}" target="_blank"><img src="{{asset('frontend-theme/img/app-store_new.png')}}" alt="phone-img-lg" class="img-fulls"></a>

                                            <a href="{{ $google_play }}"  target="_blank"><img src="{{asset('frontend-theme/img/google-play_new.png')}}" alt="phone-img-lg" class="img-fulls"></a>

                                            <a href="{{ $instagram_url }}" target="_blank" ><img src="{{asset('frontend-theme/img/instagram_new.png')}}" alt="phone-img-lg" class="img-fulls"></a> 
                                        </div>
                                      <!-- end  links -->
                                      <!-- start  date -->
                                      <div class="get_date_cont m-b-15">
                                         <div class="site_same_heading clearfix">
                                            <a href="#">
                                                <span class="heading_after_icon">
                                                  <img src="{{asset('frontend-theme/img/get-date_icon.png')}}" alt="get-date_icon">
                                                </span>

                                                <a href="javascript:void(0)"  onclick="wopen('{{route("dateconverter")}}','DateConverter',810, 600); return false;" ><h4>GET DATE</h4></a>
                                              </a>  
                                            </div>
                                            <div class="date_changes_option">
                                              <p class="language_change">English</p>
                                              <p><a href="javascript:void(0)" onclick="wopen('{{route("dateconverter")}}','DateConverter',810, 600); return false;"><img src="{{asset('frontend-theme/img/hijri_english_icon.png')}}" alt="get-hijri_english_icon"></a></p>
                                              <p class="language_change">Hijri</p>
                                          </div>
                                         </div>
                                      </div>
                                      <!-- end date -->
                                     </div>
                                    </div>
                                    <!-- Right Ghari section end -->
                                    <div class="clearfix"></div>
                                    <!-- Builder advertisement start -->
                                    <div id="other_ads_right">  
                                      @include('frontend.advertisement.builderads')
                                    </div>
                                     <!-- Builder advertisement end -->
                                     <!-- other end  -->



                                </div>
                                <div class="right_cont_right"> @include('frontend.advertisement.rightsideads')

                                </div>


                            </div>
              </div>
          </div>
          @include('layouts.footer') 
      </div>
  </div>
</div>
</form>
@endsection

@section('styles')
<link href="{{ asset('frontend-theme/css/slider_style.css') }}" rel="stylesheet">
<link href="{{ asset('frontend-theme/css/header/headerimage.php?var='.(isset($Newhijjarydate)?$Newhijjarydate:'').'') }}" media="screen">
@endsection

@section('scripts')
<script src="{{ asset('frontend-theme/js/bjqs-1.3.min.js') }}"></script>
<script type="text/javascript" src="{{asset('frontend-theme/js/javascript/jquery.marquee.js')}}"></script>
<script>
jQuery(document).ready(function($) {
      $('#banner-fade').bjqs({
        height      : 300,
        width       : 980,
        responsive  : true
    });
    if(jQuery( '#banner-fade .bjqs-markers').length>0){
        jQuery('.no_days').addClass('slider_doc');
    }

    jQuery("#gharimessage").hover(function(e){jQuery("#gharibox").css("visibility","visible").fadeIn("slow")},function(){jQuery("#gharibox").fadeOut("slow")});
});
function changeGhari(date,hdate){
    var val = document.getElementById('ghari').value;
    if(val == 0){
        val = 1;
    }else{
        val = 0;
    }
    self.location = '{{ route("home") }}?fileflg='+val+'&date='+date+'&hijjarydate='+hdate+'#ghari_mubarak';
}
</script>
<!-- slider  -->
@endsection