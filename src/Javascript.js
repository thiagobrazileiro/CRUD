/* Avisar que Cadastrou um usuario sem sair da tela de cadastro*/ 
$("#FormCadastro").on('submit',function(event){
    event.preventDefault();
    var Dados = $(this).serialize();

    $.ajax({
        url: 'Controllers/ControllerCadastro.php',
        type: 'post',
        dataType: 'html',
        data: Dados,
        // Este success faz com que retorne o que tem na outra pagina como resultado, como nao tem nada mais, eu comentei
        // mas seria o "cadastrado com sucesso" que ficava dentro da div .Resultado
        success: function(Dados){
            $('.Resultado').show().html(Dados);
        }
    })
});

/* Confirmar antes de deletar os dados */
$('.Deletar').on('click',function(event){
    event.preventDefault();

    var Link=$(this).attr('href');

    if(confirm(`Deseja mesmo deletar este Dado ?(esta operação é irreversível)`)){
        var Dados = $(this).serialize();
        $.ajax({
            url: Link,
            type: 'get',
            dataType: 'html',
            data: Dados,
            success: function(Dados){
                //window.location.reload();
                $('.ResultadoD').show().html(Dados);
            }
        })
    }else{
        return false;
    }

}); 

//"Deseja mesmo apagar esse dado?"
