<?php 
include("../Includes/Header.php");
include("../Model/ClassCrud.php"); 
?>

    <div class="Content">
        <div class="ResultadoD"></div>
        
        <table class="TabelaCrud">
            <tr>
                <td>Nome</td>
                <td>Instituição</td>
                <td>Curso</td>
                <td>Ações</td>
            </tr>

            <!-- Estrutura de loop -->
            <?php
                $Crud = new ClassCrud();
                $BFetch = $Crud->selectDB(
                    "*",
                    "cadastro",
                    "",
                    "",
                    array()
                );
                while($Result = $BFetch->fetch_all()){
                    foreach($Result as $Fetch){
                        ?>
                        <tr>
                            <td><?php echo $Fetch[1];?></td>
                            <td><?php echo $Fetch[2];?></td>
                            <td><?php echo $Fetch[3];?></td>
                            <td>
                                <a title="Visualizar mais informações" href="<?php echo "visualizar.php?id={$Fetch[0]}"; ?>"><img class = "Icone" src="../Imgs/Visualizar.png" alt="Visualizar"></a>
                                <a title="Editar o dado" href="<?php echo "cadastro.php?id={$Fetch[0]}"; ?>"><img class = "Icone" src="../Imgs/Editar.png" alt="Atualizar"></a>
                                <a class = "Deletar" title="Deletar o dado" href="<?php echo "../Controllers/ControllerDeletar.php?id={$Fetch[0]}"; ?>"><img class = "Icone" src="../Imgs/Deletar.png" alt="Deletar"></a>
                            </td>
                        </tr>
            <?php            
                    }
                }
            
            ?>

        </table>

    </div>

<?php include("../Includes/Footer.php"); ?>
