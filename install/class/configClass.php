<?php


class configClass
{
    public $hash = "";

    public function createConfigAvf($configCms) {
        try {
            $configAVF = fopen($_SERVER['DOCUMENT_ROOT'] . '/config/config.avf', 'w');
            if ($configAVF == false) throw new Exception('Não foi possível criar o arquivo.');

            $conteudo = "[DataBase] \n ";
            $conteudo .= "db_host           = {$configCms['db_host']} \n ";
            $conteudo .= "db_name           = {$configCms['db_name']} \n ";
            $conteudo .= "db_user           = {$configCms['db_user']} \n ";
            $conteudo .= "db_password       = {$configCms['db_password']} \n ";
            $conteudo .= "db_port           = {$configCms['db_port']} \n\n\n\n";

            $conteudo .= "[Application] \n";
            $conteudo .= "project_name      = {$configCms['nome_projeto']} \n";
            $conteudo .= "app_url           = {$configCms['url_projeto']} \n\n\n\n";

            $conteudo .= "[EmailConfg] \n";
            $conteudo .= "mail_host         = smtp.gmail.com \n";
            $conteudo .= "mail_user         = avf.sistema@gmail.com \n";
            $conteudo .= "mail_pass         = ajsmema \n";
            $conteudo .= "mail_port         = 587 \n";
            $conteudo .= "mail_send         = smtp.gmail.com \n";
            $conteudo .= "mail_send_name    = SISTEMA \n ";

            fwrite($configAVF, $conteudo);
            fclose($configAVF);

            return true;
        } catch (Exception $e) {
            return $e;
        }
    }

    private function conn($configCms) {
        try {
            $conn = new PDO("mysql:host={$configCms['db_host']};dbname={$configCms['db_name']}", $configCms['db_user'], $configCms['db_password']);
            $conn->exec("SET CHARACTER SET utf8");
            return $conn;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function createTables($configCms){
        try {
            $conn = $this->conn($configCms);
             if(!$conn instanceof PDO) throw new Exception("PDO ERROR.");

            // sql to create table
            $createPefil = "CREATE TABLE perfil (
                                idPerfil INT(11) NOT NULL AUTO_INCREMENT,
                                nomePerfil VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
                                tipoPerfil INT(1) NOT NULL DEFAULT '2' COMMENT '[0->admin | 1-anunciante | 2-> usuario]',
                                status INT(1) NOT NULL DEFAULT '1',
                            PRIMARY KEY (idPerfil) USING BTREE )
                            COMMENT='Perfils de usuarios criados pelo administrador do sistema'
                            COLLATE='utf8_general_ci'
                            ENGINE=InnoDB
                            ROW_FORMAT=COMPACT
                            AUTO_INCREMENT=10;";

            $conn->exec($createPefil);

            $insertPerfil = "INSERT INTO perfil (idPerfil, nomePerfil, tipoPerfil, status) VALUES ('1', 'ADMINISTRADOR', '0', '1');";
            $conn->exec($insertPerfil);

            $insertPerfil = "INSERT INTO perfil (idPerfil, nomePerfil, tipoPerfil, status) VALUES ('1', 'USUARIO', '2', '1');";
            $conn->exec($insertPerfil);


            $createUser = "CREATE TABLE usuario (
                            idUsuario INT(11) NOT NULL AUTO_INCREMENT,
                            idPerfil INT(11) NOT NULL,
                            nome VARCHAR(100) NOT NULL COLLATE 'utf8_general_ci',
                            sobreNome VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
                            email VARCHAR(120) NOT NULL COLLATE 'utf8_general_ci',
                            telefone VARCHAR(20) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
                            telefone_aux VARCHAR(20) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
                            CPF VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
                            senha VARCHAR(32) NOT NULL COLLATE 'utf8_general_ci',
                            dataNascimento DATETIME NULL DEFAULT NULL,
                            sexo CHAR(5) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
                            dataCadastro DATETIME NOT NULL,
                            dataUltimoAcesso DATETIME NULL DEFAULT NULL,
                            status TINYINT(1) NOT NULL DEFAULT '1' COMMENT '1=ATIVO | 2=INATIVO | 0=DELETADO',
                            detalhes MEDIUMTEXT NULL DEFAULT NULL COLLATE 'utf8_general_ci',
                            superAdmin TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'SuperAdmin é o usuario master do sistema.',
                            imgPerfil VARCHAR(250) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
                            chaveDeRecuperacao VARCHAR(250) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
                            PRIMARY KEY (idUsuario) USING BTREE,
                            INDEX FK_usuario_perfil (idPerfil) USING BTREE,
                            CONSTRAINT FK_usuario_perfil FOREIGN KEY (idPerfil) REFERENCES perfil (idPerfil) ON UPDATE NO ACTION ON DELETE NO ACTION
                        )
                        COMMENT='Tabela de Usuário do sistema.'
                        COLLATE='utf8_general_ci'
                        ENGINE=InnoDB
                        ROW_FORMAT=COMPACT
                        AUTO_INCREMENT=6;";

            $conn->exec($createPefil);

            $userAdmin = $configCms['user_email'];
            $data = date('Y-m-d H:m:s');
            $senha = md5($this->hash . $configCms['password']);

            $insertUser = "INSERT INTO usuario 
                                    (idPerfil, nome, sobreNome, email, telefone, CPF, senha, dataNascimento, sexo, dataCadastro) 
                             VALUES ('1', 'AVFADM', 'ADM_SINGLE', '{$userAdmin}', '(11) 1 1111-1111', '886.509.820-18', '{$senha}', '1988-04-05 00:00:00', '1', '{$data}');";
            $conn->exec($insertUser);

            return true;
        } catch (Exception $e) {
            return $e;
        }
    }

}