-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20-Nov-2018 às 15:47
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ifood`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `andamento`
--

CREATE TABLE `andamento` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ativo` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `andamento`
--

INSERT INTO `andamento` (`id`, `pedido_id`, `estado_id`, `created_at`, `updated_at`, `ativo`) VALUES
(3, 18, 1, '2018-11-08 04:31:34', '2018-11-15 22:00:22', 1),
(17, 18, 2, '2018-11-10 01:39:54', '2018-11-15 22:00:22', 0),
(18, 18, 3, '2018-11-10 01:39:57', '2018-11-15 22:00:22', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `superior` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`id`, `nome`, `superior`) VALUES
(1, 'Dono', NULL),
(2, 'Gerente', 1),
(3, 'Secretária', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `combo`
--

CREATE TABLE `combo` (
  `id` int(11) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `Venda_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `combo`
--

INSERT INTO `combo` (`id`, `descricao`, `Venda_id`) VALUES
(12, 'Hamburger Artesanal + Refrigerante', 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `combo_has_produto`
--

CREATE TABLE `combo_has_produto` (
  `Combo_id` int(11) NOT NULL,
  `Produto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `combo_has_produto`
--

INSERT INTO `combo_has_produto` (`Combo_id`, `Produto_id`) VALUES
(12, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estabelecimento`
--

CREATE TABLE `estabelecimento` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estabelecimento`
--

INSERT INTO `estabelecimento` (`id`, `nome`) VALUES
(1, 'Burguer King');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`id`, `nome`) VALUES
(1, 'Preparando'),
(2, 'Entregando'),
(3, 'Entregue'),
(4, 'Cancelado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacao`
--

CREATE TABLE `notificacao` (
  `id` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `notificacao`
--

INSERT INTO `notificacao` (`id`, `descricao`, `users_id`) VALUES
(1, 'O seu pedido está Entregando', 1),
(2, 'O seu pedido está Preparando', 1),
(3, 'O seu pedido está Entregando', 1),
(4, 'O pedido 1 está Preparando', 1),
(5, 'O pedido 1 está Entregando', 1),
(6, 'O pedido 2 está Entregando', 1),
(7, 'O pedido 1 está Preparando', 1),
(8, 'O pedido 1 está Preparando', 1),
(9, 'O pedido 1 está Entregando', 1),
(10, 'O pedido 1 está Preparando', 1),
(11, 'O pedido 1 está Entregando', 1),
(12, 'O pedido 1 está Preparando', 1),
(13, 'O pedido 2 está Preparando', 1),
(14, 'O pedido 2 está Entregando', 1),
(15, 'O pedido 2 está Preparando', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `codigo` int(11) NOT NULL,
  `Estabelecimento_id` int(11) NOT NULL,
  `users_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id`, `data`, `codigo`, `Estabelecimento_id`, `users_id`) VALUES
(18, '2018-11-07 20:31:34', 2, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `preco` double NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `TipoProduto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `preco`, `descricao`, `TipoProduto_id`) VALUES
(1, 35, 'Pizza Grande', 1),
(2, 23, 'Hamburger Artesanal', 2),
(3, 27, 'Pizza Média', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reclamacao`
--

CREATE TABLE `reclamacao` (
  `id` int(11) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `atribuido` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `reclamacao`
--

INSERT INTO `reclamacao` (`id`, `descricao`, `users_id`, `atribuido`) VALUES
(3, 'test2', 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoproduto`
--

CREATE TABLE `tipoproduto` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipoproduto`
--

INSERT INTO `tipoproduto` (`id`, `nome`) VALUES
(1, 'Pizza'),
(2, 'Hamburguer');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Cargo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `Cargo_id`) VALUES
(1, 'Rafael', 'rafael_domyn@hotmail.com', '$2y$10$T7kZ/mLbiSoBTx5bsnrDcO/tqsG61qXPo6EHl0FCs2fwJL7TYDgbi', 'G7b9T62QkumYnQ6MnnN8KOxmB87FDKNUyilDcsYSSonX43yWATUx1qa2i1xq', '2018-11-01 00:35:38', '2018-11-01 00:35:38', NULL),
(2, 'Marco Antônio', 'marcoaparaujo@gmail.com', '$2y$10$a16ujorLqG3mGjK9jUZkM.zuHlpByR5atHXYo5sjitOXMGi1T13aq', 'Man6Di4nmyZyY9GPp0keTTANyjLE2P5Hf4vmVyDzQvVbZlNks0oEorj0ROZ2', '2018-11-15 22:45:11', '2018-11-15 22:45:11', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id` int(11) NOT NULL,
  `Pedido_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`id`, `Pedido_id`) VALUES
(16, 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda_has_produto`
--

CREATE TABLE `venda_has_produto` (
  `Venda_id` int(11) NOT NULL,
  `Produto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `venda_has_produto`
--

INSERT INTO `venda_has_produto` (`Venda_id`, `Produto_id`) VALUES
(16, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `andamento`
--
ALTER TABLE `andamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Andamento_Pedido1_idx` (`pedido_id`),
  ADD KEY `fk_Andamento_Estado1_idx` (`estado_id`);

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Cargo_Cargo1_idx1` (`superior`);

--
-- Indexes for table `combo`
--
ALTER TABLE `combo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Combo_Venda1_idx` (`Venda_id`);

--
-- Indexes for table `combo_has_produto`
--
ALTER TABLE `combo_has_produto`
  ADD PRIMARY KEY (`Combo_id`,`Produto_id`),
  ADD KEY `fk_Combo_has_Produto_Produto1_idx` (`Produto_id`),
  ADD KEY `fk_Combo_has_Produto_Combo1_idx` (`Combo_id`);

--
-- Indexes for table `estabelecimento`
--
ALTER TABLE `estabelecimento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notificacao`
--
ALTER TABLE `notificacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Notificacao_users1_idx` (`users_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Pedido_Estabelecimento1_idx` (`Estabelecimento_id`),
  ADD KEY `fk_Pedido_users1_idx` (`users_id`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Produto_TipoProduto1_idx` (`TipoProduto_id`);

--
-- Indexes for table `reclamacao`
--
ALTER TABLE `reclamacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Reclamacao_users1_idx` (`users_id`),
  ADD KEY `fk_Reclamacao_Cargo1_idx` (`atribuido`);

--
-- Indexes for table `tipoproduto`
--
ALTER TABLE `tipoproduto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `fk_users_Cargo1_idx` (`Cargo_id`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Venda_Pedido1_idx` (`Pedido_id`);

--
-- Indexes for table `venda_has_produto`
--
ALTER TABLE `venda_has_produto`
  ADD PRIMARY KEY (`Venda_id`,`Produto_id`),
  ADD KEY `fk_Venda_has_Produto_Produto1_idx` (`Produto_id`),
  ADD KEY `fk_Venda_has_Produto_Venda1_idx` (`Venda_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `andamento`
--
ALTER TABLE `andamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `combo`
--
ALTER TABLE `combo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `estabelecimento`
--
ALTER TABLE `estabelecimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notificacao`
--
ALTER TABLE `notificacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reclamacao`
--
ALTER TABLE `reclamacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tipoproduto`
--
ALTER TABLE `tipoproduto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `andamento`
--
ALTER TABLE `andamento`
  ADD CONSTRAINT `fk_Andamento_Estado1` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Andamento_Pedido1` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `cargo`
--
ALTER TABLE `cargo`
  ADD CONSTRAINT `fk_Cargo_Cargo1` FOREIGN KEY (`superior`) REFERENCES `cargo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `combo`
--
ALTER TABLE `combo`
  ADD CONSTRAINT `fk_Combo_Venda1` FOREIGN KEY (`Venda_id`) REFERENCES `venda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `combo_has_produto`
--
ALTER TABLE `combo_has_produto`
  ADD CONSTRAINT `fk_Combo_has_Produto_Combo1` FOREIGN KEY (`Combo_id`) REFERENCES `combo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Combo_has_Produto_Produto1` FOREIGN KEY (`Produto_id`) REFERENCES `produto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `notificacao`
--
ALTER TABLE `notificacao`
  ADD CONSTRAINT `fk_Notificacao_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_Pedido_Estabelecimento1` FOREIGN KEY (`Estabelecimento_id`) REFERENCES `estabelecimento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pedido_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_Produto_TipoProduto1` FOREIGN KEY (`TipoProduto_id`) REFERENCES `tipoproduto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `reclamacao`
--
ALTER TABLE `reclamacao`
  ADD CONSTRAINT `fk_Reclamacao_Cargo1` FOREIGN KEY (`atribuido`) REFERENCES `cargo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Reclamacao_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_Cargo1` FOREIGN KEY (`Cargo_id`) REFERENCES `cargo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `fk_Venda_Pedido1` FOREIGN KEY (`Pedido_id`) REFERENCES `pedido` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `venda_has_produto`
--
ALTER TABLE `venda_has_produto`
  ADD CONSTRAINT `fk_Venda_has_Produto_Produto1` FOREIGN KEY (`Produto_id`) REFERENCES `produto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Venda_has_Produto_Venda1` FOREIGN KEY (`Venda_id`) REFERENCES `venda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
