"use strict";

const btn = document.querySelector('.btn-js'),
      placeholder = document.querySelector('.placeholder-js');


btn.addEventListener('click', () => {
  placeholder.classList.add('placeholder-show');
});