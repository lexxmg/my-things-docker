"use strict";

const btn = document.querySelector('.btn-js'),
      placeholder = document.querySelector('.placeholder-show-js'),
      form = document.querySelector('.form__form-js');


const previev = new Croppie(document.querySelector('#previev'), {
  enableExif: true,
  enableOrientation: true,
  viewport: {
    width: 200,
    height: 200,
    type: 'circle',
  },
  boundary: {
    width: 300,
    height: 300
  }
});

previev.bind({ url: data.image }).then(() => {
  placeholder.classList.remove('placeholder-show');
});

form.addEventListener('submit', async event => {
  event.preventDefault();

  placeholder.classList.add('placeholder-show');

  const result = await previev.result('base64');

  form.base64_image.value = result;

  form.submit();
});