function genera_tabla() {
    var myTableDiv = document.getElementById("metric_results")
    var table = document.createElement('TABLE')
    var tableBody = document.createElement('TBODY')
    
    table.border = '1'
    table.appendChild(tableBody);
    
    var heading = new Array();
    heading[0] = "Especialista"
    heading[1] = "1"
    heading[2] = "2"
    heading[3] = "3"
    heading[4] = "4"
    heading[5] = "5"
    heading[6] = "6"
    heading[7] = "7"
    heading[8] = "8"
    heading[9] = "9"
    heading[10] = "10"

    var heading2 = new Array();
    heading2[0] = " "
    heading2[1] = "L"
    heading2[2] = "M"
    heading2[3] = "M"
    heading2[4] = "J"
    heading2[5] = "V"
    heading2[6] = "S"
    heading2[7] = "D"
    
    
    var stock = new Array()
    stock[0] = new Array("Juan","M","M")
    
    
    //ENCABEZADO DE FILAS DE DIAS DEL MES
    var tr = document.createElement('TR');
    tableBody.appendChild(tr);
    var dia=1;
    var esp="Especialista"
    for (i = 0; i < 10; i++) {
        var th = document.createElement('TH')
        th.width = '75';
        th.appendChild(document.createTextNode(heading[i]));
        tr.appendChild(th);    
        dia++;
    }
    //ENCABEZADO DE FILAS DE LUNES A VIERNES DEL MES
    var tr = document.createElement('TR');
    tableBody.appendChild(tr);
    var dia=1;
    var esp="Especialista"
    for (i = 0; i < 10; i++) {
        var th = document.createElement('TH')
        th.width = '75';
        th.appendChild(document.createTextNode(heading2[i]));
        if(i=7) {
            i=0;
        }  
        tr.appendChild(th);     
    }
    
    //FILAS DE LA TABLA
    for (i = 0; i < 10; i++) {
        var tr = document.createElement('TR');
        for (j = 0; j < 10; j++) {
            var td = document.createElement('TD')
            td.appendChild(document.createTextNode("D"));
            tr.appendChild(td)
        }
        tableBody.appendChild(tr);
    }  
    myTableDiv.appendChild(table)
    }