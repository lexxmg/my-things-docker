"use strict";

const btn = document.querySelectorAll('.btn'),
      removeBtn = document.querySelectorAll('.remove-btn-js'),
      toAdminBtn = document.querySelector('.admin-btn-js');


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

if (removeBtn) {
  const media = window.matchMedia('(min-width: 665px)');

  if (media.matches) {
    removeBtnClass();
  }

  media.addEventListener('change', () => {
    move(665) ? removeBtnClass() : addBtnClass();
  });
}

if (toAdminBtn) {
  const url = window.location.origin + '/admin/user';

  toAdminBtn.addEventListener('click', event => {
    event.preventDefault();

    openWindow(url);
  });
}



function move(maxWidth){
	const viewport_width = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
  
  return viewport_width >= maxWidth || false;
}

function addBtnClass() {
  removeBtn.forEach(el => {
    el.classList.add('btn', 'setting--btn');
  });
}

function removeBtnClass() {
  removeBtn.forEach(el => {
    el.classList.remove('btn', 'setting--btn');
  });
}

function openWindow(url) {
  window.open(url);
}