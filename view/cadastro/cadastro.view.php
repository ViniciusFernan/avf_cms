<?php
if (!defined('ABSPATH'))
    exit;
$Param = $this->getParams();
$dadosForm = (!empty($Param['post']) ? $Param['post'] : NULL  );
$boxMsg = (!empty($Param['boxMsg']) ? $Param['boxMsg'] : NULL);

$logoSistema = THEME_URI . "/_assets/images/LOGO_DEFAULT.png";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cadastro novo usuario</title>

    <?php include THEME_DIR . "/_include/head.php"; ?>

    <!-- Custom styling plus plugins -->
    <link href="<?= THEME_URI; ?>/_assets/css/custom.css" rel="stylesheet">


    <style>

        html{
            background: -webkit-linear-gradient(135deg, hsl(262, 52%, 47%) 15%, hsla(196.18, 77.39%, 54.9%, 0) 80%),
                        -webkit-linear-gradient(315deg, hsl(262, 52%, 47%) 0%, hsla(196.21, 100%, 35.84%, 0) 70%);
            background: linear-gradient(315deg, hsl(262, 46%, 75%) 15%, hsla(196.18, 77.39%, 54.9%, 0) 80%),
                        linear-gradient(135deg, hsl(262, 52%, 47%) 0%, hsla(196.21, 100%, 35.84%, 0) 70%);

            height: auto;
            min-height: 100%;
            background-repeat: no-repeat;
        }
        .card-border-none{
            border: none;
        }


    </style>

</head>
<body>

<div class="container">
    <!-- Material form login -->
    <div class="card card-border-none">

        <h5 class="card-header bg-roxo white-text text-center py-4">
            <img src="<?=$logoSistema?>" style="width: 118px;">
        </h5>


        <!-- Form -->
        <form class="" style="color: #757575;" method="post" action="<?=HOME_URI?>/cadastro/cadastrarNovoUsuario" >

            <div class="card-body">

                <div class="msg-box"><?php if(!empty($boxMsg)): echo Util::getAlert($boxMsg['msg'], $boxMsg['tipo']); endif; ?></div>

                <div class="row">
                    <div class="col-sm-6">
                        <!-- nome -->
                        <div class="form-group">
                            <label ><i style="color: #ff0219">*</i> Nome</label>
                            <input type="text" class="form-control" name="nome" value="<?=(!empty($dadosForm['nome'])? $dadosForm['nome'] : '' )?>" >

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- sobre nome -->
                        <div class="form-group">
                            <label >Sobre nome</label>
                            <input type="text" class="form-control" name="sobreNome" value="<?=(!empty($dadosForm['sobreNome'])? $dadosForm['sobreNome'] : '' )?>" >

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <!-- E-mail -->
                        <div class="form-group">
                            <label ><i style="color: #ff0219">*</i> E-mail</label>
                            <input type="email" class="form-control" name="email" value="<?=(!empty($dadosForm['email'])? $dadosForm['email'] : '' )?>" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- senha -->
                        <div class="form-group">
                            <label ><i style="color: #ff0219">*</i> Senha</label>
                            <input type="password" name="senha" class="form-control" >
                            <small  class="form-text text-muted">
                                Uma senha segura deve conter caracteres e nomeros
                            </small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <!-- telefone -->
                        <div class="form-group">
                            <label ><i style="color: #ff0219">*</i> Telefone Principal</label>
                            <input type="tel"  name="telefone" class="form-control tel" value="<?=(!empty($dadosForm['telefone'])? $dadosForm['telefone'] : '' )?>">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <!-- telefone -->
                        <div class="form-group">
                            <label > Telefone sec. </label>
                            <input type="tel"  name="telefone_aux" class="form-control tel" value="<?=(!empty($dadosForm['telefone_aux'])? $dadosForm['telefone_aux'] : '' )?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <!-- sexo -->
                            <label ><i style="color: #ff0219">*</i> Sexo</label>
                            <select class="form-control" name="sexo">
                                <option value="" disabled selected>Selecione sexo</option>
                                <option value="1" <?=((!empty($dadosForm['sexo']) && $dadosForm['sexo'] == 1 ) ? 'selected="selected"' : '' )?> >Masculino</option>
                                <option value="2" <?=((!empty($dadosForm['sexo']) && $dadosForm['sexo'] == 2 ) ? 'selected="selected"' : '' )?> >Feminino</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <!-- nascimento -->
                        <div class="form-group">
                            <label><i style="color: #ff0219">*</i> Data de nascomento</label>
                            <input type="text"  class="form-control calendario" name="dataNascimento" value="<?=(!empty($dadosForm['dataNascimento'])? $dadosForm['dataNascimento'] : '' )?>" >
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <!-- cpf -->
                        <div class="form-group">
                            <label><i style="color: #ff0219">*</i> CPF </label>
                            <input type="text" name="CPF" class="form-control cpf"  value="<?=(!empty($dadosForm['CPF'])? $dadosForm['CPF'] : '' )?>" >
                        </div>
                    </div>
                </div>




                <div class="md-form mt-0 mb-0" style="text-align: left">
                    <a class="btn btn-mdb-color btn-sm my-0" href="<?=HOME_URI?>"  ><i class="fas fa-reply"></i> Voltar ao login </a>
                </div>


            </div>

            <div class="card-footer">
                <!-- Sign in button -->
                <button class="btn bg-roxo btn-rounded btn-block waves-effect " style="color: #fff" ><b class="white" >Cadastrar</b></button>
            </div>

        </form>
        <!-- Form -->
    </div>
    <!-- Material form login -->
</div>

</body>

<?php include THEME_DIR . "/_include/after-footer.php"; ?>



</html>
