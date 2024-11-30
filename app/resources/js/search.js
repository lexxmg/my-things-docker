"use strict";

import { userCard } from './views';

const search = document.querySelector('.search-js');
const url = window.location.origin + '/admin/search-user-json';

if (search) {
  console.log(url);
  
  //const formData = new FormData(form);
  //console.log(formData)
  
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

  const json = await res.json();   
  const data = json;

  console.log(data);

  data.forEach(user => {
    
    let description = user.description || 'Описание отсутствует';
    
    search.insertAdjacentHTML('beforeend', userCard({description, user}));
  });
}
