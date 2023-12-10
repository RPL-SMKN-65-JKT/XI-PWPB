import './bootstrap';

const characters ='0123456789';

function generateString(length) {
    let result = '';
    const charactersLength = characters.length;
    for ( let i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }

    return result;
}

let scanID = generateString(9);

console.log(scanID);

const channel = Echo.private(`private.borrow.${scanID}`);

channel.subscribed(()=>{
    console.log('subscribed!');
}).listen('.scan', (event) => {
    console.log(event);
    if (event['scanned']) {
        if (event['type'] == "borrow") {
            sessionStorage.setItem('info', 'Terimakasih telah meminjam buku di Perpus 65, harap kembalikan buku pada ' + event['deadline']);
        } else if( event['type'] == "return" ) {
            sessionStorage.setItem('info', 'Terimakasih telah mengembalikan buku');
        }
        window.location.href = '/';
    }
});

const channel2 = Echo.private(`private.fine.${scanID}`);

channel2.subscribed(()=>{
    console.log('subscribed!');
}).listen('.fine', (event) => {
    console.log(event);
    window.location.href = `/fine?telat=${event['telat']}&denda=${event['denda']}`;
});


window.addEventListener('load', function () {
    
    
    var qrcode = new QRCode("qrcode", {
        text: link + `&scanID=${scanID}`,
        alt: "image alt text",
        width: 256,
        height: 256,
        colorDark : "#000000",
        colorLight : "#ffffff",
        correctLevel : QRCode.CorrectLevel.H
    });
        
    var qrCodeElement = document.getElementById("qrcode");
    qrCodeElement.title = "Scan Me!";

});