import pdfMake from 'pdfmake/build/pdfmake';
import pdfFonts from 'pdfmake/build/vfs_fonts';
pdfMake.vfs = pdfFonts.pdfMake.vfs;
export default function receipt(dataReceipt){
    var today = new Date(),
    dd = today.getDate(),
    mm = today.getMonth() +1,
     yy = today.getFullYear()
    var content = {
        content:[
            {
                text : dataReceipt.title.toUpperCase(),
                style : 'header'
            },
            {
                text : 'PT. BINA KARYA',
                style : 'subheader',
                alignment: 'center'
            },
            {
                text : 'Print date: '+dd+'/'+mm+'/'+yy,
                style : 'pdate',
                italics:true
            },
            {
                canvas: [{ type: 'line', x1: 0, y1: 5, x2: 595-2*40, y2: 5, lineWidth: 3 }]
            },
            {
                style: 'tableInfo',
                table: {
                    body: [
                        [{text : 'Transaction Date ', style:'headInfo' },{text : ':'}, {text : dataReceipt.transaction_date, style:'headbody'}],
                        [{text : 'Faktur Number ', style:'headInfo' }, {text : ':'},  {text : dataReceipt.faktur, style:'headbody'}],
                        [{text : 'Supplier:', style:'headInfo' }, {text : ':'},  {text : dataReceipt.supplier, style:'headbody'}],
                    ]
                },
                layout: 'noBorders'
            },
            {
                columns: [
                    {width:'*', text:''},
                    {
                        width:'auto',
                        style:'tablereceipt',
                        table:{
                            widths : dataReceipt.width,
                            body: dataReceipt.data
                        },
                        layout:{
                            fillColor:(i,node) =>{
                                return (i ==0) ?  '#cccccc' : null
                            }
                        }
                    },
                    {width:'*', text:''},
                ]
            },
            {
               text : 'Remark :',
               style : 'tremark'
            },
            {
                text:dataReceipt.remark,
                style:'contentremark'
            },
            {
                alignment:'justify',
                columns:[
                    {
                        text : 'Jakarta . . . - . . . - . . . . .\n Admin           ',
                        style : 'dateprint',
                    }
                ]
            },
            {
                alignment:'justify',
                columns:[
                    {
                        style : 'border_staff',
                        alignment:'right',
                        margin: [60, 50, 0, 0],
                        canvas: [{ type: 'line', x1: 80, y1: 5, x2: 170, y2: 5, lineWidth: 1 }]
                    },
                ]
            },

        ],
        styles:{
            fontFamily : 'times new roman',
            header:{
                fontSize:20,
                bold:true,
                alignment: 'center'
            },
            subheader:{
                fontSize:16,
                bold:true,
                alignment: 'center'
            },
            pdate:{
                fontSize:8,
                alignment:'center',
                color:'#333',
                margin:[0,0,0,7]
            },
            tableInfo:{
                margin:[17, 10, 0, 10]
            },
            headInfo : {
                fontSize:9,
                bold:true,
            },
            headbody:{
                italics:true,
                fontSize:9
            },
            filledHeader: {
                bold: true,
                fontSize: 14,
                color: 'white',
                fillColor: '#878787',
                alignment: 'center',
            },
            tremark:{
                margin:[18, 10, 0, 0],
                bold:true,
                fontSize:10
            },
            contentremark:{
                margin:[18, 0, 0, 0],
                italics:true,
                fontSize:7
            },
            dateprint:{
                alignment: 'center',
                margin: [300, 20, 0, 0],
                fontSize:12
            },
            
            border_staff:{
                margin:[0,40,0,0]
            }
        }
    }
    return pdfMake.createPdf(content).open();
}