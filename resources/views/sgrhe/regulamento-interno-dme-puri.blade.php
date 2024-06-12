<!--Layout Principal-->
@extends('layouts.app')
  @section('titulo' , 'Regulamento Interno ')
        @section('header')
        
             <!--Estilizacao do Previw foto de Perfil-->
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
               <!--Configuracao do Input da Foto de Perfil-->
                <style>
                  #inputFotoPerfil::before{
                    content: 'Actualizar Foto de Perfil'; /* Display the custom text */
              
                  }
                  .info-toggle {
                    display: none; 
                    transition: display 0.5s ease;
                  }

                  .info-toggle.visible {
                    display: block; 
                    transition: display 0.5s ease;
                    
                  }
                  .btn-toggle {
                    text-align: left;
                  }
                  .atrubutos-intem-funcionario{
                  /*  border: .5px dotted grey;*/
                    margin:10px;
                  }
                  .intem-funcionario{
                    border-radius: 10px;
                    background-color:rgba(0, 0, 0, 0.05);
                    margin: 10px;
                    padding: 10px;
                  }

                </style>    
              <!-- Scripts -->
        @endsection
        @section('conteudo_principal')

      <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
            <section class="content-header ">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1>Regulamento Interno</h1>
                  </div>
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Página Inicial</a></li>
                      <li class="breadcrumb-item active">Regulamento Interno</li>
                    </ol>
                  </div>
                </div>
              </div>
            </section>
          <!-- Content Header (Page header) -->
          <section class="content">
                <div class="container-fluid">
                  <div class="row">
                  <div class="col-md-12">
                   <div class="card card-primary">
                    <div class="card-header">
                      <h3>Regulamento Interno da Direcção Municipal da Educação</h3>
                    </div>
                    <div class="card-body">
                      corpo
                    </div>
                   </div>
                  </div>
                  </div>
                </div>
          </section>

        </div>
          
        @endsection
  @section('scripts')

      <!--Edicao de Corte de imagen -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
          <!--Algoritmo interactivo no processo de delectar Objectos em SweetAlert 2-->
          <script src="{{ asset('plugins/sweetalert2/alerta-deletar.js')}}"></script>
          <script>
              var bs_modal = $('#modal');
              var image = document.getElementById('image');
              const btn_Actualizar = document.getElementById("btn-Actualizar");
              //const label_inputFotoPerfil = document.querySelector('label[for="inputFotoPerfil"]');
              var cropper, reader, file;

              $("body").on("change", ".image", function (e) {
                  var files = e.target.files;
                  var done = function (url) {
                      image.src = url;
                      bs_modal.modal('show');
                  };

                  if (files && files.length > 0) {
                      file = files[0];

                      if (URL) {
                          done(URL.createObjectURL(file));
                      } else if (FileReader) {
                          reader = new FileReader();
                          reader.onload = function (e) {
                              done(reader.result);
                          };
                          reader.readAsDataURL(file);
                      }
                  }
              });

              bs_modal.on('shown.bs.modal', function () {
                  cropper = new Cropper(image, {
                      aspectRatio: 1,
                      viewMode: 3,
                      preview: '.preview'
                  });
              }).on('hidden.bs.modal', function () {
                  cropper.destroy();
                  cropper = null;
              });

              $("#crop").click(function () {
                  canvas = cropper.getCroppedCanvas({
                      width: 160,
                      height: 160,
                  });
                  canvas.toBlob(function (blob) {
                      url = URL.createObjectURL(blob);
                      var reader = new FileReader();
                      reader.readAsDataURL(blob);
                      reader.onloadend = function () {
                          var base64data = reader.result;
                          // Exibir a imagem recortada no formulário (opcional)
                          $('#croppedImage').val(base64data);
                          bs_modal.modal('hide');
                          //Mostrar o Botao Actualizar Foto de Perfil
                          btn_Actualizar.classList.remove("d-none");
                          // Change the label text
                        //  label_inputFotoPerfil.textContent = 'Voçe escolheu a foto de perfil!';
                      };
                  });
              });
          </script>
      <!--Edicao de Corte de imagen para foto de perfil-->

      <!--Scripts para o modal de Addicionar documentos Do Funcionario-->
        <!-- Adicione script para lidar com a dinamicidade do formulário -->
        <script>
            $('.btn-modal-doc-edit').click(function() {
                var formAction = $(this).data('form-action');
                var modalId = $(this).data('target');
                
                $(modalId).find('form').attr('action', formAction);
            });
        </script>
      <!--/Scripts para o modal de Addicionar documentos Do Funcionario-->

      <!--Evento para Mudar a Menssagem do Ipntut pos escolha do cheiro-->
        <!-- Adicione script para lidar com a dinamicidade do formulário -->
        <script>
                $(document).ready(function(){
                  $(".custom-file-input").on("change", function() {
                      var fileName = $(this).val().split("\\").pop();
                      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                  });
              });
        </script>
      <!--/Evento para Mudar a Menssagem do Ipntut pos escolha do cheiro-->

      <script>
        function toggleInfo() {
          const btnToggles = document.querySelectorAll('.btn-toggle');

          btnToggles.forEach((btnToggle) => {
            btnToggle.addEventListener('click', () => {
              const targetId = btnToggle.dataset.target;
              const infoToggle = document.getElementById(targetId);

              infoToggle.classList.toggle('visible');
            });
          });
        }

        toggleInfo();
      </script>


<script>
    // Captura o botão de abrir a modal
    var abrirModalBtn = document.querySelector('.abrir-modal');

    // Captura a modal
    var modal = document.getElementById('myModal');

    // Ação ao clicar no botão de abrir a modal
    abrirModalBtn.addEventListener('click', function() {
        modal.style.display = 'block';
    });

    // Captura o botão de fechar a modal
    var fecharModalBtn = document.querySelector('.fechar-modal');

    // Ação ao clicar no botão de fechar a modal
    fecharModalBtn.addEventListener('click', function() {
        modal.style.display = 'none';
    });
</script>

<!--Limitar a Data por 7 dias no Maximo no Formulario Modal Pedido de Licensa-->
  <script>
    document.getElementById("formLicenca").addEventListener("submit", function(event) {
      event.preventDefault(); // Impede o envio do formulário
      
      // Obtém as datas de início e término
      var startDate = new Date(document.getElementById("dataInicio").value);
      var endDate = new Date(document.getElementById("dataFim").value);
      
      // Calcula a diferença em milissegundos entre as duas datas
      var difference = endDate.getTime() - startDate.getTime();
      
      // Converte a diferença de milissegundos para dias
      var numberOfDays = difference / (1000 * 3600 * 24);
      
      // Define o limite máximo de dias permitido
      var maxDays = 7; // Altere conforme necessário
      
      // Verifica se a data final é anterior à data inicial
      if (endDate < startDate) {
        document.getElementById("dateError").innerText = "A data de término não pode ser anterior à data de início!";
        document.getElementById("dateError").style.display = "block"; // Exibe a mensagem de erro
      } else if (numberOfDays > maxDays) {
        document.getElementById("dateError").innerText = "Os dis de licença não podem exceder " + maxDays + " dias. artigo ...!";
        document.getElementById("dateError").style.display = "block"; // Exibe a mensagem de erro
      } else {
        document.getElementById("dateError").style.display = "none"; // Oculta a mensagem de erro
        this.submit(); // Envio do formulário se estiver tudo correto
      }
    });
  </script>
<!--Limitar a Data por 7 dias no Maximo no Formulario Modal Pedido de Licensa-->
<!--Scripts de controolo de caracter da classe Texo-->
  <script>
        // Seleciona o input de texto e o contador de caracteres
      const textoInput = document.getElementById('texto');
      const contadorCaracteres = document.getElementById('contadorCaracteres');

      // Define o limite de caracteres
      const limiteCaracteres = 100;

      // Adiciona um evento de input ao input de texto
      textoInput.addEventListener('input', function() {
          // Obtém o número de caracteres digitados
          const numCaracteres = textoInput.value.length;
          
          // Atualiza o contador de caracteres
          contadorCaracteres.textContent = numCaracteres + '/' + limiteCaracteres;
          
          // Verifica se o número de caracteres excede o limite
          if (numCaracteres > limiteCaracteres) {
              // Trunca o texto para o limite de caracteres
              textoInput.value = textoInput.value.substring(0, limiteCaracteres);
          }
      });
  </script>

        <!--Sscripts para Popular o SelectOption das Procincias de Forma Dinamica-->
            <script>
              function carregarMunicipiosEndereco() {
                  const provincia = document.getElementById("provinciaEndereco").value;
                  const municipioSelectEndereco = document.getElementById("municipioEndereco");

                  // Limpe os municípios anteriores
                  municipioSelectEndereco.innerHTML = "<option value=''>Carregando...</option>";

                  // Simule uma solicitação AJAX para obter municípios com base na província selecionada
                  setTimeout(() => {
                      municipioSelectEndereco.innerHTML = "<option value=''>Selecione um município</option>";
                      switch (provincia) {
                          case "Bengo":
                              municipioSelectEndereco.innerHTML += "<option value='Ambriz'>Ambriz </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Bula Atumba'>Bula Atumba </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Dande'>Dande </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Nambuangongo'>Nambuangongo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Quibaxe'>Quibaxe </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Caxito'> Caxito </option>";
                              break;
                          case "Benguela":
                              municipioSelectEndereco.innerHTML += "<option value='Baia Farta'>Baia Farta </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Balombo'>Balombo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Benguela'>Benguela </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Bocoio'>Bocoio </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Caimbambo'>Caimbambo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Chongoroi'>Chongoroi </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cubal'>Cubal </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Ganda'>Ganda </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Lobito'>Lobito </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Vaváu'>Vaváu </option>";
                              break;
                          case "Bié":
                              municipioSelectEndereco.innerHTML += "<option value='Andulo'>Andulo</option>";
                              municipioSelectEndereco.innerHTML += "<option value='Camacupa'>Camacupa</option>";
                              municipioSelectEndereco.innerHTML += "<option value='Catabola'>Catabola</option>";
                              municipioSelectEndereco.innerHTML += "<option value='Chinguar'>Chinguar</option>";
                              municipioSelectEndereco.innerHTML += "<option value='Chitembo'>Chitembo</option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cuemba'>Cuemba</option>";
                              municipioSelectEndereco.innerHTML += "<option value='Huambo'>Huambo</option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cunhinga'>Cunhinga</option>";
                              municipioSelectEndereco.innerHTML += "<option value='Kuito'>Kuito</option>";
                              municipioSelectEndereco.innerHTML += "<option value='Nhârea'>Nhârea</option>";
                            
                              break;
                          case "Cabinda":
                              municipioSelectEndereco.innerHTML += "<option value='Belize'>Belize </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Buco-Zau'>Buco-Zau </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cabinda'>Cabinda </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cangongo'>Cangongo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Dinge'>Dinge </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Lândana'>Lândana </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Luali'>Luali </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Massabi'>Massabi </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Necuto'>Necuto </option>";
                            
                              break;
                          case "Cuando Cubango":
                              municipioSelectEndereco.innerHTML += "<option value='Calai'>Calai </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cuangar'>Cuangar </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cuchi'>Cuchi </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cuito'>Cuito Cuanavale</option>";
                              municipioSelectEndereco.innerHTML += "<option value='Dirico'>Dirico </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Longa'>Longa </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Menongue'>Menongue </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Mavinga'>Mavinga </option>";
                              municipioSelectEndereco.innerHTML += "<option value='NAncova'>NAncova </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Rivungo'>Rivungo </option>";
                            
                              break;
                          case "Cuanza Norte":
                              municipioSelectEndereco.innerHTML += "<option value='Ambaca'> Ambaca </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Banga'> Banga </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Bolongongo'> Bolongongo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cambambe'> Cambambe </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Golungo'> Golungo Alto </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Lucala'> Lucala </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Ngonguembo'> Ngonguembo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Quiculungo'> Quiculungo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Samba Cajú'> Samba Cajú </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Santa Isabel'> Santa Isabel </option>";
                            
                              break;
                          case "Cuanza Sul":
                              municipioSelectEndereco.innerHTML += "<option value='Amboim'> Amboim  </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cela'> Cela  </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Conda'> Conda  </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Ebo'> Ebo  </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Libolo'> Libolo  </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Mussende'> Mussende  </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Porto Amboim'> Porto Amboim  </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Quibala'> Quibala  </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Quilenda'> Quilenda  </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Seles'> Seles  </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Sumbe'> Sumbe </option>";
                              break;
                          case "Cunene":
                              municipioSelectEndereco.innerHTML += "<option value='Cahama'> Cahama </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Kuanhama'> Kuanhama </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Kuvelai'> Kuvelai </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Namacunde'> Namacunde </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Ombadja'> Ombadja </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Ondjiva'> Ondjiva </option>";
                          case "Huambo":
                              municipioSelectEndereco.innerHTML += "<option value='Bailundo'> Bailundo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Ekunha'> Ekunha </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Huambo'> Huambo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Londuimbali'> Londuimbali </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Longonjo'> Longonjo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Mungo'> Mungo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Tchicala'> Tchicala Tcholoanga </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Ucuma'> Ucuma </option>";
                              break;
                          case "Huíla":
                              municipioSelectEndereco.innerHTML += "<option value='Caconda'> Caconda </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cacula'> Cacula </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Caluquembe'> Caluquembe </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Chicomba'> Chicomba </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Chibia'> Chibia </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Chipindo'> Chipindo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Humpata'> Humpata </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Lubango'> Lubango </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Matala'> Matala </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Quilengues'> Quilengues </option>";
                              break;
                          case "Luanda":
                              municipioSelectEndereco.innerHTML += "<option value='Belas'> Belas </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cacuaco'> Cacuaco </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cazenga'> Cazenga </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Icolo e Bengo'> Icolo e Bengo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Luanda'> Luanda </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Quiçama'> Quiçama </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Talatona'> Talatona </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Viana'> Viana </option>";
                              break;
                          case "Lunda Norte":
                              municipioSelectEndereco.innerHTML += "<option value='Cambulo'> Cambulo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Capenda'> Capenda Camulemba </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Caungula'> Caungula </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Chitato'> Chitato </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cuango'> Cuango </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Lóvua'> Lóvua </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Lubalo'> Lubalo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Lucapa'> Lucapa </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Xá Muteba'> Xá Muteba </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cuilo'> Cuilo </option>";
                              break;
                          case "Lunda Sul":
                              municipioSelectEndereco.innerHTML += "<option value='Cacolo'> Cacolo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Dala'> Dala </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Muconda'> Muconda </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Saurimo'> Saurimo </option>";
                              break;
                          case "Malanje":
                              municipioSelectEndereco.innerHTML += "<option value='Cahombo'> Cahombo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Caculama'> Caculama </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Calandula'> Calandula </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cangandala'> Cangandala </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Kangandala'> Kangandala </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Kunda'> Kunda dya Baze </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Luquembo'> Luquembo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Malanje'> Malanje </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Marimba'> Marimba </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Massango'> Massango </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Mucari'> Mucari </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Quela'> Quela </option>";
                              break;
                          case "Moxico":
                              municipioSelectEndereco.innerHTML += "<option value='Alto Zambeze'> Alto Zambeze </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Bundas'> Bundas </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Camanongue'> Camanongue </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cameia'> Cameia </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Luacano'> Luacano </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Luchazes'> Luchazes </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Luena'> Luena </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Lumeje'> Lumeje </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Luau'> Luau </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Lutembo'> Lutembo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Moxico'> Moxico </option>";
                              break;
                          case "Namibe":
                              municipioSelectEndereco.innerHTML += "<option value='Bibala'> Bibala </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Camucuio'> Camucuio </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Moçâmedes'> Moçâmedes </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Namibe'> Namibe </option>";
                              break;
                          case "Uíge":
                              municipioSelectEndereco.innerHTML += "<option value='Bembe'> Bembe </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Buengas'> Buengas </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Bungo'> Bungo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Damba'> Damba </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Maquela do Zombo'> Maquela do Zombo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Milunga'> Milunga </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Negage'> Negage </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Puri'> Puri </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Quimbele'> Quimbele </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Quitexe'> Quitexe </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Sanza Pombo'> Sanza Pombo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Songo'> Songo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Alto Cauale'> Alto Cauale </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Uíge'> Uíge </option>";
                              break;
                          case "Zaire":
                              municipioSelectEndereco.innerHTML += "<option value='Cuimba'> Cuimba </option>";
                              municipioSelectEndereco.innerHTML += "<option value='M'banza-Kongo'> M'banza-Kongo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Nóqui'> Nóqui </option>";
                              municipioSelectEndereco.innerHTML += "<option value='N'zeto'> N'zeto </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Soyo'> Soyo </option>";
                              break;  
                          // Adicione mais casos para outras províncias aqui
                          default:
                              municipioSelectEndereco.innerHTML += "<option value=''>Nenhum município disponível</option>";
                      }
                  }, 1000); // Simulando um atraso de 1 segundo para uma solicitação AJAX
              }
            </script>

 @endsection