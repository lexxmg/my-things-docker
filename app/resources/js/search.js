"use strict";

import { userCard } from './views';

const search = document.querySelector('.search-js');
const url = '/admin/search-user-json';

if (search) {
  const form = document.querySelector('.form-js');
  const csrf = form.elements._token.value;
  const search = form.elements.search;

  let searchText = '';
  let flag = true;
  search.addEventListener('input', async event => {
    const input = event.target;
    searchText = input.value;

    if (flag && searchText.length) {
      flag = false;
      await sleep(500);
      flag = true;
      
      getUsers(url, csrf, searchText);
    }  
  });
}
  

async function getUsers(url, csrf, find = '') {
  const formData = new FormData();
  formData.append('_token', csrf);
	formData.append('search', find);

  const res = await fetch(url, {
		method: 'POST',
		body: formData
	})

  const data = await res.json();
  search.innerHTML = '';

  data.forEach(user => {
    const description = user.description || 'Описание отсутствует';
    
    search.insertAdjacentHTML('beforeend', userCard({description, user}));
  });
}

async function sleep(time) {
  return new Promise(function(resolve, reject) {
    setTimeout(resolve, time);
  });
}
