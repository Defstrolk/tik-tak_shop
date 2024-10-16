var modal = document.getElementById('myModal');


var btn = document.getElementById("myBtn");


var span = document.getElementsByClassName("close__comment")[0];


btn.onclick = function() {
    modal.style.display = "block";
}


span.onclick = function() {
    modal.style.display = "none";
}


window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

//отправка формы

// let formData = [];

// document.getElementById("myForm").addEventListener("submit", function(event){
//     event.preventDefault();
//     let firstName = document.getElementById("firstName").value;
//     let email = document.getElementById("email").value;
//     let comment = document.getElementById("user__text").value;

//     let data = {
//             firstName: firstName,
//             email: email,
//             comment: comment
//         };
//         formData.push(data);
//         let jsonData = JSON.stringify(formData);
//         let blob = new Blob([jsonData], {type:"text/plain"});
//         let url = window.URL.createObjectURL(blob);
//         let link = document.createElement("a");
//         link.href = url;
//         link.download = "formFata.txt";
//         link.click();
        
//         window.URL.revokeObjectURL(url);


//     });