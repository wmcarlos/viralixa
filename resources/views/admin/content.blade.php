      <aside>
          <div id="sidebar"  class="nav-collapse ">
              @include('admin.widget')
          </div>
      </aside>
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<div class="row mt">
          		<div class="col-lg-12">
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <ul>
                          @foreach($errors->all() as $error)
                            <li><strong>{{  $error }}</strong></li>
                          @endforeach()
                        </ul>
                    </div>
                @endif
          		  @yield('content')
          		</div>
          	</div>
		</section>
      </section>