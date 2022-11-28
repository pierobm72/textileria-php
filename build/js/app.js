
  const swiper = new Swiper('.swiper', {
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
  });


const primaryNav = document.querySelector('.primary-navigation');
const navToggle = document.querySelector('.mobile-nav-toggle');

navToggle.addEventListener('click', (e) =>{
    const visibility = primaryNav.getAttribute('data-visible');
    console.log(visibility);

    if(visibility === 'false'){
        primaryNav.setAttribute('data-visible',true);
        navToggle.setAttribute('aria-expanded',true);
    } else {
        primaryNav.setAttribute('data-visible',false);
        navToggle.setAttribute('aria-expanded',false);
    }
});


let header = document.querySelector('.primary-header');
let wrap = document.querySelector('.primary-header .wrap');
window.addEventListener('scroll', () => {
  let scroll = window.scrollY;
  if (scroll > 10) {
    header.style.background = "#121212"
    wrap.style.height = "80px"

  } else {
    header.style.background = "121212"    
  }
})

const $enviar = document.querySelector('#enviar');

const $nombre = document.querySelector('#nombre');
const $email = document.querySelector('#email');
const $mensaje = document.querySelector('#mensaje');

const er = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

$nombre.addEventListener('input', validarFormulario)
$email.addEventListener('input', validarFormulario)
$mensaje.addEventListener('input', validarFormulario)

function validarFormulario(e){
  const campoVacio = e.target.value.length === 0;

  if(!campoVacio) {    
      e.target.classList.remove('border-red-500')
      e.target.classList.add('border-green-500')     
      
  } else {      
      e.target.classList.remove('border-green-500')
      e.target.classList.add('border-red-500')
      
  }


  if(e.target.type === 'email'){
       

      if(er.test(e.target.value)){         

          e.target.classList.replace('border','border-2')
          e.target.classList.remove('border-red-500')
          e.target.classList.add('border-green-500')


      } else {
          e.target.classList.replace('border','border-2')
          e.target.classList.remove('border-green-500')
          e.target.classList.add('border-red-500')
      }

  }
  const camposValidos = er.test($email.value) && $nombre.value !== "" && $mensaje.value !== "";
    $email.addEventListener('click', (e) =>{
      console.log(e.target.value)
    });

    $mensaje.addEventListener('blur', (e) =>{
      console.log(e.target.value)
    });

    if(camposValidos){
        $enviar.disabled = false;
    } else {
        $enviar.disabled = true;
    
        
    }
}