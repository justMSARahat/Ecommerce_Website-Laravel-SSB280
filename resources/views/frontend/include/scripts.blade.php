<script src="{{ asset('Frontend/assets/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('Frontend/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('Frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
<script src="{{ asset('Frontend/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('Frontend/assets/js/echo.min.js') }}"></script>
<script src="{{ asset('Frontend/assets/js/jquery.easing-1.3.min.js') }}"></script>
<script src="{{ asset('Frontend/assets/js/bootstrap-slider.min.js') }}"></script>
<script src="{{ asset('Frontend/assets/js/jquery.rateit.min.js') }}"></script>
<script src="{{ asset('Frontend/assets/js/lightbox.min.js') }}"></script>
<script src="{{ asset('Frontend/assets/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('Frontend/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('Frontend/assets/js/scripts.js') }}"></script>


{{--Google Translate CDN--}}
<script type="text/javascript">
    function googleTranslateFunction(){
        new google.translate.TranslateElement({pageLanguage:'en', layout:google.translate.TranslateElement.InlineLayout.SIMPLE},'google_translate_element');
    } </script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateFunction"></script>


{{--Toastr Java Script Code--}}
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
    @if ( Session::has('message') )
         var type = "{{ Session::get('alert-type','info') }}";

         switch (type){
             case 'info':
                 toastr.info("{{ Session::get('message') }}");
             break;

             case 'success':
                 toastr.success("{{ Session::get('message') }}");
             break;

             case 'warning':
                 toastr.warning("{{ Session::get('message') }}");
             break;

             case 'error':
                 toastr.error("{{ Session::get('message') }}");
             break;
     }

     @endif
</script>
<script type="text/javascript">
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-full-width",
        "preventDuplicates": true,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
<script>
    var obj = {};
    obj.cus_name = $('#name').val();
    obj.cus_phone = $('#mobile').val();
    obj.cus_email = $('#email').val();
    obj.cus_addr1 = $('#address').val();
    obj.amount = $('#amount').val();

    $('#sslczPayBtn').prop('postdata', obj);

    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>