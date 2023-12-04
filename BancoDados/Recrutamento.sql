create database tcc;

use tcc;

CREATE TABLE cadasCand (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    email VARCHAR(255) unique,
    cpf VARCHAR(140),
    senha VARCHAR(255),
    telefone VARCHAR(15),
    sexo VARCHAR(100),
    cep VARCHAR(100),
    municipio VARCHAR(255),
    pais VARCHAR(255),
    bairro VARCHAR(255),
    estado VARCHAR(255),
    rua VARCHAR(255),
    empresa VARCHAR(255),
    inicio_profissional VARCHAR(100),
    cargo VARCHAR(255),
    final_profissional VARCHAR(100),
    descricao_profissional TEXT,
    formacao_academica VARCHAR(255),
    instituicao_academica VARCHAR(255),
    status_academico VARCHAR(255),
    inicio_academico VARCHAR(100),
    curso_academico VARCHAR(255),
    fim_academico VARCHAR(100),
    descricao_projetos TEXT
);

create table cadasEmpre(
	id int auto_increment primary key unique,
    cnpj varchar(100),
    razaoSoc varchar(100),
    nomeFant varchar(100),
    email varchar(100) unicode not null,
    estadualIns varchar(100),
    senha varchar(100), 
    cep varchar(100),
    municipio varchar(100),
    pais varchar(100),
    bairro varchar(100),
    estado varchar(100),
    rua varchar(100)    
);

create table cadasVagas(
	id int auto_increment primary key unique,
    cargo varchar(100),
    localVaga varchar(100),
    descricaoVaga TEXT
);
describe cadasVagas;

alter table cadasVagas add column empresaCada int;

alter table cadasVagas add foreign key (empresaCada)
references cadasEmpre(id);

select cadasEmpre.nomeFant, cadasVagas.cargo, cadasVagas.localVaga, cadasVagas.descricaoVaga 
from cadasEmpre join cadasVagas 
on cadasEmpre.id = cadasVagas.empresaCada;

INSERT INTO cadasVagas (cargo, localVaga, descricaoVaga) VALUES ('Desenvolverdor', 'São Paulo', 'Ira desenvolver Front END');
INSERT INTO cadasVagas (cargo, localVaga, descricaoVaga) VALUES ('Analista de Dadod', 'São Paulo', 'Ira Analisar Dados');
INSERT INTO cadasVagas (cargo, localVaga, descricaoVaga) VALUES ('Analista de Dadod', 'São Paulo', 'Domínio de configurações, recomendações e boas práticas de segurança para sistemas em nuvem; Experiência com tecnologia
                Cloud (IaaS, PaaS, DBaaS, SaaS); Conhecimento avançado nos sistemas operacionais Windows e Linux; Domínio de requisitos
                não funcionais (ex: desempenho, disponibilidade, segurança, interoperabilidade);');

select*from cadasCand;
select*from cadasVagas;
select*from cadasEmpre;