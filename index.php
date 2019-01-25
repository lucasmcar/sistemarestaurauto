<!DOCTYPE html>

<?php
    
    function myLoad($className){
        require_once("classes/". $className . ".php");
    }
    spl_autoload_register("myLoad");
        
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
        <title></title>
    </head>
    <body>
        <?php
        
        
        
         $func = new Funcionario();
         try{
            if(isset($_POST['enviar'])){
            
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
            $funcao = filter_input(INPUT_POST, 'funcao', FILTER_SANITIZE_STRING);
            $func_sc = filter_input(INPUT_POST, 'func_sc', FILTER_SANITIZE_STRING);
            $idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT); 
             
            $func->setNome($nome);
            $func->setFuncao($funcao);
            $func->setFuncaoSencudaria($func_sc);
            $func->setIdade($idade);
            $func->insert();
            }
         } catch (Exception $ex){
             echo $ex->getMessage() ;
         }
        ?>
        <div class="container">
        <form method="POST" action="">
            <div class="form-group">
                <label for="nome">Nome do Funcionário</label>
                <input type="text" id="nome" name="nome" placeholder="Insira seu nome"class="form-control">
            </div>
            <div class="form-group">
                <label for="funcao">Função</label>
                <input type="text" id="funcao" name="funcao" placeholder="Insira a função" class="form-control">
            </div>
            <div class="form-group">
                <label for="func_sc">Função secundaria</label>
                <input type="text" id="func_sc" name="func_sc" placeholder="Insira sua funçao secundaria"  class="form-control">
            </div>
            <div class="form-group">
                <label for="idade">Idade do funcionario</label>
                <input type="text" id="idade" name="idade" placeholder="idade"  class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn badge-primary" name="enviar">Enviar</button>
            </div>
        </form>
            <div class="row">
                <div class="form-group">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
                        Atualizar
                    </button>
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Função</th>
                        <th>Função secundária</th>
                        <th>Idade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <?php foreach($func->viewAll() as $k => $valor){ ?>
                <tbody>
                    <tr>
                        <td><?php echo $valor->id_func;?></td>
                        <td><?php echo $valor->nome;?></td>
                        <td><?php echo $valor->funcao;?></td>
                        <td><?php echo $valor->funcaosecundaria;?></td>
                        <td><?php echo $valor->idade;?></td>
                        
                    </tr>
                </tbody>
                <?php } ?>
            </table>
       
            </div>
        </div>
        
        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar Funcionário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
              <label>Selecione o id</label>
              
              <select class="form-control">
                  <?php foreach($func->viewAll() as $key => $v) {?>
                     <?php echo "<option>" . $v->id_func . "</option>";?>
                  <?php }?>
              </select>
              
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Salvar alterações</button>
      </div>
    </div>
  </div>
</div>
        
        
    </body>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
        });
   <script>
</html>
