"use strict";

const btn = document.querySelector('.btn-js'),
      placeholder = document.querySelector('.placeholder-js'),
      form = document.querySelector('.form__form-js');


btn.addEventListener('click', () => {
  //placeholder.classList.add('placeholder-show');
});

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
// call a method
//c.method(args);


form.image.addEventListener('change', event => {
  const file = event.target.files[0];
  const reader = new FileReader();
  
  reader.readAsDataURL(file);

  reader.addEventListener('load', async () => {
    const data = reader.result;

    await previev.bind({ url: data });
  });
});

form.addEventListener('submit', async event => {
  event.preventDefault();

  placeholder.classList.add('placeholder-show');

  const result = await previev.result('base64');

  form.base64_image.value = result;

  form.submit();
});