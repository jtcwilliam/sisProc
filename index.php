<?php 

    header( 'Content-Type: text/html; charset=utf-8' );

    
 
?>


<!doctype html>
<html class="no-js" lang="en">
    
 <!-- inclusao do head (cabecalho com css ) -->
     <?php 
     
        include_once 'includes/head.php';   
        ?> 
  
  <body style="background-color: #1c2c4e; ">
   
      <?php
        //incluindo o header (semantico)
        include_once 'includes/header.php';
      
         
        
        
         
      ?>
              <div class="medium reveal" id="modalInformacoes" data-reveal>
                 
                   
                 
              </div>
      
      
      
      
      <div class="full reveal" id="modalSucessoLog" data-reveal data-close-on-click="true" data-animation-in="fade-in" data-animation-out="fade-out" style="background-color: #eaeef4">


          <div class="grid-container">
              <div class="grid-x grid-padding-x"  style="  padding-top: 1em; padding-bottom: 6em">
                  <div class="small-12 medium-12 large-12 cell" style="display: inline-table">
                      <center>
                         

                          <img src="img/logAberto.png" style="width: 40%"/>
                          
                           <h2 style="font-family: Arial; font-stretch: condensed; color: #0088c3; font-weight: bold">Acesso Permitido</h2>
                          
                      </center>
                  </div>


                  <div class="small-12 medium-12 large-12 cell" style="display: inline-table">
                      <center>

                          <br>

                          <img src="img/logoPrefeitura.png" style="width: 20%"/>
                      </center>
                  </div>
 

              </div>
          </div>



      </div>
      
        <main style="background-color:#e9eaea;   " >
          <div class="grid-container">
              <div class="grid-x grid-padding-x"  style="  padding-top: 4em; padding-bottom: 6em">
                  <div class="auto cell"></div>
                  <div class="small-12 medium-12 large-6 cell">
                      
                      <form action="controllerAjax/controllerCadPessoas.php" method="post">
                           <fieldset class="fieldset" style="border-radius: 20px; box-shadow: 5px 5px 12px rgba(0,0,0,0.2);">
                          
                           
                               <?php
                               
                               
                               if(isset($_GET['retorno'])){
                                        ?>
                                    <div class="grid-x grid-padding-x">
                                      <div class="small-12 medium-12 large-12 cell">                                                
                                           <label> 
                                               <center>
                                                   <h1 style="color: red">Acesso negado</h1>
                                               <h5 style="color: red">Verificar Usuário e Senha</h5>
                                               </center>
                                           </label>
                                       </div>    
                                   </div>

                               
                               
                               <?php
                               }
                               ?>
                              
                               
                          
                          <div class="grid-x grid-padding-x">
                             <div class="small-12 medium-12 large-12 cell">                                                
                                  <label>Usuário
                                      <input type="text" id="txtUsuario" placeholder="">
                                  </label>
                              </div>    
                          </div>
                           
                          <!-- importa aqui o nome das pessoas com cargo de diretor' -->
                          <div class="grid-x grid-padding-x">
                               <div class="small-12 medium-12 large-12 cell">                                                
                                  <label>Senha
                                      <input type="password" id="txtSenha" placeholder="">
                                  </label>
                              </div>
                              
                              
                              
                                  
                               
                              
                              <div class="small-12 medium-12 large-12 cell">                                                
                                  <label> 
                                        <button type="submit" class="button botaoConfirmar"  id="btntCadastrar" style="width: 100%; ">Acessar</button>
                                      
                                      
                                  </label>
                                  
                                   <label> 
                                       <a  href="cadPessoas.php" type="submit" class="button botaoConfirmar"  id="btntCadastrar" style="width: 100%; background-color: #202C4A ">Quero me Cadastrar</a>
                                      
                                      
                                  </label>
                              </div>
                          </div> 
                          
                          
                          
                          
                      </fieldset>
                       </form>
                  </div>
                     <div class="auto cell"></div>
              </div>
              
              
          </div>


      </main>
      
      <!-- incluindo o footer  -->
    <?php 
      include_once 'includes/footer.php';
    ?>

    
 
 
 
    <script>
        
          
      
    $( document ).ready(function() 
        {
            
        
        });    
            $('form').submit(function(event) {
                 
        
        var formData = {
            logar:2,
            usuario: $('#txtUsuario').val(),258
            senha: $('#txtSenha').val() 
            
        };

       
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'controllerAjax/controllerCadPessoas.php', // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode          : true
        })
            
            .done(function(data) {
                 
                 
                 console.log(data);
         
                 
                 
                if(data.retorno ==  true)
                    {
        
                    
                   
                        $('#modalInformacoes').css("background-color", "#d1feb0");
                        $('#conteudo').css('display','none');
                        $('#modalInformacoes').css("color", "#424300");                                            
                        $('#modalInformacoes').css("font-stretch", "semi-condensed");                      
                        $('#modalInformacoes').css("text-align","center");
                        
                        
                        
                        $('#modalSucessoLog').foundation('open');  
                  
                        setTimeout(function() 
                                    {
                                       window.location.href = "logar.php";
                                   }, 5000);

                    }else
                    {
                        $('#modalInformacoes').css("background-color", "black");       
                             
                        $('#modalInformacoes').css("border", "black");  
                        $('#conteudo').css('display','none');
                        $('#modalInformacoes').css("color", "white");                                            
                        $('#modalInformacoes').css("font-stretch", "ultra-condensed");                      
                        $('#modalInformacoes').css("text-align","center");
                        $('#modalInformacoes').html('<h1>Atenção</h1><h5>Seu acesso foi negado</h5>   <a type="submit" class="button botaoConfirmar"  onclick="zerarTela()"   id="btntCadastrar" style="width: 100%">Fechar</a>').foundation('open');  
                        
                    }
                  
            });
    // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    }); 
        
    </script>


</body>
</html>