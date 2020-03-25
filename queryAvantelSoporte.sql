select * from usuarios_p;

--TABA DE SEGURIDAD DE USUARIOS
CREATE TABLE USUARIOS_SOPORTE_SEG(
USUARIO VARCHAR(30) PRIMARY KEY,
CLAVE VARCHAR(30),
ESTADO VARCHAR(30)
);

--TABLA DE USUARIOS
CREATE TABLE USUARIOS_SOPORTE(
USUARIO VARCHAR2(30) PRIMARY KEY,
NOMBRES VARCHAR2(50) NOT NULL,
APELLIDOS VARCHAR2(50) NOT NULL,
CEDULA NUMBER(15),
TELEFONO NUMBER(15),
CORREO_ELECTRONICO VARCHAR2(50) NOT NULL,
CARGO VARCHAR2(50),
TELEFONO_DOTACION NUMBER(15),
IP_INGENIERO VARCHAR2(50),
FECHA_CREACION DATE
);

--TABLA DE COMPENSATORIO
CREATE TABLE COMPENSATORIOS
(
  USUARIO       VARCHAR2(30 BYTE),
  ESPECIALISTA  VARCHAR2(50 BYTE),
  FECHA_CREADO DATE,
  FECHA_COMPENSATORIO  VARCHAR2(50 BYTE)
  
);

--TABLA DE CIERRES
CREATE TABLE CIERRES
(
  USUARIO       VARCHAR2(30 BYTE),
  ESPECIALISTA  VARCHAR2(50 BYTE),
  FECHA_CREADO DATE,
  FECHA_CIERRE  VARCHAR2(50 BYTE)
  
);

--TABLA DE SOPORTE UNIDAD
CREATE TABLE SOPORTE_UNIDAD
(
  USUARIO       VARCHAR2(30 BYTE),
  ESPECIALISTA  VARCHAR2(50 BYTE),
  FECHA_CREADO DATE,
  FECHA_INICIO VARCHAR2(50 BYTE),
  FECHA_FIN VARCHAR2(50 BYTE)
  
);


CREATE TABLE VACACIONES
(
  USUARIO       VARCHAR2(30 BYTE),
  ESPECIALISTA  VARCHAR2(50 BYTE),
  FECHA_REGISTRADO DATE,
  INICIO_VACACIONES VARCHAR2(50 BYTE),
  FIN_VACACIONES VARCHAR2(50 BYTE)
  
);
/*
CREATE TABLE SOPORTE_UNIDAD
(
  USUARIO       VARCHAR2(30 BYTE),
  ESPECIALISTA  VARCHAR2(50 BYTE),
  FECHA_CREADO DATE,
  FECHA_INICIO DATE,
  FECHA_FIN DATE
  
);*/

--DROP TABLE SOPORTE_UNIDAD;
--DROP TABLE COMPENSATORIOS;
SELECT * FROM  COMPENSATORIOS;
SELECT * FROM  CIERRES;
SELECT * FROM  SOPORTE_UNIDAD;
SELECT * FROM  VACACIONES;


--DROP TABLE  USUARIOS_SOPORTE;

SELECT * FROM  USUARIOS_SOPORTE;
SELECT NOMBRES,APELLIDOS,CEDULA,TELEFONO,CORREO_ELECTRONICO,CARGO,TELEFONO_DOTACION,IP_INGENIERO,USUARIO FROM  USUARIOS_SOPORTE;

--SELECT REPLACE(USUARIO,' ','') FROM  USUARIOS_SOPORTE;

DELETE USUARIOS_SOPORTE;
--edit  USUARIOS_SOPORTE;


SELECT NOMBRES, APELLIDOS, CORREO_ELECTRONICO,FECHA_CREACION FROM USUARIOS_SOPORTE WHERE NOMBRES=''AND APELLIDOS='' AND CORREO_ELECTRONICO = '' AND FECHA_CREACION = '';

SELECT * FROM  USUARIOS_SOPORTE_SEG;

--INSERTAR USUARIO SOPORTE
--INSERT INTO USUARIOS_SOPORTE VALUES (SUBSTR('BRAYAN',1,1)||SUBSTR('BARON',1,7),'BRAYAN','BARON AMAYA',3507105174,'bbaron@avantel.com.co',3506692063,'10.100.13.98',SYSDATE);
---INSERT INTO USUARIOS_SOPORTE VALUES (SUBSTR('WILSON',1,1)||SUBSTR('CASTRO',1,7),'WILSON','CASTRO',3507105258,'wcastro@avantel.com.co',3506692066,'10.100.18.94',SYSDATE);


--SELECT SUBSTR('WILSON',1,1)||SUBSTR('CASTRO',1,6) FROM DUAL;

--INSERTAR SEGURIDAD
INSERT INTO USUARIOS_SOPORTE_SEG VALUES('BBARON','AVANTEL','A');
INSERT INTO USUARIOS_SOPORTE_SEG VALUES('WCASTRO','AVANTEL','A');

--RECORDAR CLAVE update
UPDATE USUARIOS_SOPORTE_SEG SET CLAVE = 'AVANTEL' WHERE USUARIO IN ('BBARON','WCASTRO');

select * from usuarios_soporte_seg;
SELECT* FROM  STCCCDAT.S4USERS;

SELECT * FROM usuarios_soporte_seg;

/*ARANDA CASOS */