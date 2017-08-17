    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="{{ asset('js/jquery.backstretch.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootbox.min.js') }}"></script>
    <script>
        $.backstretch("{{ asset('img/login-bg.jpg') }}", {speed: 500});
    </script>
    @if(Session::has('message'))
      <script type="text/javascript">
          bootbox.alert({
            'title':'Alerta',
            'message':'{{ Session::get("message") }}'
          });
      </script>
    @endif()
  </body>
</html>