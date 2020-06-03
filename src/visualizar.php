<?php 
include("Includes/Header.php"); 
include("Class/ClassCrud.php");
?>

    <div class="Content">
        
        <?php
            $Crud = new ClassCrud();
            $IdUser = filter_input(INPUT_GET,'id',FILTER_SANITIZE_SPECIAL_CHARS);

            $BFetch = $Crud->selectDB(
                "*",
                "cadastro",
                "where Id=?",
                "i",
                array(
                    $IdUser
                )
            );
            $Result = $BFetch->fetch_all();
            foreach($Result as $Fetch){
        ?>
            <h1>Dados do Usuário</h1>
            <hr>
            <strong>Nome:</strong> <?php echo $Fetch[1]; ?><br>
            <strong>Instituição:</strong> <?php echo $Fetch[2]; ?><br>
            <strong>Curso:</strong> <?php echo $Fetch[3]; ?><br>
        <?php } ?>

    </div>

<?php include("Includes/Footer.php"); ?>
