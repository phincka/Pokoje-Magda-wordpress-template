import Animations from  './animations';

class App {
  menu() {
    let menu = document.querySelector('.menuButton')
    let nav = document.querySelector('.header__nav')

    menu.addEventListener('click', () => {
      menu.classList.toggle("menuButton--active")
      nav.classList.toggle("header__nav--active")
    })
  }

  cookies(){
    const cookiesmess = () => {
      if (!localStorage.cookies_accepted) {
        document.querySelector('#cookies-message').style.display = "flex";
      }
    }
    cookiesmess();
    
    document.querySelector('#accept-cookies-checkbox').addEventListener('click', () => {
      localStorage.cookies_accepted = true;
      document.querySelector('#cookies-message-container').style.display = "none";
    })
  }


  init() {
    this.menu()
    this.cookies()
  }
}

const app = new App()
app.init()

const animations = new Animations()
animations.init()

