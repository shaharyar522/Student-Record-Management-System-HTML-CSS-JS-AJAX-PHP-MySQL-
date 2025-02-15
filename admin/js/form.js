//uay wo js hain harmay pass jab koe perosn aa kar enter karay ga data to us ko - dass kudh ba kudh show hn jian ja 


//for name


// for father name 



//for phone number 

function formatPhoneNumber(input) {
    let value = input.value.replace(/\D/g, ''); // Remove non-digit characters
    if (value.length > 2) {
        value = '92-' + value.substring(2);
    }
    if (value.length > 6) {
        value = value.substring(0, 6) + '-' + value.substring(6);
    }
    input.value = value;
}



// for email




// for CNIC
function formatCNIC(input) {
    let value = input.value.replace(/\D/g, ''); // Remove non-digit characters
    if (value.length > 5) {
        value = value.substring(0, 5) + '-' + value.substring(5);
    }
    if (value.length > 13) {
        value = value.substring(0, 13) + '-' + value.substring(13);
    }
    input.value = value;
}