-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tempo de Geração: Set 15, 2011 as 05:54 PM
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
  KEY `idestado_idx` (`idestado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

-- 
-- Extraindo dados da tabela `cidade`
-- 

INSERT INTO `cidade` (`id`, `nome`, `idestado`, `created_at`, `updated_at`) VALUES 
(1, 'Juiz de Fora', 1, '2011-02-16 22:37:00', '0000-00-00 00:00:00'),
(2, 'Barbacena', 1, '2011-02-16 22:37:00', '0000-00-00 00:00:00'),
(3, 'Matias Barbosa', 1, '2011-02-16 22:37:00', '0000-00-00 00:00:00'),
(4, 'Santos Dumont', 1, '2011-02-16 22:37:00', '0000-00-00 00:00:00'),
(5, 'Astolfo Dutra', 1, '2011-02-16 22:37:00', '0000-00-00 00:00:00'),
(6, 'Belmiro Braga', 1, '2011-02-16 22:37:00', '0000-00-00 00:00:00'),
(7, 'Belo Horizonte', 1, '2011-02-16 22:37:00', '0000-00-00 00:00:00'),
(8, 'Contagem', 1, '2011-02-16 22:37:00', '0000-00-00 00:00:00'),
(9, 'Ipatinga', 1, '2011-02-16 22:37:00', '0000-00-00 00:00:00'),
(10, 'Leopoldina', 1, '2011-02-16 22:37:00', '0000-00-00 00:00:00'),
(11, 'Além Paraíba', 1, '2011-02-16 22:37:00', '0000-00-00 00:00:00'),
(12, 'Alto Jequitiba', 1, '2011-02-16 22:37:00', '0000-00-00 00:00:00'),
(13, 'Alto Rio Doce', 1, '2011-02-16 22:37:00', '0000-00-00 00:00:00'),
(14, 'Aracitaba', 1, '2011-02-16 22:37:00', '0000-00-00 00:00:00'),
(15, 'Alvarenga', 1, '2011-02-16 22:37:00', '0000-00-00 00:00:00'),
(16, 'Andradas', 1, '2011-02-16 22:37:00', '0000-00-00 00:00:00'),
(17, 'Alfenas', 1, '2011-02-16 22:37:00', '0000-00-00 00:00:00'),
(18, 'Alagoas', 1, '2011-02-16 22:37:00', '0000-00-00 00:00:00'),
(19, 'Alterosa', 1, '2011-02-16 22:37:00', '0000-00-00 00:00:00'),
(20, 'Amparo de Minas', 1, '2011-02-16 22:37:00', '0000-00-00 00:00:00'),
(21, 'Alto Caparao', 1, '2011-02-16 22:37:00', '0000-00-00 00:00:00');

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
  `idusuario` bigint(20) default NULL,
  PRIMARY KEY  (`id`),
  KEY `idcidade_idx` (`idcidade`),
  KEY `cliente_idusuario_idx` (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Extraindo dados da tabela `cliente`
-- 

INSERT INTO `cliente` (`id`, `nome`, `logradouro`, `numero`, `complemento`, `bairro`, `idcidade`, `telefoneresidencial`, `telefonecomercial`, `email`, `created_at`, `updated_at`, `idusuario`) VALUES 
(1, 'Weber Wagner', 'José Lima Dias', '52', '', 'Santa Cecília', 1, '32 32138626', '32 88555225', 'weberwagner@gmail.com', '2011-02-16 22:37:00', '2010-09-20 11:33:21', NULL),
(2, 'Rafael Francelino', 'São João', '3589', '304', 'Centro', 1, '', '32 99371290', 'faelfrancelino@gmail.com', '2011-02-16 22:37:00', '2010-09-20 11:34:33', NULL),
(3, 'Wellington Wagner', '', '', '', '', 1, '32 32138626', '32 88555494', 'wellingtonwa@gmail.com', '2011-03-14 20:26:05', '2011-03-14 20:26:05', NULL),
(4, 'Makelele Dourado', NULL, NULL, NULL, NULL, NULL, '55 3215-3152', '55 3215-3152', 'makelele@paniconatv.com.br', '2011-03-21 21:43:09', '2011-03-21 21:43:09', 5);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `componente`
-- 

CREATE TABLE `componente` (
  `id` bigint(20) NOT NULL auto_increment,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(18,2) default NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Extraindo dados da tabela `componente`
-- 

INSERT INTO `componente` (`id`, `nome`, `descricao`, `preco`, `created_at`, `updated_at`) VALUES 
(1, 'HD Samsung 320Gb', 'Blablablablabla', '175.00', '2010-09-20 11:55:21', '2010-09-20 11:55:21');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `componente_ordem_servico`
-- 

CREATE TABLE `componente_ordem_servico` (
  `id` bigint(20) NOT NULL auto_increment,
  `idordemservico` bigint(20) NOT NULL,
  `idcomponente` bigint(20) NOT NULL,
  `quantidade` bigint(20) default NULL,
  PRIMARY KEY  (`id`),
  KEY `idordemservico_idx` (`idordemservico`),
  KEY `idcomponente_idx` (`idcomponente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Extraindo dados da tabela `componente_ordem_servico`
-- 

INSERT INTO `componente_ordem_servico` (`id`, `idordemservico`, `idcomponente`, `quantidade`) VALUES 
(1, 1, 1, 1);

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
  KEY `idcliente_idx` (`idcliente`),
  KEY `idtipoequipamento_idx` (`idtipoequipamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Extraindo dados da tabela `equipamento`
-- 

INSERT INTO `equipamento` (`id`, `nome`, `descricao`, `idtipoequipamento`, `idcliente`, `created_at`, `updated_at`) VALUES 
(1, 'Notebook', 'máquina principal do usuário', 1, 2, '2011-02-16 22:37:00', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Extraindo dados da tabela `estado`
-- 

INSERT INTO `estado` (`id`, `nome`, `sigla`, `idpais`, `created_at`, `updated_at`) VALUES 
(1, 'Minas Gerais', 'MG', 1, '2011-02-16 22:37:00', '2010-09-20 11:32:03');

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
(9);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `observacao_ordem_servico`
-- 

CREATE TABLE `observacao_ordem_servico` (
  `id` bigint(20) NOT NULL auto_increment,
  `idusuario` bigint(20) NOT NULL,
  `observacao` text NOT NULL,
  `idordemservico` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `observacao_ordem_servico_idordemservico_idx` (`idordemservico`),
  KEY `observacao_ordem_servico_idusuario_idx` (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Extraindo dados da tabela `observacao_ordem_servico`
-- 

INSERT INTO `observacao_ordem_servico` (`id`, `idusuario`, `observacao`, `idordemservico`, `created_at`, `updated_at`, `status`) VALUES 
(1, 2, '- Status alterado de Em Aberto para Em aberto<br><br>Observação do Técnico:<br>LAsdasdassada', 6, '2011-05-11 21:04:52', '2011-05-11 21:04:52', 'Em aberto'),
(2, 2, '- Status alterado de Em aberto para Em execução<br><br>Observação do Técnico:<br>gljsdsdlkfd', 6, '2011-05-11 21:05:11', '2011-05-11 21:05:11', 'Em execução'),
(3, 2, '- O técnico adicionou o serviço "Formatação (Sem Backup)"<br>- O técnico adicionou o serviço "Limpeza de Notebook"', 6, '2011-09-12 17:42:14', '2011-09-12 17:42:14', 'Em execução'),
(4, 2, '- O técnico adicionou o serviço "Formatação (Sem Backup)"<br>- O técnico adicionou o serviço "Limpeza de Notebook"', 6, '2011-09-12 17:44:57', '2011-09-12 17:44:57', 'Em execução');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `ordem_servico`
-- 

CREATE TABLE `ordem_servico` (
  `id` bigint(20) NOT NULL auto_increment,
  `idcliente` bigint(20) default NULL,
  `idequipamento` bigint(20) default NULL,
  `status` varchar(255) default 'Em Aberto',
  `descricao_problema` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idcliente_idx` (`idcliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Extraindo dados da tabela `ordem_servico`
-- 

INSERT INTO `ordem_servico` (`id`, `idcliente`, `idequipamento`, `status`, `descricao_problema`, `created_at`, `updated_at`) VALUES 
(1, 2, NULL, 'Em Aberto', '', '0000-00-00 00:00:00', '2011-02-07 11:37:20'),
(6, 4, NULL, 'Em execução', 'Meu pc parou de funcionar', '0000-00-00 00:00:00', '2011-09-12 17:44:56');

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
(1, 'Brasil', 'BRA', '2011-02-16 22:37:00', '2011-05-17 17:24:00');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `preco_componente`
-- 

CREATE TABLE `preco_componente` (
  `id` bigint(20) NOT NULL auto_increment,
  `preco` decimal(18,2) default NULL,
  `datainicio` datetime default NULL,
  `idcomponente` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idcomponente_idx` (`idcomponente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Extraindo dados da tabela `preco_componente`
-- 

INSERT INTO `preco_componente` (`id`, `preco`, `datainicio`, `idcomponente`, `created_at`, `updated_at`) VALUES 
(1, '175.00', '2011-02-16 22:37:00', 1, '2011-02-16 22:37:00', '2011-02-16 22:37:00'),
(2, '175.00', '2011-02-02 21:18:27', 1, '2011-02-02 21:18:27', '2011-02-02 21:18:27'),
(3, '175.00', '2010-10-19 20:43:17', 1, '2010-10-19 20:43:17', '2010-10-19 20:43:17'),
(4, '175.00', '2010-09-20 11:55:21', 1, '2010-09-20 11:55:21', '2010-09-20 11:55:21');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `preco_servico`
-- 

CREATE TABLE `preco_servico` (
  `id` bigint(20) NOT NULL auto_increment,
  `preco` decimal(18,2) default NULL,
  `datainicio` datetime default NULL,
  `idservico` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idservico_idx` (`idservico`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Extraindo dados da tabela `preco_servico`
-- 

INSERT INTO `preco_servico` (`id`, `preco`, `datainicio`, `idservico`, `created_at`, `updated_at`) VALUES 
(1, '75.00', '2010-09-20 11:37:58', 1, '2010-09-20 11:37:58', '2010-09-20 11:37:58');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `servico`
-- 

CREATE TABLE `servico` (
  `id` bigint(20) NOT NULL auto_increment,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(18,2) default NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Extraindo dados da tabela `servico`
-- 

INSERT INTO `servico` (`id`, `nome`, `descricao`, `preco`, `created_at`, `updated_at`) VALUES 
(1, 'Formatação (Sem Backup)', 'Formatação Simples sem backup do usuário', '75.00', '2010-09-20 11:37:58', '2010-09-20 11:37:58'),
(2, 'Limpeza de Desktop', 'Limpeza realizada no interior do computador de mesa', '10.00', '2010-10-13 13:04:44', '2010-10-13 13:04:44'),
(3, 'Limpeza de Notebook', 'Limpeza realizada no interior do notebook.', '25.00', '2010-10-13 13:05:36', '2010-10-13 13:05:36'),
(4, 'Formatação (Com Backup)', 'Formatação com Backup dos dados do cliente.', '100.00', '2010-10-13 13:06:27', '2010-10-13 13:06:27');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `servico_ordem_servico`
-- 

CREATE TABLE `servico_ordem_servico` (
  `id` bigint(20) NOT NULL auto_increment,
  `idordemservico` bigint(20) NOT NULL,
  `idservico` bigint(20) NOT NULL,
  `quantidade` bigint(20) default NULL,
  PRIMARY KEY  (`id`),
  KEY `idordemservico_idx` (`idordemservico`),
  KEY `idservico_idx` (`idservico`),
  KEY `servico_ordem_servico_id_idx` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Extraindo dados da tabela `servico_ordem_servico`
-- 

INSERT INTO `servico_ordem_servico` (`id`, `idordemservico`, `idservico`, `quantidade`) VALUES 
(1, 1, 1, 1),
(2, 6, 1, 1),
(3, 6, 3, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Extraindo dados da tabela `sf_guard_group`
-- 

INSERT INTO `sf_guard_group` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES 
(1, 'funcionario', 'Este é o grupo de funcionários', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'clientes', 'Este é o grupo de clientes', '2011-03-21 21:12:30', '2011-03-21 21:12:30');

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

INSERT INTO `sf_guard_group_permission` (`group_id`, `permission_id`, `created_at`, `updated_at`) VALUES 
(2, 3, '2011-03-21 21:13:21', '2011-03-21 21:13:21');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Extraindo dados da tabela `sf_guard_permission`
-- 

INSERT INTO `sf_guard_permission` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES 
(1, 'funcionario', NULL, '2011-02-21 21:55:57', '0000-00-00 00:00:00'),
(2, 'admin', NULL, '2011-02-21 22:02:28', '0000-00-00 00:00:00'),
(3, 'cliente', 'Permissões para cliente acessar o sistema com o mínino de pivilégios', '2011-03-21 21:13:21', '2011-03-21 21:13:21');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Extraindo dados da tabela `sf_guard_user`
-- 

INSERT INTO `sf_guard_user` (`id`, `first_name`, `last_name`, `email_address`, `username`, `algorithm`, `salt`, `password`, `is_active`, `is_super_admin`, `last_login`, `created_at`, `updated_at`) VALUES 
(2, NULL, NULL, 'wellingtonwa@gmail.com', 'wellington', 'sha1', 'cf545d0770dbb06f4b3f8fa2ef728780', 'eea65ac399eb45d9fd0b6f58dfe0f39c167135b4', 1, 0, '2011-09-15 17:53:02', '2011-02-16 23:36:09', '2011-09-15 17:53:02'),
(5, 'Makelele Dourado', NULL, 'makelele@paniconatv.com.br', 'makelele', 'sha1', 'cf545d0770dbb06f4b3f8fa2ef728780', 'eea65ac399eb45d9fd0b6f58dfe0f39c167135b4', 1, 0, '2011-05-11 21:06:42', '2011-03-21 22:07:29', '2011-05-11 21:06:42'),
(6, '', '', 'falecom@wellingtonwa.com', 'well', 'sha1', NULL, NULL, 1, 0, NULL, '2011-05-12 19:19:26', '2011-05-12 19:19:26');

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

INSERT INTO `sf_guard_user_group` (`user_id`, `group_id`, `created_at`, `updated_at`) VALUES 
(2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 2, '2011-03-21 22:07:29', '2011-03-21 22:07:29');

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

INSERT INTO `sf_guard_user_permission` (`user_id`, `permission_id`, `created_at`, `updated_at`) VALUES 
(2, 1, '2011-02-21 21:56:29', '0000-00-00 00:00:00'),
(2, 2, '2011-02-21 22:03:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `solicitacao`
-- 

CREATE TABLE `solicitacao` (
  `id` bigint(20) NOT NULL auto_increment,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone1` varchar(14) NOT NULL,
  `telefone2` varchar(14) default NULL,
  `descricao_problema` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `idordemservico` bigint(20) default NULL,
  PRIMARY KEY  (`id`),
  KEY `solicitacao_idordemservico_idx` (`idordemservico`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Extraindo dados da tabela `solicitacao`
-- 

INSERT INTO `solicitacao` (`id`, `nome`, `email`, `telefone1`, `telefone2`, `descricao_problema`, `created_at`, `updated_at`, `idordemservico`) VALUES 
(3, 'Wellington Wagner', 'wellingtonwa@gmail.com', '32 32138626', '32 32138626', 'asdfdf ads sa asd', '2011-03-05 21:14:08', '2011-03-05 21:14:08', 1),
(4, 'Wellington Wagner', 'wellingtonwa@gmail.com', '32 32138626', '32 32138626', 'asdfdf ads sa asd', '2011-03-05 21:14:43', '2011-09-12 17:55:51', NULL),
(5, 'Makelele Dourado', 'makelele@paniconatv.com.br', '55 3215-3152', '55 3215-3152', 'Meu pc parou de funcionar', '2011-03-21 21:30:09', '2011-03-21 22:12:09', 6),
(6, '', '', '', NULL, '', '2011-09-12 17:56:27', '2011-09-12 17:56:27', NULL);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `status`
-- 

CREATE TABLE `status` (
  `id` bigint(20) NOT NULL auto_increment,
  `nome` varchar(50) NOT NULL,
  `significado` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `status`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Extraindo dados da tabela `tipo_equipamento`
-- 

INSERT INTO `tipo_equipamento` (`id`, `nome`, `descricao`, `created_at`, `updated_at`) VALUES 
(1, 'NoteBook', 'Computador portátil', '2011-02-16 22:37:00', '2010-09-20 11:36:05');

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
  ADD CONSTRAINT `cliente_idcidade_cidade_id` FOREIGN KEY (`idcidade`) REFERENCES `cidade` (`id`),
  ADD CONSTRAINT `cliente_idusuario_sf_guard_user_id` FOREIGN KEY (`idusuario`) REFERENCES `sf_guard_user` (`id`);

-- 
-- Restrições para a tabela `componente_ordem_servico`
-- 
ALTER TABLE `componente_ordem_servico`
  ADD CONSTRAINT `componente_ordem_servico_ibfk_1` FOREIGN KEY (`idordemservico`) REFERENCES `ordem_servico` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `componente_ordem_servico_ibfk_2` FOREIGN KEY (`idcomponente`) REFERENCES `componente` (`id`);

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
-- Restrições para a tabela `observacao_ordem_servico`
-- 
ALTER TABLE `observacao_ordem_servico`
  ADD CONSTRAINT `observacao_ordem_servico_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `sf_guard_user` (`id`),
  ADD CONSTRAINT `observacao_ordem_servico_ibfk_2` FOREIGN KEY (`idordemservico`) REFERENCES `ordem_servico` (`id`) ON DELETE CASCADE;

-- 
-- Restrições para a tabela `ordem_servico`
-- 
ALTER TABLE `ordem_servico`
  ADD CONSTRAINT `ordem_servico_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`id`);

-- 
-- Restrições para a tabela `preco_componente`
-- 
ALTER TABLE `preco_componente`
  ADD CONSTRAINT `preco_componente_idcomponente_componente_id` FOREIGN KEY (`idcomponente`) REFERENCES `componente` (`id`);

-- 
-- Restrições para a tabela `preco_servico`
-- 
ALTER TABLE `preco_servico`
  ADD CONSTRAINT `preco_servico_idservico_servico_id` FOREIGN KEY (`idservico`) REFERENCES `servico` (`id`);

-- 
-- Restrições para a tabela `servico_ordem_servico`
-- 
ALTER TABLE `servico_ordem_servico`
  ADD CONSTRAINT `servico_ordem_servico_ibfk_3` FOREIGN KEY (`idordemservico`) REFERENCES `ordem_servico` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `servico_ordem_servico_ibfk_4` FOREIGN KEY (`idservico`) REFERENCES `servico` (`id`);

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

-- 
-- Restrições para a tabela `solicitacao`
-- 
ALTER TABLE `solicitacao`
  ADD CONSTRAINT `solicitacao_idordemservico_ordem_servico_id` FOREIGN KEY (`idordemservico`) REFERENCES `ordem_servico` (`id`);
