
const elementIsInView = el => {
  const scroll = window.scrollY || window.pageYOffset;
  const boundsTop = el.getBoundingClientRect().top + scroll;

  const viewport = {
    top: scroll,
    bottom: scroll + window.innerHeight,
  }

  const bounds = {
    top: boundsTop,
    bottom: boundsTop + el.clientHeight,
  }
  return (bounds.bottom >= viewport.top && bounds.bottom <= viewport.bottom)
    || (bounds.top <= viewport.bottom && bounds.top >= viewport.top);
}

const raf =
  window.requestAnimationFrame ||
  window.webkitRequestAnimationFrame ||
  window.mozRequestAnimationFrame ||
  function (callback) {
    window.setTimeout(callback, 1000 / 60)
  }

const createAnimation = (element, anim) => raf(() => {

  if (elementIsInView(element) === true) {
    element.classList.add('animated', anim)
  } else {
    element.classList.remove('animated', anim)
  }




})

export default createAnimation