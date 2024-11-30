"use strict";

import { userCard } from './views';

const users = document.querySelector('.user-js'),
      toAdminBtn = document.querySelectorAll('.admin-close-btn-js');


if (users) {
  let url = window.location.origin + '/admin/user-json?page=1';
  let prevUrl = null;
  let prevMem = null;
  let currentPage = '';
  let scrollHeight = 0;
  

  if ( localStorage.getItem('currentPage') ) {
    url = localStorage.getItem('currentPage');
    window.localStorage.removeItem('currentPage');
  }

  if ( localStorage.getItem('prevUrl') !== 'null' ) {
    prevUrl = localStorage.getItem('prevUrl');
    window.localStorage.removeItem('prevUrl');
  }

  const start = document.createElement('div');
  start.style.height = '1px';
  users.before(start);

  const end = document.createElement('div');
  end.style.height = '1px';
  //end.style = 'height: 100px, border: 1px solid red';
  users.after(end);

  const options = {
    root: null,
    rootMargin: '400px 0px 100px 0px',
    threshold: 1.0,
  };
  const next = function (entries, observer) {
    entries.forEach(item => {
      if (item.isIntersecting && url)  {
        nextPages(url, 'next').then( res => {
          url = res.next;
          prevMem = res.prev;
          currentPage = res.current;
          console.log('next--' + res.next);


          const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
          console.log(scrollTop);
          
          scrollHeight += res.height;
          console.log('next-height__' + (scrollHeight - scrollTop));

          //scrollHeight = users.scrollHeight;
        });
      }
    });
  
  };

  const prev = function (entries, observer) {
    entries.forEach(item => {
      if (item.isIntersecting && prevUrl)  {
        nextPages(prevUrl, 'prev').then( res => {
          prevUrl = res.prev;
          const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
          window.scrollTo(0, res.height + scrollTop);

          if ( localStorage.getItem('comeBack') ) {
            //window.scrollTo(0, 1000);
            window.localStorage.removeItem('comeBack');
            //window.scrollTo(0, scrollHeight + 275);
          } else {
            
           // window.scrollTo(0, scrollHeight + 275);
          }

          console.log('prev--' + res.prev);
          //console.log('prev-height-' + res.height);
        });
      }
    });
  
  };
  const observerPre = new IntersectionObserver(prev, options);
  const observerNext = new IntersectionObserver(next, options);

  observerPre.observe(start);
  observerNext.observe(end);

  users.addEventListener('click', event => {
    const target = event.target;
    if (target.className === 'home__link link-js') {
      const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      //localStorage.setItem('scrollTop', scrollHeight - scrollTop);
      localStorage.setItem('comeBack', true);
      localStorage.setItem('prevUrl', prevMem);
      localStorage.setItem('currentPage', currentPage);
    } 
  });
}

if (toAdminBtn) {
  const url = window.location.origin + '/admin/logout';

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
}

async function nextPages(url, direction = 'next') {
  let dir = 'beforeend';
  
  const res = await fetch(url);
  const json = await res.json();   
  const data = json.data;

  

  if (direction === 'prev') {
    dir = 'afterbegin';
    data.reverse();
  }

  const page = document.createElement('div');
  
  //console.log(json);
      
  data.forEach(user => {
    let description = user.description || 'Описание отсутствует';
    page.dataset.page = json.current_page;
    
    page.insertAdjacentHTML(dir, userCard({description, user, json}));
  });

  if (dir === 'beforeend') {
    users.append(page);
  } else {
    users.prepend(page);
  }
  
  const scrollTop = localStorage.getItem('scrollTop');
  const currentPage = json.path + '?page=' + json.current_page;

  if (scrollTop) {
    window.scrollTo(0, scrollTop);
    window.localStorage.removeItem('scrollTop');
  }

  return {
    prev: json.prev_page_url, 
    current: currentPage,
    next: json.next_page_url,
    height: page.clientHeight
  }
}
