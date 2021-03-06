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

CREATE TABLE HORAS_EXTRA
(
  USUARIO       VARCHAR2(30 BYTE),
  ESPECIALISTA  VARCHAR2(50 BYTE),
  HORAS NUMBER,
  VALOR_PAGAR VARCHAR2(30 BYTE)
);

CREATE TABLE CLAVES_SERVIDORES
(
  NOM_SERVIDOR VARCHAR2(30 BYTE),
  IP_SERVIDOR  VARCHAR2(50 BYTE),
  USUARIO VARCHAR2(30 BYTE),
  CLAVE VARCHAR2(100 BYTE),
  FECHA_REGISTRO DATE
);

CREATE TABLE PROGRAMACION_TURNOS(
INGENIERO VARCHAR2(30),
DIA_1 VARCHAR2(5),
DIA_2 VARCHAR2(5),
DIA_3 VARCHAR2(5),
DIA_4 VARCHAR2(5),
DIA_5 VARCHAR2(5),
DIA_6 VARCHAR2(5),
DIA_7 VARCHAR2(5),
DIA_8 VARCHAR2(5),
DIA_9 VARCHAR2(5),
DIA_10 VARCHAR2(5),
DIA_11 VARCHAR2(5),
DIA_12 VARCHAR2(5),
DIA_13 VARCHAR2(5),
DIA_14 VARCHAR2(5),
DIA_15 VARCHAR2(5),
DIA_16 VARCHAR2(5),
DIA_17 VARCHAR2(5),
DIA_18 VARCHAR2(5),
DIA_19 VARCHAR2(5),
DIA_20 VARCHAR2(5),
DIA_21 VARCHAR2(5),
DIA_22 VARCHAR2(5),
DIA_23 VARCHAR2(5),
DIA_24 VARCHAR2(5),
DIA_25 VARCHAR2(5),
DIA_26 VARCHAR2(5),
DIA_27 VARCHAR2(5),
DIA_28 VARCHAR2(5),
DIA_29 VARCHAR2(5),
DIA_30 VARCHAR2(5),
DIA_31 VARCHAR2(5)
);

INSERT INTO HORAS_EXTRA VALUES ('MROMERO','MARILUZ ROMERO',10,'$120.000');
INSERT INTO HORAS_EXTRA VALUES ('ORIOS','OSCAR RIOS',8,'$50.000');
INSERT INTO HORAS_EXTRA VALUES ('MBALLEST','MAICOL BALLESTEROS',20,'$300.000');

--DROP TABLE SOPORTE_UNIDAD;
--DROP TABLE COMPENSATORIOS;
--DROP TABLE CLAVES_SERVIDORES;
SELECT * FROM COMPENSATORIOS;
DELETE  COMPENSATORIOS;
SELECT * FROM  CIERRES;
DELETE CIERRES;
SELECT * FROM  SOPORTE_UNIDAD;
DELETE SOPORTE_UNIDAD;
SELECT * FROM   VACACIONES;
DELETE VACACIONES;
SELECT * FROM  HORAS_EXTRA;
DELETE  HORAS_EXTRA;
SELECT * FROM   CLAVES_SERVIDORES;
EDIT  CLAVES_SERVIDORES;

SELECT STCCCDAT.ENCRIPTAR('AVANTEL') FROM DUAL;

--Encontrar usuario de compensatorio de una fecha en especifico
 SELECT *
  FROM (
 SELECT cp.USUARIO, us.NOMBRES, us.APELLIDOS FROM COMPENSATORIOS cp
         INNER JOIN USUARIOS_SOPORTE us ON cp.USUARIO=us.USUARIO
         WHERE FECHA_COMPENSATORIO = TO_CHAR(TRUNC(SYSDATE),'YYYY-MM-DD')
         )
 WHERE ROWNUM <= 1;
 
--Encontrar usuario de vacaciones entre un rango de fechas
 SELECT *
  FROM (
 SELECT vc.USUARIO, us.NOMBRES, us.APELLIDOS FROM VACACIONES vc
         INNER JOIN USUARIOS_SOPORTE us ON vc.USUARIO=us.USUARIO
         WHERE TO_CHAR(TRUNC(SYSDATE),'YYYY-MM-DD') BETWEEN INICIO_VACACIONES AND FIN_VACACIONES
         )
 WHERE ROWNUM <= 1;


--Encontrar usuario de cierre de una fecha en especifico
SELECT *
  FROM (
 SELECT fc.USUARIO, us.NOMBRES, us.APELLIDOS FROM CIERRES fc
         INNER JOIN USUARIOS_SOPORTE us ON fc.USUARIO=us.USUARIO
         WHERE FECHA_CIERRE = TO_CHAR(TRUNC(SYSDATE)+1,'YYYY-MM-DD')
       ) WHERE ROWNUM <= 1;


--Encontrar usuario de soporte unidad entre un rango de fechas
 SELECT *
  FROM (
 SELECT sp.USUARIO, us.NOMBRES, us.APELLIDOS FROM SOPORTE_UNIDAD sp
         INNER JOIN USUARIOS_SOPORTE us ON sp.USUARIO=us.USUARIO
         WHERE TO_CHAR(TRUNC(SYSDATE),'YYYY-MM-DD') BETWEEN FECHA_INICIO AND FECHA_FIN
         )
 WHERE ROWNUM <= 1;



SELECT TO_CHAR(TRUNC(SYSDATE)-1,'YYYY-MM-DD') FROM DUAL;

--DROP TABLE  USUARIOS_SOPORTE;

SELECT * FROM EDIT USUARIOS_SOPORTE;
SELECT NOMBRES, APELLIDOS, CEDULA FROM USUARIOS_SOPORTE;

SELECT NOMBRES,APELLIDOS,CEDULA,TELEFONO,CORREO_ELECTRONICO,CARGO,TELEFONO_DOTACION,IP_INGENIERO,USUARIO FROM  USUARIOS_SOPORTE;

--SELECT REPLACE(USUARIO,' ','') FROM  USUARIOS_SOPORTE;

--DELETE USUARIOS_SOPORTE;
--DELETE USUARIOS_SOPORTE_SEG;
--edit  USUARIOS_SOPORTE;


SELECT NOMBRES, APELLIDOS, CORREO_ELECTRONICO,FECHA_CREACION FROM USUARIOS_SOPORTE WHERE NOMBRES=''AND APELLIDOS='' AND CORREO_ELECTRONICO = '' AND FECHA_CREACION = '';

SELECT * FROM edit USUARIOS_SOPORTE_SEG;

SELECT NOMBRES||' '||APELLIDOS, CEDULA 
                           FROM USUARIOS_SOPORTE A INNER JOIN USUARIOS_SOPORTE_SEG B
                           ON A.USUARIO = B.USUARIO WHERE B.TIPO_USUARIO = 'USER';

ALTER TABLE USUARIOS_SOPORTE_SEG
  ADD TIPO_USUARIO varchar2(30);

--INSERTAR USUARIO SOPORTE
INSERT INTO USUARIOS_SOPORTE VALUES (SUBSTR('BRAYAN',1,1)||SUBSTR('BARON',1,7),'BRAYAN','BARON AMAYA',1030640407,3507105174,'bbaron@avantel.com.co','INGENIERO SOPORTE TI',3506692063,'10.100.13.98',SYSDATE);
INSERT INTO USUARIOS_SOPORTE VALUES (SUBSTR('WILSON',1,1)||SUBSTR('CASTRO',1,7),'WILSON','CASTRO',1042345643,3507105258,'wcastro@avantel.com.co','INGENIERO SOPORTE TI',3506692066,'10.100.18.94',SYSDATE);


--SELECT SUBSTR('WILSON',1,1)||SUBSTR('CASTRO',1,6) FROM DUAL;

--INSERTAR SEGURIDAD
INSERT INTO USUARIOS_SOPORTE_SEG VALUES('BBARON','AVANTEL','A');
INSERT INTO USUARIOS_SOPORTE_SEG VALUES('WCASTRO','AVANTEL','A');

--RECORDAR CLAVE update
UPDATE USUARIOS_SOPORTE_SEG SET CLAVE = 'AVANTEL' WHERE USUARIO IN ('BBARON','WCASTRO');


SELECT * FROM usuarios_soporte_seg;

/************************************************** SENTENCIAS ACTIVIDADES DE TURNO******************/
CREATE TABLE ACTIVIDADES_TURNO(
ID_TURNO number,
ID_ACTIVIDAD_TURNO number,
FECHA DATE,
HORA VARCHAR2(30),
REALIZADO_SI_NO VARCHAR2(10),
OBSERVACIONES VARCHAR2(4000),
USUARIO VARCHAR(30)
);

--drop table ACTIVIDADES_TURNO;
SELECT * FROM ACTIVIDADES_TURNO;
--DELETE ACTIVIDADES_TURNO;

INSERT INTO ACTIVIDADES_TURNO VALUES (4, 7,TRUNC(SYSDATE),TO_CHAR(SYSDATE, 'HH24:MI:SS'),'SI','prueba3','BBARONA');


SELECT TO_CHAR(SYSDATE, 'HH:MI:SS a.m.') FROM DUAL;

--ACTIVIDADES TURNO MANTENIMIENTO
CREATE TABLE MTO_ACTIVIDADES_TURNO(
ID NUMBER PRIMARY KEY NOT NULL,
NOMBRE_ACTIVIDAD VARCHAR2(1000),
HORA_REALIZAR VARCHAR2(30),
TIPO_ACTIVIDAD NUMBER
);
 --drop table MTO_ACTIVIDADES_TURNO;

SELECT * FROM MTO_ACTIVIDADES_TURNO;

/*
INSERT INTO MTO_ACTIVIDADES_TURNO VALUES (0,'Consulta cambio de numero portabilidad','5:55:00 AM',0);
INSERT INTO MTO_ACTIVIDADES_TURNO VALUES (1,'Verificaci�n�Procesos�DWH','2:30:00�AM',0);
INSERT INTO MTO_ACTIVIDADES_TURNO VALUES (2,'Modificacion�Numeracion�(Portabilidad)','6:15:00�AM',0);
INSERT INTO MTO_ACTIVIDADES_TURNO VALUES (3,'Carga�de�archivos�de�operadores�TIGO,�MOVISTAR�y�CLARO','11:00:00�AM',0);
INSERT INTO MTO_ACTIVIDADES_TURNO VALUES (4,'Reinicio�BTF�Venta�Express�(S�bados),�192.168.231.237�BTF12�192.168.231.238�BTF14-15�Probar�acceso�al�aplicativo','3:00:00�AM',1);
INSERT INTO MTO_ACTIVIDADES_TURNO VALUES (5,'Consulta�de�Abonados�ONE�NDS.�(Sabados�)','3:00:00�PM',1);
INSERT INTO MTO_ACTIVIDADES_TURNO VALUES (6,'Revisi�n�Proceso�de�Compensacion�IDEN(11�de�cada�mes�)','4:00:00�PM',0);
INSERT INTO MTO_ACTIVIDADES_TURNO VALUES (7,'Revisi�n�Proceso�de�Compensacion�LTE�(18,20,22�y�28�de�cada�mes�)','4:00:00�PM',0);
INSERT INTO MTO_ACTIVIDADES_TURNO VALUES (8,'Consulta�de�Abonados�ONE�NDS.�(Domingos�)','3:00:00�PM',1);
INSERT INTO MTO_ACTIVIDADES_TURNO VALUES (9,'Modificacion�Turnos�Aranda�de�acuerdo�al�horario�(Domingos�)','10:00:00�PM',1);
INSERT INTO MTO_ACTIVIDADES_TURNO VALUES (10,'Ejecuci�n�Query�y�Envio�de�Correo�notificando�ciclo�enviado�en�el�cierre.�En�caso�de�haberse�enviado�el�incorrecto�notificar�inmediamentamente�a�la�persona�que�esta�ejecutando�el�cierre�(15�y�1ro�de�cada�mes�a�la�madrugada)','1:15:00�PM',0);
INSERT INTO MTO_ACTIVIDADES_TURNO VALUES (11,'Monitoreo�en�OAS�','Permanente',1);
INSERT INTO MTO_ACTIVIDADES_TURNO VALUES (12,'Atenci�n�Alarmas�por�correo','Permanente',0);
INSERT INTO MTO_ACTIVIDADES_TURNO VALUES (13,'Arandas�Pendientes','Permanente',0);
*/
---TIPOS CTIVIDADES
CREATE TABLE TIPO_ACTIVIDADES_TURNO(
ID NUMBER PRIMARY KEY NOT NULL,
TIPO_ACTIVIDAD VARCHAR2(50)
);

--DROP TABLE TIPO_ACTIVIDADES_TURNO;
SELECT * FROM TIPO_ACTIVIDADES_TURNO;
/*
INSERT INTO TIPO_ACTIVIDADES_TURNO VALUES (0,'SEMANA');
INSERT INTO TIPO_ACTIVIDADES_TURNO VALUES (1,'FIN_SEMANA');
*/

--MANTEMINIMIENTO TURNOS
CREATE TABLE MTO_TURNOS(
ID NUMBER PRIMARY KEY NOT NULL,
NOMBRE_TURNO VARCHAR2(100)
);
--DROP TABLE MTO_TURNOS;
SELECT * FROM  MTO_TURNOS;

INSERT INTO MTO_TURNOS VALUES (1,'Turno 1 -> 6am - 2pm');
INSERT INTO MTO_TURNOS VALUES (2,'Turno 2 -> 11am - 8pm');
INSERT INTO MTO_TURNOS VALUES (3,'Turno 3 -> 2pm - 10pm');
INSERT INTO MTO_TURNOS VALUES (4,'Turno 4 -> 10pm - 6am');
INSERT INTO MTO_TURNOS VALUES (5,'Turno 5 -> 8am - 5:30pm');
INSERT INTO MTO_TURNOS VALUES (6,'Sabados - Domingos 6am - 2pm','FSM','6:00:00,000000 AM','2:00:00,000000 PM');
INSERT INTO MTO_TURNOS VALUES (7,'Sabados - Domingos 2pm - 10pm','FST','2:00:00,000000 PM','10:00:00,000000 PM');
INSERT INTO MTO_TURNOS VALUES (8,'Sabados - Domingos 10pm - 6am','FSN','10:00:00,000000 PM','6:00:00,000000 AM');
INSERT INTO MTO_TURNOS VALUES (9,'No Aplica','NA','NA','NA');

--CONSULTA DE REGISTRO DE ACTIVIDADES DEL TURNO
SELECT * FROM    ACTIVIDADES_TURNO;

SELECT C.NOMBRE_TURNO,B.NOMBRE_ACTIVIDAD,A.FECHA,B.HORA_REALIZAR,A.HORA AS HORA_REALIZADO,A.REALIZADO_SI_NO,A.OBSERVACIONES,
A.USUARIO,D.NOMBRES||' '||D.APELLIDOS AS NOMBRE_USUARIO
FROM ACTIVIDADES_TURNO A
INNER JOIN MTO_ACTIVIDADES_TURNO B ON B.ID = A.ID_ACTIVIDAD_TURNO
INNER JOIN MTO_TURNOS C ON C.ID = A.ID_TURNO
INNER JOIN USUARIOS_SOPORTE D ON D.USUARIO = A.USUARIO
ORDER BY 3,4 DESC;



CREATE TABLE MTO_TURNOS_HS(
FECHA_TURNO DATE,
ID_TURNO NUMBER,
ID_USUARIO NUMBER,
PAGO_EXTRA NUMBER,
HORAS_EXTRA NUMBER,
CONSTRAINT UC_MTO_TURNOS_HS UNIQUE(FECHA_TURNO,ID_USUARIO)
);

--DROP TABLE MTO_TURNOS_HS;



SELECT * FROM  MTO_TURNOS_HS WHERE FECHA_TURNO = TO_DATE('2020-05','YYYY-MM');


/*******************************************REGISTRO DE ACTIVIDADES DE CIERRE******************************************/
CREATE TABLE ACTIVIDADES_CIERRE(
ID_CIERRE number,
ID_ACTIVIDAD_CIERRE number,
FECHA DATE,
HORA VARCHAR2(30),
REALIZADO_SI_NO VARCHAR2(10),
OBSERVACIONES VARCHAR2(4000),
USUARIO VARCHAR(30)
);

SELECT * FROM ACTIVIDADES_CIERRE WHERE ID_CIERRE = 3;
--DELETE ACTIVIDADES_CIERRE;

CREATE TABLE MTO_ACTIVIDADES_CIERRE(
ID NUMBER PRIMARY KEY NOT NULL,
NOMBRE_ACTIVIDAD VARCHAR2(1000),
HORA_REALIZAR VARCHAR2(30),
TIPO_ACTIVIDAD NUMBER
);

SELECT * FROM  MTO_ACTIVIDADES_CIERRE;
/*
INSERT INTO MTO_ACTIVIDADES_CIERRE VALUES (0,'Lanzamiento del Proceso de Paso  de Postpago a Prepago de Lotus','4:00:00�PM',0);
INSERT INTO MTO_ACTIVIDADES_CIERRE VALUES (1,'Lanzamiento del Proceso de Paso  de Postpago a Prepago','5:00:00�PM',1);
INSERT INTO MTO_ACTIVIDADES_CIERRE VALUES (2,'Envio de correo con las lineas que se pasaron de Post  a Pre.','9:00:00�PM',0);
INSERT INTO MTO_ACTIVIDADES_CIERRE VALUES (3,'Baja de lineas prepago de clientes que se van. Tabla USRSTC.PROGR_CANCELA_PRELTE. OJO CICLO J-25','9:30:00�PM',2);
INSERT INTO MTO_ACTIVIDADES_CIERRE VALUES (4,'Pasos que se deben de correr antes del cierre decreto 464','10:00:00�PM',0);
INSERT INTO MTO_ACTIVIDADES_CIERRE VALUES (5,'cargas face 1 de LTE','10:30:00�PM',0);
INSERT INTO MTO_ACTIVIDADES_CIERRE VALUES (6,'validacion de la creacion de las tablas de inventarios','0:00:00�AM',1);
INSERT INTO MTO_ACTIVIDADES_CIERRE VALUES (7,'Revisa Logs STC','Permanente',0);
INSERT INTO MTO_ACTIVIDADES_CIERRE VALUES (8,'Configuracion de Cierre Maestra en la URL de Cierre','0:30:00�AM',0);
INSERT INTO MTO_ACTIVIDADES_CIERRE VALUES (9,'Verificar procesos en el STCAPPSERVER','Permanente',0);
INSERT INTO MTO_ACTIVIDADES_CIERRE VALUES (10,'cargas face 2 de LTE','0:12:00�AM',0);
INSERT INTO MTO_ACTIVIDADES_CIERRE VALUES (11,'Env�ar Proceso Cierre de Maestra por la URL de Cierre','0:45:00�AM',0);
INSERT INTO MTO_ACTIVIDADES_CIERRE VALUES (12,'Verificar  Correo de Alerta con notificacion confirmando el cierre enviado. ','0:46:00�AM',0);
INSERT INTO MTO_ACTIVIDADES_CIERRE VALUES (13,'Env�o de Correo indicando Inicio del proceso de Cierre Maestra','0:50:00�AM',0);
INSERT INTO MTO_ACTIVIDADES_CIERRE VALUES (14,'Notificar el inicio del proceso de Cierre Maestra al grupo de Facturacion','0:50:00�AM',0);
INSERT INTO MTO_ACTIVIDADES_CIERRE VALUES (15,'Seguimiento proceso Cierre de Maestra','Permanente',0);
INSERT INTO MTO_ACTIVIDADES_CIERRE VALUES (16,'Envio Correo notificando finalizacion de  las recargas realizadas por  BYTE','2:00:00�AM - 3:00:00�AM',0);
INSERT INTO MTO_ACTIVIDADES_CIERRE VALUES (17,'Ejecutar de los programas de descuento','3:00:00�AM - 4:00:00�AM',0);
INSERT INTO MTO_ACTIVIDADES_CIERRE VALUES (18,'Validar las Exoneraciones','4:45:00�AM',0);
INSERT INTO MTO_ACTIVIDADES_CIERRE VALUES (19,'Env�o de Correo indicando Finalizaci�n del proceso de Cierre  Maestra','5:00:00�AM',0);
INSERT INTO MTO_ACTIVIDADES_CIERRE VALUES (20,'Notificar la finalizaci�n del proceso de Cierre de Maestra al grupo de Facturacion','5:15:00�AM',0);
INSERT INTO MTO_ACTIVIDADES_CIERRE VALUES (21,'Paso que se debe de correr despues del cierre decreto 464','2:30:00�AM',0);
INSERT INTO MTO_ACTIVIDADES_CIERRE VALUES (22,'Activaciones  de las exoneraciones','5:18:00�AM',0);
INSERT INTO MTO_ACTIVIDADES_CIERRE VALUES (23,'Validacion de OAS','Permanente',0);
INSERT INTO MTO_ACTIVIDADES_CIERRE VALUES (24,'Validacion de recargas IDEN y  LTE, Hotbilling, eliminaci�n de suplementarios','5:30:00�AM',1);
*/

---TIPOS ACTIVIDADES CIERRE
CREATE TABLE TIPO_ACTIVIDADES_CIERRE(
ID NUMBER PRIMARY KEY NOT NULL,
TIPO_ACTIVIDAD VARCHAR2(50)
);

--DROP TABLE TIPO_ACTIVIDADES_CIERRE;
SELECT * FROM TIPO_ACTIVIDADES_CIERRE;
/*
INSERT INTO TIPO_ACTIVIDADES_CIERRE VALUES (0,'MIXTO');
INSERT INTO TIPO_ACTIVIDADES_CIERRE VALUES (1,'LARGO');
INSERT INTO TIPO_ACTIVIDADES_CIERRE VALUES (2,'CORTO');
INSERT INTO TIPO_ACTIVIDADES_CIERRE VALUES (3,'CICLOJ');
*/

--MANTEMINIMIENTO TURNOS
CREATE TABLE MTO_CIERRES(
ID NUMBER PRIMARY KEY NOT NULL,
NOMBRE_CIERRE VARCHAR2(100)
);
--DROP TABLE MTO_TURNOS;
SELECT * FROM  MTO_CIERRES;
/*
INSERT INTO MTO_CIERRES VALUES (1,'Ciclo A - 1');
INSERT INTO MTO_CIERRES VALUES (2,'Ciclo B - 15');
INSERT INTO MTO_CIERRES VALUES (3,'Ciclo G - 5');
INSERT INTO MTO_CIERRES VALUES (4,'Ciclo H - 10');
INSERT INTO MTO_CIERRES VALUES (5,'Ciclo I - 20');
INSERT INTO MTO_CIERRES VALUES (6,'Ciclo J - 25');*/

--CONSULTA DE LAS ACTIVIDADES DEL CIERRE LARGO Y CORTOS

SELECT C.NOMBRE_CIERRE,B.NOMBRE_ACTIVIDAD,A.FECHA,B.HORA_REALIZAR,A.HORA AS HORA_REALIZADO,A.REALIZADO_SI_NO,A.OBSERVACIONES,
A.USUARIO,D.NOMBRES||' '||D.APELLIDOS AS NOMBRE_USUARIO
FROM ACTIVIDADES_CIERRE A
INNER JOIN MTO_ACTIVIDADES_CIERRE B ON B.ID = A.ID_ACTIVIDAD_CIERRE
INNER JOIN MTO_CIERRES C ON C.ID = A.ID_CIERRE
INNER JOIN USUARIOS_SOPORTE D ON D.USUARIO = A.USUARIO
AND NOMBRE_CIERRE = 'Ciclo G - 5'
ORDER BY 3,4 DESC;






/*ARANDA CASOS */
--CANTIDAD POR MES Y ESPECIALISTA
SELECT GRP_ID, RESPONSABLE,COUNT(*) as CANTIDAD FROM ARANDA.V_ARA_CASOS_2
    WHERE GRP_ID IN (64,73) AND ESTADO  IN ('SOLUCIONADO','CERRADO') 
    AND TRUNC(FECHA_REGISTRO) BETWEEN TRUNC (SYSDATE,'MONTH')AND TRUNC(LAST_DAY (SYSDATE))
        GROUP BY GRP_ID,RESPONSABLE ORDER BY 3 DESC;
        
--CATIDAD POR DIA Y ESPECIALISTA
SELECT GRP_ID,RESPONSABLE,count(*) as CANTIDAD FROM ARANDA.V_ARA_CASOS_2  WHERE GRP_ID IN (64,73)
    AND FECHA_SOLUCION  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
    AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )
    GROUP BY GRP_ID,RESPONSABLE ORDER BY 3 DESC;      
        


--GESTION GENERAL POR MES
SELECT NO_CASO,AUTOR,FECHA_REGISTRO,RESPONSABLE,DESCRIPCION,ESTADO,CATEGORIA,SOLUCION,FECHA_SOLUCION 
FROM ARANDA.V_ARA_CASOS_2 WHERE GRP_ID IN (64,73)
AND TRUNC(FECHA_REGISTRO) BETWEEN TRUNC (SYSDATE,'MONTH')AND TRUNC(LAST_DAY (SYSDATE))
ORDER BY 3 DESC; 

--DETALLE POR DIA
SELECT NO_CASO,AUTOR,FECHA_REGISTRO,RESPONSABLE,DESCRIPCION,ESTADO,CATEGORIA,SOLUCION,FECHA_SOLUCION 
FROM ARANDA.V_ARA_CASOS_2  WHERE GRP_ID IN (64,73) 
AND FECHA_SOLUCION  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )
ORDER BY 1 DESC;

--DATA DE GRAFICAS DE LINEAS
--ESPECIALISTAS ACTIVO EN EL GRUPO PARA EL ROTULO
SELECT DISTINCT(RESPONSABLE) FROM ARANDA.V_ARA_CASOS_2 A
                INNER JOIN USUARIOS B ON B.UNAME = A.RESPONSABLE
                WHERE GRP_ID IN (64,73)
                AND CODUSUARIO NOT IN (687,10698,3277,3229,2236,3670,2786,2857,3066,3560,3218,2106,3323) ORDER BY 1 DESC;
                
--CASOS MES ACTUAL
SELECT  RESPONSABLE,COUNT(*) AS CANTIDAD 
                FROM ARANDA.V_ARA_CASOS_2 A
                LEFT JOIN USUARIOS B ON B.UNAME = A.RESPONSABLE
                WHERE GRP_ID IN (64,73) AND ESTADO  IN ('SOLUCIONADO','CERRADO')
                AND CODUSUARIO NOT IN (687,10698,3277,3229,2236,3670,2786,2857,3066,3560,3218,2106,3323)
                AND TRUNC(FECHA_REGISTRO) BETWEEN TRUNC (SYSDATE,'MONTH')AND TRUNC(LAST_DAY (SYSDATE))
                GROUP BY RESPONSABLE
                UNION ALL
                SELECT DISTINCT(RESPONSABLE),0 FROM ARANDA.V_ARA_CASOS_2 A
                INNER JOIN USUARIOS B ON B.UNAME = A.RESPONSABLE
                WHERE GRP_ID IN (64,73)
                AND CODUSUARIO NOT IN (687,10698,3277,3229,2236,3670,2786,2857,3066,3560,3218,2106,3323)
                MINUS
                SELECT  RESPONSABLE,0 
                FROM ARANDA.V_ARA_CASOS_2 A
                LEFT JOIN USUARIOS B ON B.UNAME = A.RESPONSABLE
                WHERE GRP_ID IN (64,73) AND ESTADO  IN ('SOLUCIONADO','CERRADO')
                AND CODUSUARIO NOT IN (687,10698,3277,3229,2236,3670,2786,2857,3066,3560,3218,2106,3323)
                AND TRUNC(FECHA_REGISTRO) BETWEEN TRUNC (SYSDATE,'MONTH')AND TRUNC(LAST_DAY (SYSDATE))
                GROUP BY RESPONSABLE ORDER BY 1 DESC;
                
    --CASOS HACE UN MES                            
    SELECT RESPONSABLE,COUNT(*) as CANTIDAD FROM ARANDA.V_ARA_CASOS_2 A
                INNER JOIN USUARIOS B ON B.UNAME = A.RESPONSABLE
                WHERE GRP_ID IN (64,73) AND ESTADO  IN ('SOLUCIONADO','CERRADO') 
                AND CODUSUARIO NOT IN (687,10698,3277,3229,2236,3670,2786,2857,3066,3560,3218,2106,3323)
                AND TRUNC(FECHA_REGISTRO) BETWEEN TRUNC(ADD_MONTHS(SYSDATE,-1),'MONTH') AND TRUNC(LAST_DAY(ADD_MONTHS(SYSDATE,-1)))
                GROUP BY RESPONSABLE ORDER BY 1 DESC;
                
                
                
    --CASOS HACE 2 MESES
    SELECT RESPONSABLE,COUNT(*) as CANTIDAD FROM ARANDA.V_ARA_CASOS_2 A
                INNER JOIN USUARIOS B ON B.UNAME = A.RESPONSABLE
                WHERE GRP_ID IN (64,73) AND ESTADO  IN ('SOLUCIONADO','CERRADO') 
                AND CODUSUARIO NOT IN (687,10698,3277,3229,2236,3670,2786,2857,3066,3560,3218,2106,3323)
                AND TRUNC(FECHA_REGISTRO) BETWEEN TRUNC(ADD_MONTHS(SYSDATE,-2),'MONTH') AND TRUNC(LAST_DAY(ADD_MONTHS(SYSDATE,-2)))
                GROUP BY RESPONSABLE ORDER BY 1 DESC; 
                
                
    --CREACION DE VISTA PARA TRAER EL MES ACTUAL
 CREATE VIEW V_MES_ACTUAL 
 AS
 select to_char(sysdate, 'Month','nls_date_language=spanish') as MES from dual;
 
 SELECT * FROM V_MES_ACTUAL; 
 
 ---CREACION VISTA PARA MOSTRAR GESTION DEL DIA
  CREATE OR REPLACE VIEW V_GESTION_DIA
            AS
            SELECT 
            A.GRP_ID AS ID_GRUPO, 
            A.RESPONSABLE AS RESPONSABLE
            ,count(*) AS TOTAL, 
            (SELECT COUNT(ESTADO)  FROM ARANDA.V_ARA_CASOS_2 B WHERE ESTADO NOT IN ('SOLUCIONADO','CERRADO')
            AND B.RESPONSABLE = A.RESPONSABLE
            AND TRUNC(FECHA_REGISTRO)  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
            AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )
            ) AS PENDIENTE,
            (SELECT COUNT(ESTADO)  FROM ARANDA.V_ARA_CASOS_2 B WHERE ESTADO IN ('SOLUCIONADO','CERRADO')
            AND B.RESPONSABLE = A.RESPONSABLE
            AND TRUNC(FECHA_REGISTRO)  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
            AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )
            ) AS CERRADOS,
            (
             SELECT ROUND(COUNT(*)*100/(SELECT COUNT(*) FROM ARANDA.V_ARA_CASOS_2 C WHERE TRUNC(FECHA_REGISTRO) BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
            AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )
            AND GRP_ID IN (64,73) AND C.RESPONSABLE = B.RESPONSABLE),2) AS cump
           FROM ARANDA.V_ARA_CASOS_2 B
           WHERE GRP_ID IN (64,73) 
           AND ESTADO  IN ('SOLUCIONADO','CERRADO')
            AND TRUNC(FECHA_REGISTRO)  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
            AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )
            AND B.RESPONSABLE = A.RESPONSABLE
             GROUP BY RESPONSABLE
            ) AS CUMPLIMIENTO 
             FROM ARANDA.V_ARA_CASOS_2 A  WHERE GRP_ID IN (64,73)
                    AND TRUNC(A.FECHA_REGISTRO)  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
                    AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )
                    GROUP BY GRP_ID,RESPONSABLE ORDER BY 3 DESC;
                      
                    select * from V_GESTION_DIA;
                    
 
                    
                    
 -- VISTAS MODULO CONSULTA VARIABLE
 
 --VISTAS DE GESTION DEL MES DE TODO EL GRUPO
SELECT * FROM ARANDA.V_GESTION_MES_TI;
SELECT * FROM ARANDA.V_GESTION_MES_WEB;
SELECT * FROM ARANDA.V_GESTION_MES_GESTION;
SELECT * FROM ARANDA.V_GESTION_MES_PNIVEL;
SELECT * FROM ARANDA.V_GESTION_MES_FINANCIERA;
SELECT * FROM ARANDA.V_GESTION_MES_DATA_WARE;
SELECT * FROM ARANDA.V_GESTION_MES_PREPAGO;
SELECT * FROM ARANDA.V_GESTION_MES_DBA;

--VISTA DE LA SEMANA APLICACIONES TI
SELECT * FROM ARANDA.V_GESTION_SEMANA_TI;

--VISTA DEL DIA DE SOPORTE APLICACIONES TI

select * from ARANDA.V_GESTION_DIA;
                    
                    
  /*****************ANALISIS DE CASOS****************/

      
     --  CREATE OR REPLACE VIEW ARANDA.V_ANALISIS_GES
      --  AS
        SELECT * /*+PARALLEL(8,A)*/
        FROM (
        SELECT
        RESPONSABLE AS INGE_MAX ,
        COUNT(*) AS MAXIMO,
        (
        SELECT * FROM (
        SELECT RESPONSABLE
         FROM ARANDA.V_ARA_CASOS_2
        WHERE ESTADO  IN ('SOLUCIONADO','CERRADO')
        AND GRP_ID IN (64,73)
        AND TRUNC(FECHA_SOLUCION)  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
        AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )
        GROUP BY RESPONSABLE
        HAVING COUNT(RESPONSABLE) = (SELECT MIN(COUNT(*))  FROM ARANDA.V_ARA_CASOS_2
        WHERE ESTADO  IN ('SOLUCIONADO','CERRADO')
        AND GRP_ID IN (64,73)
        AND TRUNC(FECHA_SOLUCION)  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
        AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )
        GROUP BY RESPONSABLE))
        WHERE ROWNUM <= 1
        ) AS INGE_MIN,
        (
        SELECT * FROM (
        SELECT COUNT(*)
         FROM ARANDA.V_ARA_CASOS_2
        WHERE ESTADO  IN ('SOLUCIONADO','CERRADO')
        AND GRP_ID IN (64,73)
        AND TRUNC(FECHA_SOLUCION)  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
        AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )
        GROUP BY RESPONSABLE
        HAVING COUNT(RESPONSABLE) = (SELECT MIN(COUNT(*))  FROM ARANDA.V_ARA_CASOS_2
        WHERE ESTADO  IN ('SOLUCIONADO','CERRADO')
        AND GRP_ID IN (64,73)
        AND TRUNC(FECHA_SOLUCION)  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
        AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )
        GROUP BY RESPONSABLE))
        WHERE ROWNUM <= 1
        ) AS MINIMO,
        (
        SELECT MAX(COUNT(*)) - MIN(COUNT(*))
         FROM ARANDA.V_ARA_CASOS_2
        WHERE ESTADO  IN ('SOLUCIONADO','CERRADO')
        AND GRP_ID IN (64,73)
        AND TRUNC(FECHA_SOLUCION)  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
        AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )
        GROUP BY RESPONSABLE
        ) AS DIFERENCIA,
        (
        SELECT ROUND(AVG(COUNT(*)),2)
        FROM ARANDA.V_ARA_CASOS_2
        WHERE ESTADO  IN ('SOLUCIONADO','CERRADO')
        AND GRP_ID IN (64,73)
        AND TRUNC(FECHA_SOLUCION)  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
        AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )
        GROUP BY RESPONSABLE
        )AS PROMEDIO,
        (
        SELECT SUM(ROUND(COUNT(*)*100/(SELECT COUNT(*) FROM ARANDA.V_ARA_CASOS_2 WHERE TRUNC(FECHA_REGISTRO) BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
        AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )
        AND GRP_ID IN (64,73)),2))||'%' AS cump
        FROM ARANDA.V_ARA_CASOS_2
        WHERE GRP_ID IN (64,73) 
        AND ESTADO  IN ('SOLUCIONADO','CERRADO')
        AND TRUNC(FECHA_REGISTRO)  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
        AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )
        GROUP BY RESPONSABLE
        )AS CUMPLIMIENTO,
        (SELECT COUNT(*)
        FROM ARANDA.V_ARA_CASOS_2 A
        WHERE ESTADO  IN ('SOLUCIONADO','CERRADO')
        AND GRP_ID IN (64,73)
        AND TRUNC(FECHA_SOLUCION)  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
        AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )        
        )AS CERRADOS_TOTAL,
        (SELECT COUNT(*)
        FROM ARANDA.V_ARA_CASOS_2 A
        WHERE ESTADO  NOT IN ('SOLUCIONADO','CERRADO')
        AND GRP_ID IN (64,73)
        AND TRUNC(FECHA_REGISTRO)  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
        AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )        
        )AS PENDIENTE_TOTAL    
        FROM ARANDA.V_ARA_CASOS_2 A
        WHERE ESTADO  IN ('SOLUCIONADO','CERRADO')
        AND GRP_ID IN (64,73)
        AND TRUNC(FECHA_SOLUCION)  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
        AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )
        GROUP BY RESPONSABLE
        HAVING COUNT(RESPONSABLE) = (SELECT MAX(COUNT(*))  FROM ARANDA.V_ARA_CASOS_2
        WHERE ESTADO  IN ('SOLUCIONADO','CERRADO')
        AND GRP_ID IN (64,73)
        AND TRUNC(FECHA_SOLUCION)  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
        AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )
        GROUP BY RESPONSABLE)) WHERE ROWNUM <= 1;
        
        
        SELECT MAXIMO,INGE_MAX,MINIMO,INGE_MIN,DIFERENCIA,PROMEDIO,CUMPLIMIENTO FROM V_ANALISIS_GES;
                     
                                                        
                       