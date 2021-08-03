select * from produto;
create domain t_telefone as varchar (11) check (value ~'^[0-9]{11}$');
create domain t_cpf as varchar (11) check (value ~'^[0-9]{11}$');
create domain t_cnpj as varchar (14) check (value ~'^[0-9]{14}$');
create domain t_cnpjs as varchar (14) check (value ~'^[0-9]{14}$');
create domain t_cep as varchar (8) check (value ~'^[0-9]{8}$');
create domain t_estado as varchar(2) check (value in ('AC',' AL','AP','AM','BA',' CE','DF','ES','GO','MA','MT','MS','MG',' PA',' PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO' ));

begin;

UPDATE produto  set quantidade_disponivel = qe.quantidade + qe.quantidade
from quantidade_entrada qe join produto p on p.id = qe.produto_id;
  UPDATE produto  set valor_venda  = (qe.valor_unitario +qe.valor_unitario)
   from quantidade_entrada qe join produto p on p.id = qe.produto_id
   where p.id = qe.produto_id;
   commit;
	select * from produto;							  
create table fornecedor (
id serial not null primary key,
razao_social varchar (100) not null,
email varchar (50) not null,
cpf  t_cpf unique ,
cnpj t_cnpjs unique,
telefone t_telefone not null,
rua varchar (50) not null,
numero varchar (10) not null,
bairro varchar (50) not null,
cep t_cep not null,
cidade varchar (100) not null,
estado t_estado not null
);

select * from cliente;
													  
create table cliente(
id serial not null primary key,
razao_social varchar (100) not null,
email varchar (50) not null,
cpf t_cpf unique,
cnpj t_cnpj unique,
telefone t_telefone not null,
rua varchar (50) not null,
numero varchar (10) not null,
bairro varchar (50) not null,
cep t_cep not null,
cidade varchar (100) not null,
estado t_estado not null
);

create table entrada (
id serial not null primary key,
data date not null,
numero_nota varchar (10) not null,
cfop int  not null,
fornecedor_id int  references fornecedor (id) not null

);


create table quantidade_entrada(
entrada_id int references entrada (id) not null,
produto_id int references produto(id) not null,
quantidade int  not null,
valor_unitario money not null,
primary key (entrada_id, produto_id)
);

select * from quantidade_entrada;

create table produto(
id serial not null primary key,
nome varchar (100) not null,
descricao varchar (100) not null,
valor_venda money ,
quantidade_disponivel int  
);

create table quantidade_saida(
produto_id int  references produto (id) not null  ,
venda_id int references venda (id) not null,
quantidade int  not null,
valor_unitario money not null,
	primary key (produto_id, venda_id)
);

									  
create table venda(
id serial not null primary key,
data date not null,
nota_fiscal int not null,
cliente_id int references cliente (id) not null
);
select v.id as venda, c.razao_social as cliente, v.nota_fiscal as nota
from venda v
join cliente c on c.id= v.cliente_id;
commit;
create view vw_produto as select * from produto;
create view vw_fornecedor as select * from fornecedor;
create view vw_cliente as select * from cliente;
create unique index consulta on cliente (id);
create unique index vendas on venda (id);
create unique index fornecedores on fornecedor (id);
select * from fornecedor;


