<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <base href="{{ asset('') }}">
    <title>{{ env('APP_NAME') }}</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600"
    />
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/all.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate-style.css" />
    <!--
Tooplate 2111 Pro Line
http://www.tooplate.com/view/2111-pro-line
-->
  </head>

  <body>
    <!-- page header -->
    <div class="container" id="home">
      <div class="col-12 text-center">
        <div class="tm-page-header">
          <h1 class="d-inline-block text-uppercase">{{ env('APP_NAME') }}</h1>
        </div>
      </div>
    </div>
    <!-- navbar -->
    <div class="tm-nav-section">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav class="navbar navbar-expand-md navbar-light">
              <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#tmMainNav"
                aria-controls="tmMainNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="tmMainNav">
                <ul class="navbar-nav mx-auto tm-navbar-nav">
                  <li class="nav-item active">
                    <a class="nav-link" href="#rsa">Mã hóa RSA </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#tutorial">Hướng dẫn</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#author">Thông tin tác giả</a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>

  
    <div class="container tm-features-section" id="rsa">
      <form id="key_generate_form">  
        <div class="container" id="rsa">
                    <div class="row mr-0 mt-0 ml-0" style="padding: 5px;">
                        <div title="Tạo khóa" class="col-lg-12 col-md-12 mx-auto col-12" style="background: black;">
                          <div class="hero-text mt-4 mb-3 text-center">

                                    <h6 class="mb-3 mt-3 aos-init aos-animate text-white" data-aos="fade" data-aos-delay="300">Tạo khóa</h6>
                                    <div class="row">
                                        <label for="public_key" class="text-white text-modify1 col-sm-2 col-form-label">Khóa công khai :</label>
                                        <div class="col-sm-10 mb-2">
                                            <textarea rows="1" class="form-control form-control-modify1 key-update" id="public_key" name="public_key"></textarea>
                                        </div>
                                        <label for="private_key" class="text-white text-modify1 col-sm-2 col-form-label">Khóa bí mật :</label>
                                        <div class="col-sm-10 mb-2">
                                            <textarea rows="1" class="form-control form-control-modify1 key-update" id="private_key" name="private_key"></textarea>
                                        </div>
                                    </div>
                                    <a style="color:var(--primary-color);" action="auto-generate-key" class="btn custom-btn bordered mt-3 text-white" >Tạo khóa bất kỳ</a>
                          </div>
                         </div>
                         <div title="Mã hóa/giải mã" class="col-lg-12 col-md-12 mx-auto col-12" style="background: whitesmoke;">
                              <div class="hero-text mt-3 mb-3 text-center">
                                    <div class="row m-0">
                                        <div class="col-md-6 h-100 pb-3" style="background-color: white; padding: 0 30px;">
                                            <h6 class="mb-2 mt-3 aos-init aos-animate" data-aos="fade" data-aos-delay="300">Mã hóa</h6>
                                            <div class="row">
                                                <div class="mb-2 w-100">
                                                  <label for="encrypt_doc" class="form-label float-start">Bản rõ</label>
                                                  <textarea class="form-control" id="encrypt_doc" rows="1" name="encrypt_doc"></textarea>
                                                </div>
                                                <div class="mb-2 w-100">
                                                  <label for="encrypt_encrypted_doc" class="form-label float-start">Bản mã</label>
                                                  <textarea class="form-control" id="encrypt_encrypted_doc" rows="1" name="encrypt_encrypted_doc"></textarea>
                                                </div>
                                            </div>
                                            <a action="encrypt" style="color:var(--primary-color);" class="btn custom-btn bordered mt-3 text-white">Mã hóa</a>
                                        </div>
                                        <div class="col-md-6 h-100 pb-3" style=" padding: 0 30px;">
                                            <h6 class="mb-2 mt-3 aos-init aos-animate" data-aos="fade" data-aos-delay="300">Giải mã</h6>
                                            <div class="row">
                                                <div class="mb-2 w-100">
                                                  <label for="decrypt_encrypted_doc" class="form-label float-start">Bản mã hóa</label>
                                                  <textarea class="form-control" id="decrypt_encrypted_doc" rows="1" name="decrypt_encrypted_doc"></textarea>
                                                </div>
                                                <div class="mb-2 w-100">
                                                  <label for="decrypt_decrypted_doc" class="form-label float-start">Bản đã giải mã</label>
                                                  <textarea class="form-control" id="decrypt_decrypted_doc" rows="1" name="decrypt_decrypted_doc"></textarea>
                                                </div>
                                                
                                            </div>
                                            <a action="check" class="btn custom-btn bordered mt-3 text-white">Giải mã</a>
                                        </div>
                                    </div>
                              </div>
                         </div>
                    </div>
        </div>
      </form>
    </div>
    <div class="container tm-features-section" id="tutorial">
      <div class="container">

        <div class="section-title">
          <h2>Hướng dẫn</h2>
          <p>- Bấm <b>Tạo khóa bất kỳ</b> để hệ thống tự động tạo khóa</p>
          <p>- Nhập <b>văn bản cần mã hóa</b>
          <p>- Bấm <b>Mã hóa để mã hóa văn bản 
          <p>Giải mã: <br>
            &emsp; -Nhập <b>bản mã hóa cần giải mã</b><br>  
            &emsp; -Bấm <b>giải mã</b> để giải mã văn bản<br>  
          </p>
        </div>
      </div>
    </div>
    <div class="container tm-features-section" id="author" style="text-align: center; font-weight: bold; font-size: 30px;">
      Phúc
    </div>

    <script src="js/jquery-1.9.1.min.js"></script>
    <!-- Single Page Nav plugin works with this version of jQuery -->
    <script src="js/jquery.singlePageNav.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/toastr.min.js"></script>
    <script src="js/encrypt.js"></script>
    <script>
       function initialResponse(res){
            if(res.url){

                $('#download').attr('href',res.url);

                document.getElementById('download').click();

            }
            $.each(res.data, function(i, n){

                $('.form-control[name="'+ i +'"]').val(n);

            });

            if(res.message)
                
                if(res.error)

                    toastr.error(res.message);
                else

                    toastr.success(res.message);
        }
            $('[action="auto-generate-key"]').on('click',function(){

                var d = new FormData(document.getElementById('key_generate_form'));

                $.ajax({
                    type : 'post',
                    url : '{{ route('client.key.generate') }}',
                    data : d,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(res){
                        initialResponse(res);
                    }
                });
            })

            $('[action="check"]').on('click',function(){
                var d = new FormData(document.getElementById('key_generate_form'));
                $.ajax({
                    type : 'post',
                    url : '{{ route('client.rsa.check') }}',
                    data : d,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(res){
                        initialResponse(res);
                    }
                });
            })

            $('[action="encrypt"]').on('click',function(){
                var d = new FormData(document.getElementById('key_generate_form'));

                $.ajax({
                    type : 'post',
                    url : '{{ route('client.rsa.encrypt') }}',
                    data : d,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(res){
                        initialResponse(res);
                    }
                });
            })
            $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                    }
                }); 
      function detectIE() {
        var ua = window.navigator.userAgent;

        var msie = ua.indexOf("MSIE ");
        if (msie > 0) {
          // IE 10 or older => return version number
          return parseInt(ua.substring(msie + 5, ua.indexOf(".", msie)), 10);
        }

        var trident = ua.indexOf("Trident/");
        if (trident > 0) {
          // IE 11 => return version number
          var rv = ua.indexOf("rv:");
          return parseInt(ua.substring(rv + 3, ua.indexOf(".", rv)), 10);
        }

        // var edge = ua.indexOf('Edge/');
        // if (edge > 0) {
        //     // Edge (IE 12+) => return version number
        //     return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
        // }

        // other browser
        return false;
      }

      function setVideoHeight() {
        const videoRatio = 1920 / 1080;
        const minVideoWidth = 400 * videoRatio;
        let secWidth = 0,
          secHeight = 0;

        secWidth = videoSec.width();
        secHeight = videoSec.height();

        secHeight = secWidth / 2.13;

        if (secHeight > 600) {
          secHeight = 600;
        } else if (secHeight < 400) {
          secHeight = 400;
        }

        if (secWidth > minVideoWidth) {
          $("video").width(secWidth);
        } else {
          $("video").width(minVideoWidth);
        }

        videoSec.height(secHeight);
      }

      // Parallax function
      // https://codepen.io/roborich/pen/wpAsm
      var background_image_parallax = function($object, multiplier) {
        multiplier = typeof multiplier !== "undefined" ? multiplier : 0.5;
        multiplier = 1 - multiplier;
        var $doc = $(document);
        $object.css({ "background-attatchment": "fixed" });
        $(window).scroll(function() {
          var from_top = $doc.scrollTop(),
            bg_css = "center " + multiplier * from_top + "px";
          $object.css({ "background-position": bg_css });
        });
      };

      $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
          $(".scrolltop:hidden")
            .stop(true, true)
            .fadeIn();
        } else {
          $(".scrolltop")
            .stop(true, true)
            .fadeOut();
        }

        // Make sticky header
        if ($(this).scrollTop() > 158) {
          $(".tm-nav-section").addClass("sticky");
        } else {
          $(".tm-nav-section").removeClass("sticky");
        }
      });


      let videoSec;

      $(function() {
        if (detectIE()) {
          alert(
            "Please use the latest version of Edge, Chrome, or Firefox for best browsing experience."
          );
        }

        const mainNav = $("#tmMainNav");
        mainNav.singlePageNav({
          filter: ":not(.external)",
          offset: $(".tm-nav-section").outerHeight(),
          updateHash: true,
          beforeStart: function() {
            mainNav.removeClass("show");
          }
        });

        videoSec = $("#tmVideoSection");

        // Adjust height of video when window is resized
        $(window).resize(function() {
          setVideoHeight();
        });

        setVideoHeight();

        $(window).on("load scroll resize", function() {
          var scrolled = $(this).scrollTop();
          var vidHeight = $("#hero-vid").height();
          var offset = vidHeight * 0.6;
          var scrollSpeed = 0.25;
          var windowWidth = window.innerWidth;

          if (windowWidth < 768) {
            scrollSpeed = 0.1;
            offset = vidHeight * 0.5;
          }

          $("#hero-vid").css(
            "transform",
            "translate3d(-50%, " + -(offset + scrolled * scrollSpeed) + "px, 0)"
          ); // parallax (25% scroll rate)
        });

        // Parallax image background
        background_image_parallax($(".tm-parallax"), 0.4);

        // Back to top
        $(".scroll").click(function() {
          $("html,body").animate(
            { scrollTop: $("#home").offset().top },
            "1000"
          );
          return false;
        });
      });
    </script>
  </body>
</html>
