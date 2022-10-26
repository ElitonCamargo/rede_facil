CREATE PROCEDURE `usuario_cadastrar`(IN `email` VARCHAR(100), IN `senha` VARCHAR(100), IN `nome` VARCHAR(100), IN `foto` VARCHAR(100), IN `capa` VARCHAR(100)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER INSERT INTO `usuario`(`email`, `senha`, `nome`, `foto`, `capa`) VALUES (email, senha, nome, foto, capa)

CREATE PROCEDURE `usuario_consultarPorEmail`(IN `email` VARCHAR(100)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER SELECT * FROM usuario WHERE usuario.email = email

-- git add .
-- git reset --hard
-- git pull