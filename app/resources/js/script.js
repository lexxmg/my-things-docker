"use strict";

const btn = document.querySelectorAll('.btn');


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