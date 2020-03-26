function genera_tabla() {
    var myTableDiv = document.getElementById("metric_results")
    var table = document.createElement('TABLE')
    var tableBody = document.createElement('TBODY')

    table.border = '1'
    table.appendChild(tableBody);

    var heading = new Array();
    heading[0] = "Especialista"

    var heading2 = new Array();
    heading2[0] = " "
    heading2[1] = "L"
    heading2[2] = "M"
    heading2[3] = "M"
    heading2[4] = "J"
    heading2[5] = "V"
    heading2[6] = "S"
    heading2[7] = "D"


    var ingeniero = new Array()
    ingeniero[0] = "JUAN MANUEL"
    ingeniero[1] = "BRAYAN BARON"
    ingeniero[2] = "WILSON CASTRO"
    ingeniero[3] = "MAICOL BALLESTEROS"
    ingeniero[4] = "DANIEL MENDEZ"
    ingeniero[5] = "CARLOS PALACIOS"


    //ENCABEZADO DE FILAS DE DIAS DEL MES
    var tr = document.createElement('TR');
    tableBody.appendChild(tr);
    var dia = 1;
    var esp = "Especialista"
    for (i = 0; i < 32; i++) {
        var th = document.createElement('TH')
       th.width = '75';
      // th.rowspan='2';
        if (i == 0) {
            th.rowspan='2';
            th.appendChild(document.createTextNode(heading[0]));
            
        } else {
            th.appendChild(document.createTextNode(i));
        }
        tr.appendChild(th);
    }
    //ENCABEZADO DE FILAS DE LUNES A VIERNES DEL MES
    var tr = document.createElement('TR');
    tableBody.appendChild(tr);
    var dia = 1;
    var esp = "Especialista"
    k = 1;
    for (i = 0; i < 32; i++) {
        var th = document.createElement('TH')
        th.width = '75';
        if (i >= 8) {
            th.appendChild(document.createTextNode(heading2[k]));
            k++;
            if (k == 8) {
                k = 1;
            }
        } else {

            th.appendChild(document.createTextNode(heading2[i]));
        }
        tr.appendChild(th);
    }

    //FILAS DE LA TABLA
    var tr;
    var td;
    var select;
    //var opt0;
    var opt1;
    var opt2;
    var opt3;
    var opt4;
    var opt5;
    var opt6;
    for (i = 0; i < ingeniero.length; i++) {
        tr = document.createElement('TR');
        m = 0;
        for (j = 0; j < 32; j++) {
            td = document.createElement('TD')
            if (j == 0) {
                td.appendChild(document.createTextNode(ingeniero[i]));
                m++;
            } else {

                // var capa = document.getElementById("capa");
                // capa.innerHTML = "MM";
                // td.appendChild(location=document.lista.options[document.lista.selectedIndex].value);
                //td.appendChild(document.createTextNode("<select><option value='A'>A</option></select>"));
               

                opt1 = document.createElement('OPTION');
                opt1.value = 'T';
                opt1.text = 'T';

                opt2 = document.createElement('OPTION');
                opt2.value = 'M';
                opt2.text = 'M';
                
                opt3 = document.createElement('OPTION');
                opt3.value = 'N';
                opt3.text = 'N';

                opt4 = document.createElement('OPTION');
                opt4.value = 'JL';
                opt4.text = 'JL';

                opt5 = document.createElement('OPTION');
                opt5.value = 'JL2';
                opt5.text = 'JL2';

                opt6 = document.createElement('OPTION');
                opt6.value = 'D';
                opt6.text = 'D';


                select = document.createElement('SELECT');
                select.id = i + "_" + '01' + "_" + j;
             
                select.appendChild(opt1);
                select.appendChild(opt2);
                select.appendChild(opt3);
                select.appendChild(opt4);
                select.appendChild(opt5);
                select.appendChild(opt6);
                td.appendChild(select);
            }
            tr.appendChild(td)
        }
        tableBody.appendChild(tr);
    }
    myTableDiv.appendChild(table)
    document.getElementById("generador_tab").disabled = true;
}