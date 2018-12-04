import pdfMake from 'pdfmake/build/pdfmake';
import pdfFonts from 'pdfmake/build/vfs_fonts';
pdfMake.vfs = pdfFonts.pdfMake.vfs;
export default function table(dataTabel){
        var today = new Date(),
        dd = today.getDate(),
        mm = today.getMonth() +1,
         yy = today.getFullYear()
        var dd = {
            content: [
                {
                    text : dataTabel.title.toUpperCase(),
                    style : 'header',
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
                     columns: [
                        { width: '*', text: '' },
                        {
                            width: 'auto',
                            style:"tabelstok",
                            table: {
                                widths: dataTabel.width,
                                body : dataTabel.data
                            },
                            layout:{
                                fillColor :  (i, node) =>{
                                    return (i == 0) ? '#cccccc' : null;
                                }
                            }
                        },
                        { width: '*', text: '' },
                    ]
                },
                {
                    alignment:'justify',
                    columns:[
                        {
                            text : '\n Manager',
                            style : 'dateprint',
                        },
                        {
                            text : 'Jakarta . . . - . . . - . . . . .\n Admin',
                            style : 'dateprint',
                        }
                    ]
                },
                {
                    alignment:'justify',
                    columns:[
                        {
                            style : 'border_staff',
                            canvas: [{ type: 'line', x1: 80, y1: 5, x2: 170, y2: 5, lineWidth: 1 }]
                        },
                        {
                            style : 'border_staff',
                            canvas: [{ type: 'line', x1: 80, y1: 5, x2: 170, y2: 5, lineWidth: 1 }]
                        }
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
                tabelstok:{
                    margin: [0, 10, 0, 15]
                },
                dateprint:{
                    alignment: 'center',
                    fontSize:12
                },
                
                border_staff:{
                    margin:[0,40,0,0]
                }
            },
        }
        return pdfMake.createPdf(dd).open();
}

