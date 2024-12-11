"use strict";

const toAdminBtn = document.querySelectorAll('.admin-close-btn-js');

const url = '/admin/logout';

toAdminBtn.forEach(btn => {
  btn.addEventListener('click', event => {
    event.preventDefault();
    
    fetch(url).then(res => {
      if (res.ok) {
        window.close();
      }
    });
  });
});

