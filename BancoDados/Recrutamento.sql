create database tcc;

use tcc;

create table logincandidato(
	id int auto_increment primary key,
    email varchar(255),
    senha varchar(100)
);

insert into logincandidato(email, senha) values ('coutinho@gmail.com', '123');

select * from logincandidato;

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

create table candidatosVagas(
	id int auto_increment primary key unique
);

select * from candidatosVagas;



describe cadasVagas;

alter table candidatosVagas add column candCada int;
alter table candidatosVagas add foreign key (candCada)
references cadasCand(id);

alter table candidatosVagas add column cadasVaga int;
alter table candidatosVagas add foreign key (cadasVaga) 
references cadasVagas(id);

alter table candidatosVagas add column cadEmpr int;
alter table candidatoVagas add foreign key(cadEmpr)
references cadasEmpre(id);

describe candidatosVagas;

alter table cadasVagas add column empresaCada int;
alter table cadasVagas add foreign key (empresaCada)
references cadasEmpre(id);

select cadasCand.nome, cadasCand.email, cadasVagas.cargo, cadasVagas.localVaga, cadasVagas.descricaoVaga, cadasEmpre.nomeFant
from cadasVagas join candidatosVagas
on  cadasVagas.id = candidatosVagas.cadasVaga
join cadasCand
on cadasCand.id = candidatosVagas.candCada
join cadasEmpre
on cadasEmpre.id = candidatosVagas.cadEmpr;


select cadasEmpre.nomeFant, cadasVagas.cargo, cadasVagas.localVaga, cadasVagas.descricaoVaga 
from cadasEmpre join cadasVagas 
on cadasEmpre.id = cadasVagas.empresaCada;

create view vw_cadasEmpre as select cadasVagas.id, cadasEmpre.nomeFant, cadasVagas.cargo, cadasVagas.localVaga, cadasVagas.descricaoVaga, cadasVagas.empresaCada
from cadasEmpre join cadasVagas 
on cadasEmpre.id = cadasVagas.empresaCada;

create view vw_visualizaCand as select cadasCand.id, cadasEmpre.nomeFant, cadasVagas.cargo, cadasVagas.localVaga, cadasVagas.descricaoVaga
from cadasCand join candidatosVagas
on cadasCand.id = candidatosVagas.candCada
join cadasVagas
on cadasVagas.id = candidatosVagas.cadasVaga
join cadasEmpre
on cadasEmpre.id = candidatosVagas.cadEmpr;



select * from vw_cadasEmpre;

create view vw_visualizarEmp as select cadasEmpre.id, cadasCand.nome, cadasVagas.localVaga, cadasVagas.cargo
from cadasEmpre join candidatosVagas
on cadasEmpre.id = candidatosVagas.cadEmpr
join cadasCand
on cadasCand.id = candidatosVagas.candCada
join cadasVagas
on cadasVagas.id = candidatosVagas.cadasVaga;

select * from vw_visualizaCand;
select * from vw_visualizarEmp;

alter table cadasVagas add column candidatoCadas int;
alter table cadasVagas add foreign key (candidatoCadas)
references cadasCand(id);

create view vw_cadasCand as select cadasVagas.id, cadasCand.nome, cadasVagas.cargo, cadasVagas.localVaga, cadasVagas.descricaoVaga 
from cadasCand join cadasVagas on cadasCand.id = cadasVagas.candidatoCadas;

select * from vw_cadasCand;

describe cadasVagas;

INSERT INTO cadasVagas (cargo, localVaga, descricaoVaga) VALUES ('Desenvolverdor', 'São Paulo', 'Ira desenvolver Front END');
INSERT INTO cadasVagas (cargo, localVaga, descricaoVaga) VALUES ('Analista de Dadod', 'São Paulo', 'Ira Analisar Dados');
INSERT INTO cadasVagas (cargo, localVaga, descricaoVaga) VALUES ('Analista de Dadod', 'São Paulo', 'Domínio de configurações, recomendações e boas práticas de segurança para sistemas em nuvem; Experiência com tecnologia
                Cloud (IaaS, PaaS, DBaaS, SaaS); Conhecimento avançado nos sistemas operacionais Windows e Linux; Domínio de requisitos
                não funcionais (ex: desempenho, disponibilidade, segurança, interoperabilidade);');

select*from cadasCand;
select*from cadasVagas;
select*from cadasEmpre;
select*from candidatosVagas;
