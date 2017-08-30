DROP TABLE IF EXISTS sites; 
create table sites(
	site_id int auto_increment not null primary key,
	url varchar(255),
	title varchar(255),
	short_desc text,
	indexdate date,
	spider_depth int default 2,
	required text,
	disallowed text,
	can_leave_domain bool) ENGINE = MYISAM;
	
DROP TABLE IF EXISTS links; 
create table links (
	link_id int auto_increment primary key not null,
	site_id int,
	url varchar(255) not null,
	title varchar(200),
	description varchar(255),
	fulltxt mediumtext,
	indexdate date,
	size float(2),
	md5sum varchar(32),
	key url (url),
	key md5key (md5sum),
	visible int default 0, 
	level int) ENGINE = MYISAM;
	
DROP TABLE IF EXISTS keywords; 
create table keywords	(
	keyword_id int primary key not null auto_increment,
	keyword varchar(30) not null,
	unique kw (keyword),
	key keyword (keyword(10))) ENGINE = MYISAM;
	
	
DROP TABLE IF EXISTS link_keyword0; 
create table link_keyword0 (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
	
DROP TABLE IF EXISTS link_keyword1; 
create table link_keyword1 (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
	
DROP TABLE IF EXISTS link_keyword2; 
create table link_keyword2 (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
	
DROP TABLE IF EXISTS link_keyword3; 
create table link_keyword3 (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
	
DROP TABLE IF EXISTS link_keyword4; 
create table link_keyword4 (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;

DROP TABLE IF EXISTS link_keyword5; 
create table link_keyword5 (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
	
DROP TABLE IF EXISTS link_keyword6; 
create table link_keyword6 (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
	
DROP TABLE IF EXISTS link_keyword7; 
create table link_keyword7 (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
	
DROP TABLE IF EXISTS link_keyword8; 
create table link_keyword8 (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
	
DROP TABLE IF EXISTS link_keyword9; 
create table link_keyword9 (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
	
DROP TABLE IF EXISTS link_keyworda; 
create table link_keyworda (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
	
DROP TABLE IF EXISTS link_keywordb; 
create table link_keywordb (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
	
DROP TABLE IF EXISTS link_keywordc; 
create table link_keywordc (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
	
DROP TABLE IF EXISTS link_keywordd; 
create table link_keywordd (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
	
DROP TABLE IF EXISTS link_keyworde; 
create table link_keyworde (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
	
DROP TABLE IF EXISTS link_keywordf; 
create table link_keywordf (
	link_id int not null,
	keyword_id int not null,
	weight int(3),
	domain int(4),
	key linkid(link_id),
	key keyid(keyword_id)) ENGINE = MYISAM;
	
DROP TABLE IF EXISTS categories; 
create table categories(
	category_id integer not null auto_increment primary key, 
	category text,
	parent_num integer
	) ENGINE = MYISAM;
	
DROP TABLE IF EXISTS site_category; 
create table site_category (
	site_id integer,
	category_id integer
	) ENGINE = MYISAM;
	
DROP TABLE IF EXISTS temp; 
create table temp (
	link varchar(255),
	level integer,
	temp_id varchar (32)
	) ENGINE = MYISAM;
	
DROP TABLE IF EXISTS pending; 
create table pending (
	site_id integer,
	temp_id varchar(32),
	level integer,
	count integer,
	num integer) ENGINE = MYISAM;

DROP TABLE IF EXISTS query_log; 
create table query_log (
	query varchar(255),
	time timestamp(14),
	elapsed float(2),
	results int,
	key query_key(query)
	) ENGINE = MYISAM;

DROP TABLE IF EXISTS domains; 
create table domains (
	domain_id int auto_increment primary key not null,	
	domain varchar(255)
) ENGINE = MYISAM;
