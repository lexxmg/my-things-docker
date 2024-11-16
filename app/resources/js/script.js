"use strict";

const btn = document.querySelectorAll('.btn');
const setBtn = document.querySelectorAll('.setting__link');


if (btn) {
  btn.forEach(el => {
    if (el.tagName === 'A' && el.attributes.disabled) {  
      el.setAttribute('aria-disabled', 'true');
      el.classList.add('disabled');
      
      el.addEventListener('click', event => {
        event.preventDefault();
      });
    } 
    
    if (el.tagName === 'BUTTON' && el.attributes.disabled) {
      el.classList.add('disabled');
    }
  });
}

if (setBtn) {
  const media = window.matchMedia('(min-width: 665px)');

  if (media.matches) {
    removeBtnClass();
  }

  media.addListener(() => {
    move(665) ? removeBtnClass() : addBtnClass();
  });
}


function move(maxWidth){
	const viewport_width = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
  
  return viewport_width >= maxWidth || false;
}

function addBtnClass() {
  setBtn.forEach(el => {
    el.classList.add('btn', 'setting--btn');
  });
}

function removeBtnClass() {
  setBtn.forEach(el => {
    el.classList.remove('btn', 'setting--btn');
  });
}