@extends('index')

@section('content')

      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>PAINEL GERAL</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
           <!--  notification end -->
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="{{route('logout')}}">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->

    <!-- Filtro por nome -->
    <script>
        function filter() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("clienteInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("clienteTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }   
            }
    </script>
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="/assets/img/user11.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">   {{ Auth::user()->name }} </h5>
              	  	
                  <li class="mt">
                      <a class="active" href="{{ route('painel', Auth::user()->id) }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Clientes</span>
                      </a>
                  </li>
                  <li class="mt">
                    <a class="" href="{{ route('cliente_form') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Adicionar</span>
                    </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
                           
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  <div class="col-lg-3 ds" style="min-width: 650px">
        
                    @if($mensagem)
                        <div class="alert alert-info" id="alert" style="margin-top: 10px">
                            {{ $mensagem }}
                        </div>
                    @endif
                    @if (count($cliente) == 0)
					    <h3 id="title" style="display: none"> {{ Auth::user()->name }} ainda não possui lista de Contatos</h3>
                    @else
                        <h3 id="title" style="display: none"> Clientes de {{ Auth::user()->name }} </h3>
                    @endif
                    <div class="form-panel">
                        <div class="form-group">
                        
                            @csrf  
                            <label class="col-sm-2 col-sm-2 control-label">Filtrar</label>
                            <div class="col-sm-10">
                                <input class="form-control round-form" onkeyup="filter()" type="text" name="clienteInput" id="clienteInput" placeholder="NOME">
                            </div>
                            <br>
                        
                        </div>
                    </div>

                      <!-- Member -->
                        @if (count($cliente) > 0)
                                <div class="col-md-12 mt">
                                    <div class="content-panel">
                                        <table class="table table-hover" id="clienteTable">
                                            <h4><i class="fa fa-angle-right"></i> Contatos </h4>
                                            <hr>
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th></th>
                                                <th>Nome</th>
                                                <th>Categoria</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cliente as $key=>$cl)
                                                    <tr>
                                                        <td>
                                                            {{++$key}}
                                                        </td>
                                                        <td>
                                                            <div class="thumb">
                                                                <img class="img-circle" src="/assets/img/friends/fr-05.jpg" width="35px" height="35px" >
                                                            </div>                                
                                                        </td>
                                                        <td>                                
                                                            <a href="{{route('cliente_edit',$cl->id)}}">
                                                                {{ $cl->nome }}
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="{{route('cliente_edit',$cl->id)}}">
                                                                Categoria: {{ $cl->categoria }}
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div><! --/content-panel -->
                                </div><!-- /col-md-12 -->
                        @endif
                        <br>
                        <br>
                        <br>
                        <br>
                        .
                  </div><!-- /col-lg-3 -->
              </div><! --/row -->
            </section>
          
                  <!--main content end-->
      </section>
      
      <!--main content end-->


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
	<script src="assets/js/zabuto_calendar.js"></script>	
	

	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    
    <script>
        $(document).ready(function(){
            $("#alert").delay(1000).fadeOut("slow");
            $("#title").delay(1500).fadeIn("slow");
        });
    </script>

@endsection('content')
