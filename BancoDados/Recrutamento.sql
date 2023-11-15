create database tcc;

use tcc;

CREATE TABLE cadasCand (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    email VARCHAR(255),
    cpf VARCHAR(14),
    senha VARCHAR(255),
    telefone VARCHAR(15),
    sexo VARCHAR(10),
    cep VARCHAR(10),
    municipio VARCHAR(255),
    pais VARCHAR(255),
    bairro VARCHAR(255),
    estado VARCHAR(255),
    rua VARCHAR(255),
    empresa VARCHAR(255),
    inicio_profissional VARCHAR(10),
    cargo VARCHAR(255),
    final_profissional VARCHAR(10),
    descricao_profissional TEXT,
    formacao_academica VARCHAR(255),
    instituicao_academica VARCHAR(255),
    status_academico VARCHAR(255),
    inicio_academico VARCHAR(10),
    curso_academico VARCHAR(255),
    fim_academico VARCHAR(10),
    descricao_projetos TEXT
);