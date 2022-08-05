document.addEventListener("DOMContentLoaded", function () {
    

    // header fixo no scroll
    var header = document.getElementById("header");
    if (header) {
        window.addEventListener("scroll", function () {
            
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                header.classList.add("header-scroll");
            }
            else {
                header.classList.remove("header-scroll");
            }
        });
    }    



    // dropdown menu perfil 
    var dropdownBtn = document.getElementById("dropdownBtn");
    var dropdownContent = document.getElementById("dropdownContent");

    if (dropdownBtn) {
        dropdownBtn.addEventListener("click", function () {
            if (dropdownContent.style.display == "none") {
                dropdownContent.style.display = "block";
            }
            else {
                dropdownContent.style.display = "none";
            }
        });
    }
    


    // modal newsletter
    var newsletterBtn = document.getElementById("newsletterBtn");
    var newsletterModal = document.getElementById("newsletterModal");
    var newsletterClose = document.getElementById("newsletterClose");

    if (newsletterBtn) {
        newsletterBtn.addEventListener("click", function () {
            newsletterModal.style.display = "block";
        });
    }

    if (newsletterClose) {
        newsletterClose.addEventListener("click", function () {
            newsletterModal.style.display = "none";
        });
    }
   
 

    // mensagem de cookies
    var cookiesClose = document.getElementById("cookiesClose");
    var cookiesMensage = document.getElementById("cookiesMensage");  

    if (cookiesClose) {
        cookiesClose.addEventListener("click", function () {
            cookiesMensage.style.display = "none";
        });
    }  



    // upload imagem registar talento, registar empresa, editar talento e editar empresa
    var uploadFile = document.querySelector("input[type=file]");
    var fileName = document.getElementById("fileName");

    if (uploadFile) {
        uploadFile.addEventListener("change", function () {
            if (uploadFile.files.length > 0) {
                fileName.textContent = uploadFile.files[0].name;
            }
        });
    }



    // selecionar categoria página talentos
    var categorySelect = document.getElementById("categorySelect");
    var categoryProfile = document.querySelectorAll("[data-category]");
    
    if(categorySelect) {
        categorySelect.addEventListener("change", function () {

            console.log("funciona");
            
            for (var i = 0; i < categoryProfile.length; i++) {

                if (categorySelect.value == categoryProfile[i].getAttribute("data-category") || categorySelect.value==0) {
                    categoryProfile[i].classList.remove("hide");
                }
                else {
                    categoryProfile[i].classList.add("hide");
                }
            }

        });
    }

     
});