<?php
include("Class/ClassCrud.php");

    if(isset($_GET['id'])){
        $Acao = "Editar";

        $Crud = new ClassCrud();
        $BFetch = $Crud->selectDB("*","cadastro","where Id=?","i",array($_GET['id']));
        $Fetch = $BFetch->fetch_all();
        foreach($Fetch as $Fetchs){
            $Id = $Fetchs[0];
            $Nome = $Fetchs[1];
            $Instituicao = $Fetchs[2];
            $Curso = $Fetchs[3];
        }
        
    }else{
        $Acao = "Cadastrar";
        $Id = "";
        $Nome = "";
        $Instituicao = "";
        $Curso = "";
    }

?>
   		<!-- Modal -->
		<div class="modal fade resultado" id="modalSucesso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Sucesso!</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				Cadastro Realizado com Sucesso!
			  </div>
			  <div class="modal-footer">
				<button type="button" onClick="window.location.reload()" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			
			  </div>
			</div>
		  </div>
		</div>
		
    <div class="Formulario">
        <h1 class="Center">Cadastro</h1>
		

		
        <form name="FormCadastro" id="FormCadastro" method="post" action="Controllers/ControllerCadastro.php">
            <input type="hidden" id="Acao" name="Acao" value="<?php echo $Acao; ?>">
            <input type="hidden" id="Id" name="Id" value="<?php echo $Id; ?>">

            <div class="FormularioInput">
                Nome: <br>
                <input type="text" id="Nome" name="Nome" value="<?php echo $Nome; ?>">
            </div>

            <div class="FormularioInput">
                Instituicao: <br>
                <input type="text" id="Instituicao" name="Instituicao" value="<?php echo $Instituicao; ?>">
            </div>

            <div class="FormularioInput">
                Curso: <br>
                <input type="text" id="Curso" name="Curso" value="<?php echo $Curso; ?>">
            </div>

            <div class="FormularioInput FormularioInput100 Center">

				<input type="submit" value="<?php echo $Acao; ?>" class="btn btn-primary" data-toggle="modal" data-target="#modalSucesso">
				
            </div>
        </form>

    </div>