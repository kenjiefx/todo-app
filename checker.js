let preambles = document.querySelectorAll('.preamblecontainer');
let tracker = [];
let explains = '';
for (var i = 0; i < preambles.length; i++) {
    let preamble = preambles[i];
    //let ticketId = preamble.querySelectorAll('.feeditemfirstentity')[0].innerText;
    let ticketExplanation = preamble.innerText;
    let tmp = ticketExplanation.split('—');
    let ticketId = tmp[0].trim();
    let explaination = tmp[1].trim();
    if (explaination.includes('posted a comment')) {
        //console.log(explaination);
        explains = explains + ticketExplanation + ',';
    }
    if (explaination.includes('sent an email')) {
        if (explaination.includes('Rom Terrado')) {
            //console.log(explaination);
            explains = explains + ticketExplanation + ',';
        }
    }
}

console.log(explains);
