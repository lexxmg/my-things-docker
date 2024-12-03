"use strict";

import { userCard } from './views';

const users = document.querySelector('.user-js'),
      toAdminBtn = document.querySelectorAll('.admin-close-btn-js');


if (users) {
  let url = '/admin/user-json?page=1';
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
  users.after(end);

  const options = {
    root: null,
    rootMargin: '400px 0px 100px 0px',
    threshold: 1.0,
  };
  const next = function (entries, observer) {
    entries.forEach(async (item) => {
      if (item.isIntersecting && url)  {
        const res = await nextPages(url, 'next')
        url = res.next;
        prevMem = res.prev;
        currentPage = res.current;
        console.log('next--' + res.next);


        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        console.log(scrollTop);
        
        scrollHeight += res.height;
        console.log('next-height__' + (scrollHeight - scrollTop));

        if ( localStorage.getItem('cardId') ) {
          const id = localStorage.getItem('cardId');
          let el = document.querySelector(`[data-id = "${id}"]`);

          if (!el) {
            const res = await nextPages(url, 'next');
            prevUrl = res.prev;
            el = document.querySelector(`[data-id = "${id}"]`);
            window.localStorage.removeItem('cardId');
            console.log('еще раз');
            console.log(el);
          }
          console.log(el);
          el.scrollIntoView(false);
          el.scrollBy(0, 100);
          window.localStorage.removeItem('cardId');
        }
      }
    });
  };

  const prev = function (entries, observer) {
    entries.forEach(async (item) => {
      if (item.isIntersecting && prevUrl)  {
        const res = await nextPages(prevUrl, 'prev');
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
      }
    });
  }

  const observerPre = new IntersectionObserver(prev, options);
  const observerNext = new IntersectionObserver(next, options);

  observerPre.observe(start);
  observerNext.observe(end);

  users.addEventListener('click', event => {
    const target = event.target;
    
    if (target.classList.contains('link-js')) {
      const id = target.closest('.user-card').dataset.id
      const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

      //localStorage.setItem('scrollTop', scrollHeight - scrollTop);
      localStorage.setItem('cardId', id);
      localStorage.setItem('comeBack', true);
      localStorage.setItem('prevUrl', prevMem);
      localStorage.setItem('currentPage', currentPage);
    } 
  });
}

if (toAdminBtn) {
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
