CREATE SCHEMA IF NOT EXISTS `lavanderia_db` DEFAULT CHARACTER SET utf8;
USE `lavanderia_db`;


CREATE TABLE IF NOT EXISTS `usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  `senha` TEXT NOT NULL,
  PRIMARY KEY (`id`));


CREATE TABLE IF NOT EXISTS `cliente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `telefone` VARCHAR(20),
  `endereco` VARCHAR(255),
  PRIMARY KEY (`id`));


CREATE TABLE IF NOT EXISTS `tipo_servico` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `valor` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`));


CREATE TABLE IF NOT EXISTS `item_roupa` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`));


CREATE TABLE IF NOT EXISTS `pedido` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cliente_id` INT NOT NULL,
  `tipo_servico_id` INT NOT NULL,
  `item_roupa_id` INT NOT NULL,
  `data_pedido` DATE NOT NULL,
  `observacao` TEXT,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`),
  FOREIGN KEY (`tipo_servico_id`) REFERENCES `tipo_servico` (`id`),
  FOREIGN KEY (`item_roupa_id`) REFERENCES `item_roupa` (`id`));


INSERT INTO `usuario` (`email`, `nome`, `senha`) VALUES
('admin@lavanderia.com', 'Administrador', '$2y$10$8sA1N6bQz5.XlK.2/u1.UO9/j4.2.1.2.1.2.1.2.1.2.1.2');