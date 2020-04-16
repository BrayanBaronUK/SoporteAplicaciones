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


INSERT INTO HORAS_EXTRA VALUES ('MROMERO','MARILUZ ROMERO',10,'$120.000');
INSERT INTO HORAS_EXTRA VALUES ('ORIOS','OSCAR RIOS',8,'$50.000');
INSERT INTO HORAS_EXTRA VALUES ('MBALLEST','MAICOL BALLESTEROS',20,'$300.000');

--DROP TABLE SOPORTE_UNIDAD;
--DROP TABLE COMPENSATORIOS;
--DROP TABLE CLAVES_SERVIDORES;
SELECT * FROM  COMPENSATORIOS;
DELETE  COMPENSATORIOS;
SELECT * FROM  CIERRES;
SELECT * FROM  SOPORTE_UNIDAD;
SELECT * FROM  VACACIONES;
SELECT * FROM  HORAS_EXTRA;
SELECT * FROM  CLAVES_SERVIDORES;

SELECT STCCCDAT.ENCRIPTAR('AVANTEL') FROM DUAL;


--DROP TABLE  USUARIOS_SOPORTE;

SELECT * FROM  USUARIOS_SOPORTE;
SELECT NOMBRES,APELLIDOS,CEDULA,TELEFONO,CORREO_ELECTRONICO,CARGO,TELEFONO_DOTACION,IP_INGENIERO,USUARIO FROM  USUARIOS_SOPORTE;

--SELECT REPLACE(USUARIO,' ','') FROM  USUARIOS_SOPORTE;

--DELETE USUARIOS_SOPORTE;
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
                    
 
                    
                    
 -- CREACION DE VISTA PARA MOSTRAR GESTION DEL MES
         
            CREATE OR REPLACE VIEW V_GESTION_MES
            AS       
            SELECT 
            A.GRP_ID AS ID_GRUPO,
            A.RESPONSABLE AS RESPONSABLE,
            count(*) as TOTAL, 
            (SELECT COUNT(ESTADO)  FROM ARANDA.V_ARA_CASOS_2 B WHERE ESTADO NOT IN ('SOLUCIONADO','CERRADO')
            AND B.RESPONSABLE = A.RESPONSABLE
            AND TRUNC(FECHA_REGISTRO) BETWEEN TRUNC (SYSDATE,'MONTH')AND TRUNC(LAST_DAY (SYSDATE))
            ) AS PENDIENTE,
            (SELECT COUNT(ESTADO)  FROM ARANDA.V_ARA_CASOS_2 B WHERE ESTADO IN ('SOLUCIONADO','CERRADO')
            AND B.RESPONSABLE = A.RESPONSABLE
            AND TRUNC(FECHA_REGISTRO) BETWEEN TRUNC (SYSDATE,'MONTH')AND TRUNC(LAST_DAY (SYSDATE))
            ) AS CERRADOS,
            (
            SELECT ROUND(COUNT(*)*100/(SELECT COUNT(*) FROM ARANDA.V_ARA_CASOS_2 C WHERE TRUNC(FECHA_REGISTRO)BETWEEN TRUNC (SYSDATE,'MONTH')AND TRUNC(LAST_DAY (SYSDATE))
            AND GRP_ID IN (64,73) AND C.RESPONSABLE = B.RESPONSABLE),2) AS cump
           FROM ARANDA.V_ARA_CASOS_2 B
           WHERE GRP_ID IN (64,73) 
           AND ESTADO  IN ('SOLUCIONADO','CERRADO')
            AND TRUNC(FECHA_REGISTRO) BETWEEN TRUNC (SYSDATE,'MONTH')AND TRUNC(LAST_DAY (SYSDATE))
            AND B.RESPONSABLE = A.RESPONSABLE
             GROUP BY RESPONSABLE
            ) AS CUMPLIMIENTO 
             FROM ARANDA.V_ARA_CASOS_2 A  WHERE GRP_ID IN (64,73)
                    AND TRUNC(A.FECHA_REGISTRO)BETWEEN TRUNC (SYSDATE,'MONTH')AND TRUNC(LAST_DAY (SYSDATE))
                    GROUP BY GRP_ID,RESPONSABLE ORDER BY 3 DESC;
                    
                    
                    SELECT * FROM V_GESTION_MES;
                    
  /*****************ANALISIS DE CASOS****************/

         --CREATE OR REPLACE VIEW ARANDA.V_ANALISIS_GES
       -- AS
        SELECT * /*+PARALLEL(16)*/
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
        AND TRUNC(FECHA_REGISTRO)  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
        AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )
        GROUP BY RESPONSABLE
        HAVING COUNT(RESPONSABLE) = (SELECT MIN(COUNT(*))  FROM ARANDA.V_ARA_CASOS_2
        WHERE ESTADO  IN ('SOLUCIONADO','CERRADO')
        AND GRP_ID IN (64,73)
        AND TRUNC(FECHA_REGISTRO)  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
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
        AND TRUNC(FECHA_REGISTRO)  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
        AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )
        GROUP BY RESPONSABLE
        HAVING COUNT(RESPONSABLE) = (SELECT MIN(COUNT(*))  FROM ARANDA.V_ARA_CASOS_2
        WHERE ESTADO  IN ('SOLUCIONADO','CERRADO')
        AND GRP_ID IN (64,73)
        AND TRUNC(FECHA_REGISTRO)  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
        AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )
        GROUP BY RESPONSABLE))
        WHERE ROWNUM <= 1
        ) AS MINIMO,
        (
        SELECT MAX(COUNT(*)) - MIN(COUNT(*))
         FROM ARANDA.V_ARA_CASOS_2
        WHERE ESTADO  IN ('SOLUCIONADO','CERRADO')
        AND GRP_ID IN (64,73)
        AND TRUNC(FECHA_REGISTRO)  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
        AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )
        GROUP BY RESPONSABLE
        ) AS DIFERENCIA,
        (
        SELECT AVG(COUNT(*))
        FROM ARANDA.V_ARA_CASOS_2
        WHERE ESTADO  IN ('SOLUCIONADO','CERRADO')
        AND GRP_ID IN (64,73)
        AND TRUNC(FECHA_REGISTRO)  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
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
        )AS CUMPLIMIENTO      
        FROM ARANDA.V_ARA_CASOS_2 A
        WHERE ESTADO  IN ('SOLUCIONADO','CERRADO')
        AND GRP_ID IN (64,73)
        AND TRUNC(FECHA_REGISTRO)  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
        AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )
        GROUP BY RESPONSABLE
        HAVING COUNT(RESPONSABLE) = (SELECT MAX(COUNT(*))  FROM ARANDA.V_ARA_CASOS_2
        WHERE ESTADO  IN ('SOLUCIONADO','CERRADO')
        AND GRP_ID IN (64,73)
        AND TRUNC(FECHA_REGISTRO)  BETWEEN TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'00:00:00', 'DD-MON-YYYY HH24:MI:SS' ) 
        AND TO_DATE ( TO_CHAR(TRUNC(SYSDATE), 'DD')||'-'||TO_CHAR(TRUNC(SYSDATE), 'MON')||','||TO_CHAR(TRUNC(SYSDATE), 'YYYY')||'23:59:59', 'DD-MON-YYYY HH24:MI:SS' )
        GROUP BY RESPONSABLE)) WHERE ROWNUM <= 1;
        
        
        SELECT MAXIMO,INGE_MAX,MINIMO,INGE_MIN,DIFERENCIA,PROMEDIO,CUMPLIMIENTO FROM V_ANALISIS_GES;
                     
                                                        
                       