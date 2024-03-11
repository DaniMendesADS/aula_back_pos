-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/03/2024 às 14:55
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `clinica`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `consulta`
--

CREATE TABLE `consulta` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `consulta`
--

INSERT INTO `consulta` (`id`, `id_paciente`, `id_medico`, `data`) VALUES
(1, 4, 2, '2024-02-27'),
(2, 5, 2, '2024-03-27'),
(3, 6, 3, '2024-03-19'),
(4, 7, 4, '2024-04-04'),
(5, 9, 5, '2024-04-23');

-- --------------------------------------------------------

--
-- Estrutura para tabela `especialidade`
--

CREATE TABLE `especialidade` (
  `id` int(11) NOT NULL,
  `especialidade` varchar(50) NOT NULL,
  `sigla` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `especialidade`
--

INSERT INTO `especialidade` (`id`, `especialidade`, `sigla`) VALUES
(2, 'Pediatria', 'PED'),
(3, 'Ortopedia', 'ORT'),
(4, 'Hematologia', 'HEM'),
(5, 'Oftalmologia', 'OFT'),
(6, 'Endocrinologista', 'End');

-- --------------------------------------------------------

--
-- Estrutura para tabela `medico`
--

CREATE TABLE `medico` (
  `id` int(11) NOT NULL,
  `crm` varchar(20) NOT NULL,
  `nome` varchar(120) DEFAULT NULL,
  `tel_celular` varchar(20) DEFAULT NULL,
  `tel_fixo` varchar(20) DEFAULT NULL,
  `id_especialidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `medico`
--

INSERT INTO `medico` (`id`, `crm`, `nome`, `tel_celular`, `tel_fixo`, `id_especialidade`) VALUES
(1, '901826980', 'Mariana Rebello', '1598765643', '1532762898', 3),
(2, '901826980', 'Lucas Carvaho de Padua', '15908754321', '1232768954', 2),
(3, '99429', 'Maria José Mendonça', '15984321090', '1534672908', 3),
(4, '9087654', 'Paulo Henrique Ferreira de Souza', '15984321090', '1534672908', 4),
(5, '87654320', 'Viviane Martins', '15984321090', '1534672908', 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(120) DEFAULT NULL,
  `tel_celular` varchar(20) DEFAULT NULL,
  `tel_fixo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `paciente`
--

INSERT INTO `paciente` (`id`, `cpf`, `nome`, `tel_celular`, `tel_fixo`) VALUES
(4, '28467509', 'Luciana Maria Getúlio', '15990876543', '1532897654'),
(5, '18976520929', 'Mario Peres Nogueira', '15908653276', '1529870654'),
(6, '10987654327', 'Juliana Moreira da Silva', '1590876543', '1532780965'),
(7, '90876543212', 'Pedro Paulo Mariano', '1590824243', '1532780921'),
(8, '20866513212', 'Mariana Luandre de Souza', '1591024243', '1532743921'),
(9, '31866513222', 'Luiz Alberto Gomes', '1591084243', '1532313921');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_consulta_medico` (`id_medico`),
  ADD KEY `fk_consulta_paciente` (`id_paciente`);

--
-- Índices de tabela `especialidade`
--
ALTER TABLE `especialidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_medico_especialidade` (`id_especialidade`);

--
-- Índices de tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `especialidade`
--
ALTER TABLE `especialidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `medico`
--
ALTER TABLE `medico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `fk_consulta_medico` FOREIGN KEY (`id_medico`) REFERENCES `medico` (`id`),
  ADD CONSTRAINT `fk_consulta_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`);

--
-- Restrições para tabelas `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `fk_medico_especialidade` FOREIGN KEY (`id_especialidade`) REFERENCES `especialidade` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
