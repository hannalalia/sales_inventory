function printData()
{
    // let toPrint= document.getElementById("printTable");
    let toPrint =document.createElement("div");
    let tableToPrint = $("#printTable").clone().appendTo(toPrint);
    let title =  document.getElementById("title");
    $(toPrint).find(".notPrintable").remove();

    newWin= window.open("",'_blank');
    newWin.document.open();

    newWin.document.write(
    `<html><style type='text/css' media="print">
    table{
    	margin:auto;
    }
    table,tr,td,th{
    text-align: center;
    border: 1px solid black !important;
    border-collapse: collapse !important;
    padding: 5px;
    }
    </style>`
    );
    newWin.document.write(`<body><h2 style='text-align: center;'> ${title.innerText}<h2/>`);
    newWin.document.write(toPrint.outerHTML);
    newWin.document.write("</body></html>");
    newWin.focus(); 
    newWin.print();
    newWin.close(); 

}

$('#printBtn').on('click',function(){
return printData();
})