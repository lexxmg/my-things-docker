"use strict";

import { userCard } from './views';

const search = document.querySelector('.search-js');
const url = window.location.origin + '/admin/search-user-json';

if (search) {
  getUsers(url, 'тест').then( res => {
    
  });
}
  

async function getUsers(url, find = '') {
  const csrf = document.querySelector('.csrf-js').textContent;

  const formData = new FormData();
  formData.append('_token', csrf);
	formData.append('search', find);

  const res = await fetch(url, {
		method: 'POST',
		body: formData
	})

  const data = await res.json();   

  console.log(data);

  data.forEach(user => {
    const description = user.description || 'Описание отсутствует';
    
    search.insertAdjacentHTML('beforeend', userCard({description, user}));
  });
}
