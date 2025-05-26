create database fishing_database;
use fishing_database;

create table admin (
id_admin int not null,
email_admin varchar(45) not null,
senha_admin varchar(45) not null,
primary key (id_admin)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

create table pessoa (
id_pessoa int not null auto_increment,
nome_pessoa varchar(45) not null,
cpf_pessoa varchar(45) not null,
email_pessoa varchar(45) not null,
senha_pessoa varchar(45) not null,
telefone_pessoa varchar(45) not null,
primary key (id_pessoa)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

create table projeto (
id_projeto int not null auto_increment,
titulo_projeto varchar(45) not null,
descricao_projeto varchar(255) not null,
img_projeto longblob not null,
id_pessoa_fk int not null,
primary key (id_projeto),
foreign key (id_pessoa_fk) references pessoa (id_pessoa)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

create table empresa (
id_empresa int not null auto_increment,
nome_empresa varchar(45) not null,
cnpj_empresa varchar(45) not null,
email_empresa varchar(45) not null,
senha_empresa varchar(45) not null,
telefone_empresa varchar(45) not null,
primary key (id_empresa)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

insert into admin (id_admin, email_admin, senha_admin) values (0, "walterscjunior7@gmail.com", "e/Fhn_4k685g");
select * from admin;
select * from empresa;
select * from pessoa;