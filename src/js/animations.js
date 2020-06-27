import createAnimation from './lib/animationView';
export default class Animations {

  animationsView_universal() {

    "load scroll".split(" ").forEach(event => {
      window.addEventListener(event, () => {
      });
    });
  }
  animationsView_not_home(){
    const title = document.querySelector('.site_banner--title')
    const TitleLineBig = document.querySelector('.smallban-line-big')
    const TitleLineSmall = document.querySelector('.smallban-line-small')

    "load scroll".split(" ").forEach(event => {
      window.addEventListener(event, () => {
        createAnimation(title, 'fadeIn')
        createAnimation(TitleLineBig, 'fadeInRight')
        createAnimation(TitleLineSmall, 'fadeInLeft')
      });
    });
  }

  animationsView_home() {
    const titleLineBig = document.querySelector('.room-line-big')
    const titleLineSmall = document.querySelector('.room-line-small')
    const galTitleLineBig = document.querySelector('.gallery-line-big')
    const galTitleLineSmall = document.querySelector('.gallery-line-small')
    const galleryPictureRight = document.querySelector('.homepage_gallery--right-picture')
    const galleryPictureLeft = document.querySelector('.homepage_gallery__left--picture')

    "load scroll".split(" ").forEach(event => {
      window.addEventListener(event, () => {
        createAnimation(titleLineBig, 'fadeInLeft')
        createAnimation(titleLineSmall, 'fadeInRight')
        createAnimation(galTitleLineBig, 'fadeInLeft')
        createAnimation(galTitleLineSmall, 'fadeInRight')
        createAnimation(galleryPictureRight, 'fadeInRight')
        createAnimation(galleryPictureLeft, 'fadeInLeft')
      });
    });
  }


  animationsView_rooms() {
    const roompost = document.querySelectorAll('.rooms_element')

    roompost.forEach(el => (
      "load scroll".split(" ").forEach(event => {
        window.addEventListener(event, () => {
          createAnimation(el, 'fadeIn')
        });
      })
    ))
  }

  animationsView_singleRoom() {
    const roomTitle = document.querySelector('.single_room__header--title')
    const roomPrice = document.querySelector('.single_room__header__info')

    "load scroll".split(" ").forEach(event => {
      window.addEventListener(event, () => {
        createAnimation(roomTitle, 'fadeInLeft')
        createAnimation(roomPrice, 'fadeInRight')
      });
    });
  }


  init(){
    this.animationsView_universal()
    
    if (document.querySelector('.page-template-template-homepage')) {
      this.animationsView_home()
    }
    if (!document.querySelector('.page-template-template-homepage')) {
      this.animationsView_not_home()
    }
    if (document.querySelector('.page-template-template_rooms')) {
      this.animationsView_rooms()
    }
  }

}

