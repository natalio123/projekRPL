// SHOW MENU
const showMenu = (toggleId, navbarId,bodyId) =>{
    const toggle = document.getElementById(toggleId),
    navbar = document.getElementById(navbarId),
    bodypadding = document.getElementById(bodyId)

    if(toggle && navbar){
        toggle.addEventListener('click', ()=>{
            // APARECER MENU
            navbar.classList.toggle('show')
            // ROTATE TOGGLE
            toggle.classList.toggle('rotate')
            // PADDING BODY
            bodypadding.classList.toggle('expander')
        })
    }
}
showMenu('nav-toggle','navbar','body')
// tombol buttom
function logout() {
    window.location.href = "/loginPage/index.html";
  }
// LINK ACTIVE COLOR
const linkColor = document.querySelectorAll('.nav__link');   
function colorLink(){
    linkColor.forEach(l => l.classList.remove('active'));
    this.classList.add('active');

    const navbar = document.getElementById('navbar');
    const bodypadding = document.getElementById('body');

    navbar.classList.remove('show');
    document.getElementById('nav-toggle').classList.remove('rotate');
    bodypadding.classList.remove('expander');

     // Dapatkan ID bagian berdasarkan item menu yang diklik
     const sectionId = this.getAttribute('data-section-id');
     // Sembunyikan semua bagian
     document.querySelectorAll('.home').forEach(section => {
         section.style.display = 'none';
     });
     // Tampilkan bagian yang dipilih
     document.getElementById(sectionId).style.display = 'block';
}

linkColor.forEach(l => l.addEventListener('click', colorLink));

const body = document.querySelector("body"),
      sidebar = body.querySelector(".sidebar"),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwtich = body.querySelector(".toggle-switch"),
     modeText = body.querySelector(".mode-text");

      toggle.addEventListener("click", () =>{
       sidebar.classList.toggle("close");
     });
      
     searchBtn.addEventListener("click", () =>{
       sidebar.classList.remove("close");
     });

    modeSwtich.addEventListener("click", () =>{
       body.classList.toggle("dark");

       if (body.classList.contains("dark")) {
           modeText.innerText = "Light Mode"
     } else {
           modeText.innerText = "Dark Mode"
       }
    });
