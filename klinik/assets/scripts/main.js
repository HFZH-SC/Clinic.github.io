const dropdownButton = Array.from(document.getElementsByClassName("dropdown-button"));
const dropdown = Array.from(document.getElementsByClassName("dropdown"));
dropdownButton.forEach((e, index) =>{
    e.onclick = () =>{
        dropdown[index].classList.toggle("open");
        // dropdown.forEach(ie =>{
        //     if (ie.classList.contains("open")) {
        //         ie.classList.remove("open");   
        //     }
        // })
    }
});
