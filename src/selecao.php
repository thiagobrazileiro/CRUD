<?php 
include("Includes/Header.php");
include("Class/ClassCrud.php"); 
?>

    <div class="Content">
        
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
                                <a href="<?php echo "visualizar.php?id={$Fetch[0]}"; ?>"><img class = "Icone" src="Imgs/Visualizar.png" alt="Visualizar"></a>
                                <a href="<?php echo "cadastro.php?id={$Fetch[0]}"; ?>"><img class = "Icone" src="Imgs/Editar.png" alt="Atualizar"></a>
                                <a class = "Deletar" href="<?php echo "Controllers/ControllerDeletar.php?id={$Fetch[0]}"; ?>"><img class = "Icone" src="Imgs/Deletar.png" alt="Deletar"></a>
                            </td>
                        </tr>
            <?php            
                    }
                }
            
            ?>

        </table>

    </div>

<?php include("Includes/Footer.php"); ?>
