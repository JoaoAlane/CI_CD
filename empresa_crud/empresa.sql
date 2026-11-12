CREATE DATABASE IF NOT EXISTS empresa;
USE empresa;

CREATE TABLE funcionarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(200),
    cargo VARCHAR(50) NOT NULL,
    salario DECIMAL(10,2) NOT NULL,
    data_admissao DATE,
    ativo TINYINT(1) NOT NULL DEFAULT 1
);

INSERT INTO funcionarios (id, nome, email, cargo, salario, data_admissao, ativo) VALUES
(1, 'Ana Beatriz Souza', 'ana.souza@empresa.com', 'Desenvolvedora Back-end', 7500.00, '2021-03-15', 1),
(2, 'Carlos Eduardo Lima', 'carlos.lima@empresa.com', 'Analista de Suporte', 3800.00, '2022-07-01', 1),
(3, 'Fernanda Oliveira', 'fernanda.oliveira@empresa.com', 'Gerente de Projetos', 12500.00, '2019-11-20', 1),
(4, 'Rafael Santos', 'rafael.santos@empresa.com', 'Desenvolvedor Front-end', 6800.00, '2023-02-06', 1),
(5, 'Juliana Pereira', 'julianapereira42@gmail.com', 'Assistente Administrativo', 2900.00, '2024-01-10', 1),
(6, 'Marcos Vinícius Rocha', 'marcos.rocha@empresa.com', 'Analista de Dados', 9000.00, '2020-08-17', 1),
(7, 'Patrícia Almeida', 'patricia.almeida@empresa.com', 'Designer UX/UI', 6200.00, '2022-10-03', 1),
(8, 'Lucas Ferreira', 'lucas.ferreira@empresa.com', 'Estagiário', 1800.00, '2025-03-03', 1),
(9, 'Renata Costa', 'renata.costa@empresa.com', 'Analista de RH', 4500.00, '2018-05-14', 0),
(10, 'Thiago Martins', 'thiago.martins@empresa.com', 'DevOps', 9800.00, '2021-09-27', 1),
(11, 'João', 'joaoflavioalane27@gmail.com', 'DBA', 10000.00, '2026-11-05', 1);

ALTER TABLE funcionarios AUTO_INCREMENT = 12;