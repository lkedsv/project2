@extends('index')

@section('content')

<!--Máscara para telefone-->

<script>
    const handlePhone = (event) => {
    let input = event.target
    input.value = phoneMask(input.value)
    }

    const phoneMask = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g,'')
    value = value.replace(/(\d{2})(\d)/,"($1) $2")
    value = value.replace(/(\d)(\d{4})$/,"$1-$2")
    return value
    }
</script>

<!--ViaCEP-->

<script>
    
  function limpa_formulário_cep() {
          //Limpa valores do formulário de cep.
          document.getElementById('rua').value=("");
          document.getElementById('bairro').value=("");
          document.getElementById('cidade').value=("");
          document.getElementById('uf').value=("");
  }

  function meu_callback(conteudo) {
      if (!("erro" in conteudo)) {
          //Atualiza os campos com os valores.
          document.getElementById('rua').value=(conteudo.logradouro);
          document.getElementById('bairro').value=(conteudo.bairro);
          document.getElementById('cidade').value=(conteudo.localidade);
          document.getElementById('uf').value=(conteudo.uf);
      } //end if.
      else {
          //CEP não Encontrado.
          limpa_formulário_cep();
          alert("CEP não encontrado.");
      }
  }
      
  function pesquisacep(valor) {

      //Nova variável "cep" somente com dígitos.
      var cep = valor.replace(/\D/g, '');

      //Verifica se campo cep possui valor informado.
      if (cep != "") {

          //Expressão regular para validar o CEP.
          var validacep = /^[0-9]{8}$/;

          //Valida o formato do CEP.
          if(validacep.test(cep)) {

              //Preenche os campos com "..." enquanto consulta webservice.
              document.getElementById('rua').value="...";
              document.getElementById('bairro').value="...";
              document.getElementById('cidade').value="...";
              document.getElementById('uf').value="...";

              //Cria um elemento javascript.
              var script = document.createElement('script');

              //Sincroniza com o callback.
              script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

              //Insere script no documento e carrega o conteúdo.
              document.body.appendChild(script);

          } //end if.
          else {
              //cep é inválido.
              limpa_formulário_cep();
              alert("Formato de CEP inválido.");
          }
      } //end if.
      else {
          //cep sem valor, limpa formulário.
          limpa_formulário_cep();
      }
  };

</script>

<!--Máscara e Validação para CPF-->

<script>
    function is_cpf(c) {

    if((c = c.replace(/[^\d]/g,"")).length != 11)
      return false

    if (c == "00000000000")
      return false;

    var r;
    var s = 0;

    for (i=1; i<=9; i++)
      s = s + parseInt(c[i-1]) * (11 - i);

    r = (s * 10) % 11;

    if ((r == 10) || (r == 11))
      r = 0;

    if (r != parseInt(c[9]))
      return false;

    s = 0;

    for (i = 1; i <= 10; i++)
      s = s + parseInt(c[i-1]) * (12 - i);

    r = (s * 10) % 11;

    if ((r == 10) || (r == 11))
      r = 0;

    if (r != parseInt(c[10]))
      return false;

    return true;
   
   }


    function fMasc(objeto,mascara) {
      obj=objeto
      masc=mascara
      setTimeout("fMascEx()",1)
    }

    function fMascEx() {
      obj.value=masc(obj.value)
    }

    function mCPF(cpf){
      cpf=cpf.replace(/\D/g,"")
      cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
      cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
      cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
      return cpf
    }

    function cpfCheck(val) {
      //alert (val);
      document.getElementById('cpfResponse').innerHTML = is_cpf(val) ? '<span style="color:green">CPF válido</span>' : '<span style="color:red">CPF inválido</span>';
      if(val=='') document.getElementById('cpfResponse').innerHTML = '';
    }
</script>


      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>ATUALIZAR CADASTRO</b></a>
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
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="/assets/img/user11.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">   {{ Auth::user()->name }} </h5>
              	  	
                    <li class="mt">
                        <a class="" href="{{ route('painel', Auth::user()->id) }}">
                          <i class="fa fa-dashboard"></i>
                          <span>Contatos</span>
                        </a>
                    </li>
                    <li class="mt">
                      <a class="" href="{{ route('cliente_form') }}">
                          <i class="fa fa-dashboard"></i>
                          <span>Adicionar</span>
                      </a>
                    </li>
                    <li class="mt">
                      <a class="active" href="{{ route('cliente_edit', $cliente->id) }}">
                          <i class="fa fa-dashboard"></i>
                          <span>Editar</span>
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
      <div id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Preencha dos dados do Cliente</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Edição de dados do Cliente</h4>
                      <form class="form-horizontal style-form" action="{{ route('cliente_update', $cliente->id) }}" method="post">
                        @csrf  
                        <!--
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Help text</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control">
                                  <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                              </div>
                          </div>
                         -->
                         
                          <input type="hidden"  id="user_id" name="user_id" value=" {{ Auth::user()->id }}">

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input class="form-control round-form" type="text" name="nome" value="{{$cliente->nome}}" class="form-control" placeholder="NOME *">
                                  @if($errors->has('nome'))
                                    <span class="help-block" style="color:red">{{ $errors->first('nome') }}</span>
                                  @endif  
                                  <br>
                                </div>
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                <input type="text" name="cpf" id="cpf" class="form-control round-form" maxlength="18" value="{{$cliente->cpf}}" placeholder="CPF *" onkeyup="cpfCheck(this.value)" onkeydown="javascript: fMasc( this, mCPF );"> 
                                <span class="help-block" id="cpfResponse"></span>
                                @if($errors->has('cpf'))
                                    <span class="help-block" style="color:red">{{ $errors->first('cpf') }}</span>
                                @endif
                                <br>
                              </div>
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                <input type="text" name="categoria" class="form-control round-form" value="{{$cliente->categoria}}" placeholder="CATEGORIA" />
                                <br>
                                </div>
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                <input type="tel" name="telefone" class="form-control round-form" placeholder="TELEFONE" value="{{$cliente->telefone}}" maxlength="15"  onkeyup="handlePhone(event)"/>
                                <br>
                               </div>
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                <input type="text" name="cep" id="cep" class="form-control round-form" placeholder="CEP *" value="{{$endereco->cep}}" onblur="pesquisacep(this.value)"/>
                                @if($errors->has('cep'))
							                  <span class="help-block" style="color:red">{{ $errors->first('cep') }}</span>
						                   @endif
                                <br>
                              </div>
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                <input type="text" name="rua" id="rua" class="form-control round-form"  value="{{$endereco->rua}}" placeholder="RUA" />
                                <br>
                              </div>
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                <input type="text" name="bairro" id="bairro" class="form-control round-form" value="{{$endereco->bairro}}" placeholder="BAIRRO" />
                                <br>
                              </div>
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                <input type="text" name="cidade" id="cidade" class="form-control round-form" value="{{$endereco->cidade}}" placeholder="CIDADE" />
                                <br>
                              </div>
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                <input type="text" name="uf" id="uf" class="form-control round-form" placeholder="UF" value="{{$endereco->uf}}" />
                                <br>
                              </div>
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                <input type="text" name="complemento" class="form-control round-form" placeholder="COMPLEMENTO" value="{{$endereco->complemento}}" />
                                <br>
                              </div>
                              
                          </div>
                    <div style="display: flex; justify-content: center">
                          <div class="btn-group" style="margin-right: 25px">
                            <button type="submit" class="btn btn-theme03"><i class="fa fa-check"></i> ALTERAR</button>
                          </div>
                      </form>
                      <br>
                      <div class="btn-group">
                        <form action="{{ route('cliente_delete', $cliente->id) }}" method="post">
                          @csrf  
                          <input type="hidden"  id="user_id" name="user_id" value=" {{ Auth::user()->id }}">
                          <button type="submit" class="btn btn-theme04"><i class="fa fa-check"></i> EXCLUIR</button>
                        </form>
                      </div>
                    </div>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->

          	

        
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="assets/js/form-component.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>


@endsection
