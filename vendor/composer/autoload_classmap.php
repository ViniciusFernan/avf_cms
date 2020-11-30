<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'Application' => $baseDir . '/core/Application.class.php',
    'AuthController' => $baseDir . '/app/controllers/auth/AuthController.php',
    'AuthDAO' => $baseDir . '/app/models/auth/dao/AuthDAO.php',
    'AuthModel' => $baseDir . '/app/models/auth/model/AuthModel.php',
    'CadastroController' => $baseDir . '/app/controllers/CadastroController.php',
    'ChecaCadastroUsuarioStrategy' => $baseDir . '/app/models/usuario/strategy/ChecaCadastroUsuarioStrategy.php',
    'ChecaMenuCadastradoStrategy' => $baseDir . '/app/models/menu/strategy/ChecaMenuCadastradoStrategy.php',
    'Composer\\InstalledVersions' => $vendorDir . '/composer/InstalledVersions.php',
    'Conn' => $baseDir . '/core/Conn/Conn.class.php',
    'Create' => $baseDir . '/core/Conn/Create.class.php',
    'Curl' => $baseDir . '/core/Helpers/Curl.class.php',
    'DashboardController' => $baseDir . '/app/controllers/DashboardController.php',
    'DefaultModel' => $baseDir . '/app/models/DefaultModel.php',
    'Delete' => $baseDir . '/core/Conn/Delete.class.php',
    'Dompdf\\Cpdf' => $vendorDir . '/dompdf/dompdf/lib/Cpdf.php',
    'HTML5_Data' => $vendorDir . '/dompdf/dompdf/lib/html5lib/Data.php',
    'HTML5_InputStream' => $vendorDir . '/dompdf/dompdf/lib/html5lib/InputStream.php',
    'HTML5_Parser' => $vendorDir . '/dompdf/dompdf/lib/html5lib/Parser.php',
    'HTML5_Tokenizer' => $vendorDir . '/dompdf/dompdf/lib/html5lib/Tokenizer.php',
    'HTML5_TreeBuilder' => $vendorDir . '/dompdf/dompdf/lib/html5lib/TreeBuilder.php',
    'IndexController' => $baseDir . '/app/controllers/IndexController.php',
    'InstallMenuTables' => $baseDir . '/install/class/InstallMenuTables.php',
    'InstallUsuarioTables' => $baseDir . '/install/class/InstallUsuarioTables.php',
    'Log' => $baseDir . '/core/Helpers/Log.class.php',
    'LogarComoModel' => $baseDir . '/app/models/auth/model/LogarComoModel.php',
    'Mailer' => $baseDir . '/app/models/mailer/model/MailerModel.php',
    'MainController' => $baseDir . '/core/MainController.class.php',
    'MenuController' => $baseDir . '/app/controllers/MenuController.php',
    'MenuDAO' => $baseDir . '/app/models/menu/dao/MenuDAO.php',
    'MenuFactory' => $baseDir . '/app/models/menu/factory/MenuFactory.php',
    'MenuModel' => $baseDir . '/app/models/menu/model/MenuModel.php',
    'NovoMenuStrategy' => $baseDir . '/app/models/menu/strategy/NovoMenuStrategy.php',
    'NovoUsuarioStrategy' => $baseDir . '/app/models/usuario/strategy/NovoUsuarioStrategy.php',
    'PDF' => $baseDir . '/app/models/pdf/model/PDFModel.php',
    'Page404Controller' => $baseDir . '/app/controllers/Page404Controller.php',
    'RecuperarSenhaController' => $baseDir . '/app/controllers/RecuperarsenhaController.php',
    'RecuperarSenhaUsuarioStrategy' => $baseDir . '/app/models/usuario/strategy/RecuperarSenhaUsuarioStrategy.php',
    'Select' => $baseDir . '/core/Conn/Select.class.php',
    'Update' => $baseDir . '/core/Conn/Update.class.php',
    'UsuarioController' => $baseDir . '/app/controllers/UsuarioController.php',
    'UsuarioDAO' => $baseDir . '/app/models/usuario/dao/UsuarioDAO.php',
    'UsuarioFactory' => $baseDir . '/app/models/usuario/factory/UsuarioFactory.php',
    'UsuarioModel' => $baseDir . '/app/models/usuario/model/UsuarioModel.php',
    'UsuarioSessaoFactory' => $baseDir . '/app/models/usuario/factory/UsuarioSessaoFactory.php',
    'Util' => $baseDir . '/core/Helpers/Util.class.php',
    'Verot\\Upload\\Upload' => $vendorDir . '/verot/class.upload.php/src/class.upload.php',
    'View' => $baseDir . '/core/View.class.php',
    'XLS' => $baseDir . '/app/models/xls/model/XLSModel.php',
    'configClass' => $baseDir . '/install/class/configClass.php',
);