          <footer class="site-footer">
          <div class="text-center">
              2017 - Frontuari, C.A.
              <a href="{{ url('dashboard') }}" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
  </section>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui-1.9.2.custom.min.js') }}"></script>
    <script src="{{ asset('js/jquery.ui.touch-punch.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <!--common script for all pages-->
    <script src="{{ asset('js/common-scripts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('DataTables-1.10.15/media/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.data-table').DataTable();
        });
    </script>
  </body>
</html>