-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tempo de Geração: Ago 26, 2010 as 06:29 PM
-- Versão do Servidor: 5.0.45
-- Versão do PHP: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Banco de Dados: `sgos`
-- 

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `cidade`
-- 

CREATE TABLE `cidade` (
  `id` bigint(20) NOT NULL auto_increment,
  `nome` varchar(255) NOT NULL,
  `idestado` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `nome` (`nome`),
  UNIQUE KEY `idestado` (`idestado`),
  KEY `idestado_idx` (`idestado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Extraindo dados da tabela `cidade`
-- 

INSERT INTO `cidade` (`id`, `nome`, `idestado`, `created_at`, `updated_at`) VALUES 
(1, 'Juiz de Fora', 1, '2010-08-23 10:57:57', '2010-08-23 10:57:57');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `cliente`
-- 

CREATE TABLE `cliente` (
  `id` bigint(20) NOT NULL auto_increment,
  `nome` varchar(255) NOT NULL,
  `logradouro` varchar(255) default NULL,
  `numero` varchar(255) default NULL,
  `complemento` varchar(255) default NULL,
  `bairro` varchar(255) default NULL,
  `idcidade` bigint(20) default NULL,
  `telefoneresidencial` varchar(20) default NULL,
  `telefonecomercial` varchar(20) default NULL,
  `email` varchar(255) default NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `cliente_idcidade_idx` (`idcidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Extraindo dados da tabela `cliente`
-- 

INSERT INTO `cliente` (`id`, `nome`, `logradouro`, `numero`, `complemento`, `bairro`, `idcidade`, `telefoneresidencial`, `telefonecomercial`, `email`, `created_at`, `updated_at`) VALUES 
(1, 'Alexandre Scheffer', 'ASD', 'ASD', 'asd', 'Cascatinha', 1, '(32) 3216-2172', '(32) 3216-2172', 'alexandrequintela@gmail.com', '2010-08-26 16:11:00', '2010-08-26 16:32:04'),
(2, 'Rafael Francelino', 'São João', '325', '304', 'Centro', 1, '(32) 3216-2172', '(32) 3216-2172', 'faelfrancelino@gmail.com', '2010-08-26 17:11:47', '2010-08-26 17:11:47');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `equipamento`
-- 

CREATE TABLE `equipamento` (
  `id` bigint(20) NOT NULL auto_increment,
  `nome` varchar(255) NOT NULL,
  `descricao` text,
  `idtipoequipamento` bigint(20) default NULL,
  `idcliente` bigint(20) default NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `equipamento_idcliente_idx` (`idcliente`),
  KEY `equipamento_idtipoequipamento_idx` (`idtipoequipamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `equipamento`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `estado`
-- 

CREATE TABLE `estado` (
  `id` bigint(20) NOT NULL auto_increment,
  `nome` varchar(255) NOT NULL,
  `sigla` varchar(4) NOT NULL,
  `idpais` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `nome` (`nome`),
  KEY `idpais_idx` (`idpais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Extraindo dados da tabela `estado`
-- 

INSERT INTO `estado` (`id`, `nome`, `sigla`, `idpais`, `created_at`, `updated_at`) VALUES 
(1, 'Minas Gerais', 'MG', 1, '2010-08-18 08:32:20', '2010-08-18 08:32:20'),
(2, 'Rio de Janeiro', 'RJ', 1, '2010-08-18 09:59:16', '2010-08-18 09:59:16');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `migration_version`
-- 

CREATE TABLE `migration_version` (
  `version` int(11) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `migration_version`
-- 

INSERT INTO `migration_version` (`version`) VALUES 
(7);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `pais`
-- 

CREATE TABLE `pais` (
  `id` bigint(20) NOT NULL auto_increment,
  `nome` varchar(255) NOT NULL,
  `sigla` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `nome` (`nome`),
  UNIQUE KEY `sigla` (`sigla`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Extraindo dados da tabela `pais`
-- 

INSERT INTO `pais` (`id`, `nome`, `sigla`, `created_at`, `updated_at`) VALUES 
(1, 'Brasil', 'BRA', '2010-08-12 16:30:03', '2010-08-23 15:08:07');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `sf_guard_forgot_password`
-- 

CREATE TABLE `sf_guard_forgot_password` (
  `id` bigint(20) NOT NULL auto_increment,
  `user_id` bigint(20) NOT NULL,
  `unique_key` varchar(255) default NULL,
  `expires_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `sf_guard_forgot_password`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `sf_guard_group`
-- 

CREATE TABLE `sf_guard_group` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `sf_guard_group`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `sf_guard_group_permission`
-- 

CREATE TABLE `sf_guard_group_permission` (
  `group_id` bigint(20) NOT NULL default '0',
  `permission_id` bigint(20) NOT NULL default '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`group_id`,`permission_id`),
  KEY `sf_guard_group_permission_permission_id_sf_guard_permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `sf_guard_group_permission`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `sf_guard_permission`
-- 

CREATE TABLE `sf_guard_permission` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `sf_guard_permission`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `sf_guard_remember_key`
-- 

CREATE TABLE `sf_guard_remember_key` (
  `id` bigint(20) NOT NULL auto_increment,
  `user_id` bigint(20) default NULL,
  `remember_key` varchar(32) default NULL,
  `ip_address` varchar(50) default NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `sf_guard_remember_key`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `sf_guard_user`
-- 

CREATE TABLE `sf_guard_user` (
  `id` bigint(20) NOT NULL auto_increment,
  `first_name` varchar(255) default NULL,
  `last_name` varchar(255) default NULL,
  `email_address` varchar(255) NOT NULL,
  `username` varchar(128) NOT NULL,
  `algorithm` varchar(128) NOT NULL default 'sha1',
  `salt` varchar(128) default NULL,
  `password` varchar(128) default NULL,
  `is_active` tinyint(1) default '1',
  `is_super_admin` tinyint(1) default '0',
  `last_login` datetime default NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `email_address` (`email_address`),
  UNIQUE KEY `username` (`username`),
  KEY `is_active_idx_idx` (`is_active`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Extraindo dados da tabela `sf_guard_user`
-- 

INSERT INTO `sf_guard_user` (`id`, `first_name`, `last_name`, `email_address`, `username`, `algorithm`, `salt`, `password`, `is_active`, `is_super_admin`, `last_login`, `created_at`, `updated_at`) VALUES 
(1, NULL, NULL, 'wellingtonwa@gmail.com', 'wellington', 'sha1', 'fba2f5c100f2659816bcd80457d037cd', 'eadc280e482620a8a8cd247932a2835684bcfe88', 1, 1, '2010-08-26 14:18:14', '2010-08-23 18:29:24', '2010-08-26 14:18:14');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `sf_guard_user_group`
-- 

CREATE TABLE `sf_guard_user_group` (
  `user_id` bigint(20) NOT NULL default '0',
  `group_id` bigint(20) NOT NULL default '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`user_id`,`group_id`),
  KEY `sf_guard_user_group_group_id_sf_guard_group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `sf_guard_user_group`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `sf_guard_user_permission`
-- 

CREATE TABLE `sf_guard_user_permission` (
  `user_id` bigint(20) NOT NULL default '0',
  `permission_id` bigint(20) NOT NULL default '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`user_id`,`permission_id`),
  KEY `sf_guard_user_permission_permission_id_sf_guard_permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `sf_guard_user_permission`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `tipo_equipamento`
-- 

CREATE TABLE `tipo_equipamento` (
  `id` bigint(20) NOT NULL auto_increment,
  `nome` varchar(255) NOT NULL,
  `descricao` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Extraindo dados da tabela `tipo_equipamento`
-- 

INSERT INTO `tipo_equipamento` (`id`, `nome`, `descricao`, `created_at`, `updated_at`) VALUES 
(2, 'Notebook', 'Computador Portátil', '2010-08-26 00:00:00', '2010-08-26 17:36:14');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `usuario`
-- 

CREATE TABLE `usuario` (
  `id` bigint(20) NOT NULL auto_increment,
  `nome` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `login` varchar(255) NOT NULL default '',
  `senha` varchar(255) NOT NULL default '',
  `created_at` datetime NOT NULL default '1970-01-01 00:00:00',
  `updated_at` datetime NOT NULL default '1970-01-01 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Extraindo dados da tabela `usuario`
-- 

INSERT INTO `usuario` (`id`, `nome`, `email`, `login`, `senha`, `created_at`, `updated_at`) VALUES 
(1, 'Wellington Wagner', 'wellingtonwa@gmail.com', 'wellington', '123456', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Francis', 'faelfrancelino@gmail.com', 'fran', 'asda', '1970-01-01 00:00:00', '1970-01-01 00:00:00'),
(3, 'asd', 'asda', 'asdas', 'asdasdas', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- 
-- Restrições para as tabelas dumpadas
-- 

-- 
-- Restrições para a tabela `cidade`
-- 
ALTER TABLE `cidade`
  ADD CONSTRAINT `cidade_idestado_estado_id` FOREIGN KEY (`idestado`) REFERENCES `estado` (`id`);

-- 
-- Restrições para a tabela `cliente`
-- 
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_idcidade_cidade_id` FOREIGN KEY (`idcidade`) REFERENCES `cidade` (`id`);

-- 
-- Restrições para a tabela `equipamento`
-- 
ALTER TABLE `equipamento`
  ADD CONSTRAINT `equipamento_idcliente_cliente_id` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `equipamento_idtipoequipamento_tipo_equipamento_id` FOREIGN KEY (`idtipoequipamento`) REFERENCES `tipo_equipamento` (`id`);

-- 
-- Restrições para a tabela `estado`
-- 
ALTER TABLE `estado`
  ADD CONSTRAINT `estado_idpais_pais_id` FOREIGN KEY (`idpais`) REFERENCES `pais` (`id`);

-- 
-- Restrições para a tabela `sf_guard_forgot_password`
-- 
ALTER TABLE `sf_guard_forgot_password`
  ADD CONSTRAINT `sf_guard_forgot_password_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

-- 
-- Restrições para a tabela `sf_guard_group_permission`
-- 
ALTER TABLE `sf_guard_group_permission`
  ADD CONSTRAINT `sf_guard_group_permission_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_group_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE;

-- 
-- Restrições para a tabela `sf_guard_remember_key`
-- 
ALTER TABLE `sf_guard_remember_key`
  ADD CONSTRAINT `sf_guard_remember_key_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

-- 
-- Restrições para a tabela `sf_guard_user_group`
-- 
ALTER TABLE `sf_guard_user_group`
  ADD CONSTRAINT `sf_guard_user_group_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_group_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

-- 
-- Restrições para a tabela `sf_guard_user_permission`
-- 
ALTER TABLE `sf_guard_user_permission`
  ADD CONSTRAINT `sf_guard_user_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_permission_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;
