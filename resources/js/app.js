import './bootstrap';

import 'flowbite';

import Datepicker from 'flowbite-datepicker/Datepicker';

var currentUrl = window.location.href;
var urlParts = currentUrl.split('/');
var url3 = urlParts[3];

if (url3 == 'add-book') {
    const datepickerEl = document.getElementById('date_of_issue');
    new Datepicker(datepickerEl, {
        format: "dd-mm-yyyy",
    });
}


// const characters ='0123456789';

// function generateString(length) {
//     let result = '';
//     const charactersLength = characters.length;
//     for ( let i = 0; i < length; i++ ) {
//         result += characters.charAt(Math.floor(Math.random() * charactersLength));
//     }

//     return result;
// }

// if (url3 == 'borrow') {
//     let scanID = generateString(9);
//     const channel = Echo.private(`private.borrow.${scanID}`);

//     channel.subscribed(()=>{
//         console.log('subscribed!');
//     }).listen('.scan', (event) => {
//         console.log(event);
//         if (event['scanned']) {
//             window.location.href = '/';
//         }
//     });


//     window.addEventListener('load', function () {
        
        
//         var qrcode = new QRCode("qrcode", {
//             text: link + `&scanID=11`,
//             alt: "image alt text",
//             width: 256,
//             height: 256,
//             colorDark : "#000000",
//             colorLight : "#ffffff",
//             correctLevel : QRCode.CorrectLevel.H
//         });
            
//         var qrCodeElement = document.getElementById("qrcode");
//         qrCodeElement.title = "Scan Me!";

//     });
// }
