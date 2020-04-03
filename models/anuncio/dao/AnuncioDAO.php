<?php
/**
 * @package Sistema distribuido em modulos
 * @author AVF-WEB
 * @version 1.0
 * */

class AnuncioDAO extends AnuncioFactory {
    protected $tabela = 'anuncio';
    protected $alias = 'a';

    /**
     * inserir novos anuncios
     * @param $post
     * @return bool|INT
     * @throws Exception
     */
    public function inserirNovoAnuncio($post){
        try{
            if(!is_array($post) || empty($post))
                throw new Exception('Error grave nesse trem');

            $anuncioCreate = (new Create('anuncio'))->Create($post);
            if($anuncioCreate instanceof Exception) throw $anuncioCreate;

            return $anuncioCreate;
        }catch(Exeption $e){
            return $e;
        }

    }

    public function editarAnuncio($Data, $idAnuncio){
        try{
            if(!is_array($Data) || empty($Data)) throw new Exception('Tem um trem errado aqui!');

            unset($Data['idAnuncio']);

            $updateAnuncio = (new Update('anuncio'))->ExeUpdate( $Data, 'WHERE idAnuncio=:idAnuncio', "idAnuncio={$idAnuncio}");
            if($updateAnuncio instanceof Exception) throw $updateAnuncio;
            if(empty($updateAnuncio)) throw new Exception('Ops, erro ao atualizar usuario');

            return true;
        }catch (Exception $e){
            return $e;
        }

    }

    public function getAnuncioPorId($id) {
        try{
            if(empty($id)) throw new Exception('Erro identificador do anuncio não enviado');

            $dadosAnuncio = (new Select($this->tabela))->Select('*', "idAnuncio=:id", "id={$id}");
            if($dadosAnuncio instanceof Exception) throw $dadosAnuncio;
            if(empty($dadosAnuncio)) throw new Exception('Não achou nada nesse trem!');

            return $dadosAnuncio;
        }catch(Exeption $e){
            return $e;
        }
    }

    public function checarAnuncioSlugCadastrado($slugAnuncio, $idAnuncio){
        try{
            if(empty($slugAnuncio) )  throw new Exception('Error grave nesse trem');

            $where='';
            $parse='';
            if(!empty($idAnuncio) ) {
                $where=" AND idAnuncio !=:idAnuncio";
                $parse=" & idAnuncio={$idAnuncio}";
            }

            $dadosAnuncio = (new Select($this->tabela))->Select('*', "slugAnuncio=:slugAnuncio {$where}", "slugAnuncio={$slugAnuncio}{$parse}");
            if($dadosAnuncio instanceof Exception) throw $dadosAnuncio;
            if(!empty($dadosAnuncio)):
                return true;
            else:
                return false;
            endif;
        }catch(Exeption $e){
            return $e;
        }

    }

    public function listarAnuncioPorUsuario($idUsuario){
        try{
            if(empty($idUsuario) )
                throw new Exception('Error grave nesse trem');

            $where[] = ['type' => 'and', 'alias' => '', 'field' => 'idUsuario', 'value' => $idUsuario, 'comparation' => '='];

            $dadosAnuncio = (new Select($this->tabela))->Select(['*'], $where);
            if($dadosAnuncio instanceof Exception) throw $dadosAnuncio;
            if(!empty($dadosAnuncio)):
                return $dadosAnuncio;
            else:
                return false;
            endif;
        }catch(Exeption $e){
            return $e;
        }
    }

}